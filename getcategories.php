<?php 
include "connect.php" ;

$sql = "SELECT * FROM categorie  " ;
$stmt = $con->prepare($sql);
$stmt->execute();
$category = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 


echo json_encode($category) ; 




?>