<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

  public function index()
  {
      $data['title'] = 'Menu';
      $data['users'] = $this->db->get_where('tb_users',[])
  }

}
