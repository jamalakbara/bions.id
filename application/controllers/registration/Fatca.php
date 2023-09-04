<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/Baseregistration.php';

class Fatca extends Baseregistration {

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
				'progress' => 60,
				'config' => $config,
				'isi'	=>	'home/'.$config->template.'/registration/09-fatca'
			);
		$this->load->view('home/'.$config->template.'/layout/wrapper-plain-mobile',$data);
	}

	public function next(){
		$result = [];
		if(isset($_SESSION['step']) && $_SESSION['step'] == 'fatca'){
			
			try{
				if($this->input->server('REQUEST_METHOD') === 'POST' 
					&& $this->session->has_userdata('formid')){

					$tmp = str_replace('\"', '"', $this->input->post("vform"));
					$tmp = str_replace("\'", "'", $tmp);
		            $reqdata = json_decode($tmp, true);
		             
		            $reqdata['otherinfoemployeeof'] = !$reqdata['otherinfoemployeeof'];
		            $reqdata['otherinfoprohibited'] = !$reqdata['otherinfoprohibited'];
		            $reqdata['otherinfopoliticperson'] = !$reqdata['otherinfopoliticperson'];
		            $reqdata['otherinfohavegreencard'] = !$reqdata['otherinfohavegreencard'];
		            
		            if($reqdata['otherinfohavegreencard'] == true){
		            	$reqdata['fatcaaddress'] = false;
		            } else{
		            	$reqdata['fatcaaddress'] = !$reqdata['fatcaaddress'];	
		            }
		            
		            $reqdata['otherinfotaxoutsideindonesia'] = !$reqdata['otherinfotaxoutsideindonesia'];
		      		
		      		if($reqdata['otherinfoemployeeof'] == false){
		      			$reqdata['otherinfoemployeeofname'] = '';
		      			$reqdata['otherinfoemployeeofcompany'] = '';
		      		}

					if($reqdata['otherinfoprohibited'] == false){
						$reqdata['otherinfoprohibitedname'] = '';
		      			$reqdata['otherinfoprohibitedcompany'] = '';
		      		}

		      		if($reqdata['assetownership'] == true){
		      			$reqdata['assetownership'] = 'S';
		      		} else{
		      			$reqdata['assetownership'] = 'P';
		      		}

		      		//check ekyc bni atau bukan
		      		$result['response'] = '1';
		      		if($reqdata['acctype'] == '70'){
						$result['next-page'] = base_url('registration/attachmentguide');
		      			$this->setSessionStep('attachmentguide');
		      		} else if(trim($reqdata['referral']) == 'BIONSWEMUSD'){
						$result['next-page'] = base_url('registration/attachmentguide');
						$this->setSessionStep('attachmentguide');
					} else if($reqdata['acctype'] == '01' && $reqdata['bankname'] == 'BNI'){
		      			$result['next-page'] = base_url('registration/attachmentguide');
		      			$this->setSessionStep('attachmentguide');
		      		} else if($reqdata['nationality'] == '01' && $reqdata['addresspcountry'] != 'INA'){
						$result['next-page'] = base_url('registration/attachmentguide');
						$this->setSessionStep('attachmentguide');
					} else if ($reqdata['occupationaltype'] === 'EMPLOYEE' ||  $reqdata['occupationaltype'] === 'CIVIL SERVANT' || $reqdata['occupationaltype'] === 'SELF EMPLOYED' || 
								$reqdata['occupationaltype'] === 'TNI-POLICE' || $reqdata['occupationaltype'] === 'TEACHER' || $reqdata['occupationaltype'] === 'OTHERS') {
						if (($reqdata['nationality'] == '01' && $reqdata['occupationalcountry'] != 'INA')){
							$result['next-page'] = base_url('registration/attachmentguide');
							$this->setSessionStep('attachmentguide');
						} else if (($reqdata['nationality'] == '01' && $reqdata['bankname'] != 'BNI')) {
							$result['next-page'] = base_url('registration/biometricguide');
		      				$this->setSessionStep('biometricguide');
						} 
					} else{
		      			$result['next-page'] = base_url('registration/biometricguide');
		      			$this->setSessionStep('biometricguide');
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
