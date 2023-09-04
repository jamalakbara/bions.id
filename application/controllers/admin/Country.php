<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends CI_Controller {

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
		$country = $this->tabel_model->listing('country');
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data Negara',
						'config'	=> $config,
						'country' => $country,
						'isi'	=>	'admin/country/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add()
	{
		$config = $this->config_model->detail(1);
		$valid = $this->form_validation;
		$valid->set_rules ('country_name','Nama Negara','required');
		$valid->set_rules ('iso','ISO','required');
//		$valid->set_rules ('tahunan','Tahunan','required');
//		$valid->set_rules ('bulanan','Bulanan','required');
//		$valid->set_rules ('mingguan','Mingguan','required');
//		$valid->set_rules ('harian','Harian','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Tambah Data Country',
							'config'	=> $config,
							'isi'	=>	'admin/country/add');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
			$data = array(	'country_name'	=> $this->input->post('country_name'),
							'iso'	=> $this->input->post('iso'),
							'iso3'	=> $this->input->post('iso3')
						);

			$this->tabel_model->add('country',$data);
			$this->session->set_flashdata('sukses','Data has been add');
			redirect(base_url('admin/country'));
		}

	}

	public function edit($id_country)
	{
		$country = $this->tabel_model->detail('country',$id_country);
		$config = $this->config_model->detail(1);

		$valid = $this->form_validation;
		$valid->set_rules ('country_name','Nama Negara','required');
		$valid->set_rules ('iso','ISO','required');
//		$valid->set_rules ('kapasitas','Kpasitas','required');
//		$valid->set_rules ('pemilik','nama Pemilik','required');
//		$valid->set_rules ('description','Description','required');
//		$valid->set_rules ('price','Price','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Edit Data Country',
							'config'	=> $config,
							'country'	=> $country,
							'isi'	=>	'admin/country/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;

			$data = array(	'country_id'		=> $id_country,
							'country_name'	=> $this->input->post('country_name'),
							'iso'	=> $this->input->post('iso'),
							'iso3'	=> $this->input->post('iso3')
						);

			$this->tabel_model->edit('country',$data);
			$this->session->set_flashdata('sukses','Data has been edit');
			redirect(base_url('admin/country'));
		}

	}

	public function delete($id_country)
	{
		$data = array('country_id' => $id_country);
		$this->tabel_model->delete('country',$data);
		$this->session->set_flashdata('sukses','Data has been delete');
		redirect(base_url('admin/country'));
	}

}