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
		 $this->load->model('tabel_model');
		 $this->load->model('event_model');
		 $this->load->model('registrasi_model');
		 $this->load->model('trialregistrasi_model');
		 $this->load->model('otp_model');
		 $this->load->model('country_model');
		 $this->load->model('menu_model');
		 $this->load->model('config_model');
		 $this->load->model('bions_model');
		 $this->load->model('user_model');
		 $this->load->model('categories_model');
         $this->load->model('user_model');
         $this->load->model('city_model');
         $this->load->model('province_model');
		 $this->load->model('categories_model');
    }

	public function index()
	{
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
		$htmlvalue .= "<option value='".$valCat->cityid."'>".$valCat->city." ( ".$valCat->type." )</option>";
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
		$country = $this->country_model->listing();

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
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'isi'	=>	'home/'.$config->template.'/register');
		$this->load->view('home/'.$config->template.'/layout/wrapper',$data);
	}

	public function registerotp()
	{
//		$this->load->library('province');
		$catmenu = $this->categories_model->listingmod('learning');
		$config = $this->config_model->detail(1);
		$bions = $this->bions_model->detail(1);
		$menu = $this->menu_model->listing();
		$country = $this->country_model->listing();

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

$msg = "Kode Otp anda : ".$otp;

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail($this->input->post('email'),"Kode Otp",$msg);

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
		$country = $this->country_model->listing();
		$propinsi = $this->province_model->listing();

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
						'menu' => $menu,
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'propinsi' => $propinsi,
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
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'propinsi' => $propinsi,
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
						'bions' => $bions,
						'config' => $config,
						'country' => $country,
						'propinsi' => $propinsi,
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
						'catmenu' => $catmenu,
						'menu' => $menu,
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

		if($this->input->post('warganegara') == 'WNI') { $negara = 'ID'; } else { $negara = $this->input->post('negara'); }

								$datadb = array(	
								"reff" => $this->input->post('reff'),
								"tanggal" => $tanggal,
								"nama_depan" => $this->input->post('nama_depan'),
								"nama_tengah" => $this->input->post('nama_tengah'),
								"nama_belakang" => $this->input->post('nama_belakang'),
								"warganegara" => $this->input->post('warganegara'),
								"negara" => $negara,
								"email" => $this->input->post('email'),
								"handphone" => $this->input->post('handphone'),
								"rekening_efek" => $this->input->post('rekening_efek'),
								"tipe_layanan" => $this->input->post('tipe_layanan'),
								"tempat_lahir" => $this->input->post('tempat_lahir'),
								"tanggal_lahir" => $this->input->post('tanggal_lahir'),
								"jenis_kelamin" => $this->input->post('jenis_kelamin'),
								"agama" => $this->input->post('agama'),
								"pendidikan" => $this->input->post('pendidikan'),
								"ibu_kandung" => $this->input->post('ibu_kandung'),
								"status_pernikahan" => $this->input->post('status_pernikahan'),
								"nama_pasangan" => $this->input->post('nama_pasangan'),
//				if($this->input->post('warganegara') == 'WNI') {
								"ktp" => $this->input->post('ktp'),
								"ktp_tempat" => $this->input->post('ktp_tempat'),
								"ktp_terbit" => $this->input->post('ktp_terbit'),
								"ktp_berlaku_sampai" => $this->input->post('ktp_berlaku_sampai'),
								"ktp_berlaku_tanggal" => $this->input->post('ktp_berlaku_tanggal'),
								"fotoktp" => $this->input->post('fotoktp'),
								"fotoselfie" => $this->input->post('fotoselfie'),
//				} else {
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
//				}
								"ktp_alamat" => $this->input->post('ktp_alamat'),
								"ktp_rtrw" => $this->input->post('ktp_rtrw'),
								"ktp_kelurahan" => $this->input->post('ktp_kelurahan'),
								"ktp_kecamatan" => $this->input->post('ktp_kecamatan'),
								"ktp_provinceid" => $this->input->post('ktp_provinceid'),
								"ktp_cityid" => $this->input->post('ktp_cityid'),
								"ktp_kodepos" => $this->input->post('ktp_kodepos'),
								"alamatsama" => $this->input->post('alamatsama'),
								"terkini_alamat" => $this->input->post('terkini_alamat'),
								"terkini_rtrw" => $this->input->post('terkini_rtrw'),
								"terkini_kelurahan" => $this->input->post('terkini_kelurahan'),
								"terkini_kecamatan" => $this->input->post('terkini_kecamatan'),
								"terkini_provinceid" => $this->input->post('terkini_provinceid'),
								"terkini_cityid" => $this->input->post('terkini_cityid'),
								"terkini_kodepos" => $this->input->post('terkini_kodepos'),
								"phone" => $this->input->post('phone'),
								"investasi" => $this->input->post('investasi'),
								"pekerjaan" => $this->input->post('pekerjaan'),
								"npwp" => $this->input->post('npwp'),
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
								"waktu_investasi" => $this->input->post('waktu_investasi'),
								"tujuan_investasi" => $this->input->post('tujuan_investasi'),
								"resiko_investasi" => $this->input->post('resiko_investasi'),
								"dana_investasi" => $this->input->post('dana_investasi'),
								"kuis1" => $this->input->post('kuis1'),
								"kuis2" => $this->input->post('kuis2'),
								"kuis3" => $this->input->post('kuis3'),
								"kuis4" => $this->input->post('kuis4'),
								"kuis5" => $this->input->post('kuis5'),
								"kuis6" => $this->input->post('kuis6'),
								"kuis7" => $this->input->post('kuis7'),
								"kuis8" => $this->input->post('kuis8'),
								"kuis9" => $this->input->post('kuis9'),
								"kuis10" => $this->input->post('kuis10'),
								"kuis11" => $this->input->post('kuis11'),
								"kuis12" => $this->input->post('kuis12')
								);
				$this->registrasi_model->add($datadb);

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
						'config' => $config,
						'isi'	=>	'home/'.$config->template.'/registertrial');
			$this->load->view('home/'.$config->template.'/layout/wrapper',$data);

		}
		
	}
}