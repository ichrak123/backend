<?php 
include "connect.php" ;

$sql = "UPDATE combat SET isSeen = 1 WHERE id_combat = :id_combat " ;
$stmt = $con->prepare($sql);
$stmt->bindParam(':id_combat', $_POST['id_combat'], PDO::PARAM_INT);   

$stmt->execute($id);




?>