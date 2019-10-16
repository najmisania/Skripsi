<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');

		if($this->form_validation->run() == false){

			$this->load->view('login/index');
		}
		else{
			$this->_login();
		}
	}


	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email'=> $email])-> row_array();
		

		//jika usernya ada
		if($user){
			//jika usernya aktif
			if($user['is_active'] == 1){
				//cek password
				if(password_verify($password, $user['password'])){
					$data = [ 'email'=> $user['email']];
					$this->session->set_userdata($data);

					// print_r($_SESSION['email']);

					redirect('home/index');
				}
				else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong password! </div>');
					redirect('login/index');
				}
			}
			else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">This email has not been activated! </div>');
				redirect('login/index');
			}
		}
		else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert"> mail is not registered! </div>');
			redirect('login/index');
		}
	}

	public function register()
	{

		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]', ['is_unique'=> 'This email has already registered!']);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',['matches' => 'password dont machet!',
			'min_length' => 'password too short!'
		]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

		if ($this->form_validation->run() == false){
			$this->load->view('login/register');
		}
		else{
			$data = [
				'username' => htmlspecialchars($this->input->post('username',true)),
				'email' => htmlspecialchars($this->input->post('email',true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time()
			];

			//siapkan token
			$token = bin2hex(openssl_random_pseudo_bytes(32));
			$user_token = [
				'email' => $this->input->post('email',true),
				'token' => $token,
				'date_created'=> time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
				Congratulation! your account has been create. Please activated your account</div>');
			redirect('login/index');
		}
		
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' 	=> 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'wbbogor@gmail.com',
			'smtp_pass'	=> 'najmisania28',
			'smtp_port' => '465',
			'mailtype' 	=> 'html',
			'charset' 	=> 'utf-8',
			'newline' 	=> "\r\n"
		];
		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('wbbogor@gmail.com','TravelBeMine');
		$this->email->to($this->input->post('email'));
		$subject = "";
		$message = "";
		$from = "travelbemine@ffst.my.id";
		if($type == 'verify'){
			$subject = 'Account Verification';
			$message = 'Klik link ini untuk verifikasi akun anda : ' . base_url() . '/login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token);
		} elseif ($type == 'forgot') {
			$subject = 'Reset Password';
			$message = 'Klik link ini untuk ubah password : ' . base_url() . '/login/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token);
		}
		
		$headers = "From:" . $from;
    
        mail($this->input->post('email'),$subject,$message, $headers);

// 		if($this->email->send()){
// 			return true;
// 		}
// 		else{
// 			echo $this->email->print_debugger();
// 			die;
// 		}
	}
	
	public function verify()
	{

		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();
		
		if($user){
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token){
				if(time() - $user_token['date_created'] < (60*60*24)){
					$this->db->set('is_active',1);
					$this->db->where('email',$email);
					$this->db->update('user');

					$this->db->delete('user_token',['email'=>$email]);

					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'. $email .' has been activated! Please login.</div>');
					redirect('login/index');
				}
				else{
					$this->db->delete('user',['email'=>$email]);
					$this->db->delete('user_token',['email'=>$email]);

					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
					redirect('login/index');
				}
			}
			else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
				redirect('login/index');
			}
		}
		else{
			$this->session->unset_userdata('email');

			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
			redirect('login/index');
		}

	}

	public function forgotpassword()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		if($this->form_validation->run() == false){
			$this->load->view('login/forgot');
		}
		else{
			$email = $this->input->post('email');
			$user  = $this->db->get_where('user',['email' => $email, 'is_active'=>1])->row_array();

			if($user){
				$token = bin2hex(openssl_random_pseudo_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created'=> time()
				];
				$this->db->insert('user_token',$user_token);
				$this->_sendEmail($token,'forgot');

				$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Plaease check your email to reset your password! </div>');
				redirect('login/forgotpassword');
			}
			else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered or activated! </div>');
				redirect('login/forgotpassword');
			}
		}
		
	}

	public function resetpassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('user',['email'=>$email])->row_array();

		if($user){
			$user_token = $this->db->get_where('user_token',['token' => $token])->row_array();

			if($user_token){
				$this->session->set_userdata('reset_email',$email);
				$this->changepassword();
			}
			else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Reset password failed! Wrong token. </div>');
				redirect('login/index');
			}

		}
		else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Reset password failed! Wrong email. </div>');
			redirect('login/index');
		}
	}
	public function changepassword(){
		if(!$this->session->userdata('reset_email')){
			redirect('login/index');
		}

		$this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[password2]');
		$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|matches[password1]');
		if($this->form_validation->run() == false){
			$this->load->view('login/changepassword');
		}
		else{
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password has been changed! Please login. </div>');
			redirect('login/index');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->unset_userdata('email');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You have been logout! </div>');
		redirect('home/index');
	}

}