<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('config_model');
         $this->load->model('tabel_model');
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
		$pendidikan = $this->tabel_model->listing('pendidikan');
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data Pendidikan',
						'config'	=> $config,
						'pendidikan' => $pendidikan,
						'isi'	=>	'admin/pendidikan/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add()
	{
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
		$valid->set_rules ('pendidikan','Pendidikan','required');
		$valid->set_rules ('boascode','BOAS Code','required');
//		$valid->set_rules ('pemilik','nama Pemilik','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Tambah Data Pendidikan',
						'config'	=> $config,
							'isi'	=>	'admin/pendidikan/add');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
//			$data = array(	'id_user'	=> $this->session->userdata('id'),
//							'nama'	=> $i->post('nama'),
//							'alamat'	=> $i->post('alamat'),
//							'handphone'	=> $i->post('handphone'),
//							'tanggal_gabung'	=>	$i->post('tanggal_gabung')
//						);
			$data = array(	'pendidikan'	=> $this->input->post('pendidikan'),
							'boascode'	=> $this->input->post('boascode')
						);

			$this->pendidikan_model->add($data);
			$this->session->set_flashdata('sukses','Data has been add');
			redirect(base_url('admin/pendidikan'));
		}

	}

	public function edit($id_pendidikan)
	{
			$pendidikan = $this->tabel_model->detail('pendidikan',$id_pendidikan);
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
//			$valid->set_rules ('nama','Nama','required', 
//								array('required' => 'Nama Harus Diisi'
//								)
//					);
		$valid->set_rules ('pendidikan','Pendidikan','required');
		$valid->set_rules ('boascode','BOAS Code','required');
//		$valid->set_rules ('description','Description','required');
//		$valid->set_rules ('price','Price','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Edit Data Pendidikan',
						'config'	=> $config,
							'pendidikan'	=> $pendidikan,
							'isi'	=>	'admin/pendidikan/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
			$data = array(	'id'		=> $id_pendidikan,
							'pendidikan'	=> $this->input->post('pendidikan'),
							'boascode'	=> $this->input->post('boascode')
						);
//			$data = array(	'title'	=> $this->input->post('title'),
//							'description'	=> $this->input->post('description'),
//							'price'	=> $this->input->post('price'),
//							'stock'	=> $this->input->post('stock')
//						);
			$this->pendidikan_model->edit($data);
			$this->session->set_flashdata('sukses','Data has been edit');
			redirect(base_url('admin/pendidikan'));
		}

	}

	public function delete($id_pendidikan)
	{
		$data = array('id' => $id_pendidikan);
//		echo $data['id'];
		$this->pendidikan_model->delete($data);
		$this->session->set_flashdata('sukses','Data has been add delete');
		redirect(base_url('admin/pendidikan'));
	}

}
