<?php
class MY_Controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('users');
		if($this->users->check_session() == false) $this->login();
	}

	function page($page = null, $data = null) {
		if($this->users->check_session() === true) {
			$this->load->view('template/header',$data);
			$this->load->view('template/menu',$data);
			if($page != null) $this->load->view($page,$data);
			$this->load->view('template/footer',$data);
		}
	}

	function login($data = null) {
		if($this->users->check_session() === false) {
			$this->load->view('template/header',$data);
			$this->load->view('auth/login',$data);
			$this->load->view('template/footer',$data);
		}
	}

	function json($array) {
		return json_encode($array);
	}

	function upload_file($path){
		$config['upload_path']		= $path;
		$config['allowed_types'] 	= 'gif|jpg|png';
		$config['max_size']			= '10240';
		$config['file_name']		= time() .'_'. $this->input->post('name');
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if(!$this->upload->do_upload('imagefile')) {
			return $this->upload->display_errors();
		} else {
			return $this->upload->data();
		}
	}
}
?>