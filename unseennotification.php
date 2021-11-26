<?php 
include "connect.php" ;
$clubnameone = $_POST['clubname'] ;
$clubnametow = $_POST['clubnametow'] ;
$sql = "SELECT id_combat FROM combat WHERE isSeen = 0 AND (equipe_rouge = ? OR equipe_bleu = ? )  " ;
$stmt = $con->prepare($sql);
$stmt->execute(array($clubnameone , $clubnametow ));
$category = $stmt->rowCount() ; 


echo json_encode($category) ; 




?>