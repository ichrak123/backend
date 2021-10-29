<?php 
include "connect.php" ;


$sql = "SELECT * FROM combat WHERE isSeen = 0 " ;
$stmt = $con->prepare($sql);
$stmt->execute();

$category = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 



echo json_encode($category) ; 




?>