<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public $emailHost	="putrajumawa@gmail.com";
	public $passHost 	="putra1973";
	public $smptHost 	="smtp.gmail.com";
	public $smtpPort 	=465;

	public function __construct()
    {
         parent::__construct();
		 $this->load->library('Pdf');
		 $this->load->model('tabel_model');
		 $this->load->model('botmenu_model');
		 $this->load->model('event_model');
		 $this->load->model('registrasi_model');
		 $this->load->model('trialregistrasi_model');
		 $this->load->model('otp_model');
		 $this->load->model('country_model');
		 $this->load->model('menu_model');
		 $this->load->model('botmenu_model');
		 $this->load->model('config_model');
		 $this->load->model('bions_model');
		 $this->load->model('user_model');
		 $this->load->model('categories_model');
         $this->load->model('user_model');
         $this->load->model('city_model');
         $this->load->model('province_model');
		 $this->load->model('categories_model');

		 $this->load->helper('recaptcha');
    }

	public function index()
	{
	}

	public function runquery()
	{
// Set line to collect lines that wrap
$templine = '';

// Read in entire file
$lines = file(APPPATH.'my_file.sql');

// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
continue;

// Add this line to the current templine we are creating
$templine .= $line;

// If it has a semicolon at the end, it's the end of the query so can process this templine
if (substr(trim($line), -1, 1) == ';')
{
// Perform the query
$this->db->query($templine);

// Reset temp variable to empty
$templine = '';
}
}
	}

	public function changepass()
	{
				$data = array(	'id' => '62',
								'password'	=> md5()
				);

				$this->user_model->edit($data);
	}

	public function altertable()
	{
				$this->db->query("ALTER TABLE `st_registrasi` ADD `ktp_negara` VARCHAR(3) NULL AFTER `ktp_kodepos`");
				$this->db->query("ALTER TABLE `st_registrasi` ADD `terkini_negara` VARCHAR(3) NULL AFTER `terkini_kodepos`");
	}

	public function setbotid()
	{
		$nama = $this->input->post('name');
		$email = $this->input->post('email');
		$handphone = $this->input->post('handphone');
		$sessid = $this->input->post('sessid');
		$tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
		$tnow = date("Y-m-d H:i:s", $tday);
		$jnow = date("H:i:s", $tday);
		if(isset($nama)) {
			$data = array(
			'nama'		=>  $nama,
			'email'		=>  $email,
			'handphone'		=>  $handphone,
			'botid'		=>  $sessid,
			'added_on'		=>  $tnow
			);
			$this->tabel_model->add('messagemaster',$data);
	
			$data_session = array(
			'botid' => $sessid,
			'botjam' => $tnow,
			'botname' => $nama,
			'botemail' => $email,
			'bothandphone' => $handphone,
			'botstatus' => "login"
			);

			$this->session->set_userdata($data_session);

			$html = '';
//			echo $html;
		}

	}

	public function login()
	{
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url().'user/login',
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url().'assets/home/images/logo.png',
						'author'	=>	'bions',
						'config'	=>	$config,
						'isi'	=>	'home/'.$config->template.'/user/login');
		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
	}

	public function logout()
	{
			$datalogin = array(
				'id'		=>  $this->session->userdata('userid'),
				'online'		=>  '0'
			);
			$this->user_model->edit($datalogin);

		$user_data = $this->session->userdata();
		foreach ($user_data as $key => $value) {
			if ($key!='__ci_last_regenerate' && $key != '__ci_vars') $this->session->unset_userdata($key);
		}		
		//$this->session->sess_destroy();
		$this->session->set_flashdata('login_error','You have been logout');
		redirect(base_url('user/login'), 'refresh');
	}

	public function loginaction()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
					'username' => $username,
					'password' => md5($password)
				);
//		$cek = $this->user_model->cek_login("users",$where)->num_rows();
		$cek = $this->user_model->cek_login("users",$where);
