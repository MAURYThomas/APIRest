<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate client object
include_once '../objects/client.php';
 
$database = new Database();
$db = $database->getConnection();
 
$client = new client($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
if(
    !empty($data->nom) &&
    !empty($data->prenom) &&
    !empty($data->adresse) &&
    !empty($data->ville) &&
	!empty($data->cp)
){
 
    // set client property values
    $client->nom = $data->nom;
    $client->prenom = $data->prenom;
    $client->adresse = $data->adresse;
    $client->ville = $data->ville;
    $client->cp = $data->cp;
 
    // create the client
    if($client->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "client was created."));
    }
 
    // if unable to create the client, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create client."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create client. Data is incomplete."));
}
?>