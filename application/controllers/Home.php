<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
		 $this->load->model('menu_model');
		 $this->load->model('botmenu_model');
		 $this->load->model('config_model');
		 $this->load->model('faq_model');
		 $this->load->model('bions_model');
		 $this->load->model('user_model');
		 $this->load->model('categories_model');
    }

	public function index()
	{
		$catmenu = $this->categories_model->listingmod('learning');
		$config = $this->config_model->detail(1);
		$bions = $this->bions_model->detail(1);
		$menu = $this->menu_model->listing();
		$botmenu = $this->botmenu_model->listing();

		if($bions->faqid > 0) {
			$faq = $this->faq_model->listingcat($bions->faqid);
		} else {
			$faq = $this->faq_model->listingcat(1);
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
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'bions' => $bions,
						'faq' => $faq,
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/home');

		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);

	}
}
