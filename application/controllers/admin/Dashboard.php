<?php 

    class Dashboard extends CI_Controller{
        function __construct(){
        
        }



        function index () {

            $this->load->view('admin/v_dasboard');

        }

    }

 ?>