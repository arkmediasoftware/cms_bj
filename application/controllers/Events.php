<?php
class Events extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->page('events/index');
	}

	function add(){
		$this->page('events/add');
	}

	function ajax($method = null) {
		switch ($method) {
			case 'add':
				if(isset($_FILES['imagefile'])) {
					$data = $this->upload_file(path_upload);
					print_r($data);
				}

				$apartment['name'] = $this->input->post('name');
				$apartment['images'] = (isset($data['file_name'])) ? $data['file_name'] : null;
				$apartment['description'] = $this->input->post('description');
				$apartment['address'] = $this->input->post('address');
				$apartment['maps_cordinate'] = $this->input->post('maps_cordinate');
				$this->db->insert('events',$apartment);
				break;
			
			default:
				# code...
				break;
		}
	}
}
?>