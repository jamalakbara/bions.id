<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ipobukalapak extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
		 $this->load->model('pages_model');
		 $this->load->model('menu_model');
		 $this->load->model('botmenu_model');
		 $this->load->model('config_model');
		 $this->load->model('user_model');
    }

	public function index()
	{
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
						'menu' => $menu,
						'botmenu' => $botmenu,
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/ipobukalapak');

		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
		
	}
}
