<?php 
include "connect.php" ;
$nomprenom = $_POST['nomprenom'] ;



$sql = "SELECT d.* , c.*  FROM demandelicence d

INNER JOIN  clubs c ON d.club  = c.id_club


WHERE nomprenom = ?  " ;
$stmt = $con->prepare($sql);
$stmt->execute(array($nomprenom));
$competitions = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
echo json_encode($competitions) ; 




?>