<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_auth');

    }

    public function index()
    {
        //form validation for field
        $this->form_validation->set_rules('admin_email','email', 'trim|required|valid_email');
        $this->form_validation->set_rules('admin_password', 'password','trim|required');

        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Login Page';
            $this->load->view('auth/v_partials/v_auth_header',$data);
            $this->load->view('auth/v_login');
            $this->load->view('auth/v_partials/v_auth_footer');
        } else {

            $this->_adminLogin();
        }
    }

    private function _adminLogin()
    {
        //admin var
        $admin_email = $this->input->post('admin_email');
        $admin_password = $this->input->post('admin_password');

        $admin = $this->db->get_where('tbl_admin',['admin_email' =>$admin_email])->row_array();

        if($admin){

            if($admin['admin_status'] == 1) {

                if(password_verify($admin_password, $admin['admin_password'])){
                    $data = [
                        'admin_email' => $admin['admin_email'],
                        'admin_level' => $admin['admin_level']
                    ];
                    $this->session->set_userdata($data);
                        if($admin['admin_level'] == 1){
                            redirect('Administrator');
                            } else {
                                echo $this->print_debugger();
                                die;
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

    public function adminRegistrasi()
    {
        //full name
        $this->form_validation->set_rules('admin_nama', 'Fullname', 'required|trim');

        //email
        $this->form_validation->set_rules('admin_email', 'Email', 'required|trim|valid_email|is_unique[tbl_admin.admin_email]', [
                                           'is_unique' => 'Email ini sudah digunakan!'
                                            ]);
        //matching password ,p1
        $this->form_validation->set_rules('admin_password1', 'Password', 'required|trim|min_length[3]|matches[admin_password2]',[
                                            'matches' => 'password tidak cocok!',
                                            'min_length' => 'password terlalu pendek!'
                                            ]);
        //p2
        $this->form_validation->set_rules('admin_password2', 'Password', 'required|trim|matches[admin_password1]');



          if($this->form_validation->run() == false)

          {
              $data['title'] = 'LSepatu Registration';
              $this->load->view('auth/templates/v_auth_header',$data) ;
              $this->load->view('auth/v_registrasi');
              $this->load->view('auth/templates/v_auth_footer');
          } else {

              $this->M_auth->adminRegistrasi();

              $admin_email = $this->input->post('admin_email','true');
              $token = base64_encode(random_bytes(32));
              $tbl_token = [

                  'tk_email' => $admin_email,
                  'tk_token' => $token,
                  'tk_time' => time()

              ];
              $this->db->insert('tbl_token',$tbl_token);

              $this->_sendEmail($token,'verify');

              $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
              akun berhasil dibuat, mohon aktivasi terlebih dahulu</div>');
              redirect('auth');
          }

    }

    private function _sendEmail($token,$type)
    {
      $config = [
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_user' => 'vacationdumper100@gmail.com',
        'smtp_pass' => 's1nce1998',
        'smtp_port' => 465,
        'mailtype' => 'html',
        'charset'  => 'utf-8',
        'newline' =>  "\r\n"
      ];

      $this->load->library('email',$config);
      $this->email->initialize($config);

      $this->email->from('vacationdumper100@gmail.com','Laundry Sepatu');
      $this->email->to($this->input->post('admin_email'));

      if($type == 'verify') {
        $this->email->subject('Verifikasi Akun');
        $this->email->message('Click link berikut untuk aktivasi akun anda: <a href="' . base_url() . 'auth/verify?admin_email=' . $this->input->post('admin_email')
        . '&tk_token=' . urlencode($token) . '">Aktivasi Account</a>');
          } else {
            $this->email->subject('Reset Password');
            $this->email->message('Click link berikut untuk reset password anda: <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('admin_email')
            . '&token=' . urlencode($token) . '">Reset Password</a> ');
        }

      //debugging Email
      if($this->email->send()){
        return true;
        } else {
          echo $this->email->print_debugger();
           die;
      }

    }

    public function verify()
    {
      //get from link activation
      $admin_email = $this->input->get('admin_email');
      $token = $this->input->get('tk_token');

      $admin = $this->db->get_where('tbl_admin',['admin_email' => $admin_email])->row_array();

      if($admin){
            $tbl_token = $this->db->get_where('tbl_token', ['tk_token' => $token])->row_array();

            if($tbl_token) {

                if(time() - $tbl_token['tk_time'] < ('60*60*24')) {
                    $this->db->set('admin_status',1);
                    $this->db->where('admin_email',$admin_email);
                    $this->db->update('tbl_admin');

                    $this->db->delete('tbl_token',['tk_email' =>$token]);
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'. $admin_username . '
                    telah di aktivasi. silahkan login</div>');
                    redirect('auth');

                    } else {
                      //token expired
                        $this->db->delete('tbl_admin',['admin_email' => $admin_email]);
                        $this->db->delete('tbl_token',['tk_email' => $token]);

                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal!, token kadaluarsa</div>');
                      }

                } else {
                //token
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Aktivasi akun gagal! token salah. </div>');
                redirect('auth');
               }

          } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun anda gagal! akun salah</div>');
            redirect('auth');
        }

    }



    public function adminLogout()
    {
      $this->session->unset_userdata('admin_email');
      $this->session->unset_userdata('admin_level');

      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">logout berhasil</div>');
      redirect('auth');
    }

    public function forgotPassword()
    {
      $this->form_validation->set_rules('admin_email','Email', 'trim|required|valid_email');

      if ($this->form_validation->run() == false ) {
          $data['title'] = 'Forgot Password';
          // $this->load->view('v_partials/v_auth_header');
          $this->load->view('admin/auth/');
      }
    }








}
