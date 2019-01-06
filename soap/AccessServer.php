<?php
function rechercheClient(){
	
<?php
// on se connecte à notre base
$base = mysql_connect ('serveur', 'login', 'pass');
mysql_select_db ('ma_base', $base) ;
?>
<html>
	<head>
		<title>Numéro de téléphone de LA GLOBULE</title>
	</head>
	<body>
<?php

// lancement de la requete
$sql = 'SELECT * FROM client';

// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

// on recupere le resultat sous forme d'un tableau
$data = mysql_fetch_array($req);

// on libère l'espace mémoire alloué pour cette interrogation de la base
mysql_free_result ($req);
mysql_close ();
?>
Le numéro de téléphone de LA GLOBULE est :<br />
// <?php echo $data['telephone']; ?>
	</body>
</html>
	
	/*
	$db = mysql_connect('localhost', 'root', ''); # connection a la bdd
	mysql_select_db('contact', $db); # selection de la bonne base
	$client = 'SELECT * from client'; # variable requête
	$req = mysql_query($client) or die('Erreur SQL !<br>'.$client.'<br>'.mysql_error()); # envoie de la requête
	while($data = mysql_fetch_assoc($req)) # Boucle sur chaque ligne
	{
		# lit une ligne de la base
		$donnee1 = '<b> contact n° '.$data['RefContact'].'</b>';
		$donnee2 = '<b> information : '.$data['nom'].' '.$data['prenom'].' '.$data['adresse'].' '.$data['ville'].' '.$data['CP'];
		$donnee = $donnee1 + $donne2;
	}
	mysql_close();
	return $donnee;
}
ini_set('soap.wsdl_cache_enabled', 0);
$serversoap=new SoapServer("http://localhost/WebService/soap/server.wsdl");
$serversoap->addFunction("rechercheClient");

$serversoap->handle();*/
?>