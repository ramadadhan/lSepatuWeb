<?php
class Owner extends CI_Controller{
	function __construct()
	{
			parent::__construct();
		 	is_logged_in();
			$this->load->model('M_menu');
	}

	public function index()
    {
        $data['title'] = 'Home';
        $data['users'] = $this->db->get_where('tbl_users',['users_email' => $this->session->userdata('users_email')])->row_array();
				$data['menu'] = $this->db->get_where('tbl_users', ['users_email' => $this->session->userdata('users_email')])->row_array();
				$this->load->model('M_menu','AccessMenu');

        $this->load->view('v_partials/v_index_header',$data);
				$this->load->view("v_partials/v_sidebar");
        $this->load->view('v_index');
        $this->load->view('v_partials/v_index_footer');
			 }
	}