//		echo $cek->username;
//		echo $this->db->last_query(); die;
//exit();
//		if($cek > 0){ 
		if($cek){ 
//		$user = $this->user_model->detail("users",$where)->num_rows();
		$data_session = array(
			'userid' => $cek->id,
			'username' => $username,
			'fullname' => $cek->fullname,
			'email' => $cek->email,
			'usertype' => $cek->usertype,
			'address' => $cek->address,
			'cityid' => $cek->address,
			'city' => $cek->address,
			'stateid' => $cek->address,
			'state' => $cek->address,
			'country' => $cek->address,
			'postalcode' => $cek->address,
			'handphone' => $cek->address,
			'status' => "login"
			);
 
 			$datalogin = array(
				'id'		=>  $cek->id,
				'online'		=>  '1'
			);
			$this->user_model->edit($datalogin);

			$this->session->set_userdata($data_session);
 			redirect(base_url());
		}else{
//			echo "Username dan password salah !";
//			$data = array(	'title'	=>	'Login Error',
//							'isi'	=>	'user/login');
//			$this->load->view('home/layout/wrapper',$data);
			$this->session->set_flashdata('login_error','Wrong username and password');
			redirect(base_url('user/login'));
		}

	}

	public function ceklogin()
	{
		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata('login_error','You must login to use this feature');
			redirect(base_url('user/login'));
		}
	}

	public function getkota2()
	{
//		$provinsi_id = $this->input->post('prov_id');
//		$kota = $this->city_model->listing($provinsi_id);
//		return $kota;
//$data = json_decode($response, true);
//for ($i=0; $i < count($kota['rajaongkir']['results']); $i++) { 
//    echo "<option value='".$kota['rajaongkir']['results'][$i]['city_id']."'>".$kota['rajaongkir']['results'][$i]['city_name']."</option>";
//}

		$id = $this->input->post('prov_id');
		$response = $this->tabel_model->listdata('st_master_city','PROVID',$id);
        $htmlvalue='';
        foreach($response as $valCat) { 
		$htmlvalue .= "<option value='".$valCat->CITYID."'>".strtoupper($valCat->CITYNAME)." </option>";
		}
		$callback = array('data_kota'=>$htmlvalue); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota
		echo json_encode($callback);

	}

	public function getkodearea()
	{
//		$provinsi_id = $this->input->post('prov_id');
//		$kota = $this->city_model->listing($provinsi_id);
//		return $kota;
//$data = json_decode($response, true);
//for ($i=0; $i < count($kota['rajaongkir']['results']); $i++) { 
//    echo "<option value='".$kota['rajaongkir']['results'][$i]['city_id']."'>".$kota['rajaongkir']['results'][$i]['city_name']."</option>";
//}

		$id = $this->input->post('cty_id');
		$id = str_replace(' ','+',$id);
		$response = $this->tabel_model->listwhere('st_master_telp_area','CTP_ID LIKE "'.$id.'"');
//		$response = $this->city_model->listing($id);
        $htmlvalue='';
        foreach($response as $valCat) { 
		$htmlvalue .= "<option value='".$valCat->ATP_ID."'>".strtoupper($valCat->ATP_ID)." ( ".strtoupper($valCat->ATP_NAME)." )</option>";
		}
		$callback = array('data_kota'=>$htmlvalue); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota
//		echo $this->db->last_query(); die;
		echo json_encode($callback);

	}

	public function getkodenegara()
	{
		$id = $this->input->post('cty_id');
		$response1 = $this->tabel_model->detailwhere('st_master_country','CTY_ID LIKE "'.$id.'"');
		$response2 = $this->tabel_model->detailwhere('st_master_telp_country','CTP_NAME LIKE "'.$response1->CTY_NAME.'"');
		if($response2) {
			$datakode = $response2->CTP_ID;
		} else {
			$datakode = '';
		}
//        $htmlvalue='';
//        foreach($response as $valCat) { 
//		$htmlvalue .= $valCat->CTY_NAME;
//		}
		$callback = array('data_kota'=>$datakode); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota
//		echo $this->db->last_query(); die;
		echo json_encode($callback);

	}

	public function getkota()
	{
//		$provinsi_id = $this->input->post('prov_id');
//		$kota = $this->city_model->listing($provinsi_id);
//		return $kota;
//$data = json_decode($response, true);
//for ($i=0; $i < count($kota['rajaongkir']['results']); $i++) { 
//    echo "<option value='".$kota['rajaongkir']['results'][$i]['city_id']."'>".$kota['rajaongkir']['results'][$i]['city_name']."</option>";
//}

		$id = $this->input->post('prov_id');
		$response = $this->city_model->listing($id);
        $htmlvalue='';
        foreach($response as $valCat) { 
		$htmlvalue .= "<option value='".$valCat->cityid."'>".strtoupper($valCat->city)." ( ".strtoupper($valCat->type)." )</option>";
		}
		$callback = array('data_kota'=>$htmlvalue); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota
		echo json_encode($callback);

	}

	public function getkodepos()
	{
//		$provinsi_id = $this->input->post('prov_id');
//		$kota = $this->city_model->listing($provinsi_id);
//		return $kota;
//$data = json_decode($response, true);
//for ($i=0; $i < count($kota['rajaongkir']['results']); $i++) { 
//    echo "<option value='".$kota['rajaongkir']['results'][$i]['city_id']."'>".$kota['rajaongkir']['results'][$i]['city_name']."</option>";
//}

		$id = $this->input->post('prov_id');

switch ($id) {
  case "1":
			$range1 = '80111'; // bali
			$range2 = '82262';
			break;
  case "2":
			$range1 = '15111'; // banten
			$range2 = '15820';
			$range3 = '42111';
			$range4 = '42455';
			break;
  case "3":
			$range1 = '38113'; // bengkulu
			$range2 = '39377';
			break;
  case "4":
			$range1 = '55111'; // yogya
			$range2 = '55893';
			break;
  case "5":
			$range1 = '10110'; // jakarta
			$range2 = '14540';
			break;
  case "6":
			$range1 = '96111'; // gorontalo
			$range2 = '96574';
			break;
  case "7":
			$range1 = '36111'; // jambi
			$range2 = '37574';
			break;
  case "8":
			$range1 = '16110'; // Jawa Barat
			$range2 = '17730';
			$range3 = '40111';
			$range4 = '46476';
			break;
  case "9":
			$range1 = '50111'; // Jawa Tengah
			$range2 = '54474';
			$range3 = '56111';
			$range4 = '59584';
			break;
  case "10":
			$range1 = '60111'; // jawa timur
			$range2 = '69493';
			break;
  case "11":
			$range1 = '78111'; // kalimantan barat
			$range2 = '79682';
			break;
  case "12":
			$range1 = '70111'; // kalimantan selatan
			$range2 = '72276';
			break;
  case "13":
			$range1 = '73111'; // kalimantan tengah
			$range2 = '74874';
			break;
  case "14":
			$range1 = '75111'; // kalimantan timur
			$range2 = '77381';
			break;
  case "15":
			$range1 = '33111'; // bangka belitung
			$range2 = '33792';
			break;
  case "16":
			$range1 = '29111'; // kepulauan riau
			$range2 = '29878';
			break;
  case "17":
			$range1 = '34111'; // lampung
			$range2 = '35686';
			break;
  case "18":
			$range1 = '97114'; // maluku
			$range2 = '97669';
			break;
  case "19":
			$range1 = '97711'; // maluku utara
			$range2 = '97869';
			break;
  case "20":
			$range1 = '23111'; // aceh
			$range2 = '24794';
			break;
  case "21":
			$range1 = '83115'; // ntb
			$range2 = '84459';
			break;
  case "22":
			$range1 = '85111'; // ntt
			$range2 = '87284';
			break;
  case "23":
			$range1 = '98511'; // papua
			$range2 = '99976';
			break;
  case "24":
			$range1 = '98011'; // papua barat
			$range2 = '98495';
			break;
  case "25":
			$range1 = '28111'; // riau
			$range2 = '29569';
			break;
  case "26":
			$range1 = '91311'; // sulawesi barat
			$range2 = '91591';
			break;
  case "27":
			$range1 = '90111'; // sulsel 90111 - 91273 91611 - 92985
			$range2 = '91273';
			$range3 = '91611';
			$range4 = '92985';
			break;
  case "28":
			$range1 = '94111'; // sul tengah 94111 - 94981
			$range2 = '94981';
			break;
  case "29":
			$range1 = '93111'; // sul tenggara 93111 - 93963
			$range2 = '93963';
			break;
  case "30":
			$range1 = '95111'; // sulut  95111 - 95999
			$range2 = '95999';
			break;
  case "31":
			$range1 = '25111'; // sumbar  25111 - 27779
			$range2 = '27779';
			break;
  case "32":
			$range1 = '30111'; // sumsel 30111 - 32388
			$range2 = '32388';
			break;
  case "33":
			$range1 = '20111'; // sumut 20111 - 22999
			$range2 = '22999';
			break;
  case "34":
			$range1 = '77111'; // kalimantan utara 77111 - 77574
			$range2 = '77574';
			break;
  case "999":
			$range1 = '00000'; // others
			$range2 = '00000';
			break;
  default:
			$range1 = '00000';
			$range2 = '00000';
			break;
}		
		if($id == '2' OR $id == '8' OR $id == '9' OR $id == '27') {
			$response = $this->tabel_model->listwhere('st_master_zipcode','(ZIPCODE BETWEEN '.$range1.' AND '.$range2.') OR (ZIPCODE BETWEEN '.$range3.' AND '.$range4.')');
		} else {
			$response = $this->tabel_model->listbetweendate('st_master_zipcode','ZIPCODE',$range1,$range2);
		}
//		echo $this->db->last_query(); die;
        $htmlvalue='';
        foreach($response as $valCat) { 
		$htmlvalue .= "<option value='".$valCat->ZIPCODE."'>".strtoupper($valCat->ZIPCODE)." ( ".strtoupper($valCat->DESCRIPTION)." )</option>";
		}
		$callback = array('data_kota'=>$htmlvalue); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota
		echo json_encode($callback);

	}

	public function getkotarajaongkir()
	{

$provinsi_id = $this->input->post('prov_id');
 
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$provinsi_id",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: c038ed599986fdb008f90c43cc6e26f6"
  ),
));
 
