<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/Baseregistration.php';

class Biometric extends Baseregistration {

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
				'progress' => 72,
				'isi'	=>	'home/'.$config->template.'/registration/11-biometric');
		$this->load->view('home/'.$config->template.'/layout/wrapper-plain-mobile',$data);
	}

	public function next(){
		$result = [];
		if(isset($_SESSION['step']) && $_SESSION['step'] == 'biometric'){
			try{
				if($this->input->server('REQUEST_METHOD') === 'POST' 
					&& $this->session->has_userdata('formid')){

					$selfiebiometric = $this->input->post("selfiebiometric");
		            $decoded = $_SESSION['data'];
		        	
		            // $uploaddir = APPPATH . '../uploads/';
		            // $filename = $uploaddir. $_SESSION['formid'] . '-selfiebiometric.jpg';
		            // file_put_contents($filename , file_get_contents($selfiebiometric));

		            $this->mergeSessionData(array("selfiebiometric" => $selfiebiometric));
		            
		            //hit ws biometric
		            $args = new Biometrics();
		            $args->setRegid($_SESSION['formid']);
		            $args->setAccType($decoded['acctype']);
		            $args->setBranch($decoded['branch']);
		            $args->setIdentityNo($decoded['identitynum']);
		            $args->setName($decoded['fullname']);
		            $args->setBirthdate($decoded['birthday']);
		            $args->setBirthplace($decoded['birthplace']);
		            $args->setPhotoBase64(explode(',', $selfiebiometric)[1]);

	                $response = $this->client->biometric($args); 
	                if($response){
		                $return = $response->getReturn();

		                $result['response'] = $return->getResponse();
		                $result['description'] = $return->getDescription();
		                if($return->getResponse() == '1'){
			            	$result['next-page'] = base_url('registration/biometricsuccess');
			            	$this->setSessionStep('biometricsuccess');
			            } else if($return->getResponse() == '0'){
			            	$result['next-page'] = base_url('registration/biometricfailed');
			            	$this->setSessionStep('biometricfailed');
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
		}

		return $this->output
            ->set_content_type('application/json')
            ->set_output(str_replace('\u0000*\u0000','',json_encode($result)));
	}
}
