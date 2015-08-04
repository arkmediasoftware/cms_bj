<?php

class Api extends CI_Controller {


	function __construct(){
		parent::__construct();
		header("Access-Control-Allow-Origin: *"); 
		header("Access-Control-Allow-Methods: PUT, GET, POST");
		header("Access-Control-Allo w-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('content-type: application/json; charset=utf-8');
	}

	function index(){}

	function auth($method){
		switch ($method) {
			case 'login':
				$psm = $_GET['psm'];
				$check_psm = $this->db->query("select * from tenant_registered where lower(psm_number) = '$psm'");
				if($check_psm->num_rows() > 0) {
					$this->db->query("update tenant_registered set login = 'login' where lower(psm_number) = '".strtolower($psm)."'");
					echo json_encode(array('status' => 'success', 'data' => $check_psm->row()));
				} else {
					echo json_encode(array('status' => 'failed'));
				}
				break;
			case 'logout':
				$psm = $_GET['psm'];
				$this->db->query("update tenant_registered set login = 'logout' where lower(psm_number) = '".strtolower($psm)."'");
				echo json_encode(array('status'=>'logout'));
			break;
			case 'get':
				$psm = $_GET['psm'];
				$check_psm = $this->db->query("select * from tenant_registered where lower(psm_number) = '$psm'");
				echo json_encode($check_psm->row());
			break;
			default:
				# code...
				break;
		}
	}

	function apartment($method = null){
		switch ($method) {
			case 'list':
				$id = (isset($_GET['id'])) ? $_GET['id'] : 0;
				$first_apartment = $this->db->query("select * from apartment order by id asc limit 1");

				if($id > 0) {
					$main = $this->db->query("select * from apartment where id = '".$id." limit 1'");
				} else {
					$main = $this->db->query("select * from apartment where id = '".$first_apartment->row('id')." limit 1'");
				}
				$gallery = $this->db->query("select * from apartment_category_items where apartment_id = '".$main->row('id')."' and category_id = '2'");
				$list = $this->db->query("select * from apartment where id != '".$main->row('id')."'");

				echo json_encode(array('main' => $main->row(), 'gallery' => $gallery->result(), 'list' => $list->result()));
				break;
			case 'details':
				$id = $_GET['id'];
				$query = $this->db->query("select * from apartment where id = '$id'");
				$category = $this->db->query("select * from apartment_category");
				$gallery = $this->db->query("select * from apartment_category_items where apartment_id = '$id' and category_id = '2' limit 3");

				echo json_encode(array('data' => $query->row(), 'category' => $category->result(), 'gallery' => $gallery->result()));

				break;
			case 'category':
				$id = $_GET['id'];
				$category_id = $_GET['category_id'];
				$level = $_GET['level'];

				$query = $this->db->query("select * from apartment where id = '$id'");
				$category = $this->db->query("select * from apartment_category where id='$category_id'");

				$item = $this->db->query("select * from apartment_category_items where apartment_id = '$id' and category_id = '$category_id' and level='$level'");
				switch ($category_id) {
					case 1:
						if($level == 0){
							foreach($item->result() as $row) {
								$items[]	= array(
												'name'	=> $row->name,
												'id'	=> $row->id,
												'menu_type'	=> $row->menu_type,
												'sub'	=> $this->db->query("select * from apartment_category_items where apartment_id = '$id' and category_id = '$category_id' and level='$row->id'")->result()
											);
							}			
						} else {
							if($item->num_rows() > 0) {
								$items = $item->result();	
							} else {
								$item = $this->db->query("select * from apartment_category_items where apartment_id = '$id' and category_id = '$category_id' and id = '$level'");
								$items = $item->row();
							}
						}
						break;
					case 2:
						$items = $item->result();
						break;
					case 3:
						if($level == 0){
							foreach($item->result() as $row) {
								$items[]	= array(
												'name'	=> $row->name,
												'id'	=> $row->id,
												'menu_type'	=> $row->menu_type,
												'sub'	=> $this->db->query("select * from apartment_category_items where apartment_id = '$id' and category_id = '$category_id' and level='$row->id'")->result()
											);
							}			
						} else {
							$items = $item->result();	
						}
						break;
					default:
						$items = $item->result();
						break;
				}

				echo json_encode(array('data' => $query->row(), 'category' => $category->row(), 'items' => $items, 'level' => $level));
				break;

			default:
				# code...
				break;
		}
	}

	function class_communities($method){
		switch ($method) {
			case 'list':
				$query = $this->db->query("select * from class");
				echo json_encode(array('list' => $query->result()));
				break;
			case 'details':
				$id = $_GET['id'];
				$query = $this->db->query("select * from class where id = '$id'");
				echo json_encode($query->row());
				break;
			
			default:
				# code...
				break;
		}
	}

	function events($method){
		switch ($method) {
			case 'list':
				$query = $this->db->query("select * from events");
				echo json_encode(array('list' => $query->result()));
				break;
			case 'details':
				$id = $_GET['id'];
				$query = $this->db->query("select * from events where id = '$id'");
				echo json_encode($query->row());
				break;
			
			default:
				# code...
				break;
		}
	}

}

?>