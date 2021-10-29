<?php 
include "connect.php" ;
$clubnameone = $_POST['joueurname'] ;
$clubnametow = $_POST['joueurnametow'] ;


$sql = "SELECT matches.* , competitions.*  FROM matches

INNER JOIN competitions ON
matches.competition_name = competitions.id_comp


WHERE 	name_joueur_one  = ? OR name_joueur_tow = ? " ;
$stmt = $con->prepare($sql);
$stmt->execute(array($clubnameone , $clubnametow));
$competitions = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
echo json_encode($competitions) ; 




?>