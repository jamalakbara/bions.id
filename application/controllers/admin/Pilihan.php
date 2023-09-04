<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pilihan extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('config_model');
         $this->load->model('event_model');
         $this->load->model('pilihan_model');
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
		$pilihan = $this->pilihan_model->listing();
//		$pilihan = $this->pilihan_model->listingbyuser($this->session->userdata('userid'));
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data Chatbot Pilihan Pertanyaan',
						'config'	=> $config,
						'pilihan' => $pilihan,
						'isi'	=>	'admin/pilihan/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add()
	{
//		$category = $this->category_model->listing();
//		$sized = $this->sized_model->listing();
//		$colors = $this->colors_model->listing();
		$config = $this->config_model->detail(1);
		
		$valid = $this->form_validation;
		$valid->set_rules ('pilihan','Pilihan','required');
		$valid->set_rules ('jawaban','Jawaban','required');
//		$valid->set_rules('catid','Category','required|callback_check_default');
//		$valid->set_message('check_default', 'You need to select something other than the default');	
//		$valid->set_rules ('category','Category','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Tambah Data Chatbot Pilihan Pertanyaan',
//							'category'	=>	$category,
//							'colors'	=>	$colors,
//							'sized'	=>	$sized,
						'config'	=> $config,
							'isi'	=>	'admin/pilihan/add');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
			
//			if(basename($_FILES['image1']['name']) == "") { $namafile1 = ''; } else { $namafile1 = $this->do_upload('image1'); }
//			if(!empty($i->post('url'))) { $url = $i->post('url'); } else { $url = ''; } 

//			$tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
//			$tnow = date("Y-m-d", $tday);

//			$data = array(	'id_user'	=> $this->session->userdata('id'),
//							'nama'	=> $i->post('nama'),
//							'alamat'	=> $i->post('alamat'),
//							'handphone'	=> $i->post('handphone'),
//							'tanggal_gabung'	=>	$i->post('tanggal_gabung')
//						);
			$data = array(	'pilihan'		=> $i->post('pilihan'),
							'jawaban'	=> $this->input->post('jawaban')
						);

			$this->pilihan_model->add($data);
			$this->session->set_flashdata('sukses','Data has been add');
			redirect(base_url('admin/pilihan'));
		}

	}

	public function edit($id_pilihan)
	{
			$pilihan = $this->pilihan_model->detail($id_pilihan);
//			$category = $this->category_model->listing();
//			$sized = $this->sized_model->listing();
//			$colors = $this->colors_model->listing();
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
//			$valid->set_rules ('nama','Nama','required', 
//								array('required' => 'Nama Harus Diisi'
//								)
//					);
		$valid->set_rules ('pilihan','Pilihan','required');
		$valid->set_rules ('jawaban','Jawaban','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Edit Data Chatbot Pilihan Pertanyaan',
							'pilihan'	=> $pilihan,
//							'category'	=>	$category,
//							'colors'	=>	$colors,
//							'sized'	=>	$sized,
						'config'	=> $config,
							'isi'	=>	'admin/pilihan/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;

//			if(basename($_FILES['image1']['name']) == "") { $namafile1 = $i->post('old-image1'); } else { $namafile1 = $this->do_upload('image1'); }
//			if(!empty($i->post('url'))) { $url = $i->post('url'); } else { $url = ''; } 
//			$namafile = $this->do_upload('image1');

			$data = array(	'id'		=> $id_pilihan,
							'pilihan'		=> $i->post('pilihan'),
							'jawaban'	=> $this->input->post('jawaban')
						);
//			$data = array(	'title'	=> $this->input->post('title'),
//							'description'	=> $this->input->post('description'),
//							'price'	=> $this->input->post('price'),
//							'stock'	=> $this->input->post('stock')
//						);
//echo $namafile2;
//exit();
			$this->pilihan_model->edit($data);
			$this->session->set_flashdata('sukses','Data has been edit');
			redirect(base_url('admin/pilihan'));
		}

	}

	public function delete($id_pilihan)
	{
		$pilihan = $this->pilihan_model->detail($id_pilihan);
		$data = array('id' => $id_pilihan);
		$thefile = $pilihan->image;
//		echo $thefile;
		unlink($thefile);
//	exit;
		$this->pilihan_model->delete($data);
		$this->session->set_flashdata('sukses','Data has been add delete');
		redirect(base_url('admin/pilihan'));
	}

	public function detail($id_pilihan)
	{
		$pilihan = $this->pilihan_model->detail($id_pilihan);
		$config = $this->config_model->detail(1);

			$data = array(	'title'	=>	'Detail Chatbot Pilihan Pertanyaan',
							'config'	=> $config,
							'pilihan'	=> $pilihan,
							'isi'	=>	'admin/pilihan/detail');
			$this->load->view('admin/layout/wrapper',$data);

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

  $url = base_url()."images/pilihan";
  $image=basename($_FILES[$inputfie]['name']);
  $image=str_replace(' ','|',$image);
  $type = explode(".",$image);
  $type = $type[count($type)-1];
  if (in_array($type,array('jpg','jpeg','png','gif')))
  {
    $tmppath="images/pilihan/".$this->session->userdata('userid').$tnow.uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
    if(is_uploaded_file($_FILES[$inputfie]["tmp_name"]))
    {
      move_uploaded_file($_FILES[$inputfie]['tmp_name'],$tmppath);
      return $tmppath; // returns the url of uploaded image.
    }
  }
  else
  {	
    redirect(base_url('admin/pilihan'));// redirect to show file type not support message
  }
}

}
