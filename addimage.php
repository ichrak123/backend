<?php 
include "connect.php" ;
$imagename = $_POST['imagename'] ;

$image= base64_decode( $_POST['image64'] ) ;
file_put_contents("assets\\uploads\\files\\" .$imagename , $image) ;




?>