<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
if($_POST){

// include database connection
include 'database.php';

try{

// insert query
$query = "INSERT INTO produits SET nom_produit=:nom_produit, prix_produit=:prix_produit, importe=:importe, taxe=:taxe, t_importe=:t_importe, categorie=:categorie";
// prepare query for execution
$stmt = $con->prepare($query);
// posted values
$nom_produit = $_POST['nom_produit'];
$prix_produit = $_POST['prix_produit'];
$importe = $_POST['importe'];
$taxe = $_POST['taxe'];
$t_importe = $_POST['t_importe'];
$categorie = $_POST['categorie'];
// bind the parameters
$stmt->bindParam(':nom_produit', $nom_produit);
$stmt->bindParam(':prix_produit', $prix_produit);
$stmt->bindParam(':importe', $importe);
$stmt->bindParam(':taxe', $taxe);
$stmt->bindParam(':t_importe', $t_importe);
$stmt->bindParam(':categorie', $categorie);
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