<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
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
		$categories = $this->categories_model->listing();
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data Kategori',
						'config'	=> $config,
						'categories' => $categories,
						'isi'	=>	'admin/categories/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function learning()
	{
		$modules = 'learning';
		$categories = $this->categories_model->listingmod($modules);
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data Kategori Learning',
						'modules'	=> $modules,
						'config'	=> $config,
						'categories' => $categories,
						'isi'	=>	'admin/categories/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function faq()
	{
		$modules = 'faq';
		$categories = $this->categories_model->listingmod($modules);
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data Kategori FAQ',
						'modules'	=> $modules,
						'config'	=> $config,
						'categories' => $categories,
						'isi'	=>	'admin/categories/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add()
	{
//		$task = $this->uri->rsegment(1);
		$modules = $this->uri->rsegment(3);


//		$categories = $this->categories_model->listing();
		$categories = $this->categories_model->listingmod($modules);
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
		$valid->set_rules ('title','Title','required');
//		$valid->set_rules ('parentid','Parent Kategori','required');
//		$valid->set_rules ('description','Description','required');
//		$valid->set_rules ('price','Price','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Tambah Data Kategori',
							'modules'	=> $modules,
							'config'	=> $config,
							'categories' => $categories,
							'isi'	=>	'admin/categories/add');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
//			$data = array(	'id_user'	=> $this->session->userdata('id'),
//							'nama'	=> $i->post('nama'),
//							'alamat'	=> $i->post('alamat'),
//							'handphone'	=> $i->post('handphone'),
//							'tanggal_gabung'	=>	$i->post('tanggal_gabung')
//						);
			$data = array(	'title'	=> $this->input->post('title'),
							'parentid'	=> $this->input->post('parentid'),
							'modules'		=> $i->post('modules')
//							'price'	=> $this->input->post('price'),
//							'stock'	=> $this->input->post('stock')
						);

			$this->categories_model->add($data);
			$this->session->set_flashdata('sukses','Data has been add');
			redirect(base_url('admin/categories/'.$modules));
		}

	}

	public function edit($id_categories)
	{
		$modules = $this->uri->rsegment(4);

//		$categories2 = $this->categories_model->listing();
		$categories2 = $this->categories_model->listingmod($modules);
			$categories = $this->categories_model->detail($id_categories);
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
//			$valid->set_rules ('nama','Nama','required', 
//								array('required' => 'Nama Harus Diisi'
//								)
//					);
		$valid->set_rules ('title','Title','required');
//		$valid->set_rules ('description','Description','required');
//		$valid->set_rules ('price','Price','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Edit Data Kategori',
						'config'	=> $config,
							'modules'	=> $modules,
							'categories'	=> $categories,
							'categories2'	=> $categories2,
							'isi'	=>	'admin/categories/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
			$data = array(	'id'		=> $id_categories,
							'title'		=> $i->post('title'),
							'parentid'	=> $this->input->post('parentid'),
							'modules'		=> $i->post('modules')
//							'price'	=> $i->post('price'),
//							'stock'	=> $i->post('stock')
						);
//			$data = array(	'title'	=> $this->input->post('title'),
//							'description'	=> $this->input->post('description'),
//							'price'	=> $this->input->post('price'),
//							'stock'	=> $this->input->post('stock')
//						);
			$this->categories_model->edit($data);
			$this->session->set_flashdata('sukses','Data has been edit');
			redirect(base_url('admin/categories/'.$modules));
		}

	}

	public function delete($id_categories)
	{
		$data = array('id' => $id_categories);
		$modules = $this->uri->rsegment(4);
//		echo $data['id'];
		$this->categories_model->delete($data);
		$this->session->set_flashdata('sukses','Data has been add delete');
		redirect(base_url('admin/categories/'.$modules));
	}

}
