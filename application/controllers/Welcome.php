<?php
class Welcome extends CI_Controller{
	function __construct(){
		parent::__construct();
		
	}
	
	function index(){
		$this->load->view('admin/v_index');
	}
}