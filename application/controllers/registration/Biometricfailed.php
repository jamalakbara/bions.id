<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/Baseregistration.php';

class Biometricfailed extends Baseregistration {

    public function __construct()
    {
         parent::__construct();

    }

	public function index()
	{
		$this->validatesession();
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	$config->site_title,
				'meta'	=>	$config->site_meta,
				'desc'	=>	$config->site_desc,
				'progress' => 66,
				'config' => $config,
				'title' => 'Pengenalan Wajah Gagal',
				'buttontext' => 'Ulangi',
				'isi'	=>	'home/'.$config->template.'/registration/10-biometricguide'
			);

		$this->load->view('home/'.$config->template.'//layout/wrapper-plain-mobile',$data);
	}
}
