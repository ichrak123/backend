<?php 
include "connect.php" ;
$nomcoach = $_POST["nomcoach"] ;
$adresse = $_POST["adresse"];
$datenaissance = $_POST["datenaissance"] ;



$gradecoach = $_POST ["gradecoach"] ;
$nomclub = $_POST ["nomclub"] ;
$email = $_POST ["email"] ;
$phone = $_POST ["phone"] ;
$imagename = $_POST['imagename'] ;
$imagenameone = $_POST['imagenameone'] ;

$imageone= base64_decode( $_POST['image641'] ) ;
$imagetow= base64_decode( $_POST['image642'] ) ;



$sql = "INSERT INTO `coachs` (`nomcoach`, `adresse` , `datenaissance`  ,  `gradecoach` , `nomclub`  , `licence` , `image`  , `email` , `phone`  ) 
VALUES ( :nomcoach , :adresse , :datenaissance  ,  :gradecoach , :nomclub , :licence , :image , :email , :phone) 


" ;
 $stmt = $con->prepare($sql) ;
 $stmt->execute(array(
	":nomcoach" => $nomcoach ,
	":adresse"   => $adresse ,
  ":datenaissance"   => $datenaissance ,

  ":gradecoach" => $gradecoach ,
  ":nomclub" => $nomclub , 
  ":licence" => $imagename ,
   ":image" => $imagenameone ,
   ":email" => $email ,
   ":phone" => $phone


));


$count = $stmt->rowCount() ;

if ($count > 0) {
file_put_contents("assets\\uploads\\files\\" .$imagename  ,  $imageone  ) ;
file_put_contents("assets\\uploads\\files\\" .$imagenameone  ,  $imagetow  ) ;



 
	echo json_encode(array("status" => "success add")) ;
}





?>