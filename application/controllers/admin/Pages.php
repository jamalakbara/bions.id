<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('config_model');
         $this->load->model('pages_model');
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
		$pages = $this->pages_model->listing();
//		$pages = $this->pages_model->listingbyuser($this->session->userdata('userid'));
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data Pages',
						'config'	=> $config,
						'pages' => $pages,
						'isi'	=>	'admin/pages/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add()
	{
//		$category = $this->category_model->listing();
//		$sized = $this->sized_model->listing();
//		$colors = $this->colors_model->listing();
		$config = $this->config_model->detail(1);
		
		$valid = $this->form_validation;
		$valid->set_rules ('title','Title','required');
//		$valid->set_rules('catid','Category','required|callback_check_default');
//		$valid->set_message('check_default', 'You need to select something other than the default');	
//		$valid->set_rules ('category','Category','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Tambah Data Pages',
//							'category'	=>	$category,
//							'colors'	=>	$colors,
//							'sized'	=>	$sized,
						'config'	=> $config,
							'isi'	=>	'admin/pages/add');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
			
			if(basename($_FILES['image1']['name']) == "") { $namafile1 = ''; } else { $namafile1 = $this->do_upload('image1'); }
			if(!empty($i->post('url'))) { $url = $i->post('url'); } else { $url = ''; } 

			$tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
			$tnow = date("Y-m-d", $tday);

//			$data = array(	'id_user'	=> $this->session->userdata('id'),
//							'nama'	=> $i->post('nama'),
//							'alamat'	=> $i->post('alamat'),
//							'handphone'	=> $i->post('handphone'),
//							'tanggal_gabung'	=>	$i->post('tanggal_gabung')
//						);
			$data = array(	'title'	=> $this->input->post('title'),
//							'title_eng'	=> $this->input->post('title_eng'),
//							'sumber'	=> $this->input->post('sumber'),
//							'metakey'	=> $this->input->post('metakey'),
//							'subtext'	=> $this->input->post('subtext'),
//							'subtext_eng'	=> $this->input->post('subtext_eng'),
							'text'	=> $this->input->post('text'),
//							'deskripsi_eng'	=> $this->input->post('deskripsi_eng'),
//							'tanggal'	=> $tnow,
							'image1'	=> $namafile1
//							'userid'	=> $this->session->userdata('userid'),
//							'url'	=> $url
						);

			$this->pages_model->add($data);
			$this->session->set_flashdata('sukses','Data has been add');
			redirect(base_url('admin/pages'));
		}

	}

	public function edit($id_pages)
	{
			$pages = $this->pages_model->detail($id_pages);
//			$category = $this->category_model->listing();
//			$sized = $this->sized_model->listing();
//			$colors = $this->colors_model->listing();
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
//			$valid->set_rules ('nama','Nama','required', 
//								array('required' => 'Nama Harus Diisi'
//								)
//					);
		$valid->set_rules ('title','Title','required');
//		$valid->set_rules ('category','Category','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Edit Data Pages',
							'pages'	=> $pages,
//							'category'	=>	$category,
//							'colors'	=>	$colors,
//							'sized'	=>	$sized,
						'config'	=> $config,
							'isi'	=>	'admin/pages/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;

			if(basename($_FILES['image1']['name']) == "") { $namafile1 = $i->post('old-image1'); } else { $namafile1 = $this->do_upload('image1'); }
			if(!empty($i->post('url'))) { $url = $i->post('url'); } else { $url = ''; } 
//			$namafile = $this->do_upload('image1');

			$data = array(	'id'		=> $id_pages,
							'title'		=> $i->post('title'),
//							'title_eng'		=> $i->post('title_eng'),
//							'sumber'	=> $this->input->post('sumber'),
//							'metakey'	=> $this->input->post('metakey'),
//							'subtext'	=> $this->input->post('subtext'),
//							'subtext_eng'	=> $this->input->post('subtext_eng'),
							'text'	=> $this->input->post('text'),
//							'deskripsi_eng'	=> $this->input->post('deskripsi_eng'),
//							'tanggal'	=> $tnow,
							'image1'	=> $namafile1
						);
//			$data = array(	'title'	=> $this->input->post('title'),
//							'description'	=> $this->input->post('description'),
//							'price'	=> $this->input->post('price'),
//							'stock'	=> $this->input->post('stock')
//						);
//echo $namafile2;
//exit();
			$this->pages_model->edit($data);
			$this->session->set_flashdata('sukses','Data has been edit');
			redirect(base_url('admin/pages'));
		}

	}

	public function delete($id_pages)
	{
		$pages = $this->pages_model->detail($id_pages);
		$data = array('id' => $id_pages);
		$thefile = $pages->image;
//		echo $thefile;
		unlink($thefile);
//	exit;
		$this->pages_model->delete($data);
		$this->session->set_flashdata('sukses','Data has been add delete');
		redirect(base_url('admin/pages'));
	}

	public function subcategory()
	{
            $id = $this->input->post('catid');
            $response = $this->subcategory_model->listing($id);
            $htmlvalue='';
                     foreach($response as $valCat) { 
						 $htmlvalue .= "<option value='".$valCat->id."'>".$valCat->title."</option>";
					 }
			$callback = array('data_kota'=>$htmlvalue); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota
			echo json_encode($callback);
	}

function do_upload($inputfie)
{
  $tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
  $tnow = date("Ymd", $tday);

  $url = base_url()."images/pages";
  $image=basename($_FILES[$inputfie]['name']);
  $image=str_replace(' ','|',$image);
  $type = explode(".",$image);
  $type = $type[count($type)-1];
  if (in_array($type,array('jpg','jpeg','png','gif')))
  {
    $tmppath="images/pages/".$this->session->userdata('userid').$tnow.uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
    if(is_uploaded_file($_FILES[$inputfie]["tmp_name"]))
    {
      move_uploaded_file($_FILES[$inputfie]['tmp_name'],$tmppath);
      return $tmppath; // returns the url of uploaded image.
    }
  }
  else
  {	
    redirect(base_url('admin/pages'));// redirect to show file type not support message
  }
}

}
