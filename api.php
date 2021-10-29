<?php 
include "connect.php" ;
$noti = new stdClass() ;


$sql = "SELECT * FROM combat WHERE isSeen = 1  " ;
$stmt = $con->prepare($sql);

$stmt->execute();

$row = $stmt->rowcount() ;
if($row > 0)
{

$category = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
$noti->status = true ;
$noti->msg = $category ;

}else {
	$noti->status = false ;
	$noti->msg = 'no msg ' ;
}
echo json_encode($noti) ; 




?>