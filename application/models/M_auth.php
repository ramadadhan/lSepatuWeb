<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function adminRegistrasi()
    {
      $admin_username = $this->input->post('admin_username','true');
      $data = [
              'admin_nama' => htmlspecialchars($this->input->post('admin_nama',true)),
              'admin_username' => htmlspecialchars($admin_username),
              'admin_password' => password_hash($this->input->post('admin_password1'), PASSWORD_DEFAULT),
              'admin_email' => htmlspecialchars($this->input->post('admin_email',true)),
              'admin_level' => 2,
              'admin_status' => 0
      ];

      $this->db->insert('tbl_admin',$data);
    }

    public function insertToken()
    {
      $admin_username = $this->input->post('admin_username','true');
      $token = base64_encode(random_bytes(32));
      $tbl_token = [

          'tk_username' => $admin_username,
          'tk_token' => $token,
          'tk_date' => time()
          //date created limit or time for expired email verification
      ];
        $this->db->insert('tbl_token',$tbl_token);
    }

    public function adminLogin()
    {
        $this->db->get_where('tbl_admin',['admin_username' =>$admin_username])->row_array();
    }
}
