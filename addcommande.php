<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
if($_POST){

// include database connection
include 'database.php';

try{

// insert query
$query = "INSERT INTO commande SET num_commande=:num_commande, nom_produit=:nom_produit, prix_produit=:prix_produit, t_importe=:t_importe, taxe=:taxe, nb=:nb";
// prepare query for execution
$stmt = $con->prepare($query);
// posted values
$num_commande = $_POST['num_commande'];
$nom_produit = $_POST['nom_produit'];
$prix_produit = $_POST['prix_produit'];
$t_importe = $_POST['t_importe'];
$taxe = $_POST['taxe'];
$nb = $_POST['nb'];
// bind the parameters
$stmt->bindParam(':num_commande', $num_commande);
$stmt->bindParam(':nom_produit', $nom_produit);
$stmt->bindParam(':prix_produit', $prix_produit);
$stmt->bindParam(':t_importe', $t_importe);
$stmt->bindParam(':taxe', $taxe);
$stmt->bindParam(':nb', $nb);
// Execute the query
if($stmt->execute()){
    echo json_encode(array('result'=>'success'));
}else{
    echo json_encode(array('result'=>'fail'));
}
}
// show error
catch(PDOException $exception){
die('ERROR: ' . $exception->getMessage());
}
}
?>