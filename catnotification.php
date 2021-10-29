<?php 
$noti = new stdClass() ;
include "connect.php" ;
$seen = 1 ;
$stmt = $con->prepare("SELECT * FROM categorie WHERE seen = ? 
	") ;
$stmt -> bind_param("1",$seen);

$stmt->execute();
$result = $stmt->get_result() ;
if($result-> num_rows()> 0) {
	$getassoc = $result-> fetch_assoc() ;
	$theremessgae = $getassoc["title"] ;
	$noti-> status = true ;
	$noti->msg = $theremessgae ;

}
else {
	$noti-> status = false ;
	$noti->msg = "no new message" ;
}
$myapi = json_encode($noti) ;
echo $myapi ;




?>