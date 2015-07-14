<?php
class Events extends MY_Controller {
	
	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->page('apartment');
	}
}
?>