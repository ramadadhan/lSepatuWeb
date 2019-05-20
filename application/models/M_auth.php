<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function adminRegistrasi()
    {
      $admin_email = $this->input->post('admin_email','true');
      $data = [
              'admin_nama' => htmlspecialchars($this->input->post('admin_nama',true)),
              'admin_password' => password_hash($this->input->post('admin_password1'), PASSWORD_DEFAULT),
              'admin_email' => htmlspecialchars($this->input->post('admin_email',true)),
              'admin_level' => 2,
              'admin_status' => 0
      ];

      $this->db->insert('tbl_admin',$data);
    }

    public function insertToken()
    {
        $this->db->insert('tbl_token',$tbl_token);
    }

    public function adminLogin()
    {
        $this->db->get_where('tbl_admin',['admin_email' =>$admin_email])->row_array();
    }
}
