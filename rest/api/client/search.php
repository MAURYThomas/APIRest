<?php
// headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include les fichiers php necessaires
include_once '../config/core.php';
include_once '../config/database.php';
include_once '../objects/client.php';
 
// instancie la BDD
$database = new Database();
$db = $database->getConnection();
 
// initialise l'objet client avec la BDD
$client = new client($db);
 
// get keywords et verifie leur existance
$keywords=isset($_GET["s"]) ? $_GET["s"] : "";
 
// requete clients
$stmt = $client->search($keywords);
$num = $stmt->rowCount();
 
// check si des lignes sont présentes
if($num>0){
 
    // clients array
    $clients_arr=array();
    $clients_arr["records"]=array();

    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $client_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,
            "category_name" => $category_name
        );
 
        array_push($clients_arr["records"], $client_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // affiche les données clients récuperés
    echo json_encode($clients_arr);
}
 
else{
    // set response code - 404 Not found
    http_response_code(404);
 
    // si aucun client n'est trouvé dans la BDD
    echo json_encode(
        array("message" => "No clients found.")
    );
}
?>