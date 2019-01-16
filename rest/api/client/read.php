<?php
// headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include BD et objet client
include_once '../config/database.php';
include_once '../objects/client.php';
 
// instancie DB et objet client
$database = new Database();
$db = $database->getConnection();
 
$client = new client($db);
 
// requete client
$stmt = $client->read();
$num = $stmt->rowCount();
 
// check si des ligne sont presente dans la BD
if($num>0){
 
    // clients array
    $clients_arr=array();
    $clients_arr["records"]=array();
 
    // recuperer le contenu de la table
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $client_item=array(
            "Ref contact (Id)" => $id,
            "Nom" => $nom,
            "Prénom" => $prenom,
            "Adresse" => $adresse,
            "Ville" => $ville,
            "Code Postal" => $cp
        );
 
        array_push($clients_arr["records"], $client_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // affiche les données clients récupérées
    echo json_encode($clients_arr);
}
 
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // si aucun client n'est trouvé dans la BDD ($row=0)
    echo json_encode(
        array("message" => "No client found.")
    );
}