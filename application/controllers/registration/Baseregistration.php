<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set("soap.wsdl_cache_enabled", "0");
require __DIR__ . '/../../libraries/Bni/OnlineRegistrationV2Service/autoload.php';
class Baseregistration extends CI_Controller {

    protected $client;
    public function __construct()
    {
         parent::__construct();

		 $this->load->model('pages_model');
		 $this->load->model('config_model');
		 $this->load->model('user_model');

		 $this->load->library('session');
         $this->load->library('user_agent');

		 // $this->load->library(
   //          array(
   //          'Bni/OnlineRegistrationV2Service/OnlineRegistrationV2Service',
   //          'Bni/OnlineRegistrationV2Service/RegisterForeign',
   //          'Bni/OnlineRegistrationV2Service/RegisterForeignResponse',
   //          'Bni/OnlineRegistrationV2Service/SendOTp',
   //          'Bni/OnlineRegistrationV2Service/SendOtpResponse',
   //          'Bni/OnlineRegistrationV2Service/ValidateOtp',
   //          'Bni/OnlineRegistrationV2Service/ValidateOtpResponse',
   //          'Bni/OnlineRegistrationV2Service/ConvertKtp',
   //          'Bni/OnlineRegistrationV2Service/ConvertKtpResponse',
   //          'Bni/OnlineRegistrationV2Service/VerijelasOcrResponse',
   //          'Bni/OnlineRegistrationV2Service/VerijelasOcrResponse_Data',
   //      ));

		$this->client = new OnlineRegistrationV2Service();
    }

