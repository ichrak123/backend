<?php 
include "connect.php" ;
$tour = $_POST['competition_name'] ;
$name = $_POST['tour_name'] ;
$typeresultat = $_POST['typeresultat'] ;
$typeresultattow = $_POST['typeresultattow'] ;

 
 
 
$sql = "SELECT pc.* ,  c.* , de.nomprenom  AS x , de1.nomprenom AS y , d2.image AS h , d3.image AS i , cl.nom_club AS f , cl2.nom_club AS k  FROM   combat pc 

INNER JOIN  competitions c ON pc.competition_name  = c.id_comp



INNER JOIN  demandelicence de ON
pc.nom_rouge = de.joueur_id 
INNER JOIN demandelicence de1 ON
pc.nom_bleu  = de1.joueur_id 
INNER JOIN demandelicence d2 ON
pc.nom_rouge  = d2.joueur_id 
INNER JOIN demandelicence d3 ON
pc.nom_bleu  = d3.joueur_id 
INNER JOIN clubs cl ON
pc.equipe_rouge  = cl.id_club
INNER JOIN clubs cl2 ON
pc.equipe_bleu  = cl2.id_club


WHERE (competition_name = ? AND tour_name = ? ) AND ( type_resultat = ?  OR type_resultat = ? ) " ;


$stmt = $con->prepare($sql);
$stmt->execute(array($tour , $name  , $typeresultat , $typeresultattow ));
$category = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
echo json_encode($category) ; 




?>