<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
         parent::__construct();
         $this->load->model('config_model');
         $this->load->model('user_model');
		 $this->load->model('categories_model');
    }

	public function index()
	{
//		$this->user->ceklogin();
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Administrator Panel',
						'config'	=> $config,
						'isi'	=>	'admin/login/login');
		$this->load->view('admin/layout/login',$data);
	}

	public function logout()
	{

			$datalogin = array(
				'id'		=>  $this->session->userdata('userid'),
				'online'		=>  '0'
			);
			$this->user_model->edit($datalogin);

		$user_data = $this->session->userdata();
		foreach ($user_data as $key => $value) {
			if ($key!='__ci_last_regenerate' && $key != '__ci_vars') $this->session->unset_userdata($key);
		}		
		//$this->session->sess_destroy();
		$this->session->set_flashdata('login_error','You have been logout');
		redirect(base_url('admin/login'), 'refresh');
	}

	public function loginaction()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
//		echo $username.$password;
//exit();

		$where = array(
					'username' => $username,
					'password' => md5($password)
				);
//		$cek = $this->user_model->cek_login("users",$where)->num_rows();
		$cek = $this->user_model->cek_login("users",$where);
//		echo $cek->username;
//		echo $this->db->last_query(); die;
//exit();
//		if($cek > 0){ 
		if($cek){ 
//		$user = $this->user_model->detail("users",$where)->num_rows();
		$data_session = array(
			'userid' => $cek->id,
			'username' => $username,
			'fullname' => $cek->fullname,
			'email' => $cek->email,
			'usertype' => $cek->usertype,
			'status' => "login"
			);

			$datalogin = array(
				'id'		=>  $cek->id,
				'online'		=>  '1'
			);
			$this->user_model->edit($datalogin);

			$this->session->set_userdata($data_session);
 			redirect(base_url('admin/dashboard'));
		}else{
//			echo "Username dan password salah !";
//			$data = array(	'title'	=>	'Login Error',
//							'isi'	=>	'user/login');
//			$this->load->view('home/layout/wrapper',$data);
			$this->session->set_flashdata('login_error','Wrong username and password');
			redirect(base_url('admin/login'));
		}

	}
	public function ceklogin()
	{
		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata('login_error','You must login to use this feature');
			redirect(base_url('admin/login'));
		}
	}


	public function register()
	{
	}
}
