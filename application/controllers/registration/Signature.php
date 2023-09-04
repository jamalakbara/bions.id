<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/Baseregistration.php';

class Signature extends Baseregistration {

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
				'config' => $config,
				'progress' => 78,
				'isi'	=>	'home/'.$config->template.'/registration/12-signature');
		$this->load->view('home/'.$config->template.'/layout/wrapper-plain-mobile',$data);
	}

	public function next(){
		$result = [];
		if(isset($_SESSION['step']) && $_SESSION['step'] == 'signature'){
			try{
				if($this->input->server('REQUEST_METHOD') === 'POST' 
					&& $this->session->has_userdata('formid')){

					$signature = $this->input->post("signature");
		            $decoded = $_SESSION['data'];
		        	
		            // $uploaddir = APPPATH . '../uploads/';
		            // $filename = $uploaddir. $_SESSION['formid'] . '-signature.jpg';
		            // file_put_contents($filename , file_get_contents($signature));

		            $this->mergeSessionData(array("signature" => $signature));
		            
		            $result['response'] = '1';
	            	$result['next-page'] = base_url('registration/attachmentsuccess');
	            	$this->setSessionStep('attachmentsuccess');

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
