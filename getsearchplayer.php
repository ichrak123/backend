<?php 
include "connect.php" ;
$club = $_POST['club'] ;



$sql = "SELECT *  FROM demandelicence



WHERE club = ?  " ;
$stmt = $con->prepare($sql);
$stmt->execute(array($club));
$competitions = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
echo json_encode($competitions) ; 




?>