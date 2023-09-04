<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Province extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('tabel_model');
         $this->load->model('config_model');
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
		$province = $this->tabel_model->listing('province');
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data Negara',
						'config'	=> $config,
						'province' => $province,
						'isi'	=>	'admin/province/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add()
	{
		$config = $this->config_model->detail(1);
		$valid = $this->form_validation;
		$valid->set_rules ('province_name','Nama Negara','required');
		$valid->set_rules ('iso','ISO','required');
//		$valid->set_rules ('tahunan','Tahunan','required');
//		$valid->set_rules ('bulanan','Bulanan','required');
//		$valid->set_rules ('mingguan','Mingguan','required');
//		$valid->set_rules ('harian','Harian','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Tambah Data Province',
							'config'	=> $config,
							'isi'	=>	'admin/province/add');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
			$data = array(	'province_name'	=> $this->input->post('province_name'),
							'iso'	=> $this->input->post('iso'),
							'iso3'	=> $this->input->post('iso3')
						);

			$this->tabel_model->add('province',$data);
			$this->session->set_flashdata('sukses','Data has been add');
			redirect(base_url('admin/province'));
		}

	}

	public function edit($id_province)
	{
		$province = $this->tabel_model->detail('province',$id_province);
		$config = $this->config_model->detail(1);

		$valid = $this->form_validation;
		$valid->set_rules ('province_name','Nama Negara','required');
		$valid->set_rules ('iso','ISO','required');
//		$valid->set_rules ('kapasitas','Kpasitas','required');
//		$valid->set_rules ('pemilik','nama Pemilik','required');
//		$valid->set_rules ('description','Description','required');
//		$valid->set_rules ('price','Price','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Edit Data Province',
							'config'	=> $config,
							'province'	=> $province,
							'isi'	=>	'admin/province/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;

			$data = array(	'province_id'		=> $id_province,
							'province_name'	=> $this->input->post('province_name'),
							'iso'	=> $this->input->post('iso'),
							'iso3'	=> $this->input->post('iso3')
						);

			$this->tabel_model->edit('province',$data);
			$this->session->set_flashdata('sukses','Data has been edit');
			redirect(base_url('admin/province'));
		}

	}

	public function delete($id_province)
	{
		$data = array('province_id' => $id_province);
		$this->tabel_model->delete('province',$data);
		$this->session->set_flashdata('sukses','Data has been delete');
		redirect(base_url('admin/province'));
	}

}