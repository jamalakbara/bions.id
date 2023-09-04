<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edukasi extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('learning_model');
		 $this->load->model('faq_model');
		 $this->load->model('menu_model');
		 $this->load->model('botmenu_model');
		 $this->load->model('config_model');
		 $this->load->model('user_model');
		 $this->load->model('categories_model');
    }

	public function index()
	{
		$catmenu = $this->categories_model->listingmod('learning');
		$categories = $this->categories_model->listingmod('faq');
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
						'categories' => $categories,
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/faq');

		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);

	}

	public function faq()
	{
		$catmenu = $this->categories_model->listingmod('learning');
		$categories = $this->categories_model->listingmod('faq');
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
						'categories' => $categories,
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/faq');

		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
		
	}

	public function saham(){
		$this->_listing(1);
	}

	public function reksadana(){
		$this->_listing(2);
	}

	public function fixedincome(){
		$this->_listing(3);
	}

	public function video(){
		$this->_listing(4);
	}
 
 	public function marketupdate(){
		$this->_listing(13);
	}


	private function _listing($catid)
	{
		$catmenu = $this->categories_model->listingmod('learning');
		$category = $this->categories_model->detail($catid);
		$config = $this->config_model->detail(1);
		$menu = $this->menu_model->listing();
		$botmenu = $this->botmenu_model->listing();

		$jumlah= $this->learning_model->jumlah($catid);
		$config1['base_url'] = base_url().'learning/listing/'.$catid;
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

		$dari =  ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$learning = $this->learning_model->lihat($config1['per_page'],$dari,$catid);
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
						'learning' => $learning,
						'category' => $category,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'config' => $config,
						'catid' => $catid,
						'isi'	=>	'home/'.$config->template.'/learninglist');

		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
	}

	public function post($url)
	{
		if($this->learning_model->detailurl($url) == null){
			$data = array(	'heading' => "404 Page Not Found",
							'message' => "<p>The page you requested was not found.</p>");

			$this->load->view('errors/html/error_404', $data);

		} else {
			$config = $this->config_model->detail(1);
			$learning = $this->learning_model->detailurl($url);
			$menu = $this->menu_model->listing();
			$related = $this->learning_model->listinglimit(2);
			$botmenu = $this->botmenu_model->listing();
	
			$user = $this->user_model->detail($learning->author);
			$data = array(	'title'	=>	$config->site_title,
							'meta'	=>	$config->site_meta,
							'desc'	=>	$config->site_desc,
							'og_url'	=>	base_url(),
							'og_type'	=>	'website',
							'og_title'	=>	$config->site_title,
							'og_desc'	=>	$config->site_desc,
							'og_image'	=>	base_url('images/logobions.png'),
							'author'	=>	$config->name,
							'learning' => $learning,
							'user' => $user,
							'menu' => $menu,
							'botmenu' => $botmenu,
							'related' => $related,
							'config' => $config,
							'isi'	=>	'home/'.$config->template.'/learningdetail');
	
			$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
			
		}
	}

	public function post_marketupdate($url)
	{
		if($this->learning_model->detailurlbycatid(13, $url) == null){
			$data = array(	'heading' => "404 Page Not Found",
							'message' => "<p>The page you requested was not found.</p>");

			$this->load->view('errors/html/error_404', $data);

		} else {
			$config = $this->config_model->detail(1);
			$learning = $this->learning_model->detailurlbycatid(13, $url);
			$menu = $this->menu_model->listing();
			$related = $this->learning_model->listinglimit(2);
			$botmenu = $this->botmenu_model->listing();
	
			$user = $this->user_model->detail($learning->author);
			$data = array(	'title'	=>	$config->site_title,
							'meta'	=>	$config->site_meta,
							'desc'	=>	$config->site_desc,
							'og_url'	=>	base_url(),
							'og_type'	=>	'website',
							'og_title'	=>	$config->site_title,
							'og_desc'	=>	$config->site_desc,
							'og_image'	=>	base_url('images/logobions.png'),
							'author'	=>	$config->name,
							'learning' => $learning,
							'user' => $user,
							'menu' => $menu,
							'botmenu' => $botmenu,
							'related' => $related,
							'config' => $config,
							'isi'	=>	'home/'.$config->template.'/learningdetail');
	
			$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
			
		}
	}
 
	public function post_saham($url)
	{
		if($this->learning_model->detailurlbycatid(1,$url) == null){
			$data = array(	'heading' => "404 Page Not Found",
							'message' => "<p>The page you requested was not found.</p>");

			$this->load->view('errors/html/error_404', $data);

		} else {
			$config = $this->config_model->detail(1);
			$learning = $this->learning_model->detailurlbycatid(1, $url);
			$menu = $this->menu_model->listing();
			$related = $this->learning_model->listinglimit(2);
			$botmenu = $this->botmenu_model->listing();
	
			$user = $this->user_model->detail($learning->author);
			$data = array(	'title'	=>	$config->site_title,
							'meta'	=>	$config->site_meta,
							'desc'	=>	$config->site_desc,
							'og_url'	=>	base_url(),
							'og_type'	=>	'website',
							'og_title'	=>	$config->site_title,
							'og_desc'	=>	$config->site_desc,
							'og_image'	=>	base_url('images/logobions.png'),
							'author'	=>	$config->name,
							'learning' => $learning,
							'user' => $user,
							'menu' => $menu,
							'botmenu' => $botmenu,
							'related' => $related,
							'config' => $config,
							'isi'	=>	'home/'.$config->template.'/learningdetail');
	
			$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
			
		}
	}

	public function post_reksadana($url)
	{
		if($this->learning_model->detailurlbycatid(2, $url) == null){
			$data = array(	'heading' => "404 Page Not Found",
							'message' => "<p>The page you requested was not found.</p>");

			$this->load->view('errors/html/error_404', $data);

		} else {
			$config = $this->config_model->detail(1);
			$learning = $this->learning_model->detailurlbycatid(2, $url);
			$menu = $this->menu_model->listing();
			$related = $this->learning_model->listinglimit(2);
			$botmenu = $this->botmenu_model->listing();
	
			$user = $this->user_model->detail($learning->author);
			$data = array(	'title'	=>	$config->site_title,
							'meta'	=>	$config->site_meta,
							'desc'	=>	$config->site_desc,
							'og_url'	=>	base_url(),
							'og_type'	=>	'website',
							'og_title'	=>	$config->site_title,
							'og_desc'	=>	$config->site_desc,
							'og_image'	=>	base_url('images/logobions.png'),
							'author'	=>	$config->name,
							'learning' => $learning,
							'user' => $user,
							'menu' => $menu,
							'botmenu' => $botmenu,
							'related' => $related,
							'config' => $config,
							'isi'	=>	'home/'.$config->template.'/learningdetail');
	
			$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
			
		}
	}

	public function post_fixedincome($url)
	{
		if($this->learning_model->detailurlbycatid(3, $url) == null){
			$data = array(	'heading' => "404 Page Not Found",
							'message' => "<p>The page you requested was not found.</p>");

			$this->load->view('errors/html/error_404', $data);

		} else {
			$config = $this->config_model->detail(1);
			$learning = $this->learning_model->detailurlbycatid(3, $url);
			$menu = $this->menu_model->listing();
			$related = $this->learning_model->listinglimit(2);
			$botmenu = $this->botmenu_model->listing();
	
			$user = $this->user_model->detail($learning->author);
			$data = array(	'title'	=>	$config->site_title,
							'meta'	=>	$config->site_meta,
							'desc'	=>	$config->site_desc,
							'og_url'	=>	base_url(),
							'og_type'	=>	'website',
							'og_title'	=>	$config->site_title,
							'og_desc'	=>	$config->site_desc,
							'og_image'	=>	base_url('images/logobions.png'),
							'author'	=>	$config->name,
							'learning' => $learning,
							'user' => $user,
							'menu' => $menu,
							'botmenu' => $botmenu,
							'related' => $related,
							'config' => $config,
							'isi'	=>	'home/'.$config->template.'/learningdetail');
	
			$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
			
		}
	}

	public function post_video($url)
	{
		if($this->learning_model->detailurlbycatid(4, $url) == null){
			$data = array(	'heading' => "404 Page Not Found",
							'message' => "<p>The page you requested was not found.</p>");

			$this->load->view('errors/html/error_404', $data);

		} else {
			$config = $this->config_model->detail(1);
			$learning = $this->learning_model->detailurlbycatid(4, $url);
			$menu = $this->menu_model->listing();
			$related = $this->learning_model->listinglimit(2);
			$botmenu = $this->botmenu_model->listing();
	
			$user = $this->user_model->detail($learning->author);
			$data = array(	'title'	=>	$config->site_title,
							'meta'	=>	$config->site_meta,
							'desc'	=>	$config->site_desc,
							'og_url'	=>	base_url(),
							'og_type'	=>	'website',
							'og_title'	=>	$config->site_title,
							'og_desc'	=>	$config->site_desc,
							'og_image'	=>	base_url('images/logobions.png'),
							'author'	=>	$config->name,
							'learning' => $learning,
							'user' => $user,
							'menu' => $menu,
							'botmenu' => $botmenu,
							'related' => $related,
							'config' => $config,
							'isi'	=>	'home/'.$config->template.'/learningdetail');
	
			$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
			
		}
	}

	public function search()
	{
		$search = $this->input->post('search');
		$catid = $this->input->post('catid');

		$catmenu = $this->categories_model->listingmod('learning');
		$category = $this->categories_model->detail($catid);
		$config = $this->config_model->detail(1);
		$menu = $this->menu_model->listing();
		$botmenu = $this->botmenu_model->listing();

		$jumlah= $this->learning_model->jumlahsearch($search,$catid);
  $config1['base_url'] = base_url().'learning/listing/'.$catid;
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

  $dari =  ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
  $learning = $this->learning_model->lihatsearch($config1['per_page'],$dari,$search,$catid);
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
						'learning' => $learning,
						'category' => $category,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'catid' => $catid,
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/learninglist');

		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
	}

	public function synctitle(){
		$learning = $this->learning_model->synctitle();
	}
}
