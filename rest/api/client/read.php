<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/client.php';
 
// instantiate database and client object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$client = new client($db);
 
// query clients
$stmt = $client->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // clients array
    $clients_arr=array();
    $clients_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
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
 
    // show clients data in json format
    echo json_encode($clients_arr);
}
 
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no client found
    echo json_encode(
        array("message" => "No client found.")
    );
}