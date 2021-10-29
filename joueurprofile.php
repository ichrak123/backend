<?php 
include "connect.php" ;
$nomprenom = $_POST['nomprenom'] ;



$sql = "SELECT *  FROM demandelicence



WHERE nomprenom = ?  " ;
$stmt = $con->prepare($sql);
$stmt->execute(array($nomprenom));
$competitions = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
echo json_encode($competitions) ; 




?>