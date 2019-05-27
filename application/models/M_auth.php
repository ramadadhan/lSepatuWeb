<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function usersRegistrasi()
    {
      // $users_email = $this->input->post('users_email','true');
      $data = [
              'users_nama' => htmlspecialchars($this->input->post('users_nama',true)),
              'users_password' => password_hash($this->input->post('users_password1'), PASSWORD_DEFAULT),
              'users_email' => htmlspecialchars($this->input->post('users_email',true)),
              'users_level' => 2,
              'users_status' => 0
      ];

      $this->db->insert('tbl_users',$data);
    }

    public function insertToken()
    {
        $this->db->insert('tbl_token',$tbl_token);
    }

    public function usersLogin()
    {
        $this->db->get_where('tbl_users',['users_email' =>$users_email])->row_array();
    }

    public function getToken()
    {
        $users_email = $this->input->post('users_email','true');
        $token = base64_encode(random_bytes(32));
        $tbl_token =
        [
            'tk_email' => $users_email,
            'tk_token' => $token,
            'tk_time' => time()

        ];
        return $this->db->insert('tbl_token',$tbl_token);
    }

}