$response = curl_exec($curl);
$err = curl_error($curl);
 
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
	$htmlvalue='';
	$data = json_decode($response, true);
		for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
			$htmlvalue .= "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
		}
	$callback = array('data_kota'=>$htmlvalue);
	echo json_encode($callback);
}
 
//$data = json_decode($response, true);
//for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
//    echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
//}
	}

	public function getkecamatan()
	{
//		$provinsi_id = $this->input->post('prov_id');
//		$kota = $this->city_model->listing($provinsi_id);
//		return $kota;
//$data = json_decode($response, true);
//for ($i=0; $i < count($kota['rajaongkir']['results']); $i++) { 
//    echo "<option value='".$kota['rajaongkir']['results'][$i]['city_id']."'>".$kota['rajaongkir']['results'][$i]['city_name']."</option>";
//}

		$id = $this->input->post('city_id');
		$response = $this->kecamatan_model->listing($id);
        $htmlvalue='';
        foreach($response as $valCat) { 
//		$htmlvalue .= "<option value='".$valCat->cityid."'>".$valCat->city." ( ".$valCat->type." )</option>";
		$htmlvalue .= "<option value='".$valCat->id."'>".$valCat->name."</option>";
		}
		$callback = array('data_kecamatan'=>$htmlvalue); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota
		echo json_encode($callback);

	}

	public function getkelurahan()
	{
//		$provinsi_id = $this->input->post('prov_id');
//		$kota = $this->city_model->listing($provinsi_id);
//		return $kota;
//$data = json_decode($response, true);
//for ($i=0; $i < count($kota['rajaongkir']['results']); $i++) { 
//    echo "<option value='".$kota['rajaongkir']['results'][$i]['city_id']."'>".$kota['rajaongkir']['results'][$i]['city_name']."</option>";
//}

		$id = $this->input->post('kec_id');
		$response = $this->kelurahan_model->listing($id);
        $htmlvalue='';
        foreach($response as $valCat) { 
		$htmlvalue .= "<option value='".$valCat->id."'>".$valCat->name."</option>";
		}
		$callback = array('data_kelurahan'=>$htmlvalue); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota
		echo json_encode($callback);

	}

	public function getcost()
	{
	$asal = $_POST['asal'];
	$id_kabupaten = $_POST['kab_id'];
	$kurir = $_POST['kurir'];
	$berat = $_POST['berat'];
	$kelurahanid = $_POST['kel_id'];

if($kurir == 'flat') {
			$response = $this->kelurahan_model->listing($kelurahanid);
			echo '<option value="0,0,0">Select Services</option>';
			foreach($response as $val) {
				echo '<option value="kurir,1,'.$val->ongkir.'">'.$val->ongkir.' '.number_format($val->ongkir).'</option>';
			}
} else if($kurir == 'jne' OR $kurir == 'pos' OR $kurir == 'tiki')  {
	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
	  CURLOPT_HTTPHEADER => array(
	    "content-type: application/x-www-form-urlencoded",
	    "key: c038ed599986fdb008f90c43cc6e26f6"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
//	  echo $response.'<br/>';
	  //print_r($response);
	  $data = json_decode($response, true);
//	  for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
//			echo "<option value='".$data['rajaongkir']['results'][$i]['cost']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
//			echo $data['rajaongkir']['results'][$i]['costs']['service'];
//	  }
//  foreach($data as $key => $value) {
//    echo $value->cost . ", " . $value->service. "<br>";
//  }
			echo '<option value="0,0,0">Select Services</option>';
	for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
		for ($j=0; $j < count($data['rajaongkir']['results'][$i]['costs']); $j++) {
			echo "<option value='".$data['rajaongkir']['results'][$i]['costs'][$j]['service'].','.$data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['etd'].','.$data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value']."'>".$data['rajaongkir']['results'][$i]['costs'][$j]['service'].' '.$data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['etd'].' Ep. '.number_format($data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value'])."</option>";
//			echo $data['rajaongkir']['results'][$i]['costs'][$j]['service'].' ';
//			echo $data['rajaongkir']['results'][$i]['costs'][$j]['description'].' ';
//			echo $data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['etd'].' ';
//			echo number_format($data['rajaongkir']['results'][$i]['costs'][$j]['cost'][0]['value']).'<br/>';
		}
	}

	}
} // end else flat
	}

	public function register()
	{
//		$this->load->library('province');
		$catmenu = $this->categories_model->listingmod('learning');
		$config = $this->config_model->detail(1);
		$bions = $this->bions_model->detail(1);
		$menu = $this->menu_model->listing();
		$cabang = $this->tabel_model->listing('cabang');
		$country = $this->tabel_model->listing('st_nationality');
//		$country = $this->country_model->listing();
		$botmenu = $this->botmenu_model->listing();

		$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url().'user/regist',
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url().'assets/home/images/logo.png',
						'author'	=>	'alantasik',
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'cabang' => $cabang,
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'isi'	=>	'home/'.$config->template.'/register');
		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
	}

	public function registerotp()
	{

		if(validateCaptcha($this->input->post('g-recaptcha-response'))){
			$this->otpcomponent();
		} else {
			$this->session->set_flashdata('error', 'Validation captcha failed. Please try again');
			redirect(base_url('user/register'));
		}
	}

	public function resendotp(){
		$this->otpcomponent();
	}

	private function otpcomponent(){
		//		$this->load->library('province');
		$catmenu = $this->categories_model->listingmod('learning');
		$config = $this->config_model->detail(1);
		$bions = $this->bions_model->detail(1);
		$menu = $this->menu_model->listing();
		$botmenu = $this->botmenu_model->listing();
//		$country = $this->country_model->listing();
		$country = $this->tabel_model->listing('st_master_country');

		$valid = $this->form_validation;
		$valid->set_rules ('email','email','required');
		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url().'user/regist',
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url().'assets/home/images/logo.png',
						'author'	=>	'alantasik',
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'isi'	=>	'home/'.$config->template.'/register');
			$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
		} else {
			$i = $this->input;

			$cekotp = $this->otp_model->getotp($this->input->post('email'));

			$tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
			$tnow = date("Y-m-d", $tday);
			$jnow = date("H:i:s", $tday);
			$otp = mt_rand(100000,999999);

			$datadb = array(	'email'	=> $this->input->post('email'),
							'otp'	=> $otp,
							'tanggal'	=> $tnow,
							'jam'	=> $jnow
						);

			if($cekotp) {
//			if($cekotp->email == $this->input->post('email')) {
				$this->otp_model->editotp($datadb);
			} else {
				$this->otp_model->add($datadb);
			}

$message = "
<html>
<head>
<title>Kode OTP Registrasi</title>
</head>
<body>
<p>Dear ".$this->input->post('nama_depan').",</p>
<p>Terima kasih sudah memilih BNI Sekuritas sebagai partner investasi Anda.</p>
<p>Untuk melanjutkan proses registrasi rekening efek, silahkan masukkan kode OTP berikut ke laman registrasi :</p>
<p><strong>".$otp."</strong></p>
<p>Mohon tidak membagikan OTP ini ke siapa pun. Kami berkomitmen serius untuk menjaga keamanan data Anda. Jika Anda tidak melakukan permintaan atas OTP tersebut silahkan laporkan ke customercare@bnisekuritas.co.id</p>
<p>Ini adalah pesan otomatis � jangan di balas.</p>
<p>Regards</p>
<p>Admin BIONS</p>
<br/><br/><br/>
<p>====================================================================================</p>
<p><i>Dear ".$this->input->post('nama_depan').",</i></p>
<p><i>Thank you for choosing BNI Sekuritas as your investment partner.</i></p>
<p><i>To continue your account registration process, please enter the following OTP code on the registration page:</i></p>
<p><strong>".$otp."</strong></p>
<p><i>Please don't share this OTP with anyone. We are seriously committed to keeping your data safe. If you do not make a request for the OTP, please report it to customercare@bnisekuritas.co.id</i></p>
<p><i>This is an automatic message - don't reply.</i></p>
<p><i>Regards</i></p>
<p><i>Admin BIONS</i></p>
";

//$msg = "Kode Otp anda : ".$otp;
$msg = $message;

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers  .= "From: Info Bions < info@bions.id >\n";

// send email
mail($this->input->post('email'),"Kode Otp",$msg,$headers);

		            	$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url().'user/regist',
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url().'assets/home/images/logo.png',
						'author'	=>	'alantasik',
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'errorotp' => '',
						'isi'	=>	'home/'.$config->template.'/registerotp');
						$this->load->view('home/'.$config->template.'/layout/wrapper',$data);

