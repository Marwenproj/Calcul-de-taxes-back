 <?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// include database connection
include 'database.php';
 
// delete message prompt will be here
 
// select all data
$query = "SELECT  COUNT(DISTINCT('num_commande')) FROM commande";
$stmt = $con->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$a =implode ($results[0]);
$json = json_encode($a);
echo $json;
?>