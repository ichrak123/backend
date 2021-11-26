<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examples extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
        $this->load->library('email');

		$this->load->library('grocery_CRUD');
	}





  public function _example_output($output = null)
	{
		$this->load->view('new.php',(array)$output);
	}

  public function _examples_output($output = null)
	{
		$this->load->view('example.php',(array)$output);
	}
	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}
  public function acceuil()
	{
			$this->load->model('mod_count');
		$data['query'] = $this->mod_count->get_clubs();
		$data['ichrak'] = $this->mod_count->arbitres();
		$data['player'] = $this->mod_count->get_players();
		$data['coach'] = $this->mod_count->get_coachs();
		$this->load->view('new' , $data) ;
		
	}
	

  public function otherview()
	{
		$this->load->view('clubs.php');
	}
	public function joueurs()
	{
		$this->load->view('joueurlicencie.php');
	}
	public function coachlicencies()
	{
		$this->load->view('coachlicencie.php');
	}

  public function arbitreview()
	{
		$this->load->view('arbitre.php');
	}
	public function joueurview()
	{
		$this->load->view('joueurview.php');
	}
	public function coachview()
	{
		$this->load->view('coachview.php');
	}
	public function combatview()
	{
		$this->load->view('combatview.php');
	}
	public function combatowview()
	{
		$this->load->view('combattow.php');
	}
	public function competitionview()
	{
		$this->load->view('competitionview.php');
	}
	 public function categorieview()
	{
		$this->load->view('categorieview.php');
	}

	public function examenjoueurview() {
			$this->load->view('examenjoueur.php');
	}

	public function examenarbitreview() {
			$this->load->view('examenarbitre.php');
	}

	public function examencoachview() {
			$this->load->view('examencoach.php');
	}
	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	

	function add_field_callback_1()
{
    return 'Points <input type="text" maxlength="50" value="" name="phone" style="width:462px">';
}

	public function clubs()
	{
			$crud = new grocery_CRUD();
			$crud->set_theme('tablestrap');
			$crud->set_table('clubs');
			$crud->columns('nom_club','email');
			$crud->display_as('username' , 'mot utilisateur');
				$crud->display_as('password' , 'Mot de passe');
		$crud->unset_clone();
			$crud->set_subject('clubs');

		

			$output = $crud->render();

			$this->_examples_output($output);
	}
		public function categorie()
	{
			$crud = new grocery_CRUD();
				$crud->set_theme('tablestrap');
			$crud->set_table('categorie');
			 $crud->unset_columns(array('seen'));
			  $crud->unset_clone();
			  $crud->unset_read();

		
			$crud->set_subject('categorie');
		

			$output = $crud->render();

						$this->_examples_output($output);

	}

	public function arbitres()
	{
			$crud = new grocery_CRUD();
			$crud->set_theme('tablestrap');
$crud->unset_clone();
	
			$crud->columns('nomarbitre','gradearbitre','username','password');
			$crud->set_table('arbitres');
			$crud->set_subject('arbitres');
			
	$crud->display_as('username' , 'mot utilisateur');
				$crud->display_as('password' , 'Mot de passe');
			$output = $crud->render();

			$this->_examples_output($output);
	}



	public function valueToEuro($value, $row)
	{
		return $value.' &euro;';
	}

	public function competitions()
	{
		$crud = new grocery_CRUD();
				$crud->set_theme('tablestrap');
		$crud->set_table('competitions');
		$crud->set_subject('competitions');
		$crud->columns(['name_comp' , 'poid_comp' , 'date_comp' , 'lieu_comp' , 'cat_name']);
		$crud->fields(['name_comp' , 'cat_name' , 'sexe_comp' , 'poid_comp' , 'date_comp' , 'lieu_comp']);
		
		$crud->set_relation('cat_name','categorie', 'title');
		$crud->display_as('sexe_comp' , 'genre');
		$crud->display_as('name_comp' , 'Nom de competition');
		$crud->display_as('date_comp' , 'Date');
		$crud->display_as('lieu_comp' , 'Lieu');
			$crud->display_as('cat_name' , 'Categorie');
			$crud->display_as('poid_comp' , 'poid');
$crud->field_type('sexe_comp','dropdown' , array('Femme' => 'femme' , 'Homme'=> 'homme'));
		$crud->field_type('poid_comp','dropdown',
            array('-50kg' => '-50kg', '-60kg' => '-60kg','-20kg' => '-20kg'));
			$crud->callback_add_field('date_comp', function () {
        return ' <input type="datetime-local" id="start" name="date_comp"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31">';
    });
    $crud->unset_clone() ;


    	$crud->callback_add_field('date_comp', function () {
        return ' <input type="datetime-local" id="start" name="date"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31">';
    });

    	$crud->callback_edit_field('date_comp', function () {
        return ' <input type="datetime-local" id="start" name="date"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31">';
    });


 

	

		$output = $crud->render();

					$this->_examples_output($output);

	}
