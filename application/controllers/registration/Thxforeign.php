<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/Baseregistration.php';

class Thxforeign extends Baseregistration {

    public function __construct()
    {
         parent::__construct();

    }

	public function index()
	{
		$this->validatesession();
		$this->clearsession();
		$config = $this->config_model->detail(1);
		$data = array(	'title'	=>	$config->site_title,
				'meta'	=>	$config->site_meta,
				'desc'	=>	$config->site_desc,
				'config' => $config,
				'progress' => 100,
				'isi'	=>	'home/'.$config->template.'/registration/02-thxforeign');
		$this->load->view('home/'.$config->template.'//layout/wrapper-plain-mobile',$data);
	}
}
