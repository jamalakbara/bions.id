<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
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

	public function detail($id)
	{
		$config = $this->config_model->detail(1);
		$faq = $this->faq_model->detail(1);
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
						'faq' => $faq,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/faq');

		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
		
	}
}
