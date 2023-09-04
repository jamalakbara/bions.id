<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/Baseregistration.php';

class Syaratketentuan extends Baseregistration {

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
				'progress' => 63,
				'config' => $config,
				'isi'	=>	'home/'.$config->template.'/registration/09-syaratketentuan'
			);
		$this->load->view('home/'.$config->template.'/layout/wrapper-plain-mobile',$data);
	}

	public function next(){
		$result = [];
		if(isset($_SESSION['step']) && $_SESSION['step'] == 'syaratketentuan'){
			
			try{
				if($this->input->server('REQUEST_METHOD') === 'POST' 
					&& $this->session->has_userdata('formid')){

					$tmp = str_replace('\"', '"', $this->input->post("vform"));
					$tmp = str_replace("\'", "'", $tmp);
		            $reqdata = json_decode($tmp, true);
		             
		      		
		            //TODO: pastiin data yang tidak bisa diedit ambil dari session, takut di edit oleh user
		            $reqdata = $this->keepDataOriginal($reqdata, 
		            	array("acctype","identitynum","fullname","birthplace","birthday","gender"
		            		,"addressstreet","addresshousing","addressvillage","addresssubdistrict"
		            		,"addresscity","addressprovince","religion","maritalstatus","occupationaltype"
		            		,"identityissuedplace","identityissueddate", "identityexpireddate", "identityexpireddate_lifetime"
		            		,"bankname","bankbeneficiaryaccount","bankbeneficiaryname", "occupationalhousing")
		            );

		            if ($_SESSION['sourceoa'] == 'B'){
			            $reqdata['fullname'] = $reqdata['fullname'] . "##" . $reqdata['npprmbni'];
			        }

			        if($reqdata['maritalstatus'] != 'M'){
		            	$reqdata['spousename'] = '';
		            }

		            if($reqdata['occupationaltype'] != 'OTHERS'){
		            	$reqdata['occupationaltypeother'] = '';
		            }

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

		            if($reqdata['occupationaltype'] == 'HOUSE WIFE'
		        		|| $reqdata['occupationaltype'] == 'STUDENT'
		        		|| $reqdata['occupationaltype'] == 'RETIREMENT'){
		            	$reqdata['occupationalworkingplace'] = '';
			            $reqdata['occupationalstreet'] = $reqdata['addresspstreet'];
			            $reqdata['occupationalvillage'] = $reqdata['addresspvillage'];
						$reqdata['occupationalsubdistrict'] = $reqdata['addresspsubdistrict'];
			            $reqdata['occupationalprovince'] = $reqdata['addresspprovince'];
			            $reqdata['occupationalcity'] = $reqdata['addresspcity'];
			            $reqdata['occupationalcountry'] = $reqdata['addresspcountry'];
			            $reqdata['occupationalpostalcode'] = $reqdata['addressppostalcode'];
			            $reqdata['occupationalphone'] = '';
		            } else if($reqdata['occupationalcountry'] != 'INA'){
		            	$reqdata['occupationalprovince'] = '1000';
		            	$reqdata['occupationalcity'] = '1000';
		            	$reqdata['occupationalvillage'] = 'FOREIGN';
		            	$reqdata['occupationalsubdistrict'] = 'FOREIGN';
		            	$reqdata['occupationalpostalcode'] = '99999';
		            }

		            //TODO: ganti jika lifetime true, expiredktp(identityexpireddate) jadi seumur hidup
		            if($reqdata['identityexpireddate_lifetime'] == true){
		            	$reqdata['identityexpireddate'] = '31-12-9998';
		            }

		            if ($reqdata['addressphonecountry'] == 'OTHERS') {
			            $reqdata['phone'] = $reqdata['addressphonecountry'] . '-' .
			                $reqdata['phone'];
			        } else {
			            $reqdata['phone'] = $reqdata['addressphonecountry'] . '-' .
			                $reqdata['addressphonearea'] . '-' .
			                $reqdata['phone'];
			        }

			        $reqdata['handphone'] = 'OTHERS' . $reqdata['handphone'];

		            //producttype pecahin
			        $reqdata['producttype'] = implode(',', $reqdata['producttype']);

			        $dateFields = [
			            'birthday', 'identityexpireddate', 'identityissueddate', 'taxidissueddate'
			        ];
			        $booleanFields = [
			            'otherinfoemployeeof', 'otherinfoprohibited','otherinfopoliticperson','otherinfohavegreencard',
			            'fatcaaddress','otherinfotaxoutsideindonesia', 'addresspsame'
			        ];

			        foreach ($reqdata as $field => $value) {
			        	if (in_array($field, $booleanFields)) {
			                $reqdata[$field] = intval($value);
			                continue;
			            }
			        }
		            

		            //TODO: hit to ws
		            $args = new Register();
		            $args->setRequest($this->prepareArgs($reqdata));

	                $response = $this->client->register($args);

	                if($response){
		                $return = $response->getReturn();
		                $result=(array) $return;

		                if($return->getResponse() == '1'){
			            	$result['next-page'] = base_url('registration/thankyou');
			            	$this->mergeSessionData(array("formno" => $return->getFormNo()));
			            	$this->setSessionStep('thankyou');
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

	private function keepDataOriginal($data, $fields){
		
		if(isset($_SESSION['data'])){
			foreach ($fields as $field) {
			 	$data[$field] =  $_SESSION['data'][$field]; 
			}
		}
		return $data;
	}

	private function prepareArgs($reqdata){
		$args = new RegisterEntityRequest();

		$args->setRegid($_SESSION['formid']);
		$args->setReferral($reqdata['referral']);
		$args->setInforeference($reqdata['reference']);
		$args->setHaveaccbni($reqdata['havebniacc']);
		$args->setAcctype($reqdata['acctype']);
		$args->setProducttype($reqdata['producttype']);
		$args->setOnlinetype($reqdata['onlinetype']);

		$bankrdi = '';
		if($reqdata['acctype'] == '70'){
			$bankrdi = 'BNI';
		} else if(trim($reqdata['referral']) == 'BIONSWEMUSD'){
			$bankrdi = 'BNI';
		} else if($reqdata['nationality'] == '01' && $reqdata['addresspcountry'] != 'INA' || 
				  $reqdata['nationality'] == '01' && $reqdata['occupationalcountry'] != 'INA'){
			$bankrdi = 'BNI';
		}else if($reqdata['acctype'] == '01' && $reqdata['bankname'] == 'BNI'){
			$bankrdi = 'BNI';
		} else {
			$bankrdi = 'PERMATA';
		}
		$args->setBankrdi($bankrdi);
		
		$args->setBranch($reqdata['branch']);
		$args->setFullname($reqdata['fullname']);
		$args->setGender($reqdata['gender']);
		$args->setBirthday($reqdata['birthday']);
		$args->setBirthplace($reqdata['birthplace']);
		$args->setMaritalstatus($reqdata['maritalstatus']);
		$args->setMothername($reqdata['mothername']);
		$args->setReligion($reqdata['religion']);
		$args->setInvestortype($reqdata['investortype']);
		$args->setNationality($reqdata['nationality']);
		$args->setIdentitytype($reqdata['identitytype']);
		$args->setIdentitynum($reqdata['identitynum']);
		$args->setIdentityexpireddate($reqdata['identityexpireddate']);
		$args->setIdentityissuedplace($reqdata['identityissuedplace']);
		$args->setIdentityissueddate($reqdata['identityissueddate']);
		$args->setTaxiddonthave('');
		$args->setTaxidnum($reqdata['taxidnum']);

		$args->setAddressstreet($reqdata['addressstreet']);
		$args->setAddresshousing($reqdata['addresshousing']);
		$args->setAddressvillage($reqdata['addressvillage']);
		$args->setAddresssubdistrict($reqdata['addresssubdistrict']);
		$args->setAddressprovince($reqdata['addressprovince']);
		$args->setAddresscity($reqdata['addresscity']);
		$args->setAddresscountry($reqdata['addresscountry']);
		$args->setAddresspostalcode($reqdata['addresspostalcode']);

		$args->setAddresspsame($reqdata['addresspsame']);

		$args->setAddresspstreet($reqdata['addresspstreet']);
		$args->setAddressphousing($reqdata['addressphousing']);
		$args->setAddresspvillage($reqdata['addresspvillage']);
		$args->setAddresspsubdistrict($reqdata['addresspsubdistrict']);
		$args->setAddresspprovince($reqdata['addresspprovince']);
		$args->setAddresspcity($reqdata['addresspcity']);
		$args->setAddresspcountry($reqdata['addresspcountry']);
		$args->setAddressppostalcode($reqdata['addressppostalcode']);

		$args->setAddressemail($reqdata['email']);
		$args->setHandphone($reqdata['handphone']);
		$args->setEducationalbg($reqdata['educationalbg']);
		$args->setEducationalbgother('');
		$args->setOccupationaltype($reqdata['occupationaltype']);
		$args->setOccupationaltypeother($reqdata['occupationaltypeother']);
		$args->setOccupationaljobposition($reqdata['occupationaljobposition']);
		$args->setOccupationalworkingplace($reqdata['occupationalworkingplace']);
		$args->setOccupationallinebusiness($reqdata['occupationallinebusiness']);

		$args->setOccupationalstreet($reqdata['occupationalstreet']);
		$args->setOccupationalhousing($reqdata['occupationalhousing']);
		$args->setOccupationalvillage($reqdata['occupationalvillage']);
		$args->setOccupationalsubdistrict($reqdata['occupationalsubdistrict']);
		$args->setOccupationalprovince($reqdata['occupationalprovince']);
		$args->setOccupationalcity($reqdata['occupationalcity']);
		$args->setOccupationalcountry($reqdata['occupationalcountry']);
		$args->setOccupationalpostalcode($reqdata['occupationalpostalcode']);
		$args->setOccupationalphone('');

		$args->setOccupationalsourceofincome($reqdata['occupationalsourceofincome']);
		$args->setOccupationalsourceofincomeother($reqdata['occupationalsourceofincomeother']);
		$args->setOccupationalmonthlyincome($reqdata['occupationalmonthlyincome']);
		$args->setOccupationalannualincome($reqdata['occupationalannualincome']);
		$args->setOccupationalnetworth('');
		$args->setOccupationalincomefrequency($reqdata['occupationalincomefrequency']);
		
		$args->setAssetownership($reqdata['assetownership']);

		$args->setPhone($reqdata['phone']);
		$args->setSource($_SESSION['sourceoa']);
		$args->setSpousefullname($reqdata['spousename']);

		$args->setBankbeneficiaryaccount($reqdata['bankbeneficiaryaccount']);
		$args->setBankbeneficiaryname($reqdata['bankbeneficiaryname']);
		$args->setBankname($reqdata['bankname']);
		$args->setCorrespondencetype($reqdata['correspondencetype']);
		$args->setInvestmentobjectives($reqdata['investmentobjectives']);
		$args->setInvestmentobjectivesother('');
		
		$args->setOtherinfoemployeeof($reqdata['otherinfoemployeeof']);
		$args->setOtherinfoemployeeofcompany($reqdata['otherinfoemployeeofcompany']);
		$args->setOtherinfoemployeeofname($reqdata['otherinfoemployeeofname']);
		$args->setOtherinfohavegreencard($reqdata['otherinfohavegreencard']);
		$args->setOtherinfopoliticperson($reqdata['otherinfopoliticperson']);
		$args->setOtherinfoprohibited($reqdata['otherinfoprohibited']);
		$args->setOtherinfoprohibitedcompany($reqdata['otherinfoprohibitedcompany']);
		$args->setOtherinfoprohibitedname($reqdata['otherinfoprohibitedname']);
		$args->setFatcaaddress($reqdata['fatcaaddress']);
		$args->setOtherinfotaxoutsideindonesia($reqdata['otherinfotaxoutsideindonesia']);

		$args->setRiskprofileagreeincome($reqdata['riskprofileagreeincome']);
		$args->setRiskprofileknowledge($reqdata['riskprofileknowledge']);
		$args->setRiskprofilelonginvest($reqdata['riskprofilelonginvest']);
		$args->setRiskprofileloss($reqdata['riskprofileloss']);
		$args->setRiskprofilepurpose($reqdata['riskprofilepurpose']);
		$args->setRiskprofiletotalscore($reqdata['riskprofiletotalscore']);

		$args->setAttachmentidcard(isset($reqdata['idcardphoto']) ? explode(',', $reqdata['idcardphoto'])[1] : '');
		$args->setAttachmentphotowithidcard(isset($reqdata['selfiektp']) ? explode(',', $reqdata['selfiektp'])[1] : (isset($reqdata['selfiebiometric']) ? explode(',', $reqdata['selfiebiometric'])[1] : ''));
		$args->setAttachmentsignature(isset($reqdata['signature']) ? explode(',', $reqdata['signature'])[1] : '');
		

		return $args;
	}
}
