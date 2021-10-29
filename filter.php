<?php 
include "connect.php" ;
$competition = $_POST['searchcompetition'] ;
$where = "WHERE name_comp Like '$competition%' " ;

$sql = "SELECT * FROM competitions $where " ;
$stmt = $con->prepare($sql);
$stmt->execute();
$competitions = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
echo json_encode($competitions) ; 




?>