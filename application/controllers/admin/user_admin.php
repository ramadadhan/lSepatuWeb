<?php 
 
class user_Admin extends CI_Controller{
 
	function __construct(){
    parent::__construct();
    	
		$this->load->model('m_admin');
        $this->load->helper('url');
	}
 
	function index(){
		$data['tbl_admin'] = $this->m_admin->tampil_data()->result();
		$this->load->view('admin/v_admin/v_tampil',$data);
    }
    
    function tambah(){
		$this->load->view('admin/v_admin/v_input');
    }
    
    function tambah_aksi(){
		$nama = $this->input->post('admin_nama');
		$username = $this->input->post('admin_username');
        $password =$this->input->post('admin_password');
        $level = $this->input->post('admin_level');
        $status = $this->input->post('admin_status');
 
		$data = array(
			'admin_nama' => $nama,
			'admin_username' => $username,
            'admin_password' => $password,
            'admin_level' => $level,
            'admin_status' => $status
			);
		$this->m_admin->input_data($data,'tbl_admin');
		redirect('admin/user_admin/index');
    }
    
    function hapus($admin_id){
		$where = array('admin_id' => $admin_id);
		$this->m_admin->hapus_data($where,'tbl_admin');
		redirect('admin/user_admin/index');
    }
    
    function edit($admin_id){
		$where = array('admin_id' => $admin_id);
		$data['tbl_admin'] = $this->m_admin->edit_data($where,'tbl_admin')->result();
		$this->load->view('admin/v_admin/v_edit',$data);
    }
    
    function update(){
        $admin_id = $this->input->post('admin_id');
        $tanggal = $this->input->post('admin_tanggal');
        $nama = $this->input->post('admin_nama');
		    $username = $this->input->post('admin_username');
        $password = $this->input->post('admin_password');
        $level = $this->input->post('admin_level');
        $status = $this->input->post('admin_status');
    
        $data = array(
            'admin_nama' => $nama,
			      'admin_username' => $username,
            'admin_password' => $password,
            'admin_level' => $level,
            'admin_status' => $status
        );
    
        $where = array(
            'admin_id' => $admin_id
        );
    
        $this->m_admin->update_data($where,$data,'tbl_admin');
        redirect('admin/user_admin/index');
    }
    function logout(){
      $this->session->sess_destroy();
      redirect(base_url('index.php/login'));
    }
}