//exit();
	}
	}

	public function registerpersonal()
	{
//		$this->load->library('province');
		$catmenu = $this->categories_model->listingmod('learning');
		$config = $this->config_model->detail(1);
		$bions = $this->bions_model->detail(1);
		$menu = $this->menu_model->listing();
		$botmenu = $this->botmenu_model->listing();
		$country = $this->tabel_model->listing('st_master_country');
//		$country = $this->country_model->listing();
		$propinsi = $this->tabel_model->listing('st_master_province');
//		$propinsi = $this->province_model->listing();
//		$bank = $this->tabel_model->listing('bank');
		$bank = $this->tabel_model->listing('st_master_bank');
		$telpcountry = $this->tabel_model->listing('st_master_telp_country');
		$kodepos = $this->tabel_model->listwhere('st_master_zipcode',"`ZIPCODE` BETWEEN '23111' AND '24794'");

		$cekotp = $this->otp_model->getotp($this->input->post('email'));

		if($cekotp) {
//			$datadb = array('email' => $this->input->post('email'));
//			$this->otp_model->delete($data);
			
			if($cekotp->otp == $this->input->post('otp')) {

				$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url().'user/regist',
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url().'assets/home/images/logo.png',
						'author'	=>	'alantasik',
						'catmenu' => $catmenu,
						'botmenu' => $botmenu,
						'menu' => $menu,
						'bank' => $bank,
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'propinsi' => $propinsi,
						'telpcountry' => $telpcountry,
						'kodepos' => $kodepos,
						'isi'	=>	'home/'.$config->template.'/registerpersonal');
				$this->load->view('home/'.$config->template.'/layout/wrapper',$data);						

			} else {

				$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url().'user/regist',
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url().'assets/home/images/logo.png',
						'author'	=>	'alantasik',
						'errorotp' => 'Maaf kode otp salah (The OTP Code did not match)',
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'bank' => $bank,
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'propinsi' => $propinsi,
						'kodepos' => $kodepos,
						'isi'	=>	'home/'.$config->template.'/registerotp');
				$this->load->view('home/'.$config->template.'/layout/wrapper',$data);				
			}

		} else {
			$this->session->set_flashdata('error','Email dan kode Otp Tidak Ditemukan (email and otp code not found)');
			redirect(base_url('user/register'));
		}
	}

	public function registeradditional()
	{
		$catmenu = $this->categories_model->listingmod('learning');
		$config = $this->config_model->detail(1);
		$bions = $this->bions_model->detail(1);
		$menu = $this->menu_model->listing();
		$botmenu = $this->botmenu_model->listing();
		$country = $this->country_model->listing();
		$propinsi = $this->province_model->listing();
		$bank = $this->tabel_model->listing('bank');

		$valid = $this->form_validation;
		$valid->set_rules ('status_pernikahan','status_pernikahan','required');
		if($valid->run() === FALSE) {
				$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url().'user/regist',
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url().'assets/home/images/logo.png',
						'author'	=>	'alantasik',
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'bank' => $bank,
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'propinsi' => $propinsi,
						'isi'	=>	'home/'.$config->template.'/registerpersonal');
				$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
		} else {
if($this->input->post('warganegara') == 'WNI') {
				if(basename($_FILES['fotoktp']['name']) == "") { $fotoktp = ''; } else { $fotoktp = $this->do_upload('fotoktp'); }
				if(basename($_FILES['fotoselfie']['name']) == "") { $fotoselfie = ''; } else { $fotoselfie = $this->do_upload('fotoselfie'); }
				$fotopaspor = '';
				$fotokitas = '';
} else {
				if(basename($_FILES['fotopaspor']['name']) == "") { $fotopaspor = ''; } else { $fotopaspor = $this->do_upload('fotopaspor'); }
				if(basename($_FILES['fotokitas']['name']) == "") { $fotokitas = ''; } else { $fotokitas = $this->do_upload('fotokitas'); }
				$fotoktp = '';
				$fotoselfie = '';
}
				if(basename($_FILES['fototabungan']['name']) == "") { $fototabungan = ''; } else { $fototabungan = $this->do_upload('fototabungan'); }

				$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url().'user/regist',
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url().'assets/home/images/logo.png',
						'author'	=>	'alantasik',
						'fotoktp' => $fotoktp,
						'fotoselfie' => $fotoselfie,
						'fotopaspor' => $fotopaspor,
						'fotokitas' => $fotokitas,
						'fototabungan' => $fototabungan,
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'propinsi' => $propinsi,
						'isi'	=>	'home/'.$config->template.'/registeradditional');
				$this->load->view('home/'.$config->template.'/layout/wrapper',$data);

		}
	}

	public function registerquestionaire()
	{
		$catmenu = $this->categories_model->listingmod('learning');
		$config = $this->config_model->detail(1);
		$bions = $this->bions_model->detail(1);
		$menu = $this->menu_model->listing();
		$botmenu = $this->botmenu_model->listing();
		$country = $this->country_model->listing();
		$propinsi = $this->province_model->listing();

		$valid = $this->form_validation;
		$valid->set_rules ('email','email','required');
		if($valid->run() === FALSE) {
				$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url().'user/regist',
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url().'assets/home/images/logo.png',
						'author'	=>	'alantasik',
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'propinsi' => $propinsi,
						'isi'	=>	'home/'.$config->template.'/registeradditional');
				$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
		} else {
				$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url().'user/regist',
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url().'assets/home/images/logo.png',
						'author'	=>	'alantasik',
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'propinsi' => $propinsi,
						'isi'	=>	'home/'.$config->template.'/registerquestionaire');
				$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
		}
	}

	public function registersend()
	{
		$catmenu = $this->categories_model->listingmod('learning');
		$config = $this->config_model->detail(1);
		$bions = $this->bions_model->detail(1);
		$menu = $this->menu_model->listing();
		$botmenu = $this->botmenu_model->listing();
		$country = $this->country_model->listing();
		$propinsi = $this->province_model->listing();

		$valid = $this->form_validation;
		$valid->set_rules ('email','email','required');
		if($valid->run() === FALSE) {
				$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url().'user/regist',
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url().'assets/home/images/logo.png',
						'author'	=>	'alantasik',
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'propinsi' => $propinsi,
						'isi'	=>	'home/'.$config->template.'/registerquestionaire');
				$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
		} else {

			$tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
			$tnow = date("Y-m-d", $tday);
			$jnow = date("H:i:s", $tday);
			$otp = mt_rand(100000,999999);
			$tanggal = $tnow.' '.$jnow;

//		if($this->input->post('warganegara') == 'WNI') { $negara = 'ID'; } else { $negara = $this->input->post('negara'); }
		$negara = $this->input->post('negara');
//		if(!isset($this->input->post('signed'))) {

//		}

		if($this->input->post('signed')) { 
			$folderPath = FCPATH."images/registrasi/";
			$image_parts = explode(";base64,", $this->input->post('signed'));      
			$image_type_aux = explode("image/", $image_parts[0]);      
			$image_type = $image_type_aux[1];      
			$image_base64 = base64_decode($image_parts[1]);      
			$file = $folderPath . uniqid() . '.'.$image_type;
			file_put_contents($file, $image_base64);			
			$signature = str_replace(FCPATH,"",$file);;
		} else { $signature = ''; }
		
		if($this->input->post('alamatsama') == '1') {
								$terkini_alamat = $this->input->post('ktp_alamat');
								$terkini_rtrw = $this->input->post('ktp_rtrw');
								$terkini_kelurahan = $this->input->post('ktp_kelurahan');
								$terkini_kecamatan = $this->input->post('ktp_kecamatan');
								$terkini_provinceid = $this->input->post('ktp_provinceid');
								$terkini_cityid = $this->input->post('ktp_cityid');
								$terkini_kodepos = $this->input->post('ktp_kodepos');
								$terkini_negara = $this->input->post('ktp_negara');
		} else {
								$terkini_alamat = $this->input->post('terkini_alamat');
								$terkini_rtrw = $this->input->post('terkini_rtrw');
								$terkini_kelurahan = $this->input->post('terkini_kelurahan');
								$terkini_kecamatan = $this->input->post('terkini_kecamatan');
								$terkini_provinceid = $this->input->post('terkini_provinceid');
								$terkini_cityid = $this->input->post('terkini_cityid');
								$terkini_kodepos = $this->input->post('terkini_kodepos');
								$terkini_negara = $this->input->post('terkini_negara');
		}
								$datadb = array(	
								"reff" => $this->input->post('reff'),
								"tanggal" => $tanggal,
								"nama_depan" => $this->input->post('nama_depan'),
								"nama_tengah" => $this->input->post('nama_tengah'),
								"nama_belakang" => $this->input->post('nama_belakang'),
								"nama_alias" => $this->input->post('nama_alias'),
								"warganegara" => $this->input->post('warganegara'),
								"negara" => $negara,
								"email" => $this->input->post('email'),
								"handphone" => $this->input->post('handphone'),
								"rekening_efek" => $this->input->post('rekening_efek'),
								"tipe_layanan" => $this->input->post('tipe_layanan'),
								"cabang" => $this->input->post('cabang'),
								"tempat_lahir" => $this->input->post('tempat_lahir'),
								"tanggal_lahir" => $this->input->post('tanggal_lahir'),
								"jenis_kelamin" => $this->input->post('jenis_kelamin'),
								"agama" => $this->input->post('agama'),
								"pendidikan" => $this->input->post('pendidikan'),
								"ibu_kandung" => $this->input->post('ibu_kandung'),
								"status_pernikahan" => $this->input->post('status_pernikahan'),
								"nama_pasangan" => $this->input->post('nama_pasangan'),
								"ktp" => $this->input->post('ktp'),
								"ktp_tempat" => $this->input->post('ktp_tempat'),
								"ktp_terbit" => $this->input->post('ktp_terbit'),
								"ktp_berlaku_sampai" => $this->input->post('ktp_berlaku_sampai'),
								"ktp_berlaku_tanggal" => $this->input->post('ktp_berlaku_tanggal'),
								"fotoktp" => $this->input->post('fotoktp'),
								"fotoselfie" => $this->input->post('fotoselfie'),
								"paspor" => $this->input->post('paspor'),
								"paspor_tempat" => $this->input->post('paspor_tempat'),
								"paspor_terbit" => $this->input->post('paspor_terbit'),
								"paspor_berlaku_sampai" => $this->input->post('paspor_berlaku_sampai'),
								"paspor_berlaku_tanggal" => $this->input->post('paspor_berlaku_tanggal'),
								"fotopaspor" => $this->input->post('fotopaspor'),
								"kitas" => $this->input->post('kitas'),
								"kitas_tempat" => $this->input->post('kitas_tempat'),
								"kitas_terbit" => $this->input->post('kitas_terbit'),
								"kitas_berlaku_sampai" => $this->input->post('kitas_berlaku_sampai'),
								"kitas_berlaku_tanggal" => $this->input->post('kitas_berlaku_tanggal'),
								"fotokitas" => $this->input->post('fotokitas'),
								"ktp_alamat" => $this->input->post('ktp_alamat'),
								"ktp_rtrw" => $this->input->post('ktp_rtrw'),
								"ktp_kelurahan" => $this->input->post('ktp_kelurahan'),
								"ktp_kecamatan" => $this->input->post('ktp_kecamatan'),
								"ktp_provinceid" => $this->input->post('ktp_provinceid'),
								"ktp_cityid" => $this->input->post('ktp_cityid'),
								"ktp_kodepos" => $this->input->post('ktp_kodepos'),
								"ktp_negara" => $this->input->post('ktp_negara'),
								"alamatsama" => $this->input->post('alamatsama'),
								"terkini_alamat" => $terkini_alamat,
								"terkini_rtrw" => $terkini_rtrw,
								"terkini_kelurahan" => $terkini_kelurahan,
								"terkini_kecamatan" => $terkini_kecamatan,
								"terkini_provinceid" => $terkini_provinceid,
								"terkini_cityid" => $terkini_cityid,
								"terkini_kodepos" => $terkini_kodepos,
								"terkini_negara" => $terkini_negara,
								"kode_negara" => $this->input->post('kode_negara'),
								"kode_area" => $this->input->post('kode_area'),
								"phone" => $this->input->post('phone'),
								"investasi" => $this->input->post('investasi'),
								"pekerjaan" => $this->input->post('pekerjaan'),
								"nama_tempat_kerja" => $this->input->post('nama_tempat_kerja'),
								"kerja_tahun" => $this->input->post('kerja_tahun'),
								"kerja_bulan" => $this->input->post('kerja_bulan'),
								"bidang_usaha" => $this->input->post('bidang_usaha'),
								"jabatan" => $this->input->post('jabatan'),
								"frekuensi_penghasilan" => $this->input->post('frekuensi_penghasilan'),
								"kepemilikan_asset" => $this->input->post('kepemilikan_asset'),
								"npwp" => $this->input->post('npwp'),
								"no_npwp" => $this->input->post('no_npwp'),
								"nama_bank" => $this->input->post('nama_bank'),
								"nama_pemilik" => $this->input->post('nama_pemilik'),
								"no_rekening" => $this->input->post('no_rekening'),
								"fototabungan" => $this->input->post('fototabungan'),
								"bank_rdi" => $this->input->post('bank_rdi'),
								"sumber_penghasilan" => $this->input->post('sumber_penghasilan'),
								"penghasilan_bulan" => $this->input->post('penghasilan_bulan'),
								"penghasilan_tahun" => $this->input->post('penghasilan_tahun'),
								"kekayaan" => $this->input->post('kekayaan'),
								"nama_perusahaan" => $this->input->post('nama_perusahaan'),
								"alamat_perusahaan" => $this->input->post('alamat_perusahaan'),
								"perusahaan_alamat" => $this->input->post('perusahaan_alamat'),
								"perusahaan_rtrw" => $this->input->post('perusahaan_rtrw'),
								"perusahaan_kelurahan" => $this->input->post('perusahaan_kelurahan'),
								"perusahaan_kecamatan" => $this->input->post('perusahaan_kecamatan'),
								"perusahaan_provinceid" => $this->input->post('perusahaan_provinceid'),
								"perusahaan_cityid" => $this->input->post('perusahaan_cityid'),
								"perusahaan_kodepos" => $this->input->post('perusahaan_kodepos'),
								"perusahaan_telp" => $this->input->post('perusahaan_telp'),
								"perusahaan_fax" => $this->input->post('perusahaan_fax'),
								"perusahaan_negara" => $this->input->post('perusahaan_negara'),
								"waktu_investasi" => $this->input->post('waktu_investasi'),
								"tujuan_investasi" => $this->input->post('tujuan_investasi'),
								"resiko_investasi" => $this->input->post('resiko_investasi'),
								"dana_investasi" => $this->input->post('dana_investasi'),
								"pengetahuan_investasi" => $this->input->post('pengetahuan_investasi'),
								"kuis1" => $this->input->post('kuis1'),
								"kuis1_nama" => $this->input->post('kuis1_nama'),
								"kuis1_bagian" => $this->input->post('kuis1_bagian'),
								"kuis2" => $this->input->post('kuis2'),
								"kuis2_nama" => $this->input->post('kuis2_nama'),
								"kuis2_perusahaan" => $this->input->post('kuis2_perusahaan'),
								"kuis3" => $this->input->post('kuis3'),
								"kuis3_nama" => $this->input->post('kuis3_nama'),
								"kuis3_perusahaan" => $this->input->post('kuis3_perusahaan'),
								"kuis4" => $this->input->post('kuis4'),
								"kuis4_nama" => $this->input->post('kuis4_nama'),
								"kuis4_lembaga" => $this->input->post('kuis4_lembaga'),
								"kuis5" => $this->input->post('kuis5'),
								"kuis6" => $this->input->post('kuis6'),
								"kuis7" => $this->input->post('kuis7'),
								"kuis8" => $this->input->post('kuis8'),
								"kuis9" => $this->input->post('kuis9'),
								"kuis10" => $this->input->post('kuis10'),
								"kuis11" => $this->input->post('kuis11'),
								"kuis12" => $this->input->post('kuis12'),
								"kuis13" => $this->input->post('kuis13'),
								"status_setuju" => $this->input->post('status_setuju'),
								"signature" => $signature,
  "edd_nama1" => $this->input->post('edd_nama1'),
  "edd_tgllahir1" => $this->input->post('edd_tgllahir1'),
  "edd_pekerjaan1" => $this->input->post('edd_pekerjaan1'),
  "edd_hubungan1" => $this->input->post('edd_hubungan1'),
  "edd_nama2" => $this->input->post('edd_nama2'),
  "edd_tgllahir2" => $this->input->post('edd_tgllahir2'),
  "edd_pekerjaan2" => $this->input->post('edd_pekerjaan2'),
  "edd_hubungan2" => $this->input->post('edd_hubungan2'),
  "edd_nama3" => $this->input->post('edd_nama3'),
  "edd_tgllahir3" => $this->input->post('edd_tgllahir3'),
  "edd_pekerjaan3" => $this->input->post('edd_pekerjaan3'),
  "edd_hubungan3" => $this->input->post('edd_hubungan3'),
  "edd_nama4" => $this->input->post('edd_nama4'),
  "edd_tgllahir4" => $this->input->post('edd_tgllahir4'),
  "edd_pekerjaan4" => $this->input->post('edd_pekerjaan4'),
  "edd_hubungan4" => $this->input->post('edd_hubungan4'),
  "edd_nama5" => $this->input->post('edd_nama5'),
  "edd_tgllahir5" => $this->input->post('edd_tgllahir5'),
  "edd_pekerjaan5" => $this->input->post('edd_pekerjaan5'),
  "edd_tinggal" => $this->input->post('edd_tinggal'),
  "edd_hubungan5" => $this->input->post('edd_hubungan5'),
  "edd_rumah" => $this->input->post('edd_rumah'),
  "edd_milik" => $this->input->post('edd_milik'),
  "edd_owner_a" => $this->input->post('edd_owner_a'),
  "edd_owner_b" => $this->input->post('edd_owner_b'),
  "edd_owner_c" => $this->input->post('edd_owner_c'),
  "edd_owner_d" => $this->input->post('edd_owner_d'),
  "edd_owner_e" => $this->input->post('edd_owner_e'),
  "edd_kendaraan" => $this->input->post('edd_kendaraan'),
  "edd_gaji1" => $this->input->post('edd_gaji1'),
  "edd_gaji2" => $this->input->post('edd_gaji2'),
  "edd_investasi1" => $this->input->post('edd_investasi1'),
  "edd_investasi2" => $this->input->post('edd_investasi2'),
  "edd_dividen1" => $this->input->post('edd_dividen1'),
  "edd_dividen2" => $this->input->post('edd_dividen2'),
  "edd_bisnis1" => $this->input->post('edd_bisnis1'),
  "edd_bisnis2" => $this->input->post('edd_bisnis2'),
  "edd_lainnya1" => $this->input->post('edd_lainnya1'),
  "edd_lainnya2" => $this->input->post('edd_lainnya2'),
  "edd_sumber" => $this->input->post('edd_sumber'),
  "edd_estimasi" => $this->input->post('edd_estimasi'),
  "edd_tujuan" => $this->input->post('edd_tujuan'),
  "edd_produk_bni" => $this->input->post('edd_produk_bni'),
  "edd_produk_lain" => $this->input->post('edd_produk_lain'),
  "w9_nama" => $this->input->post('w9_nama'),
  "w9_bisnis" => $this->input->post('w9_bisnis'),
  "w9_tax" => $this->input->post('w9_tax'),
  "w9_payee" => $this->input->post('w9_payee'),
  "w9_fatca" => $this->input->post('w9_fatca'),
  "w9_address" => $this->input->post('w9_address'),
  "w9_city" => $this->input->post('w9_city'),
  "w9_accnumber" => $this->input->post('w9_accnumber'),
  "w9_social" => $this->input->post('w9_social'),
  "w9_id" => $this->input->post('w9_id'),
  "w8_nama" => $this->input->post('w8_nama'),
  "w8_countrycitizen" => $this->input->post('w8_countrycitizen'),
  "w8_address" => $this->input->post('w8_address'),
  "w8_city" => $this->input->post('w8_city'),
  "w8_country" => $this->input->post('w8_country'),
  "w8_mailing" => $this->input->post('w8_mailing'),
  "w8_mailing_city" => $this->input->post('w8_mailing_city'),
  "w8_mailing_country" => $this->input->post('w8_mailing_country'),
  "w8_ssn" => $this->input->post('w8_ssn'),
  "w8_tax" => $this->input->post('w8_tax'),
  "w8_ref" => $this->input->post('w8_ref'),
  "w8_birth" => $this->input->post('w8_birth'),
  "pernyataan_nama" => $this->input->post('pernyataan_nama'),
  "pernyataan_dokumen" => $this->input->post('pernyataan_dokumen'),
  "pernyataan_dokid" => $this->input->post('pernyataan_dokid'),
  "pernyataan_birth" => $this->input->post('pernyataan_birth'),
  "pernyataan_domisili" => $this->input->post('pernyataan_domisili'),
  "pernyataan_korespondensi" => $this->input->post('pernyataan_korespondensi'),
  "pernyataan_domisili_country" => $this->input->post('pernyataan_domisili_country'),
  "pernyataan_rekening" => $this->input->post('pernyataan_rekening'),
  "pernyataan_pajak1" => $this->input->post('pernyataan_pajak1'),
  "pernyataan_nomor1" => $this->input->post('pernyataan_nomor1'),
  "pernyataan_alasan1" => $this->input->post('pernyataan_alasan1'),
  "pernyataan_pajak2" => $this->input->post('pernyataan_alasan1'),
  "pernyataan_nomor2" => $this->input->post('pernyataan_pajak2'),
  "pernyataan_alasan2" => $this->input->post('pernyataan_alasan2'),
  "pernyataan_pajak3" => $this->input->post('pernyataan_pajak3'),
  "pernyataan_nomor3" => $this->input->post('pernyataan_nomor3'),
  "pernyataan_alasan3" => $this->input->post('pernyataan_alasan3'),
  "manfaat_hubungan" => $this->input->post('manfaat_hubungan'),
  "manfaat_namapemilik" => $this->input->post('manfaat_namapemilik'),
  "manfaat_dokumen" => $this->input->post('manfaat_dokumen'),
  "manfaat_idnum" => $this->input->post('manfaat_idnum'),
  "manfaat_address" => $this->input->post('manfaat_address'),
  "alamat_korespondensi" => $this->input->post('alamat_korespondensi')
								);
				$this->registrasi_model->add($datadb);

				$lastid = $this->tabel_model->lastid('registrasi');

				$datadb1 = array('email' => $this->input->post('email'));
				$this->otp_model->emaildelete($datadb1);

				$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url().'user/regist',
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url().'assets/home/images/logo.png',
						'author'	=>	'alantasik',
						'catmenu' => $catmenu,
						'lastid' => $lastid,
						'botmenu' => $botmenu,
						'menu' => $menu,
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'propinsi' => $propinsi,
						'isi'	=>	'home/'.$config->template.'/registersend');
				$this->load->view('home/'.$config->template.'/layout/wrapper',$data);

		}
	}

	public function registration()
	{
		$config = $this->config_model->detail(1);
		$propinsi = $this->province_model->listing(1);
		$category = $this->category_model->listing();
		$kecamatan = $this->kecamatan_model->listing(3278);

		$valid = $this->form_validation;
		$valid->set_rules ('username','username','required|is_unique[users.username]|regex_match[/^([a-zA-Z0-9\s])+$/i]|alpha_numeric');
//		$this->form_validation->set_rules('field', 'Field', 'regex_match[/^([a-z ])+$/i]');[a-zA-Z0-9\s]
		$valid->set_rules ('password','password','required|matches[password2]');
		$valid->set_rules ('password2','password2','required');
		$valid->set_rules ('fullname','Nama Lengkap','required');
		$valid->set_rules ('address','Alamat Lengkap','required');
		$valid->set_rules ('provinceid','Propinsi','required');
		$valid->set_rules ('cityid','Kota / Kabupaten','required');
		$valid->set_rules ('kecamatanid','Kecamatan','required');
		$valid->set_rules ('kelurahanid','Kelurahan','required');
		$valid->set_rules ('postalcode','Kode Pos','required');
		$valid->set_rules ('handphone','Handphone','required');
//		$valid->set_rules ('email','email','required|valid_email|is_unique[users.email]');
		$valid->set_rules ('email','Email','required|valid_email');

//		$valid->set_rules('username', 'First Name', 'trim|required|alpha|min_length[5]|max_length[255]|xss_clean');
//        $valid->set_rules('password', 'Password', 'trim|required|matches[password2]|md5');
//        $valid->set_rules('password2', 'Confirm Password', 'trim|required');
//        $valid->set_rules('fulllname', 'Full Name', 'trim|required|alpha|min_length[5]|max_length[255]|xss_clean');
//        $valid->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');

//exit();
		if($valid->run() === FALSE) {
//			$this->session->set_flashdata('login_error','You must login to use this feature');
		$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url().'user/regist',
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url().'assets/home/images/logo.png',
						'author'	=>	'alantasik',
						'config'	=>	$config,
						'propinsi'	=> $propinsi,
						'kecamatan'	=> $kecamatan,
						'category' => $category,
						'isi'	=>	'home/'.$config->template.'/user/regist');
		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
		} else {

//			$cityname = $this->city_model->detailname($this->input->post('cityid'));
			$cityname = 'Kota Tasikmalaya';
//exit();
//			$provname = $this->province_model->detailname($this->input->post('provinceid'));
			$provname = 'Jawa Barat';
//			$kecamatanname = $this->kecamatan_model->detailname($this->input->post('kecamatanid'));
			$country = 'Indonesia';
//echo $this->input->post('cityid').$cityname;
//exit();
			$regionname = $this->kecamatan_model->detailname($this->input->post('kecamatanid'));
			$areaname = $this->kelurahan_model->detailname($this->input->post('kelurahanid'));

			$data = array(	'username'	=> $this->input->post('username'),
							'password'	=> md5($this->input->post('password')),
							'email'	=> $this->input->post('email'),
							'fullname'	=> $this->input->post('fullname'),
							'address'	=> $this->input->post('address'),
							'cityid'	=> $this->input->post('cityid'),
							'city'	=> $cityname,
							'stateid'	=> $this->input->post('provinceid'),
							'state'	=> $provname,
							'regionid'	=> $this->input->post('kecamatanid'),
							'region'	=> $regionname,
							'areaid'	=> $this->input->post('kelurahanid'),
							'area'	=> $areaname,
							'country'	=> $country,
							'postalcode'	=> $this->input->post('postalcode'),
							'handphone'	=> $this->input->post('handphone'),
							'usertype'	=> '0'
						);

			$this->user_model->add($data);
			$this->session->set_flashdata('sukses','Registration is successfull! Please login to continue');
			redirect(base_url('user/login'));

		}	
		
	}

	public function registertrial()
	{
		$catmenu = $this->categories_model->listingmod('event');
		$event = $this->event_model->listing();
		$config = $this->config_model->detail(1);
		$menu = $this->menu_model->listing();
		$botmenu = $this->botmenu_model->listing();

		$valid = $this->form_validation;
		$valid->set_rules ('nama_lengkap','Nama Lengkap','required');
		$valid->set_rules ('email','Email','required');
		$valid->set_rules ('handphone','Handphone','required');
		if($valid->run() === FALSE) {
			$catmenu = $this->categories_model->listingmod('learning');
			$config = $this->config_model->detail(1);
			$bions = $this->bions_model->detail(1);
			$menu = $this->menu_model->listing();

			$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url(),
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url('images/logobions.png'),
						'author'	=>	$config->name,
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'bions' => $bions,
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/home');

			$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
		} else {
			$tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
			$tnow = date("Y-m-d", $tday);

			$data = array(	'tanggal'	=> $tnow,
							'nama_lengkap'	=> $this->input->post('nama_lengkap'),
							'email'	=> $this->input->post('email'),
							'handphone'	=> $this->input->post('handphone')
						);

			$this->trialregistrasi_model->add($data);
			$this->session->set_flashdata('sukses','Data has been add');

			$data = array(	'title'	=>	$config->site_title,
						'meta'	=>	$config->site_meta,
						'desc'	=>	$config->site_desc,
						'og_url'	=>	base_url(),
						'og_type'	=>	'website',
						'og_title'	=>	$config->site_title,
						'og_desc'	=>	$config->site_desc,
						'og_image'	=>	base_url('images/logobions.png'),
						'author'	=>	$config->name,
						'event' => $event,
						'catmenu' => $catmenu,
						'menu' => $menu,
						'botmenu' => $botmenu,
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/registertrial');
			$this->load->view('home/'.$config->template.'/layout/wrapper',$data);

		}
		
	}

	public function viewpdf1($id)
	{
			$this->load->library('pdfgenerator');
			$config = $this->config_model->detail(1);
			$registrasi = $this->tabel_model->detail('registrasi',$id);
//			$this->data['title_pdf'] = 'FORMULIR APLIKASI PEMBUKAAN REKENING EFEK PERORANGAN';
			$data = array(	'title_pdf'	=>	'FORMULIR APLIKASI PEMBUKAAN REKENING EFEK PERORANGAN',
							'registrasi'	=>	$registrasi
				    );
			$file_pdf = 'FORMULIR_APLIKASI_PEMBUKAAN_REKENING_EFEK_PERORANGAN';
			$paper = 'A4';
			$orientation = "portrait";

			$html = $this->load->view('home/'.$config->template.'/pdf/formpembukaanrekening',$data);
//			$html = $this->load->view('home/'.$config->template.'/pdf/formpembukaanrekening',$data,true);
//			$html = $this->load->view('laporan_pdf',$this->data, true);	    
        
			// run dompdf
//			$this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);

	}

	public function viewpdf($id)
	{
			$this->load->library('pdfgenerator');
			$config = $this->config_model->detail(1);
			$registrasi = $this->tabel_model->detail('registrasi',$id);
//			$this->data['title_pdf'] = 'FORMULIR APLIKASI PEMBUKAAN REKENING EFEK PERORANGAN';
			$data = array(	'title_pdf'	=>	'FORMULIR APLIKASI PEMBUKAAN REKENING EFEK PERORANGAN',
							'registrasi'	=>	$registrasi
				    );
			$file_pdf = 'FORMULIR_APLIKASI_PEMBUKAAN_REKENING_EFEK_PERORANGAN';
			$paper = 'A4';
			$orientation = "portrait";

			$html = $this->load->view('home/'.$config->template.'/pdf/formpembukaanrekening',$data,true);
//			$html = $this->load->view('home/'.$config->template.'/pdf/formpembukaanrekening',$data,true);
//			$html = $this->load->view('laporan_pdf',$this->data, true);	    
        
			// run dompdf
			$this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);

	}

	public function viewpdf2($id)
	{
        //error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
			$config = $this->config_model->detail(1);
			$registrasi = $this->tabel_model->detail('registrasi',$id);
			$data = array(	'title'	=>	$config->site_title,
							'registrasi'	=>	$registrasi,
				    );
			$this->load->view('home/'.$config->template.'/pdf/formpembukaanrekening',$data);

//		ob_start();
//		$data = array(	'title'	=>	$config->site_title );
//		$this->load->view('home/'.$config->template.'/pdf/formpembukaanrekening',$data);
//		$html = ob_get_contents();
//        ob_end_clean();
        
//		require './assets/html2pdf/autoload.php';
    
//		$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
//		$pdf->WriteHTML($html);
//		$pdf->Output('Data Siswa.pdf', 'D');

	}

	public function cetakpdf($id)
	{
        //error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
			$config = $this->config_model->detail(1);
//			$data = array(	'title'	=>	$config->site_title );
//			$this->load->view('home/'.$config->template.'/pdf/formpembukaanrekening',$data);

		ob_start();
		$data = array(	'title'	=>	$config->site_title );
		$this->load->view('home/'.$config->template.'/pdf/formpembukaanrekening',$data);
		$html = ob_get_contents();
        ob_end_clean();
        
		require './assets/html2pdf/autoload.php';
    
		$pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('Data Siswa.pdf', 'D');

	}

function do_upload($inputfie)
{
  $tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
  $tnow = date("Ymd", $tday);

  $url = base_url()."images/registrasi";
  $image=basename($_FILES[$inputfie]['name']);
  $image=str_replace(' ','|',$image);
  $type = explode(".",$image);
  $type = $type[count($type)-1];
  if (in_array($type,array('jpg','jpeg','png','gif')))
  {
    $tmppath="images/registrasi/".$tnow.uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
    if(is_uploaded_file($_FILES[$inputfie]["tmp_name"]))
    {
      move_uploaded_file($_FILES[$inputfie]['tmp_name'],$tmppath);
      return $tmppath; // returns the url of uploaded image.
    }
  }
  else
  {	
    redirect(base_url());// redirect to show file type not support message
  }
}
}