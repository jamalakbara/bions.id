<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatbot_hints extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('config_model');
         $this->load->model('event_model');
         $this->load->model('chatbot_hints_model');
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
		$chatbot_hints = $this->chatbot_hints_model->listing();
//		$chatbot_hints = $this->chatbot_hints_model->listingbyuser($this->session->userdata('userid'));
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data Chatbot Hints',
						'config'	=> $config,
						'chatbot_hints' => $chatbot_hints,
						'isi'	=>	'admin/chatbot_hints/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add()
	{
//		$category = $this->category_model->listing();
//		$sized = $this->sized_model->listing();
//		$colors = $this->colors_model->listing();
		$config = $this->config_model->detail(1);
		
		$valid = $this->form_validation;
		$valid->set_rules ('question','Question','required');
		$valid->set_rules ('reply','Reply','required');
//		$valid->set_rules('catid','Category','required|callback_check_default');
//		$valid->set_message('check_default', 'You need to select something other than the default');	
//		$valid->set_rules ('category','Category','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Tambah Data Chatbot Hints',
//							'category'	=>	$category,
//							'colors'	=>	$colors,
//							'sized'	=>	$sized,
						'config'	=> $config,
							'isi'	=>	'admin/chatbot_hints/add');
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
			$data = array(	'question'		=> $i->post('question'),
							'reply'	=> $this->input->post('reply')
						);

			$this->chatbot_hints_model->add($data);
			$this->session->set_flashdata('sukses','Data has been add');
			redirect(base_url('admin/chatbot_hints'));
		}

	}

	public function edit($id_chatbot_hints)
	{
			$chatbot_hints = $this->chatbot_hints_model->detail($id_chatbot_hints);
//			$category = $this->category_model->listing();
//			$sized = $this->sized_model->listing();
//			$colors = $this->colors_model->listing();
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
//			$valid->set_rules ('nama','Nama','required', 
//								array('required' => 'Nama Harus Diisi'
//								)
//					);
		$valid->set_rules ('question','Question','required');
		$valid->set_rules ('reply','Reply','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Edit Data Chatbot Hints',
							'chatbot_hints'	=> $chatbot_hints,
//							'category'	=>	$category,
//							'colors'	=>	$colors,
//							'sized'	=>	$sized,
						'config'	=> $config,
							'isi'	=>	'admin/chatbot_hints/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;

//			if(basename($_FILES['image1']['name']) == "") { $namafile1 = $i->post('old-image1'); } else { $namafile1 = $this->do_upload('image1'); }
//			if(!empty($i->post('url'))) { $url = $i->post('url'); } else { $url = ''; } 
//			$namafile = $this->do_upload('image1');

			$data = array(	'id'		=> $id_chatbot_hints,
							'question'		=> $i->post('question'),
							'reply'	=> $this->input->post('reply')
						);
//			$data = array(	'title'	=> $this->input->post('title'),
//							'description'	=> $this->input->post('description'),
//							'price'	=> $this->input->post('price'),
//							'stock'	=> $this->input->post('stock')
//						);
//echo $namafile2;
//exit();
			$this->chatbot_hints_model->edit($data);
			$this->session->set_flashdata('sukses','Data has been edit');
			redirect(base_url('admin/chatbot_hints'));
		}

	}

	public function delete($id_chatbot_hints)
	{
		$chatbot_hints = $this->chatbot_hints_model->detail($id_chatbot_hints);
		$data = array('id' => $id_chatbot_hints);
		$thefile = $chatbot_hints->image;
//		echo $thefile;
		unlink($thefile);
//	exit;
		$this->chatbot_hints_model->delete($data);
		$this->session->set_flashdata('sukses','Data has been add delete');
		redirect(base_url('admin/chatbot_hints'));
	}

	public function detail($id_chatbot_hints)
	{
		$chatbot_hints = $this->chatbot_hints_model->detail($id_chatbot_hints);
		$config = $this->config_model->detail(1);

			$data = array(	'title'	=>	'Detail Chatbot Hints',
							'config'	=> $config,
							'chatbot_hints'	=> $chatbot_hints,
							'isi'	=>	'admin/chatbot_hints/detail');
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

  $url = base_url()."images/chatbot_hints";
  $image=basename($_FILES[$inputfie]['name']);
  $image=str_replace(' ','|',$image);
  $type = explode(".",$image);
  $type = $type[count($type)-1];
  if (in_array($type,array('jpg','jpeg','png','gif')))
  {
    $tmppath="images/chatbot_hints/".$this->session->userdata('userid').$tnow.uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
    if(is_uploaded_file($_FILES[$inputfie]["tmp_name"]))
    {
      move_uploaded_file($_FILES[$inputfie]['tmp_name'],$tmppath);
      return $tmppath; // returns the url of uploaded image.
    }
  }
  else
  {	
    redirect(base_url('admin/chatbot_hints'));// redirect to show file type not support message
  }
}

}
