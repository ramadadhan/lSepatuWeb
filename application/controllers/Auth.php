<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        
    }
    
    public function index()
    {
   
        //form validation for field
        $this->form_validation->set_rules('admin_username','username', 'trim|required');
        $this->form_validation->set_rules('admin_password', 'password','trim|required');
        
        if($this->form_validation->run() == false)
        {        
            $data['title'] = 'Login Page';
            $this->load->view('auth/templates/v_auth_header',$data);
            $this->load->view('auth/v_login');
            $this->load->view('auth/templates/v_auth_footer');
        } else {
            
            $this->_adminLogin();            
        }                        
    }
    
    private function _adminLogin()
    {   
        //admin var
        $username = $this->input->post('admin_username');
        $password = $this->input->post('admin_password');
                        
        $admin = $this->M_auth->adminLogin;
        
        if($admin){
            
            if($admin['admin_status'] == 1) {
            
                if(password_verify($password, $admin['admin_password'])){
                    $data = [   
                        'admin_username' => $admin['admin_username'],
                        'admin_level' => $admin['admin_level']
                    ];
                    $this->session->set_userdata($data);
                        if($admin['admin_level'] == 1){
                            redirect('admin');
                            } else {
                                redirect('pegawai');
                        }
                    
                    } else {
                        //wrong password
                        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password salah!</div>');
                        redirect('auth');       
                    }
                
                } else {
                    //if not activated
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">username belum diaktivasi!</div>');
                        redirect('auth');     
                }

            } else {
                //not registered
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">username tidak terdaftar!</div>');
                redirect('auth');    

            }
        
    }
    
    public function adminregistrasi()
    {
         
        $this->form_validation->set_rules('admin_nama', 'Nama', 'required|trim');
        
        $this->form_validation->set_rules('admin_usernama', 'Nama User', 'required|trim'); 
        
        $this->form_validation->set_rules('admin_email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
                                           'is_unique' => 'Email ini sudah digunakan!'
                                            ]);
        $this->form_validation->set_rules('admin_password1', 'Password', 'required|trim|min_length[3]|matches[admin_password2]',[
                                            'matches' => 'password tidak cocok!',
                                            'min_length' => 'password terlalu pendek!'                                            
                                            ]);
        $this->form_validation->set_rules('admin_password2', 'Password', 'required|trim|matches[admin_password1]');
        
        if($this->form_validation->run() == false)
        
        {             
            $data['title'] = 'LSepatu Registration';
            $this->load->view('auth/templates/v_auth_header',$data) ;
            $this->load->view('auth/v_registrasi');
            $this->load->view('auth/templates/v_auth_footer');            
        } else {            
            $email = $this->input->post('admin_email','true');
            //if according to requirement this will input data to database
            $data = [
                    'admin_tanggal' => time(),
                    'admin_nama' => htmlspecialchars($this->input->post('admin_nama',true)),
                    'admin_username' => htmlspecialchars($this->input->post('admin_username',true)),                
                    'admin_password' => password_hash($this->input->post('admin_password1'), PASSWORD_DEFAULT),
                    'admin_email' => htmlspecialchars($email),
                    'admin_level' => 2,
                    'admin_status' => 0            
            ];
            
            $token = base64_encode(random_bytes(32));
            $admin_token = [
                
                'admin_username' => $email,
                'admin_token' => $token
                
                //date created limit or time for expired email verification 
            ];
            
            $this->M_auth->adminRegistrasi();
            $this->M_auth->adminVerifikasi();

            $this->_sendEmail();

            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
            akun berhasil dibuat, mohon aktivasi terlebih dahulu</div>');
            redirect('auth');
        }
        
    }
    
    
    

    
    
    
}
