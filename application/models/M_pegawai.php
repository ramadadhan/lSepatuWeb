<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

    public function registCustomer()
    {
      // $users_email = $this->input->post('users_email','true');
      $data = [
              'users_nama' => htmlspecialchars($this->input->post('users_nama',true)),
              'users_password' => password_hash($this->input->post('users_password1'), PASSWORD_DEFAULT),
              'users_email' => htmlspecialchars($this->input->post('users_email',true)),
              'users_level' => 3,
              'users_status' => 0
      ];

      $this->db->insert('tbl_users',$data);
    }

}
