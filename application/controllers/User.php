<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User extends CI_Controller {
 
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model');
	}
 
	public function index(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go back to login if session has been set
		if($this->session->userdata('user')){
			redirect('home');
		}
		else{
			$this->load->view('login_page');
		}
	}
	public function login(){
		//load session library
		$this->load->library('session');
 
		$email = $_POST['email'];
		$password = $_POST['password'];
 
		$data = $this->users_model->login($email, $password);
 
		if($data){
			$this->session->set_userdata('user', $data);
			redirect('home');
		}
		else{
			header('location:'.base_url().$this->index());
			$this->session->set_flashdata('error','Email ou mot de passe incorrect');
		} 
	}

	public function home(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go to home if not logged in
		if($this->session->userdata('user')){
		
		$this->load->model('mod_count');
		$data['query'] = $this->mod_count->get_clubs();
		$data['ichrak'] = $this->mod_count->arbitres();
		$data['player'] = $this->mod_count->get_players();
		$data['coach'] = $this->mod_count->get_coachs();
			$this->load->view('home' , $data);
		}
		else{
			redirect('/');
		}
 
	}
 
	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}
 }