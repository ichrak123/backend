<?php 
include "connect.php" ;

$sql = "SELECT id_combat FROM combat WHERE isSeen = 0   " ;
$stmt = $con->prepare($sql);
$stmt->execute();
$category = $stmt->rowCount() ; 


echo json_encode($category) ; 




?>