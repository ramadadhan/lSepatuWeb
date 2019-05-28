<?php
class Pegawai extends CI_Controller{
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



        $this->load->view('admin/v_partials/v_index_header',$data);
				$this->load->view("admin/v_partials/v_navbar2");
        $this->load->view('v_index');
        $this->load->view('admin/v_partials/v_index_footer');
			 }

		public function registUser()
		{
				$data['title'] = 'Registrasi User';
				$data['']
		}

	}
