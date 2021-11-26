<?php 
include "connect.php" ;
$competition = $_POST['searchcompetition'] ;
$where = "WHERE nomcoach Like '$competition%' " ;

$sql = "SELECT * FROM coachs $where " ;
$stmt = $con->prepare($sql);
$stmt->execute();
$competitions = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
echo json_encode($competitions) ; 




?>