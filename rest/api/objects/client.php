<?php
class Client{
 
    // connection a la base (api_db)
    private $conn;
    private $table_name = "clients";
 
    // objets
    public $id;
    public $nom;
    public $prenom;
    public $adresse;
    public $ville;
    public $cp;
 
    // Constructeur avec $db la base phpmyadmin
    public function __construct($db){
        $this->conn = $db;
    }
// read clients
function read(){
 
    // requete
    $query = "SELECT
                'Ref contact (Id)', Nom, Prénom, Adresse, Ville, 'Code Postal'
            FROM
               " . $this->table_name . "   
            ORDER BY
                'Ref contact (Id)' DESC";
 
    // prepare une requete pour l'executer en boucle
    $stmt = $this->conn->prepare($query);
 
    // execute la requete
    $stmt->execute();
 
    return $stmt;
}

// recherche client(s)
function search($keywords){
 
    // select all query
    $query = "SELECT
                'Ref contact (Id)', Nom, Prénom, Adresse, Ville, 'Code Postal'
            FROM
                " . $this->table_name . "
            WHERE
            'Ref contact (Id)' LIKE ? or Nom LIKE ? OR Prénom LIKE ? or Adresse LIKE ? or Ville LIKE ? or 'Code Postal' LIKE ?
            ORDER BY
                'Ref contact (Id)' DESC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // encode le texte correctement et supprime tout ce qui est balise html etc...
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
 
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
    $stmt->bindParam(3, $keywords);
    $stmt->bindParam(4, $keywords);
    $stmt->bindParam(5, $keywords);
    $stmt->bindParam(6, $keywords);
 
    // execute la requete
    $stmt->execute();
 
    return $stmt;
}
}