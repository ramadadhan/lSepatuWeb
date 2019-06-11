<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

    public function registCustomer()
    {

      $q = $this->db->query("SELECT MAX(RIGHT(users_id,4)) AS kd_max FROM tbl_users");
          $kd = "";
          $cs = "TS";
          if($q->num_rows()>0){
              foreach($q->result() as $k)
              {
                  $tmp = ((int)$k->kd_max)+1;
                  $kd = sprintf("%04s", $tmp);
              }

          } else {
              $kd = "0001";
          }

          $kode_user = $cs.$kd;

      $data = [
              'users_id' => $kode_user,
              'users_nama' => htmlspecialchars($this->input->post('users_nama',true)),
              'users_email' => htmlspecialchars($this->input->post('users_email',true)),
              'users_password' => password_hash($this->input->post('users_password1'), PASSWORD_DEFAULT),
              'users_level_id' => 3,
              'users_status' => 0
      ];

      $this->db->insert('tbl_users',$data);

    }


}
