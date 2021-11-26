<?php 

/**
 * 
 */
class Mod_count extends CI_Model
{
	
	public function get_clubs() {
	return	$this->db->count_all('clubs');
	}
	public function get_players() {
	return	$this->db->count_all('demandelicence');
	}
	public function get_coachs() {
	return	$this->db->count_all('coachs');
	}
	public function arbitres() {
	return	$this->db->count_all('arbitres');
	}
}

?>