<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('config_model');
         $this->load->model('user_model');
         $this->load->model('usertype_model');
         $this->load->model('city_model');
         $this->load->model('province_model');
//         $this->load->model('sized_model');
//         $this->load->model('colors_model');
//         $this->load->model('kurir_model');
		 $this->load->model('categories_model');
		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata('login_error','You must login to use this feature');
			redirect(base_url('admin/login'));
		} else if($this->session->userdata('usertype') == 0) {
			$this->session->set_flashdata('login_error','You are not allowed to use this feature');
			redirect(base_url('admin/login'));
		}
    }

	public function index()
	{
		$user = $this->user_model->listing();
//		$sized = $this->sized_model->listing();
//		$colors = $this->colors_model->listing();
//		$kurirs = $this->kurir_model->listing();
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data User',
						'config'	=> $config,
//							'colors'	=>	$colors,
//							'sized'	=>	$sized,
//							'kurirs'	=>	$kurirs,
						'user' => $user,
						'isi'	=>	'admin/user/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add()
	{
			$usertype = $this->usertype_model->listing();
			$propinsi = $this->province_model->listing(1);
//		$sized = $this->sized_model->listing();
//		$colors = $this->colors_model->listing();
//		$kurirs = $this->kurir_model->listing();
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
		$valid->set_rules ('username','Username','required');
		$valid->set_rules ('fullname','Fullname','required');
		$valid->set_rules ('password','Password','required');
//		$valid->set_rules ('email','Email','required');
//		$valid->set_rules ('description','Description','required');
//		$valid->set_rules ('price','Price','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Tambah Data User',
						'config'	=> $config,
							'usertype' => $usertype,
							'propinsi'	=> $propinsi,
//							'colors'	=>	$colors,
//							'sized'	=>	$sized,
//							'kurirs'	=>	$kurirs,
							'isi'	=>	'admin/user/add');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;

			$file_path = realpath(APPPATH.'../images/user');
                $configu['upload_path']          = $file_path;
                $configu['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $configu);

                if ( !$this->upload->do_upload('fileinput'))
                {
                    $error = '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>';
					$data = array(	'title'	=>	'Tambah Data User',
						'config'	=> $config,
							'usertype' => $usertype,
							'propinsi'	=> $propinsi,
							'error'	=>	$error,
//							'sized'	=>	$sized,
//							'kurirs'	=>	$kurirs,
							'isi'	=>	'admin/user/add');
					$this->load->view('admin/layout/wrapper',$data);
                }
                else
                {
                        $dataupload = $this->upload->data();

						$include = array('file_name','file_type','orig_name','client_name','file_ext');

						$datafile = array();
						foreach ($dataupload as $k => $v) {
							if(in_array($k,$include)) {
								$datafile[$k] = $v;
//								is_array($val) ? $datafile[$key]	= implode($k) : $datafile[$key]	= $k;
							}
						}

						$tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
						$tnow = date("Y-m-d", $tday);

						$data = array(	'username'	=> $this->input->post('username'),
										'password'	=> md5($this->input->post('password')),
										'usertype'	=> $this->input->post('usertype'),
										'email'	=> $this->input->post('email'),
										'fullname'	=> $this->input->post('fullname'),
										'profil'	=> $this->input->post('profil'),
										'jabatan'	=> $this->input->post('jabatan'),
										'handphone'	=> $this->input->post('handphone')
						);

						$datadb = array_merge($data, $datafile);
						$this->user_model->add($datadb);
//						$this->user_model->add($data);
						$this->session->set_flashdata('sukses','Data has been add');
						redirect(base_url('admin/user'));
				}

		}

	}
	
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);
		$usertype = $this->usertype_model->listing();
		$config = $this->config_model->detail(1);

		$valid = $this->form_validation;
		$valid->set_rules ('username','Username','required');
		$valid->set_rules ('fullname','Fullname','required');
		$valid->set_rules ('password','Password','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Edit Data User',
						'config'	=> $config,
							'user'	=> $user,
							'usertype' => $usertype,
							'isi'	=>	'admin/user/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;

			if($i->post('password') != $i->post('oldpassword')) { $password = md5($this->input->post('password')); } else { $password = $this->input->post('oldpassword'); }

			if(basename($_FILES['fileinput']['name']) == "") { 
				$datafile = array(	'file_name'	=> $user->file_name,
									'file_type'	=> $user->file_type,
									'orig_name'	=> $user->orig_name,
									'client_name' => $user->client_name,
									'file_ext'	=>	$user->file_ext);
			} else { 

				$file_path = realpath(APPPATH.'../images/user');
                $configu['upload_path']          = $file_path;
                $configu['allowed_types']        = 'gif|jpg|jpeg|png';

                $this->load->library('upload', $configu);

                if ( ! $this->upload->do_upload('fileinput'))
                {
                    $error = '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>';
					$data = array(	'title'	=>	'Tambah Data User',
						'config'	=> $config,
							'usertype' => $usertype,
							'propinsi'	=> $propinsi,
//							'colors'	=>	$colors,
//							'sized'	=>	$sized,
//							'kurirs'	=>	$kurirs,
							'isi'	=>	'admin/user/add');
					$this->load->view('admin/layout/wrapper',$data);
                }
                else
                {
                        $dataupload = $this->upload->data();

						$include = array('file_name','file_type','orig_name','client_name','file_ext');

						$datafile = array();
						foreach ($dataupload as $k => $v) {
							if(in_array($k,$include)) {
								$datafile[$k] = $v;
//								is_array($val) ? $datafile[$key]	= implode($k) : $datafile[$key]	= $k;
							}
						}
				}
			}

			if($this->session->userdata('usertype') == 62) {
				$usrtype = '62';
			} else {
				$usrtype = $this->input->post('usertype');
			}
				$data = array(	'id' => $id_user,
								'username'	=> $this->input->post('username'),
								'password'	=> $password,
								'usertype'	=> $usrtype,
								'email'	=> $this->input->post('email'),
								'fullname'	=> $this->input->post('fullname'),
								'profil'	=> $this->input->post('profil'),
								'jabatan'	=> $this->input->post('jabatan'),
								'handphone'	=> $this->input->post('handphone')
				);

				$datadb = array_merge($data, $datafile);
//				echo print_r($datadb);
//				echo print_r($data); exit();
				$this->user_model->edit($datadb);
				$this->session->set_flashdata('sukses','Data has been edit');
				redirect(base_url('admin/user'));

		}
	}

	public function edits($id_user)
	{
			$user = $this->user_model->detail($id_user);
			$usertype = $this->usertype_model->listing();
//		$sized = $this->sized_model->listing();
//		$colors = $this->colors_model->listing();
//		$kurirs = $this->kurir_model->listing();
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
//			$valid->set_rules ('nama','Nama','required', 
//								array('required' => 'Nama Harus Diisi'
//								)
//					);
		$valid->set_rules ('username','Username','required');
		$valid->set_rules ('fullname','Fullname','required');
		$valid->set_rules ('password','Password','required');
		$valid->set_rules ('email','Email','required');

//		$valid->set_rules ('description','Description','required');
//		$valid->set_rules ('price','Price','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Edit Data User',
						'config'	=> $config,
							'user'	=> $user,
							'usertype' => $usertype,
//							'colors'	=>	$colors,
//							'sized'	=>	$sized,
//							'kurirs'	=>	$kurirs,
							'isi'	=>	'admin/user/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;

			if($i->post('password') != $i->post('oldpassword')) { $password = md5($this->input->post('password')); } else { $password = $this->input->post('oldpassword'); }
			
			$data = array(	'id'		=> $id_user,
							'usertype'	=> $this->input->post('usertype'),
							'username'	=> $this->input->post('username'),
							'password'	=> md5($this->input->post('password')),
							'email'	=> $this->input->post('email'),
							'fullname'	=> $this->input->post('fullname'),
							'address'	=> $this->input->post('address'),
							'city'	=> $this->input->post('city'),
							'state'	=> $this->input->post('state'),
							'country'	=> $this->input->post('country'),
							'postalcode'	=> $this->input->post('postalcode'),
							'handphone'	=> $this->input->post('handphone')
						);
//			$data = array(	'title'	=> $this->input->post('title'),
//							'description'	=> $this->input->post('description'),
//							'price'	=> $this->input->post('price'),
//							'stock'	=> $this->input->post('stock')
//						);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses','Data has been edit');
			redirect(base_url('admin/user'));
		}

	}

	public function delete($id_user)
	{
		$data = array('id' => $id_user);
//		echo $data['id'];
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses','Data has been add delete');
		redirect(base_url('admin/user'));
	}

}
