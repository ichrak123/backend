<?php 
include "connect.php" ;
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$username = $_POST['username'] ;
	$password = $_POST ['password'] ;

	$stmt = $con->prepare("SELECT * FROM clubs WHERE username = ? AND
	password = ? ") ;
	$stmt->execute(array($username , $password )) ;
	$user = $stmt->fetch() ;
	$row = $stmt->rowcount() ;
	
	if($row > 0){
		$id = $user['id_club'] ;
      



		$username = $user['username'] ;
		$clubresponsable = $user['club_responsable'] ;
		$password = $user['password'] ;
	    $nomclub = $user['nom_club'] ;
		
		   $apropos = $user['apropos'] ;
		      $nombreentraineur = $user['nombreentraineur'] ;
			  $nombrejoueur = $user['nombrejoueur'] ;
			  $email = $user['email'] ;
		echo json_encode(array('id_club' => $id , 'username' => $username ,
'club_responsable' => $clubresponsable , 'nom_club'=> $nomclub  , 'apropos' => $apropos , 'nombreentraineur' => $nombreentraineur , 'nombrejoueur' => $nombrejoueur ,
'email' => $email ,
'password' => $password , 'status' => "sucsses"
		)) ;
		
	}else {
		echo json_encode(array('status' => "fail" , 'password' => "dsdf")) ;
	}
}



?>