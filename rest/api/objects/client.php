<?php
class Client{
 
    // database connection and table name
    private $conn;
    private $table_name = "client";
 
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

// create client
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                nom=:nom, prenom=:prenom, adresse=:adresse, ville=:ville, cp=:cp";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->nom=htmlspecialchars(strip_tags($this->nom));
    $this->prenom=htmlspecialchars(strip_tags($this->prenom));
    $this->adresse=htmlspecialchars(strip_tags($this->adresse));
    $this->ville=htmlspecialchars(strip_tags($this->ville));
    $this->cp=htmlspecialchars(strip_tags($this->cp));
 
    // bind values
    $stmt->bindParam(":nom", $this->nom);
    $stmt->bindParam(":prenom", $this->prenom);
    $stmt->bindParam(":adresse", $this->adresse);
    $stmt->bindParam(":ville", $this->ville);
    $stmt->bindParam(":cp", $this->cp);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}
}