<?php 
 
class user_Member extends CI_Controller{
 
	function __construct(){
    parent::__construct();
    	
		$this->load->model('m_member');
        $this->load->helper('url');
	}
 
	function index(){
		$data['tbl_user'] = $this->m_member->tampil_data()->result();
		$this->load->view('admin/v_member/v_tampil',$data);
    }
    
    function tambah(){
		$this->load->view('admin/v_member/v_input');
    }
    
    function tambah_aksi(){
    $nama = $this->input->post('user_nama');
    $alamat = $this->input->post('user_alamat');
    $no_telp = $this->input->post('user_no_telp');
		$username = $this->input->post('user_username');
    $password =$this->input->post('user_password');

 
		$data = array(
			'user_nama' => $nama,
			'user_alamat' => $alamat,
      'user_no_telp' => $no_telp,
      'user_username' => $username,
      'user_password' => $password
			);
		$this->m_member->input_data($data,'tbl_user');
		redirect('admin/user_member/index');
    }
    
    function hapus($user_id){
		$where = array('user_id' => $user_id);
		$this->m_member->hapus_data($where,'tbl_user');
		redirect('admin/user_member/index');
    }
    
    function edit($user_id){
		$where = array('user_id' => $user_id);
		$data['tbl_user'] = $this->m_member->edit_data($where,'tbl_user')->result();
		$this->load->view('admin/v_member/v_edit',$data);
    }
    
    function update(){
        $user_id = $this->input->post('user_id');
        $tanggal = $this->input->post('user_tanggal');
        $nama = $this->input->post('user_nama');
        $alamat = $this->input->post('user_alamat');
        $no_telp = $this->input->post('user_no_telp');
		    $username = $this->input->post('user_username');
        $password = $this->input->post('user_password');
        
    
        $data = array(
          'user_nama' => $nama,
          'user_alamat' => $alamat,
          'user_no_telp' => $no_telp,
          'user_username' => $username,
          'user_password' => $password
        );
    
        $where = array(
            'user_id' => $user_id
        );
    
        $this->m_member->update_data($where,$data,'tbl_user');
        redirect('admin/user_member/index');
    }
    function logout(){
      $this->session->sess_destroy();
      redirect(base_url('index.php/login'));
    }
}