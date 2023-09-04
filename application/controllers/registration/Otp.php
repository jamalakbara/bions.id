<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/Baseregistration.php';

class Otp extends Baseregistration {

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
				'progress' => 12,
				'isi'	=>	'home/'.$config->template.'/registration/02-otp'
			);

		$this->load->view('home/'.$config->template.'//layout/wrapper-plain-mobile',$data);
	}

	public function resend(){
		$result = [];
		try{
			if($this->input->server('REQUEST_METHOD') === 'POST' 
				&& $this->session->has_userdata('formid')){
	            $decoded =$_SESSION['data'];
	
	            if($decoded['investortype'] == 'I'){
	            	$response = $this->sendOtp($decoded); //hit ws sendOtp

	                if($response){
		                $return = $response->getReturn();
		                $result=(array) $return;
		            }
	            }
			} else{
				$result['response'] = '0';
				$result['description'] = 'Invalid Request';
			}
		} catch (Exception $e) {
			$result['response'] = '0';
			$result['description'] = $e->getMessage();
		}

		return $this->output
            ->set_content_type('application/json')
            ->set_output(str_replace('\u0000*\u0000','',json_encode($result)));
	}

	public function next(){
		$result = [];
		try{
			if($this->input->server('REQUEST_METHOD') === 'POST' 
				&& $this->session->has_userdata('formid')){

				$otp = $this->input->post("otp");
	            $decoded = $_SESSION['data'];
	        	
	            if($decoded['investortype'] == 'I'){
	            	$args = new ValidateOtp();
	            	$args->setSourceoa($_SESSION['sourceoa']);
	            	$args->setRegid($_SESSION['formid']);
	            	$args->setEmail($decoded['email']);
	            	$args->setHandphone($decoded['handphone']);
	            	$args->setOtp($otp);

	            	$response = $this->client->validateOtp($args); //hit ws sendOtp

	                if($response){
		                $return = $response->getReturn();
		                $result=(array) $return;

		                if($return->getResponse() == '1'){
			            	$result['next-page'] = base_url('registration/otpsuccess');
			            	$this->setSessionStep('otpsuccess');
			            }
		            }
	            }
			} else{
				$result['response'] = '0';
				$result['description'] = 'Invalid Request';
			}
		} catch (Exception $e) {
			$result['response'] = '0';
			$result['description'] = $e->getMessage();
		}

		return $this->output
            ->set_content_type('application/json')
            ->set_output(str_replace('\u0000*\u0000','',json_encode($result)));
	}

	
}
