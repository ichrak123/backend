<?php 
include "connect.php" ;
$nomrouge = $_POST['nomrouge'] ;
$nombleu = $_POST['nombleu'] ;
$status = $_POST['status'] ;



$sql = "SELECT   pc.nom_rouge , pc.nomgroupe , pc.lieu , pc.tour_name , pc.date , pc.nom_bleu , pc.equipe_rouge , pc.equipe_bleu , pc.competition_name ,   c.*  , de.nomprenom  AS x , de1.nomprenom AS y , d2.image AS h , d3.image AS i , cl.nom_club AS f , cl2.nom_club AS k    from combat pc

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

WHERE (nom_rouge = ? OR nom_bleu = ? ) AND somme = ?


" ;
$stmt = $con->prepare($sql);
$stmt->execute(array($nomrouge , $nombleu , $status));
$competitions = $stmt->fetchAll(PDO::FETCH_ASSOC) ; 
echo json_encode($competitions) ; 

 


?>