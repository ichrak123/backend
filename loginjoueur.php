<?php 
include "connect.php" ;
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$username = $_POST['username'] ;
	$password = $_POST ['password'] ;
	$stmt = $con->prepare("SELECT * FROM demandelicence WHERE username = ? AND
	password = ? ") ;
	$stmt->execute(array($username , $password )) ;
	$user = $stmt->fetch() ;
	$row = $stmt->rowcount() ;
	
	if($row > 0){
		$id = $user['licence_id'] ;
		$username = $user['username'] ;
		$nomprenom = $user['nomprenom'] ;
		$password = $user['password'] ;
	    $adresse = $user['adresse'] ;
		   $apropos = $user['apropos'] ;
		      $datenaissance = $user['datenaissance'] ;
			  $genre = $user['genre'] ;
			  $categorie = $user['categorie'] ;
			  $poid = $user['poid'] ;
			   $grade = $user['grade'] ;
			    $club = $user['club'] ;
				 $image = $user['image'] ;
			  
		echo json_encode(array('joueur_id' => $id , 'username' => $username ,
'nomprenom' => $nomprenom , 'adresse'=> $adresse   , 'apropos' => $apropos , 'datenaissance' => $datenaissance , 'genre' => $genre ,
'categorie' => $categorie , 'poid' => $poid , 'grade' => $grade  , 'club' => $club , 'image' => $image ,
'password' => $password , 'status' => "sucsses"
		)) ;
		
	}else {
		echo json_encode(array('status' => "fail" , 'password' => "dsdf")) ;
	}
}



?>