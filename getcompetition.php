<?php 
include "connect.php" ;
$cat = $_POST['cat'] ;


$sql = "SELECT *  FROM competitions WHERE cat_name = ? " ;


$stmt = $con->prepare($sql);
$stmt->execute(array($cat));
$competitions = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
echo json_encode($competitions) ; 




?>