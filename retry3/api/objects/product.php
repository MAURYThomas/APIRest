<?php
class Product{
 
    // database connection and table name
    private $conn;
    private $table_name = "clients";
 
    // object properties
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $category_name;
    public $created;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
// read products
function read(){
 
    // select all query
    $query = "SELECT
                Nom, Prénom, Adresse, Ville, 'Code Postal'
            FROM
                " . $this->table_name . "
            ORDER BY
                Nom DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
}