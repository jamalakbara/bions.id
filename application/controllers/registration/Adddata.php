<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/Baseregistration.php';

class Adddata extends Baseregistration {

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
				'progress' => 42,
				'config' => $config,
				'isi'	=>	'home/'.$config->template.'/registration/06-add-data'
			);

		$this->load->view('home/'.$config->template.'/layout/wrapper-plain-mobile',$data);
	}

	public function next(){
		$result = [];
		if(isset($_SESSION['step']) && $_SESSION['step'] == 'adddata'){
			
			try{
				if($this->input->server('REQUEST_METHOD') === 'POST' 
					&& $this->session->has_userdata('formid')){

					$tmp = str_replace('\"', '"', $this->input->post("vform"));
					$tmp = str_replace("\'", "'", $tmp);
		            $reqdata = json_decode($tmp, true);
		            

		            if($reqdata['addresspsame'] == true){
		            	$reqdata['addresspstreet'] = $reqdata['addressstreet'];
		            	$reqdata['addressphousing'] = $reqdata['addresshousing'];
		            	$reqdata['addresspvillage'] = $reqdata['addressvillage'];
		            	$reqdata['addresspsubdistrict'] = $reqdata['addresssubdistrict'];
		            	$reqdata['addresspcity'] = $reqdata['addresscity'];
		            	$reqdata['addresspcountry'] = $reqdata['addresscountry'];
		            	$reqdata['addresspprovince'] = $reqdata['addressprovince'];
		            	$reqdata['addressppostalcode'] = $reqdata['addresspostalcode'];
		            }

		            if($reqdata['addresspcountry'] != 'INA'){
		            	$reqdata['addresspprovince'] = '1000';
		            	$reqdata['addresspcity'] = '1000';
		            	$reqdata['addresspvillage'] = 'FOREIGN';
		            	$reqdata['addresspsubdistrict'] = 'FOREIGN';
		            	$reqdata['addressppostalcode'] = '99999';
		            }

		            if($reqdata['occupationalcountry'] != 'INA'){
		            	$reqdata['occupationalprovince'] = '1000';
		            	$reqdata['occupationalcity'] = '1000';
		            	$reqdata['occupationalvillage'] = 'FOREIGN';
		            	$reqdata['occupationalsubdistrict'] = 'FOREIGN';
		            	$reqdata['occupationalpostalcode'] = '99999';
		            }

		            if(!($reqdata['occupationaltype'] == 'CIVIL SERVANT' 
		        		|| $reqdata['occupationaltype'] == 'TNI-POLICE')){
		            	$reqdata['occupationaljobposition'] = '';
		            }

		            if($reqdata['occupationaltype'] == 'RETIREMENT'){
		            	$reqdata['occupationaljobposition'] = $reqdata['occupationaltype'];
		            }

		            if($reqdata['occupationaltype'] != 'SELF EMPLOYED'){
		            	$reqdata['occupationallinebusiness'] = '';
		            }

		            if($reqdata['occupationaltype'] == 'HOUSE WIFE'
		        		|| $reqdata['occupationaltype'] == 'STUDENT'
		        		|| $reqdata['occupationaltype'] == 'RETIREMENT'){
		            	$reqdata['occupationalworkingplace'] = '';
			            $reqdata['occupationalstreet'] = '';
			            $reqdata['occupationalprovince'] = '';
			            $reqdata['occupationalcity'] = '';
			            $reqdata['occupationalcountry'] = '';
			            $reqdata['occupationalphone'] = '';
		            }

		            $result['response'] = '1';
		            $result['next-page'] = base_url('registration/income');
				    
				    $this->mergeSessionData($reqdata);
				    $this->setSessionStep('income');
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
