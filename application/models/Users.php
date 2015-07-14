<?php
class Users extends CI_Model {
	
	function get_by_username($username) {
		$query = $this->db->query("select * from users where lower(username) = '".strtolower($username)."' and activated = 1");
		return $query;
	}

	function check_session(){
		if($this->session->userdata('login') == 'true') return true;
		else return false;
	}
	function set_session($user){
		$session['login'] = 'true';
		$session['username'] = $user->username;
		$session['login_date'] = time();
		$this->session->set_userdata($session);
	}
	function unset_session(){
		$session['login'] = '';
		$session['username'] = '';
		$session['login_date'] = '';
		$this->session->set_userdata($session);
		$this->session->destroy();
	}
}
?>