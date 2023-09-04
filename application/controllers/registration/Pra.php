<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/Baseregistration.php';

class Pra extends Baseregistration {

    public function __construct()
    {
         parent::__construct();
        $this->load->helper("url");

    }

	public function index()
	{
		$this->clearsession();
		$this->session->set_userdata('formid', uniqid('bions',true));
		$this->setSessionStep('pra');
	
		//set source to session
		if (isset($_GET['source'])) {
        	$this->session->set_userdata('sourceoa', strtoupper($_GET['source']));
        } else{
        	$this->session->set_userdata('sourceoa', 'ON');
        }

		//set theme to session
		if (isset($_GET['theme'])) {
        	$this->session->set_userdata('theme', $_GET['theme']);
        } else{
        	$this->session->set_userdata('theme', 'light');
        }

		$config = $this->config_model->detail(1);
		$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'config' => $config,
						'progress' => 6,
						'isi'	=>	'home/'.$config->template.'/registration/01-pra'
						// 'gtag' => file_get_contents(base_url('assets/home/'.$config->template.'/js/registration/gtag/01-pra-gtag.js'))
					);
		$this->load->view('home/'.$config->template.'/layout/wrapper-plain-mobile',$data);
	}

	public function next(){
		$result = [];
		try{
			if($this->input->server('REQUEST_METHOD') === 'POST' 
				&& $this->session->has_userdata('formid')){

				$tmp = str_replace('\"', '"', $this->input->post("vform"));
				$tmp = str_replace("\'", "'", $tmp);
	            $decoded = json_decode($tmp, true);
	            
	            $this->session->set_userdata('data', $decoded);

	            //TODO : Check Apakah Indonesia / WNA (jika wna lanjut otp, jika wna thank you page + kirim email)
	            //TODO : Nasabah hanya 1x reg untuk 1 tipe rekening dalam 24 jam (key : email dan no hp)
	            
	            if($decoded['investortype'] == 'A'){

	                $args = new RegisterForeign();
	                $args->setSourceoa($_SESSION['sourceoa']);
	                $args->setRegid($_SESSION['formid']);
	                $args->setReferral($decoded['referral']);
	                $args->setFullname($decoded['fullname']);
	                $args->setEmail($decoded['email']);
	                $args->setHandphone($decoded['handphone']);
	                $args->setInvestorType($decoded['investortype']);
	                $args->setNationality($decoded['nationality']);
	                $args->setReference($decoded['reference']);
	                $args->setProductType($reqdata['producttype'] = implode(',', $decoded['producttype']));
	                $args->setHaveBniAcc($decoded['havebniacc']);
	                
	                $response = $this->client->registerForeign($args); //hit ws registerForeign

	                if($response){
		                $return = $response->getReturn();
		                $result=(array) $return;

		                if($return->getResponse() == '1'){
			            	$result['next-page'] = base_url('registration/thxforeign');
			            	$this->setSessionStep('thxforeign');
			            }
		            }
	            } else{
	            	$response = $this->sendOtp($decoded); //hit ws sendOtp

	                if($response){
		                $return = $response->getReturn();
		                $result=(array) $return;

		                if($return->getResponse() == '1'){
			            	$result['next-page'] = base_url('registration/otp');
			            	$this->setSessionStep('otp');
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
