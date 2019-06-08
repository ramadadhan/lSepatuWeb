<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

    public function registCustomer()
    {
      //check database
      // $check = $this->db->query("SELECT users_id FROM tbl_users ORDER BY users_id DESC limit 1");
      // $result = $check->num_rows();
      // foreach($check->result() as $ck){
      //   $id = $ck->users_id;
      // }
      //
      // // $query = $this->db->get('tbl_users');
      // if($result <> 0){
      // //  $data = $query->row();
      //   $kode = intval($id) + 1;
      //   } else {
      //     $kode = 1;
      //   }


      //resultId
      //$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);

      $q = $this->db->query("SELECT MAX(RIGHT(users_id,4)) AS kd_max FROM tbl_users");
          $kd = "";
          $cs = "CS";
          if($q->num_rows()>0){
              foreach($q->result() as $k)
              {
                  $tmp = ((int)$k->kd_max)+1;
                  $kd = sprintf("%04s", $tmp);
              }

          } else {
              $kd = "0001";
          }

          return $kode_user = $cs.$kd;

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




    // public function idpegawai()
    // {

      // $this->db->select('RIGHT(tbl_users.users_id,3) as idpegawai', false);
      // $this->db->order_by('users_id','DESC');
      // $this->db->limit(1);

      //$query = $this->db->post('users_email',true);


      //$idtampil = "CS" . "$batas";
      //return $idtampil;

    //}

}
