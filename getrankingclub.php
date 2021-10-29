<?php 
include "connect.php" ;


$sql = "SELECT clubclassment.*  , competitions.*  FROM clubclassment

INNER JOIN competitions ON
clubclassment.nom_competition  = competitions.id_comp 

" ;

$stmt = $con->prepare($sql);
$stmt->execute();
$category = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
echo json_encode($category) ; 




?>