public function matchestow()
	{
	
		   
            
$crud = new grocery_CRUD();
		
			$crud->set_theme('tablestrap');
		$crud->set_table('combat');
		$crud->columns(['nomgroupe','nom_rouge','equipe_rouge','entraineur_joueur_rouge' , 'nom_bleu' , 'equipe_bleu' , 'entraineur_joueur_bleu' , 'arbitre_name' ,
		'competition_name' , 'tour_name' , 'lieu' , 'date' , ]);
		$crud->fields([ 'nomgroupe', 'equipe_rouge' ,'nom_rouge','entraineur_joueur_rouge' , 'nom_bleu' , 'equipe_bleu' , 'entraineur_joueur_bleu' , 'arbitre_name' ,
		'competition_name' , 'tour_name' , 'lieu' , 'date' , ]);
		$crud->set_subject('match');
		$crud->unset_clone();
		$crud->unset_read();



	
	   $crud->set_lang_string('list_record','') ;
			$crud->set_relation('competition_name','competitions', 'name_comp');
		$crud->set_relation('arbitre_name','arbitres', 'nomarbitre' );
		
					
										$crud->set_relation('entraineur_joueur_bleu','coachs', 'nomcoach');
										$crud->field_type('tour_name','dropdown',
            array( '1/8-finals' => '1/8-finals' , 'Quarter-finals' => 'Quarter-finals' , 'Semi-finals' => 'Semi-finals' ,  'final' => 'final' ,  '3emeplace' => '3éme place'));
$crud->field_type('nomgroupe','dropdown',
            array('Groupe A ' => 'Groupe A', 'Groupe B' => 'Groupe B' , 'Groupe C' => 'Groupe C' , 'Groupe D' => 'Groupe D' ));
	
			
	  $crud->callback_add_field('date', function () {
        return ' <input type="datetime-local" id="start" name="date"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31">';
    });
	$crud->callback_edit_field('date', function () {
        return ' <input type="datetime-local" id="start" name="date"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31">';
    });

		
			$crud->set_relation('equipe_bleu','clubs', 'nom_club');
	
			$crud->set_relation('nom_bleu','demandelicence', 'nomprenom');
		$crud->display_as('nom_rouge' , 'Competiteur rouge (AKA)');
			$crud->display_as('nom_bleu' , 'Competiteur bleu (AO)');
				
				$crud->set_relation('equipe_rouge','clubs', 'nom_club');
			$crud->set_relation('nom_rouge','demandelicence', 'nomprenom' );
				$crud->set_relation('entraineur_joueur_rouge','coachs', 'nomcoach');
		
		
		$output = $crud->render();
		


					$this->_examples_output($output);

	}





	
	
	function ichrak($value, $row)
{
    return $value;
}
			public function examenjoueur()
	{
			$crud = new grocery_CRUD();
				$crud->set_theme('tablestrap');
			$crud->set_table('examen');
			$crud->fields(['grade' , 'joueur' , 'lieu' , 'date' , 'resultat']);
				$crud->columns(['grade' , 'joueur' , 'lieu' , 'date' , 'resultat']);
				$crud->set_relation('joueur','demandelicence', 'nomprenom');
			$crud->field_type('grade','dropdown',
            array( '1er kyu' => '1er kyu' , '2e kyu' => '2e kyu' , '3e kyu' => '3e kyu' ,  '4e kyu' => '4e kyu' ,  '5e kyu' => '5e kyu' , '6e kyu' => '6e kyu' , '7e kyu' => '7e kyu' , '8e kyu' => '8e kyu' , '9e kyu' => '9e kyu' , '1er dan' => '1er dan' , '2e dan' => '2e dan' ,'3e dan' => '3e dan'));
		
			$crud->set_subject('examen');
			$crud->field_type('resultat','dropdown',
            array( 'reussi' => 'reussi' , 'echoue' => 'echoue' , ));
		

			$output = $crud->render();

						$this->_examples_output($output);

	}
			public function examencoach()
	{
			$crud = new grocery_CRUD();
				$crud->set_theme('tablestrap');
			$crud->set_table('examen');
			$crud->fields(['grade' , 'coach' , 'lieu' , 'date' , 'resultat']);
				$crud->columns(['grade' , 'coach' , 'lieu' , 'date' , 'resultat']);
				$crud->set_relation('coach','coachs', 'nomcoach');
				$crud->field_type('grade','dropdown',
            array( '1er kyu' => '1er kyu' , '2e kyu' => '2e kyu' , '3e kyu' => '3e kyu' ,  '4e kyu' => '4e kyu' ,  '5e kyu' => '5e kyu' , '6e kyu' => '6e kyu' , '7e kyu' => '7e kyu' , '8e kyu' => '8e kyu' , '9e kyu' => '9e kyu' , '1er dan' => '1er dan' , '2e dan' => '2e dan' ,'3e dan' => '3e dan'));
		$crud->field_type('resultat','dropdown',
            array( 'reussi' => 'reussi' , 'echoue' => 'echoue' , ));
		
			$crud->set_subject('examen');
		

			$output = $crud->render();

						$this->_examples_output($output);

	}
			public function examenarbitre()
	{
			$crud = new grocery_CRUD();
				$crud->set_theme('tablestrap');
			$crud->set_table('examen');
			$crud->fields(['grade' , 'arbitre' , 'lieu' , 'date' , 'resultat']);
				$crud->columns(['grade' , 'arbitre' , 'lieu' , 'date' , 'resultat']);
				$crud->set_relation('arbitre','arbitres', 'nomarbitre');
				$crud->field_type('grade','dropdown',
            array( '1er kyu' => '1er kyu' , '2e kyu' => '2e kyu' , '3e kyu' => '3e kyu' ,  '4e kyu' => '4e kyu' ,  '5e kyu' => '5e kyu' , '6e kyu' => '6e kyu' , '7e kyu' => '7e kyu' , '8e kyu' => '8e kyu' , '9e kyu' => '9e kyu' , '1er dan' => '1er dan' , '2e dan' => '2e dan' ,'3e dan' => '3e dan'));
		
		$crud->field_type('resultat','dropdown',
            array( 'reussi' => 'reussi' , 'echoue' => 'echoue' , ));
			$crud->set_subject('examen');
		

			$output = $crud->render();

						$this->_examples_output($output);

	}
	


	public function matches()
	{
	

		$crud = new grocery_CRUD();
		$crud->set_theme('tablestrap');
		$crud->set_table('combat');
		$crud->set_subject('matches');
		  $crud->unset_add();
		 $crud->set_lang_string('list_edit','Enregistrer les resultats') ;
    $crud->columns('equipe_rouge', 'nom_rouge', 'entraineur_joueur_rouge'  , 'nomgroupe' , 'competition_name' ,
	
	'nom_bleu' , 'equipe_bleu' , 'entraineur_joueur_bleu'  ,  'tour_name' , 'arbitre_name' , 'lieu' , 'date');
		 
    $crud->fields('equipe_rouge', 'nom_rouge', 'entraineur_joueur_rouge', 'score' , 'pt' , 'moy' , 'santion' , 'somme' , 
	
	'nom_bleu' , 'equipe_bleu' , 'entraineur_joueur_bleu' , 'scoreone' , 'ptone' , 'moyone' , 'santionone' , 'sommeone' , 'tour_name' , 'arbitre_name' , 'vainqueur' , 'type_resultat' , 'lieu' , 'date');
	$crud->field_type('somme','invisible');
	$crud->field_type('sommeone','invisible');
	$crud->field_type('vainqueur','invisible');
		 $crud->callback_add_field('date', function () {
        return ' <input type="datetime-local" id="start" name="date"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31">';
    });

   
 $crud->unset_read();

		$crud->set_relation('competition_name','competitions', 'name_comp');
		$crud->set_relation('arbitre_name','arbitres', 'nomarbitre');
		
		$crud->set_relation('nom_rouge','demandelicence', 'nomprenom');
	
	
		$crud->field_type('type_resultat','dropdown',
            array('Gagne par Hantei' => 'Gagne par Hantei', 'Gagne par Points' => 'Gagne par points'));
		$crud->field_type('vainqueur','dropdown',
            array('AKA' => 'AKA', 'AO' => 'AO'));
				$crud->field_type('tour_name','dropdown',
            array( '1/8-finals' => '1/8-finals' , 'Quarter-finals' => 'Quarter-finals' , 'Semi-finals' => 'Semi-finals' ,  'final' => 'final' ,  'troisième place' => 'troisième place'));
	
	
		$crud->set_relation('nom_bleu','demandelicence', 'nomprenom');


		$crud->set_relation('equipe_bleu','clubs', 'nom_club');
						$crud->set_relation('entraineur_joueur_bleu','coachs', 'nomcoach');
$crud->field_type('nomgroupe','dropdown',
            array('Groupe A ' => 'Groupe A', 'Groupe B' => 'Groupe B' , 'Groupe C' => 'Groupe C' , 'Groupe D' => 'Groupe D' ));
		
				$crud->set_relation('equipe_rouge','clubs', 'nom_club');
				$crud->set_relation('entraineur_joueur_rouge','coachs', 'nomcoach');
				
				$crud->display_as('nomgroupe' , 'groupe');
				$crud->display_as('score' , 'Techniques');
				$crud->display_as('scoreone' , 'Techniques');
				$crud->display_as('nom_rouge' , 'Competiteur rouge (AKA)');
				$crud->display_as('entraineur_joueur_rouge' , 'Entraineur de Competiteur rouge');
				$crud->display_as('nom_bleu' , 'Competiteur bleu (AO)');
								$crud->display_as('entraineur_joueur_bleu' , 'Entraineur de Competiteur bleu');

				

					$crud->display_as('pt' , 'projection franche');
					$crud->display_as('moy' , 'Immobilisation');
					$crud->display_as('santion' , 'sanction');
					
						
	
			  $crud->callback_add_field('date', function () {
        return ' <input type="date" id="start" name="date"
       value="2018-07-22"
       min="2018-01-01" max="2018-12-31">';
    });
			
 		 $crud->unset_columns(array('score' , 'scoreone' , 'santion' , 'moyone' , 'santionone' , 'pt' , 'ptone' , 'moy' , 'sommeone' , 'somme'));

 
 	$crud->display_as('ptone' , 'projection franche');
					$crud->display_as('moyone' , 'Immobilisation');
					$crud->display_as('santionone' , 'sanction');
						
							$crud->display_as('arbitre_name' , 'Arbitre');
						
								$crud->display_as('competition_name' , 'competition');
							

				
	
						
	$crud->callback_before_insert(array($this,'my_sum_function'));
$crud->callback_before_update(array($this,'my_sum_function'));




 
 


		$output = $crud->render();
	
					$this->_examples_output($output);

		
	



	}



