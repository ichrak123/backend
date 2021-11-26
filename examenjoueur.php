<?php 
include "connect.php" ;
$joueur = $_POST['joueur'] ;


$sql = "SELECT e.* , j.nomprenom




FROM examen e


INNER JOIN  demandelicence j ON e.joueur  = j.joueur_id
 WHERE joueur = ?  " ;
$stmt = $con->prepare($sql);
$stmt->execute(array( $joueur ));

$category = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 



echo json_encode($category) ; 




?>