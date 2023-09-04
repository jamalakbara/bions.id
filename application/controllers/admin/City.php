<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {

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
		$city = $this->tabel_model->listing('city');
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data Negara',
						'config'	=> $config,
						'city' => $city,
						'isi'	=>	'admin/city/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add()
	{
		$config = $this->config_model->detail(1);
		$valid = $this->form_validation;
		$valid->set_rules ('city_name','Nama Negara','required');
		$valid->set_rules ('iso','ISO','required');
//		$valid->set_rules ('tahunan','Tahunan','required');
//		$valid->set_rules ('bulanan','Bulanan','required');
//		$valid->set_rules ('mingguan','Mingguan','required');
//		$valid->set_rules ('harian','Harian','required');
//		$valid->set_rules ('stock','Stock','required');

		$province = $this->tabel_model->listing('province');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Tambah Data City',
							'config'	=> $config,
							'province'	=> $province,
							'isi'	=>	'admin/city/add');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
			$data = array(	'city'	=> $this->input->post('city'),
							'provinceid'	=> $this->input->post('provinceid'),
							'province'	=> $this->input->post('province'),
							'cityid'	=> $this->input->post('cityid'),
							'type'	=> $this->input->post('type'),
							'postalcode'	=> $this->input->post('postalcode')
						);

			$this->tabel_model->add('city',$data);
			$this->session->set_flashdata('sukses','Data has been add');
			redirect(base_url('admin/city'));
		}

	}

	public function edit($id_city)
	{
		$city = $this->tabel_model->detail('city',$id_city);
		$config = $this->config_model->detail(1);

		$valid = $this->form_validation;
		$valid->set_rules ('city_name','Nama Negara','required');
		$valid->set_rules ('iso','ISO','required');
//		$valid->set_rules ('kapasitas','Kpasitas','required');
//		$valid->set_rules ('pemilik','nama Pemilik','required');
//		$valid->set_rules ('description','Description','required');
//		$valid->set_rules ('price','Price','required');
//		$valid->set_rules ('stock','Stock','required');

		$province = $this->tabel_model->listing('province');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Edit Data City',
							'config'	=> $config,
							'province'	=> $province,
							'city'	=> $city,
							'isi'	=>	'admin/city/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;

			$data = array(	'id'		=> $id_city,
							'city'	=> $this->input->post('city'),
							'provinceid'	=> $this->input->post('provinceid'),
							'province'	=> $this->input->post('province'),
							'cityid'	=> $this->input->post('cityid'),
							'type'	=> $this->input->post('type'),
							'postalcode'	=> $this->input->post('postalcode')
						);

			$this->tabel_model->edit('city',$data);
			$this->session->set_flashdata('sukses','Data has been edit');
			redirect(base_url('admin/city'));
		}

	}

	public function delete($id_city)
	{
		$data = array('id' => $id_city);
		$this->tabel_model->delete('city',$data);
		$this->session->set_flashdata('sukses','Data has been delete');
		redirect(base_url('admin/city'));
	}

}