    public function lookup()
    {
        $result = [];
        $type = $this->input->get("type");

        // dummy lookup code for development
        switch ($type) {
            case 3:
                $country = $this->input->get('params')[0];
                if(isset($country)){
                    if($country != 'INA'){
                        $result = [
                            '1000' => 'FOREIGN'
                        ];
                        break;
                    };
                };

                $provinces = Lookups::provinces();
                $result = $provinces;
            break;
            case 4:
                $country = $this->input->get('params')[0];
                $province = $this->input->get('params')[1];

                if($country != 'INA'){
                    $result = [
                        '1000' => 'FOREIGN'
                    ];
                    break;
                };
                
                $cities = Lookups::cities($province);
                $result = $cities;
            break;
            case 6: 
                $postcodes = Lookups::postcodes();
                $result = $postcodes;
            break;
            case 8:
                $ctpId = $this->input->get('params')[0];
                $phoneArea = Lookups::phoneArea($ctpId);
                $result = $phoneArea;
            break;
            case 21:
                $country = $this->input->get('params')[0];
                $provid = $this->input->get('params')[1];
                $cityid = $this->input->get('params')[2];

                if(isset($country)){
                    if($country != 'INA'){
                        $result = [
                            '1000' => 'FOREIGN'
                        ];
                        break;
                    };
                };

                if($provid && $cityid){
                    $districts = Lookups::districts([$provid, $cityid]);

                    if($districts) $result = $districts;
                }
            break;
            case 22:
                $country = $this->input->get('params')[0];
                $provid = $this->input->get('params')[1];
                $cityid = $this->input->get('params')[2];
                $subdistrict = $this->input->get('params')[3];

                if(isset($country)){
                    if($country != 'INA'){
                        $result = [
                            '1000' => 'FOREIGN'
                        ];
                        break;
                    };
                };
                
                if($provid && $cityid && $subdistrict){
                    $villages = Lookups::villages([$provid, $cityid, $subdistrict]);

                    if($villages) $result = $villages;
                }
            break;
            case 23:
                $country = $this->input->get('params')[0];
                $provid = $this->input->get('params')[1];
                $cityid = $this->input->get('params')[2];
                $subdistrict = $this->input->get('params')[3];
                $village = $this->input->get('params')[4];

                if(isset($country)){
                    if($country != 'INA'){
                        $result = [
                            '99999' => 'FOREIGN'
                        ];
                        break;
                    };
                };
                
                if($provid && $cityid && $subdistrict && $village){
                    $postcodes = Lookups::postcodes2([$provid, $cityid, $subdistrict, $village]);

                    if($postcodes) $result = $postcodes;
                }
            break;
            case 24:
                $country = $this->input->get('params')[0];
                $input = $this->input->get('params')[1];
                
                if(isset($country)){
                    if($country != 'INA'){
                        $result = [
                            ["99999","99999 - FOREIGN","FOREIGN","FOREIGN","1000","1000"]
                        ];
                        break;
                    };
                };

                if($input){
                    $input = '%' . strtoupper($input) . '%';
                    $postcodes = Lookups::postcodes3([$input, $input, $input, $input, $input]);

                    if($postcodes) $result = $postcodes;
                }
            break;
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_output(str_replace('\u0000*\u0000','',json_encode($result)));
    }

    public function lookupPostcode()
    {
        $result = [];
        $type = $this->input->get("type");

        switch ($type) {
            case 6:
            default:
                $postcodes = Lookups::postcodes();
                $params = $this->input->get('params');
                $country = $params[0];
                $province = isset($params[1]) ? $params[1] : null;

                $result = $this->filterPostcodes(
                    $province, $country, $postcodes
                );

            break;
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_output(str_replace('\u0000*\u0000','',json_encode($result)));
    }

    //API
    protected function sendOtp($decoded){
		$args = new SendOtp();
	    	$args->setSourceoa($_SESSION['sourceoa']);
	    	$args->setRegid($_SESSION['formid']);
	    	$args->setFullname($decoded['fullname']);
	    	$args->setEmail($decoded['email']);
	    	$args->setHandphone($decoded['handphone']);

	    	return $response = $this->client->sendOtp($args); //hit ws sendOtp
	}


    protected function validateOnlyMobile(){
        if(!$this->agent->is_mobile()){
            redirect(base_url('registration/pra'));
        }
    }
	//session
    protected function validatesession(){
		if(!($this->session->has_userdata('formid') 
			&& $this->session->has_userdata('sourceoa')
			&& $this->session->has_userdata('data')
			&& $this->session->has_userdata('step')))
		{
			redirect(base_url('registration/pra'));
		} else{

			if($_SESSION['step'] != $this->uri->segment(2)){
				redirect(base_url('registration/' . $_SESSION['step']));
			}
		}
	}

	protected function dumpsession(){
		print_r($this->session->all_userdata());
	}
	protected function clearsession(){
		$this->session->unset_userdata(array('formid', 'data'));
	}

	protected function addsession(){
		
	}

	protected function mergeSessionData($newdata){
		$sessiondata = $_SESSION['data'];
		$decoded = array_merge($sessiondata, $newdata);	
		$this->session->set_userdata('data', $decoded);
	}

	protected function setSessionStep($step){
		$this->session->set_userdata('step', $step);
	}

	protected function filterPostcodes($province, $country, $postcodes)
    {
        $result = [];

        foreach ($postcodes as $postcode => $desc) {
            if ($country == 'INA') {
                if ($postcode == '00000' || $postcode == '99999') {
                    continue;
                }
                
                switch ($province) {
                    case 1: // BALI
                        if ($postcode >= 80000 && $postcode < 83000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 2: // BANTEN
                        if (
                            ($postcode >= 15000 && $postcode < 16000) ||
                            ($postcode >= 42000 && $postcode < 43000)
                        ) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 3: // BENGKULU
                        if ($postcode >= 38000 && $postcode < 40000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 4: // DI JOGJAKARTA
                        if ($postcode >= 55000 && $postcode < 56000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 5: // DKI. JAKARTA
                        if ($postcode >= 10000 && $postcode < 15000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 6: // GORONTALO
                        if ($postcode >= 96000 && $postcode < 97000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 7: // JAMBI
                        if ($postcode >= 36000 && $postcode < 38000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 8: // JAWA BARAT
                        if (
                            ($postcode >= 16000 && $postcode < 18000) ||
                            ($postcode >= 40000 && $postcode < 47000)
                        ) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 9: // JAWA TENGAH
                        if ($postcode >= 50000 && $postcode < 60000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 10: // JAWA TIMUR
                        if ($postcode >= 60000 && $postcode < 70000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 11: // KALIMANTAN BARAT
                        if ($postcode >= 78000 && $postcode < 80000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 12: // KALIMANTAN SELATAN
                        if ($postcode >= 70000 && $postcode < 73000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 13: // KALIMANTAN TENGAH
                        if ($postcode >= 73000 && $postcode < 75000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 14: // KALIMANTAN TIMUR
                        if ($postcode >= 75000 && $postcode < 78000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 34: // KALIMANTAN UTARA
                        if ($postcode >= 77000 && $postcode < 78000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 15: // BABEL
                        if ($postcode >= 33000 && $postcode < 34000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 16: // KEPULAUAN RIAU
                        if ($postcode >= 29000 && $postcode < 30000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 17: // LAMPUNG
                        if ($postcode >= 34000 && $postcode < 36000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 18: // MALUKU
                    case 19: // MALUKU UTARA
                        if ($postcode >= 97000 && $postcode < 98000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 20: // ACEH
                        if ($postcode >= 23000 && $postcode < 25000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 21: // NTB
                        if ($postcode >= 83000 && $postcode < 85000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 22: // NTT
                        if ($postcode >= 85000 && $postcode < 87000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 23: // PAPUA
                        if ($postcode >= 98000 && $postcode < 100000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 24: // PAPUA BARAT
                        if ($postcode >= 98000 && $postcode < 99000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 25: // RIAU
                        if ($postcode >= 28000 && $postcode < 30000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 26: // SULAWESI BARAT
                        if ($postcode >= 91000 && $postcode < 97000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 27: // SULAWESI SELATAN
                        if ($postcode >= 90000 && $postcode < 93000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 28: // SULAWESI TENGAH
                        if ($postcode >= 94000 && $postcode < 95000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 29: // SULAWESI TENGGARA
                        if ($postcode >= 93000 && $postcode < 94000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 30: // SULAWESI UTARA
                        if ($postcode >= 95000 && $postcode < 96000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 31: // SUMATERA BARAT
                        if ($postcode >= 25000 && $postcode < 28000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 32: // SUMATERA SELATAN
                        if ($postcode >= 30000 && $postcode < 33000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                    case 33: // SUMATERA UTARA
                        if ($postcode >= 20000 && $postcode < 23000) {
                            $result[$postcode] = $desc;
                        }
                    break;

                }

            } else {
                if ($postcode == '99999') {
                    $result[$postcode] = $desc;
                }
            }
        }

        return $result;
    }
}
