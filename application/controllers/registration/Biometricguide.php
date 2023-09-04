<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/Baseregistration.php';

class Biometricguide extends Baseregistration {

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
				'title' => 'Pengenalan wajah dulu yuk',
				'buttontext' => 'Lanjut',
				'isi'	=>	'home/'.$config->template.'/registration/10-biometricguide'
			);

		$this->load->view('home/'.$config->template.'//layout/wrapper-plain-mobile',$data);
	}

	public function next(){
		$result = [];
		if(isset($_SESSION['step']) && 
			($_SESSION['step'] == 'biometricguide' || $_SESSION['step'] == 'biometricfailed')){
			
			try{
				if($this->input->server('REQUEST_METHOD') === 'POST' 
					&& $this->session->has_userdata('formid')){

		      		$result['response'] = '1';
		      		$result['next-page'] = base_url('registration/biometric');
		      		$this->setSessionStep('biometric');
				} else{
					$result['response'] = '0';
					$result['description'] = 'Invalid Request';
				}
			} catch (Exception $e) {
				$result['response'] = '0';
				$result['description'] = $e->getMessage();
			}
		}

		return $this->output
            ->set_content_type('application/json')
            ->set_output(str_replace('\u0000*\u0000','',json_encode($result)));
	}
}
