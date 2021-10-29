<?php 
include "connect.php" ;
$nomprenom = $_POST["nomprenom"] ;
$adresse = $_POST["adresse"];
$datenaissance = $_POST["datenaissance"] ;
$genre = $_POST ["genre"] ;
$category = $_POST ["categorie"] ;
$poid = $_POST ["poid"] ;
$grade = $_POST ["grade"] ;
$club = $_POST ["club"] ;
$email = $_POST ["email"] ;
$phone = $_POST ["phone"] ;
$imagename = $_POST['imagename'] ;
$imagenameone = $_POST['imagenameone'] ;

$imageone= base64_decode( $_POST['image641'] ) ;
$imagetow= base64_decode( $_POST['image642'] ) ;



$sql = "INSERT INTO `demandelicence` (`nomprenom`, `adresse` , `datenaissance` , `genre` , `categorie` , `poid` , `grade` , `club`  , `licence` , `image`  , `email` , `phone`  ) 
VALUES ( :nomprenom , :adresse , :datenaissance , :genre , :categorie , :poid , :grade , :club , :licence , :image , :email , :phone) 


" ;
 $stmt = $con->prepare($sql) ;
 $stmt->execute(array(
	":nomprenom" => $nomprenom ,
	":adresse"   => $adresse ,
  ":datenaissance"   => $datenaissance ,
  ":genre" => $genre ,
  ":categorie" => $category ,
  ":poid" => $poid ,
  ":grade" => $grade ,
  ":club" => $club , 
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