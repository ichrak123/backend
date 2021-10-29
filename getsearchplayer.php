<?php 
include "connect.php" ;

$sql = "SELECT * FROM demandelicence " ;
$stmt = $con->prepare($sql);
$stmt->execute();
$competitions = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
echo json_encode($competitions) ; 




?>