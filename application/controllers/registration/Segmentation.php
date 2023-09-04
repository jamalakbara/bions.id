<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/Baseregistration.php';

class Segmentation extends Baseregistration {

    public function __construct()
    {
         parent::__construct();

    }

	public function index()
	{
		if(isset($_SESSION['step']) && $_SESSION['step'] == 'otpsuccess'){
			$this->setSessionStep('segmentation');
		}

		$this->validatesession();
		$config = $this->config_model->detail(1);
		
		$data = array(	'title'	=>	$config->site_title,
				'meta'	=>	$config->site_meta,
				'desc'	=>	$config->site_desc,
				'config' => $config,
				'progress' => 24,
				'isi'	=>	'home/'.$config->template.'/registration/03-segmentation'
			);

		$this->load->view('home/'.$config->template.'//layout/wrapper-plain-mobile',$data);
	}

	public function next(){
		$result = [];
		if(isset($_SESSION['step']) && $_SESSION['step'] == 'segmentation'){
			
			try{
				if($this->input->server('REQUEST_METHOD') === 'POST' 
					&& $this->session->has_userdata('formid')){

					$tmp = str_replace('\"', '"', $this->input->post("vform"));
					$tmp = str_replace("\'", "'", $tmp);
		            $reqdata = json_decode($tmp, true);
		            
		            //set branch to olt when fullonline
		            if($reqdata['onlinetype'] == 'F'){
		            	$reqdata['branch'] = '1905';
		            }

		            //TODO : CHECK UDAH DAFTAR DI HARI TERSEBUT BY EMAIL, NO HP dan ACCTYPE
	            	$args = new CheckAlreadyRegistration();
		            $args->setRegid($_SESSION['formid']);
		            $args->setEmail($_SESSION['data']['email']);
		            $args->setHandphone($_SESSION['data']['handphone']);
		            $args->setAccType($reqdata['acctype']);

	                $response = $this->client->checkAlreadyRegistration($args); 
	                if($response){
		                $return = $response->getReturn();

		                $result['response'] = $return->getResponse();
		                $result['description'] = $return->getDescription();
		                if($return->getResponse() == '1'){
			            	$result['next-page'] = base_url('registration/ocr');
			            	$this->setSessionStep('ocr');
			            }
		            }

				    $this->mergeSessionData($reqdata);				    
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
