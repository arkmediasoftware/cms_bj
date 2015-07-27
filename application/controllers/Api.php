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

	function apartment($method = null){
		switch ($method) {
			case 'list':
				$query = $this->db->query("select * from apartment");
				echo json_encode(array('list' => $query->result()));
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