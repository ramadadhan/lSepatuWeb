<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller{

			function __construct()
			{
					parent::__construct();
				 	is_logged_in();
					$this->load->library('form_validation');
					$this->load->model('M_pegawai');
			}
			
		//view
		public function index()
    {
        $data['title'] = 'Home';
        $data['users'] = $this->db->get_where('tbl_users',['users_email' => $this->session->userdata('users_email')])->row_array();



        $this->load->view('admin/v_partials/v_index_header',$data);
				$this->load->view("admin/v_partials/v_navbar2");
        $this->load->view('v_index');
        $this->load->view('admin/v_partials/v_index_footer');

			 }

		// input
		public function registCustomer()
		{

				//full name
				$this->form_validation->set_rules('users_nama','Nama Lengkap','required|trim');

				//Email
				$this->form_validation->set_rules('users_email','Email','required|trim|valid_email|is_unique[tbl_users.users_email]',
																					['is_unique' => 'Email ini sudah digunakan!']);
				//password1
				$this->form_validation->set_rules('users_password1','Password','required|trim|matches[users_password2]',
																					['matches' =>'Password tidak cocok!', 'min_length' => 'password terlalu pendek!']);
				//password2
				$this->form_validation->set_rules('users_password2','Password','required|trim|matches[users_password1]');

				if($this->form_validation->run() == false)
				{

					$data['title'] = 'Registrasi Customer';
					$this->load->view("admin/v_partials/v_navbar2");
					$this->load->view("pegawai/v_regist_cust");

				} else {
						$this->M_pegawai->registCustomer();

						$users_email = $this->input->post('users_email','true');
						$token = base64_encode(random_bytes(32));
						$tbl_token = [
								'tk_email' => $users_email,
								'tk_token' => $token,
								'tk_time' => time()
						];
						$this->db->insert('tbl_token',$tbl_token);

						$this->_sendEmail($token,'verify');

						$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
						akun berhasil dibuat, aktivasi terlebih dahulu</div>');
						redirect('pegawai/registCustomer');

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
			$this->email->to($this->input->post('users_email'));

			if($type == 'verify') {
				$this->email->subject('Verifikasi Akun');
				$this->email->message('Click link berikut untuk aktivasi akun anda: <a href="' . base_url() . 'auth/verify?users_email=' . $this->input->post('users_email')
				. '&tk_token=' . urlencode($token) . '">Aktivasi Account</a>');

					} else {
						$this->email->subject('Reset Password');
						$this->email->message('Click link berikut untuk reset password anda: <a href="' . base_url() . 'auth/resetpassword?users_email=' . $this->input->post('users_email')
						. '&tk_token=' . urlencode($token) . '">Reset Password</a> ');
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
			$users_email = $this->input->get('users_email');
			$token = $this->input->get('tk_token');

			$users = $this->db->get_where('tbl_users',['users_email' => $users_email])->row_array();

			if($users){
						$tbl_token = $this->db->get_where('tbl_token', ['tk_token' => $token])->row_array();

						if($tbl_token) {
								if(time() - $tbl_token['tk_time'] < ('60*60*24')) {

										$this->db->set('users_status',1);
										$this->db->where('users_email',$users_email);
										$this->db->update('tbl_users');

										$this->db->delete('tbl_token',['tk_email' =>$token]);
										$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'. $users_email . '
										telah di aktivasi. silahkan login</div>');
										redirect('auth');

										} else {
											//token expired
												$this->db->delete('tbl_users',['users_email' => $users_email]);
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



	}
