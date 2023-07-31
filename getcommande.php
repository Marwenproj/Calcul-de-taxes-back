<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// include database connection
include 'database.php';
 
$num_commande=isset($_GET['num_commande']) ? $_GET['num_commande'] : die('ERROR: Record ID not found.');
 
// select all data
$query = "SELECT * FROM commande WHERE num_commande= ?";
$stmt = $con->prepare($query);
//$num_commande =  $_POST['num_commande'];
//$stmt->bindParam(':num_commande', $num_commande);
$stmt->bindParam(1, $num_commande);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($results);
echo $json;
?>