<?php
class Apartment extends MY_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('apartment_m');
	}

	function index(){
		$page = isset($_GET['p']) ? $_GET['p'] : false;
		switch ($page) {
			case 'details':
				$this->page('apartment/details');
				break;
			case 'category':
				$this->page('apartment/category');
				break;	
			default:
				$this->page('apartment/index');
				break;
		}
	}

	function add(){
		$page = isset($_GET['p']) ? $_GET['p'] : false;
		switch ($page) {
			case 'category':
				$this->page('apartment/add_category_items');
				break;
			default:
				$this->page('apartment/add');
				break;
		}
	}

	function ajax($method = null) {
		switch ($method) {
			case 'add':
				if(isset($_FILES['imagefile'])) {
					$data = $this->upload_file(path_upload_apartment);
					print_r($data);
				}

				$apartment['name'] = $this->input->post('name');
				$apartment['images'] = (isset($data['file_name'])) ? $data['file_name'] : null;
				$apartment['description'] = $this->input->post('description');
				$apartment['address'] = $this->input->post('address');
				$apartment['maps_cordinate'] = $this->input->post('maps_cordinate');
				$this->db->insert('apartment',$apartment);
				break;

			case 'add_category':
				if(isset($_FILES['imagefile'])) {
					$data = $this->upload_file(path_upload);
					print_r($data);
				}

				$apartment['name'] = $this->input->post('name');

				$apartment['apartment_id'] = $_GET['id'];
				$apartment['category_id'] = $_GET['category'];
				$apartment['level'] = $_GET['level'];

				$apartment['images'] = (isset($data['file_name'])) ? $data['file_name'] : null;
				$apartment['description'] = $this->input->post('description');
				$apartment['address'] = $this->input->post('address');
				$apartment['maps_cordinate'] = $this->input->post('maps_cordinate');
				$this->db->insert('apartment_category_items',$apartment);
				break;

			
			default:
				# code...
				break;
		}
	}
}
?>