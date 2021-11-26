<?php 
include "connect.php" ;
$clubnameone = $_POST['clubname'] ;
$clubnametow = $_POST['clubnametow'] ;

$sql = "SELECT * FROM combat WHERE isSeen = 0 AND (nom_rouge = ? OR nom_bleu = ? ) " ;
$stmt = $con->prepare($sql);
$stmt->execute(array($clubnameone , $clubnametow ));

$category = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 



echo json_encode($category) ; 




?>