function my_sum_function($post_array, $primary_key) {


$post_array['somme'] = $post_array['score'] + $post_array['pt'] + $post_array['moy'] - $post_array['santion'] ;
$post_array['sommeone'] = $post_array['scoreone'] + $post_array['ptone'] + $post_array['moyone'] - $post_array['santionone'] ;
return $post_array ;

}




	
	
 
	function showImage($value) {  
		return "<img src='http://localhost/federationtunisienne/uploads/" . $value . "' width=50 , height = 50>";
	 }
	  public function email()
    {
        $this->load->library('email');

        $this->email->from('ichrak.jerad@gmail.com', 'Admin');
        $this->email->to('ichrak.jerad@gmail.com');

        $this->email->subject('New Vehicle Added');
        $this->email->message('A new vehicle has been registered. Please log in to your admin panel to approve the vehicle.');

        $this->email->send();

        echo $this->email->print_debugger();
    }
	
	

public function send($post_array)
    {
      $this->load->library("email") ;

$config = array(

'protocol'=>'smtp' ,
'smtp_host' =>'ssl://smtp.gmail.com',
'smtp_port' =>465,
'smtp_timeout'=>30,
'smtp_user'   =>'ichrak.jerad@gmail.com',
'smtp_pass'    => 'Ichrak1995',
'charset'   => 'utf-8',
'newline'    => "\r\n",
'mailtype' => "html"


);
$this->email->initialize($config) ;
      $this->email->set_newline("\r\n") ;

            $this->email->set_crlf("\r\n") ;


      $this->email->to($post_array['email']) ;
       $this->email->from("jdichrak@gmail.com") ; 
       $this->email->subject("test email") ;
        $this->email->message("username : " . $post_array['username']. "   password : " .$post_array['password'] ) ;
       if($this->email->send())   {
        echo "Mail send succseffly" ;
       }else {
        echo "sorry enable to send" ;
                print_r($this->email->print_debugger()) ;

        }


    }
      



	
 
	
		function demandecoachs()
	{
		$crud = new grocery_CRUD();
		$crud->set_theme('tablestrap');
			$crud->columns('nomcoach','nomclub' , 'licence' , 'image' , 'gradecoach');
$crud->unset_add();
		$crud->set_table('coachs');
		$crud->set_subject('coach');
				$crud->set_field_upload('licence','assets/uploads/files');
								$crud->set_field_upload('image','assets/uploads/files');
		
$crud->set_relation('nomclub','clubs', 'nom_club');
$crud->set_lang_string('form_update_changes','confirmer la demande') ;

            $crud->callback_after_update(array($this, 'send'));
             $crud->callback_after_insert(array($this, 'send'));

   $crud->set_lang_string('list_show_entries','Afficher {paging} joueurs') ;
   $crud->set_lang_string('list_edit','Traiter la demande') ;
    $crud->set_lang_string('list_delete','refuser la demande') ;
	   $crud->set_lang_string('list_add','ajouter un') ;
	 $crud->unset_clone() ;
		$crud->where('numerolicence =', '');
		$output = $crud->render();
		

$crud->callback_column('licence',array($this,'showImageone'));
						$crud->callback_column('image',array($this,'showImageone'));
					$this->_examples_output($output);

						

	}



		function coachslicencie()
	{
		$crud = new grocery_CRUD();
		$crud->set_theme('tablestrap');
			$crud->columns('nomcoach','nomclub' , 'licence' , 'image' , 'gradecoach');

		$crud->set_table('coachs');
		$crud->set_subject('coach');
				$crud->set_field_upload('licence','assets/uploads/files');
								$crud->set_field_upload('image','assets/uploads/files');

            $crud->callback_after_update(array($this, 'send'));
             $crud->callback_after_insert(array($this, 'send'));
		
$crud->set_relation('nomclub','clubs', 'nom_club');

   $crud->set_lang_string('list_show_entries','Afficher {paging} joueurs') ;

	   $crud->set_lang_string('list_add','ajouter un') ;
	 $crud->unset_clone() ;
			$crud->where('numerolicence !=', '');
		$output = $crud->render();
		

$crud->callback_column('licence',array($this,'showImageone'));
						$crud->callback_column('image',array($this,'showImageone'));
					$this->_examples_output($output);

						

	}

	function demandelicence()
	{
		$crud = new grocery_CRUD();
			$crud->columns('nomprenom','club' , 'licence' , 'image');
		$crud->set_theme('tablestrap');
				$crud->set_relation('club','clubs', 'nom_club');
		$crud->set_table('demandelicence');
		$crud->where('numerolicence =', '');
		$crud->unset_add();
		$crud->unset_read();
		
		$crud->set_subject('Joueur');
				$crud->set_field_upload('licence','assets/uploads/files');
								$crud->set_field_upload('image','assets/uploads/files');

            $crud->callback_after_update(array($this, 'send'));
             $crud->callback_after_insert(array($this, 'send'));
              $crud->set_lang_string('form_update_changes','confirmer la demande') ;

   $crud->set_lang_string('list_show_entries','Afficher {paging} joueurs') ;
   $crud->set_lang_string('list_edit','Traiter la demande') ;
    $crud->set_lang_string('list_delete','refuser la demande') ;
	   $crud->set_lang_string('list_add','ajouter un') ;
	 $crud->unset_clone() ;

		$output = $crud->render();
	
					$this->_examples_output($output);

						$crud->callback_column('licence',array($this,'showImageone'));
						$crud->callback_column('image',array($this,'showImageone'));

	}



function joueurlicencies()
	{
		$crud = new grocery_CRUD();
			$crud->columns('nomprenom','club' , 'licence' , 'image');
		$crud->set_theme('tablestrap');
				$crud->set_relation('club','clubs', 'nom_club');
		$crud->set_table('demandelicence');
		$crud->where('numerolicence !=', '');
		
		$crud->set_subject('Joueur');
				$crud->set_field_upload('licence','assets/uploads/files');
								$crud->set_field_upload('image','assets/uploads/files');

            $crud->callback_after_update(array($this, 'send'));
             $crud->callback_after_insert(array($this, 'send'));
            

   $crud->set_lang_string('list_show_entries','Afficher {paging} joueurs') ;
   
	   $crud->set_lang_string('list_add','ajouter un') ;
	 $crud->unset_clone() ;

		$output = $crud->render();
	
					$this->_examples_output($output);

						$crud->callback_column('licence',array($this,'showImageone'));
						$crud->callback_column('image',array($this,'showImageone'));

	}









	function showImageone($value) {  
		return "<img src='http://localhost/federationtunisienne/uploads/" . $value . "' width=50 , height = 50>";
	 }




	 
	

	

}
