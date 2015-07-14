<?php
class Auth extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		require_once(path_library . 'phpass-0.1/PasswordHash.php');
		$this->load->model('users');
	}

	function index(){
		echo path_library;
	}

	function login() {
		if(isset($_POST['username']) && isset($_POST['password'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];

			$hasher = new PasswordHash(8,false);

			$user = $this->users->get_by_username($username);
			if($user->num_rows() > 0){
				if($hasher->CheckPassword($password, $user->row('password'))) {
					$this->users->set_session($user->row());
					echo json_encode(array('status' => 'success'));
				} else {
					echo json_encode(array('status' => 'failed', 'message' => 'Your password is wrong!'));
				}
			} else {
				echo json_encode(array('status' => 'failed', 'message' => 'Username not found!'));
			}
		}
	}
}
?>