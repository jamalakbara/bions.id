<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require __DIR__ . '/Baseregistration.php';

class Ocr extends Baseregistration {

    public function __construct()
    {
         parent::__construct(array('trace' => 1));

    }

	public function index()
	{
		$this->validatesession();
		$config = $this->config_model->detail(1);
		
		$data = array(	'title'	=>	$config->site_title,
				'meta'	=>	$config->site_meta,
				'desc'	=>	$config->site_desc,
				'config' => $config,
				'progress' => 30,
				'isi'	=>	'home/'.$config->template.'/registration/04-ocr');
		$this->load->view('home/'.$config->template.'//layout/wrapper-plain-mobile',$data);
	}

	public function next(){
		$result = [];
		if(isset($_SESSION['step']) && $_SESSION['step'] == 'ocr'){
			try{
				if($this->input->server('REQUEST_METHOD') === 'POST' 
					&& $this->session->has_userdata('formid')){

					$idcardphoto = $this->input->post("idcardphoto");
		            $decoded = $_SESSION['data'];
		        	
		            // $uploaddir = APPPATH . '../uploads/';
		            // $filename = $uploaddir. $_SESSION['formid'] . '-ktp.jpg';
		            // file_put_contents($filename , file_get_contents($idcardphoto));

		            $this->mergeSessionData(array("idcardphoto" => $idcardphoto));

		            //hit ws ocr
		            $args = new ConvertKtp(
		            	$_SESSION['formid'],
		            	$decoded['acctype'],
		            	$decoded['branch'],
		            	explode(',', $idcardphoto)[1]
		            );
	                
	                $response = $this->client->convertKtp($args); 

	                if($response){
		                $return = $response->getReturn();

		                //return verijelas
		                if($return->getData()){
		                	if($return->getData()->getData()){
		                		$ocrData = $this->convertOcrData($return->getData()->getData());
		                		$this->mergeSessionData($ocrData);
		                	}
		                }

		                if($return->getResponse() == '1'){
			            	$result['response'] = '1';
			            	$result['next-page'] = base_url('registration/ocrreview');
			            	$this->setSessionStep('ocrreview');
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

	private function convertOcrData($data){
		$splitOccupation = explode('#', $data->getPekerjaan());
		$occupation = '';
		$occupationOther = '';
		if(count($splitOccupation) == 2){
			$occupation = $splitOccupation[0];
			$occupationOther = $splitOccupation[1];
		} else{
			$occupation = $splitOccupation[0];
		}

		$rData = array(
			
			"religion" => $data->getAgama(),
			"addressstreet" => $data->getAlamat(),
			"gender" => $data->getJenisKelamin(),
			"addresssubdistrict" => $data->getKecamatan(),
			"addressvillage" => $data->getKelurahanDesa(),
			"addresscity" => $data->getKota(),
			"fullname" => $data->getNama(),
			"identitynum" => $data->getNik(),
			"occupationaltype" => $occupation,
			"occupationaltypeother" => $occupationOther,
			"addressprovince" => $data->getProvinsi(),
			"addresshousing" => $data->getRtRw(),
			"maritalstatus" => $data->getStatusPerkawinan(),
			"birthday" => $data->getTanggalLahir(),
			"birthplace" => $data->getTempatLahir()

		);

		return $rData;
	}
}
