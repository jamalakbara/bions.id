<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
		 $this->load->model('eventregistrasi_model');
		 $this->load->model('event_model');
		 $this->load->model('botmenu_model');
		 $this->load->model('menu_model');
		 $this->load->model('config_model');
		 $this->load->model('user_model');
		 $this->load->model('categories_model');
    }

	public function index()
	{
		$catmenu = $this->categories_model->listingmod('event');
		$event = $this->event_model->listing();
		$config = $this->config_model->detail(1);
		$menu = $this->menu_model->listing();
		$botmenu = $this->botmenu_model->listing();

		$calendar = array();
		foreach ($event as $key => $val) 
		{
			$calendar[] = array(
				'id' 	=> intval($val->id), 
				'title' => $val->title, 
//				'description' => trim($val->subtext), 
				'description' => '', 
				'start' => date_format( date_create($val->tanggal) ,"Y-m-d H:i:s"),
				'end' 	=> date_format( date_create($val->tanggal) ,"Y-m-d H:i:s"),
				'color' => $val->color,
			);
		}

		$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url(),
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url('images/logobions.png'),
						'author'	=>	$config->name,
						'event' => $event,
						'catmenu' => $catmenu,
						'botmenu' => $botmenu,
						'menu' => $menu,
						'config' => $config,
						'get_data' => json_encode($calendar),
						'isi'	=>	'home/'.$config->template.'/eventlist');

		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
	}

	public function register($idevent)
	{
		$catmenu = $this->categories_model->listingmod('event');
		$event = $this->event_model->detail($idevent);
		$config = $this->config_model->detail(1);
		$menu = $this->menu_model->listing();
		$botmenu = $this->botmenu_model->listing();

		$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url(),
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url('images/logobions.png'),
						'author'	=>	$config->name,
						'event' => $event,
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/eventregister');

		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
	}

	public function registerevent()
	{
		$catmenu = $this->categories_model->listingmod('event');
		$event = $this->event_model->listing();
		$config = $this->config_model->detail(1);
		$menu = $this->menu_model->listing();
		$botmenu = $this->botmenu_model->listing();

		$valid = $this->form_validation;
		$valid->set_rules ('nama_lengkap','Nama Lengkap','required');
		$valid->set_rules ('email','Email','required');
		$valid->set_rules ('handphone','Handphone','required');
		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url(),
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url('images/logobions.png'),
						'author'	=>	$config->name,
						'event' => $event,
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/eventregister');
			$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
		} else {
			$tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
			$tnow = date("Y-m-d", $tday);

			$data = array(	'tanggal'	=> $tnow,
							'eventid'	=> $this->input->post('idevent'),
							'nama_lengkap'	=> $this->input->post('nama_lengkap'),
							'email'	=> $this->input->post('email'),
							'handphone'	=> $this->input->post('handphone')
						);

			$this->eventregistrasi_model->add($data);
			$this->session->set_flashdata('sukses','Data has been add');

			$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url(),
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url('images/logobions.png'),
						'author'	=>	$config->name,
						'event' => $event,
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/registerthanks');
			$this->load->view('home/'.$config->template.'/layout/wrapper',$data);

		}
		
	}

	public function listing($catid)
	{
		$catmenu = $this->categories_model->listingmod('event');
		$category = $this->categories_model->detail($catid);
		$config = $this->config_model->detail(1);
		$menu = $this->menu_model->listing();
		$botmenu = $this->botmenu_model->listing();

		$jumlah= $this->event_model->jumlah($catid);
  $config1['base_url'] = base_url().'event/';
  $config1['total_rows'] = $jumlah; //menghitung total baris
  $config1['per_page'] = 6; //mengatur total data yang tampil per halamannya

  // Produces: class="myclass"
  $config1['attributes'] = array('class' => 'page-link');
  
  //berfungsi untuk melampirkan markup
  $config1['full_tag_open'] = '<ul class="pagination">';
  $config1['full_tag_close'] = '</ul>';
  
  //berfungsi untuk Menyesuaikan "first" Link
  $config1['first_link'] = 'FIRST';
  $config1['first_tag_open'] = '<li class="page-item">';
  $config1['first_tag_close'] = '</li>';
  
  //berfungsi untuk Menyesuaikan Link terakhir
  $config1['last_link'] = 'LAST';
  $config1['last_tag_open'] = '<li class="page-item">';
  $config1['last_tag_close'] = '</li>';
  
  //berfungsi untuk Menyesuaikan "next" Link
  $config1['next_link'] = '<i class="fa fa-angle-right"></i>';
  $config1['next_tag_open'] = '<li class="page-item">';
  $config1['next_tag_close'] = '</li>';
  
  //berfungsi untuk Menyesuaikan "previous" Link
  $config1['prev_link'] = '<i class="fa fa-angle-left"></i>';
  $config1['prev_tag_open'] = '<li class="page-item">';
  $config1['prev_tag_close'] = '</li>';
  
  //berfungsi untuk Menyesuaikan "Current Page" Link
  $config1['cur_tag_open'] = '<li class="page-item"><a class="page-link active" href="#">';
  $config1['cur_tag_close'] = '</a></li>';
  
  //berfungsi untuk Menyesuaikan "digit angka" Link
  $config1['num_tag_open'] = '<li class="page-item">';
  $config1['num_tag_close'] = '</li>';

  $dari =  ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
  $event = $this->event_model->lihat($config1['per_page'],$dari,$catid);
  $this->pagination->initialize($config1);


		$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url(),
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url('images/logobions.png'),
						'author'	=>	$config->name,
						'catmenu' => $catmenu,
						'event' => $event,
						'category' => $category,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/eventlist');

		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
	}

	public function detail($url)
	{
		if($this->event_model->detailurl($url) == null){
			$data = array(	'heading' => "404 Page Not Found",
							'message' => "<p>The page you requested was not found.</p>");

			$this->load->view('errors/html/error_404', $data);

		} else{
			$config = $this->config_model->detail(1);
			$event = $this->event_model->detailurl($url);
			$menu = $this->menu_model->listing();
			$related = $this->event_model->listinglimit(2);
			$botmenu = $this->botmenu_model->listing();

	//		$user = $this->user_model->detail($event->author);
			$data = array(	'title'	=>	$config->site_title,
							'meta'	=>	$config->site_meta,
							'desc'	=>	$config->site_desc,
							'og_url'	=>	base_url(),
							'og_type'	=>	'website',
							'og_title'	=>	$config->site_title,
							'og_desc'	=>	$config->site_desc,
							'og_image'	=>	base_url('images/logobions.png'),
							'author'	=>	$config->name,
							'event' => $event,
	//						'user' => $user,
							'menu' => $menu,
							'botmenu' => $botmenu,
							'related' => $related,
							'config' => $config,
							'isi'	=>	'home/'.$config->template.'/eventdetail');

			$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
		}
	}
}
