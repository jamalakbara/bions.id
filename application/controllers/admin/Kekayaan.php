<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kekayaan extends CI_Controller {

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
		$kekayaan = $this->tabel_model->listing('kekayaan');
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data Kekayaan',
						'config'	=> $config,
						'kekayaan' => $kekayaan,
						'isi'	=>	'admin/kekayaan/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add()
	{
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
		$valid->set_rules ('kekayaan','Kekayaan','required');
		$valid->set_rules ('boascode','BOAS Code','required');
//		$valid->set_rules ('pemilik','nama Pemilik','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Tambah Data Kekayaan',
						'config'	=> $config,
							'isi'	=>	'admin/kekayaan/add');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
//			$data = array(	'id_user'	=> $this->session->userdata('id'),
//							'nama'	=> $i->post('nama'),
//							'alamat'	=> $i->post('alamat'),
//							'handphone'	=> $i->post('handphone'),
//							'tanggal_gabung'	=>	$i->post('tanggal_gabung')
//						);
			$data = array(	'kekayaan'	=> $this->input->post('kekayaan'),
							'boascode'	=> $this->input->post('boascode')
						);

			$this->kekayaan_model->add($data);
			$this->session->set_flashdata('sukses','Data has been add');
			redirect(base_url('admin/kekayaan'));
		}

	}

	public function edit($id_kekayaan)
	{
			$kekayaan = $this->tabel_model->detail('kekayaan',$id_kekayaan);
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
//			$valid->set_rules ('nama','Nama','required', 
//								array('required' => 'Nama Harus Diisi'
//								)
//					);
		$valid->set_rules ('kekayaan','Kekayaan','required');
		$valid->set_rules ('boascode','BOAS Code','required');
//		$valid->set_rules ('description','Description','required');
//		$valid->set_rules ('price','Price','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Edit Data Kekayaan',
						'config'	=> $config,
							'kekayaan'	=> $kekayaan,
							'isi'	=>	'admin/kekayaan/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
			$data = array(	'id'		=> $id_kekayaan,
							'kekayaan'	=> $this->input->post('kekayaan'),
							'boascode'	=> $this->input->post('boascode')
						);
//			$data = array(	'title'	=> $this->input->post('title'),
//							'description'	=> $this->input->post('description'),
//							'price'	=> $this->input->post('price'),
//							'stock'	=> $this->input->post('stock')
//						);
			$this->kekayaan_model->edit($data);
			$this->session->set_flashdata('sukses','Data has been edit');
			redirect(base_url('admin/kekayaan'));
		}

	}

	public function delete($id_kekayaan)
	{
		$data = array('id' => $id_kekayaan);
//		echo $data['id'];
		$this->kekayaan_model->delete($data);
		$this->session->set_flashdata('sukses','Data has been add delete');
		redirect(base_url('admin/kekayaan'));
	}

}
