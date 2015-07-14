<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('users');
	}

	function index() {
		if($this->users->check_session() == true) redirect('dashboard');
	}
}
