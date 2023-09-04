<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {

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
		$config = $this->config_model->detail(1);
		$configs = $this->config_model->listing();

		redirect(base_url('admin/config/edit/1'));

		$data = array(	'title'	=>	'Data Config',
						'configs' => $configs,
						'config' => $config,
						'isi'	=>	'admin/config/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add()
	{
		$sized = $this->sized_model->listing();
		$colors = $this->colors_model->listing();
		$kurirs = $this->kurir_model->listing();
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
		$valid->set_rules ('title','Title','required');
//		$valid->set_rules ('description','Description','required');
//		$valid->set_rules ('price','Price','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Tambah Data Config',
							'config' => $config,
							'colors'	=>	$colors,
							'sized'	=>	$sized,
							'kurirs'	=>	$kurirs,
							'isi'	=>	'admin/config/add');
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
							'code'	=> $this->input->post('code')
//							'description'	=> $this->input->post('description'),
//							'price'	=> $this->input->post('price'),
//							'stock'	=> $this->input->post('stock')
						);

			$this->config_model->add($data);
			$this->session->set_flashdata('sukses','Data has been add');
			redirect(base_url('admin/config'));
		}

	}

	public function edit($id_config)
	{
			$config = $this->config_model->detail($id_config);

			$valid = $this->form_validation;
//			$valid->set_rules ('nama','Nama','required', 
//								array('required' => 'Nama Harus Diisi'
//								)
//					);
		$valid->set_rules ('site_title','site_title','required');
//		$valid->set_rules ('description','Description','required');
//		$valid->set_rules ('price','Price','required');
//		$valid->set_rules ('stock','Stock','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Edit Data Config',
							'config'	=> $config,
							'isi'	=>	'admin/config/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
//			$cityname = $this->city_model->detailname($this->input->post('cityid'));
//			$citytype = $this->city_model->detailtype($this->input->post('cityid'));
//			$provname = $this->province_model->detailname($this->input->post('provinceid'));
			$country = 'Indonesia';

//			if(basename($_FILES['imageproduct']['name']) == "") { $namafileproduct = $i->post('old-imageproduct'); } else { $namafileproduct = $this->do_upload('imageproduct'); }

//			if(basename($_FILES['imagehomeevent']['name']) == "") { $namafilehomeevent = $i->post('old-imagehomeevent'); } else { $namafilehomeevent = $this->do_upload('imagehomeevent'); }

//			if(basename($_FILES['imageevent']['name']) == "") { $namafileimageevent = $i->post('old-imageevent'); } else { $namafileimageevent = $this->do_upload('imageevent'); }

//			if(basename($_FILES['imagecontact']['name']) == "") { $namafileimagecontact = $i->post('old-imagecontact'); } else { $namafileimagecontact = $this->do_upload('imagecontact'); }

			$data = array(	'id'		=> $id_config,
							'site_title'		=> $i->post('site_title'),
							'site_meta'		=> $i->post('site_meta'),
							'site_desc'	=> $this->input->post('site_desc'),
							'name'	=> $this->input->post('name'),
//							'video'	=> $this->input->post('video'),
//							'video'	=> $this->input->post('video'),
//							'channel'	=> $this->input->post('channel'),
//							'jamkerja'	=> $this->input->post('jamkerja'),
//							'texthomegallery'	=> $this->input->post('texthomegallery'),
//							'footertext'	=> $this->input->post('footertext'),
							'phone'	=> $this->input->post('phone'),
							'email'	=> $this->input->post('email'),
							'instagram'	=> $this->input->post('instagram'),
							'facebook'	=> $this->input->post('facebook'),
							'twitter'	=> $this->input->post('twitter'),
							'ftitleshipping'	=> $this->input->post('ftitleshipping'),
							'ftextshipping'	=> $this->input->post('ftextshipping'),
							'ftitlegaransi'	=> $this->input->post('ftitlegaransi'),
							'ftextgaransi'	=> $this->input->post('ftextgaransi'),
							'ftitleopen'	=> $this->input->post('ftitleopen'),
							'ftextopen'	=> $this->input->post('ftextopen'),
							'ftitlesupport'	=> $this->input->post('ftitlesupport'),
							'ftextsupport'	=> $this->input->post('ftextsupport'),
							'wa'	=> $this->input->post('wa'),
							'g_analitycs'	=> $this->input->post('g_analitycs')
//							'texthomeproduct'	=> $this->input->post('texthomeproduct'),
//							'titlehomearticles'	=> $this->input->post('titlehomearticles'),
//							'titlehomepartner'	=> $this->input->post('titlehomepartner'),
//							'imageproduct'	=> $namafileproduct,
//							'titlehomeevent'	=> $this->input->post('titlehomeevent'),
//							'texthomeevent'	=> $this->input->post('texthomeevent'),
//							'imagehomeevent'	=> $namafilehomeevent,
//							'imageevent'	=> $namafileimageevent,
//							'imagecontact'	=> $namafileimagecontact,
//							'textcontact1'	=> $this->input->post('textcontact1'),
//							'textcontact2'	=> $this->input->post('textcontact2')
//							'price'	=> $i->post('price'),
//							'stock'	=> $i->post('stock')
						);
//			$data = array(	'title'	=> $this->input->post('title'),
//							'description'	=> $this->input->post('description'),
//							'price'	=> $this->input->post('price'),
//							'stock'	=> $this->input->post('stock')
//						);
			$this->config_model->edit($data);
			$this->session->set_flashdata('sukses','Data has been edit');
			redirect(base_url('admin/config'));
		}

	}

	public function delete($id_config)
	{
		$data = array('id' => $id_config);
//		echo $data['id'];
		$this->config_model->delete($data);
		$this->session->set_flashdata('sukses','Data has been add delete');
		redirect(base_url('admin/config'));
	}

function do_upload($inputfie)
{
  $url = base_url()."images/config";
  $image=basename($_FILES[$inputfie]['name']);
  $image=str_replace(' ','|',$image);
  $type = explode(".",$image);
  $type = $type[count($type)-1];
  if (in_array($type,array('jpg','jpeg','png','gif')))
  {
    $tmppath="images/config/".uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
    if(is_uploaded_file($_FILES[$inputfie]["tmp_name"]))
    {
      move_uploaded_file($_FILES[$inputfie]['tmp_name'],$tmppath);
      return $tmppath; // returns the url of uploaded image.
    }
  }
  else
  {	
    redirect(base_url('admin/config'));// redirect to show file type not support message
  }
}

}
