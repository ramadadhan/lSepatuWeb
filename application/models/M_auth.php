<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Controller {
    
    public function adminRegistrasi()
    {
        $this->db->insert('user', $data);
    }
    
    public function adminVerifikasi()
    {
        $this->db->insert('admin_token', $admin_token);
    }
    
    public function adminLogin()
    {
        $this->db->get_where('tbl_admin',['user_username' =>$username])->row_array();
    }
}