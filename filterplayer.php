<?php 
include "connect.php" ;
$competition = $_POST['searchcompetition'] ;
$where = "WHERE nomprenom Like '$competition%' " ;

$sql = "SELECT * FROM demandelicence $where " ;
$stmt = $con->prepare($sql);
$stmt->execute();
$competitions = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
echo json_encode($competitions) ; 




?>