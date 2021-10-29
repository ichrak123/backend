<?php 
include "connect.php" ;
 $cat = $_POST['name'] ;
$sql = "SELECT * FROM competitions WHERE name_comp = ?  " ;
$stmt = $con->prepare($sql);
$stmt->execute(array($cat));
$category = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
echo json_encode($category) ; 




?>