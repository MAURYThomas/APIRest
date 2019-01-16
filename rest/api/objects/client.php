<?php
class Client{
 
    // database connection and table name
    private $conn;
    private $table_name = "clients";
 
    // object properties
    public $id;
    public $nom;
    public $prenom;
    public $adresse;
    public $ville;
    public $cp;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
// read clients
function read(){
 
    // select all query
    $query = "SELECT
                'Ref contact (Id)', Nom, Prénom, Adresse, Ville, 'Code Postal'
            FROM
               " . $this->table_name . "   
            ORDER BY
                'Ref contact (Id)' DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
}