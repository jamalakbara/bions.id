<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {

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
		$bank = $this->tabel_model->listing('bank');
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data Bank',
						'config'	=> $config,
						'bank' => $bank,
						'isi'	=>	'admin/bank/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add()
	{
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
		$valid->set_rules ('BANKID','Bank','required');
		$valid->set_rules ('BANKNAME','No Rekening','required');
//		$valid->set_rules ('pemilik','nama Pemilik','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Tambah Data Bank',
						'config'	=> $config,
							'isi'	=>	'admin/bank/add');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
//			$data = array(	'id_user'	=> $this->session->userdata('id'),
//							'nama'	=> $i->post('nama'),
//							'alamat'	=> $i->post('alamat'),
//							'handphone'	=> $i->post('handphone'),
//							'tanggal_gabung'	=>	$i->post('tanggal_gabung')
//						);
			$data = array(	'BANKID'	=> $this->input->post('BANKID'),
							'BANKNAME'	=> $this->input->post('BANKNAME'),
							'BANKIDKPEI'	=> $this->input->post('BANKIDKPEI'),
							'REFBANK'	=> $this->input->post('REFBANK'),
							'CODE'	=> $this->input->post('CODE'),
							'CODE_BI'	=> $this->input->post('CODE_BI'),
							'MSB_ID'	=> $this->input->post('MSB_ID'),
							'CODE_ARIA'	=> $this->input->post('CODE_ARIA'),
							'NOURUT'	=> $this->input->post('NOURUT')
						);

			$this->bank_model->add($data);
			$this->session->set_flashdata('sukses','Data has been add');
			redirect(base_url('admin/bank'));
		}

	}

	public function edit($id_bank)
	{
			$bank = $this->tabel_model->detail('bank',$id_bank);
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
//			$valid->set_rules ('nama','Nama','required', 
//								array('required' => 'Nama Harus Diisi'
//								)
//					);
		$valid->set_rules ('BANKID','Bank','required');
		$valid->set_rules ('BANKNAME','No Rekening','required');
//		$valid->set_rules ('description','Description','required');
//		$valid->set_rules ('price','Price','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Edit Data Bank',
						'config'	=> $config,
							'bank'	=> $bank,
							'isi'	=>	'admin/bank/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
			$data = array(	'id'		=> $id_bank,
							'BANKID'	=> $this->input->post('BANKID'),
							'BANKNAME'	=> $this->input->post('BANKNAME'),
							'BANKIDKPEI'	=> $this->input->post('BANKIDKPEI'),
							'REFBANK'	=> $this->input->post('REFBANK'),
							'CODE'	=> $this->input->post('CODE'),
							'CODE_BI'	=> $this->input->post('CODE_BI'),
							'MSB_ID'	=> $this->input->post('MSB_ID'),
							'CODE_ARIA'	=> $this->input->post('CODE_ARIA'),
							'NOURUT'	=> $this->input->post('NOURUT')
						);
//			$data = array(	'title'	=> $this->input->post('title'),
//							'description'	=> $this->input->post('description'),
//							'price'	=> $this->input->post('price'),
//							'stock'	=> $this->input->post('stock')
//						);
			$this->bank_model->edit($data);
			$this->session->set_flashdata('sukses','Data has been edit');
			redirect(base_url('admin/bank'));
		}

	}

	public function delete($id_bank)
	{
		$data = array('id' => $id_bank);
//		echo $data['id'];
		$this->bank_model->delete($data);
		$this->session->set_flashdata('sukses','Data has been add delete');
		redirect(base_url('admin/bank'));
	}

}
