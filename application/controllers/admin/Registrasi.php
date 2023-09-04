<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('tabel_model');
         $this->load->model('config_model');
         $this->load->model('event_model');
         $this->load->model('registrasi_model');
		 $this->load->model('categories_model');
		 $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));

		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata('login_error','You must login to use this feature');
			redirect(base_url('admin/login'));
		} else if($this->session->userdata('usertype') == 0) {
			$this->session->set_flashdata('login_error','You are not allowed to use this feature');
			redirect(base_url('admin/login'));
		}
    }

	public function index()
	{
		$registrasi = $this->registrasi_model->listing();
//		$registrasi = $this->registrasi_model->listingbyuser($this->session->userdata('userid'));
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data Webinar Registrasi',
						'config'	=> $config,
						'registrasi' => $registrasi,
						'isi'	=>	'admin/registrasi/listtgl');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function listing()
	{
		$tglawal = $this->input->post('tglawal');
		$tglakhir = $this->input->post('tglakhir');

//		$registrasi = $this->registrasi_model->listing();
//		$registrasi = $this->registrasi_model->listingbyuser($this->session->userdata('userid'));
		$config = $this->config_model->detail(1);

		$registrasi = $this->tabel_model->searchtgl('registrasi',$tglawal,$tglakhir);

		$data = array(	'title'	=>	'Data Webinar Registrasi',
						'config'	=> $config,
						'registrasi' => $registrasi,
						'tglawal'	=> $tglawal,
						'tglakhir'	=> $tglakhir,
						'isi'	=>	'admin/registrasi/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function add()
	{
//		$category = $this->category_model->listing();
//		$sized = $this->sized_model->listing();
//		$colors = $this->colors_model->listing();
		$config = $this->config_model->detail(1);
		
		$valid = $this->form_validation;
		$valid->set_rules ('title','Title','required');
//		$valid->set_rules('catid','Category','required|callback_check_default');
//		$valid->set_message('check_default', 'You need to select something other than the default');	
//		$valid->set_rules ('category','Category','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Tambah Data Webinar Registrasi',
//							'category'	=>	$category,
//							'colors'	=>	$colors,
//							'sized'	=>	$sized,
						'config'	=> $config,
							'isi'	=>	'admin/registrasi/add');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;
			
			if(basename($_FILES['image1']['name']) == "") { $namafile1 = ''; } else { $namafile1 = $this->do_upload('image1'); }
			if(!empty($i->post('url'))) { $url = $i->post('url'); } else { $url = ''; } 

			$tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
			$tnow = date("Y-m-d", $tday);

//			$data = array(	'id_user'	=> $this->session->userdata('id'),
//							'nama'	=> $i->post('nama'),
//							'alamat'	=> $i->post('alamat'),
//							'handphone'	=> $i->post('handphone'),
//							'tanggal_gabung'	=>	$i->post('tanggal_gabung')
//						);
			$data = array(	'title'	=> $this->input->post('title'),
							'tanggal'	=> $this->input->post('tanggal'),
//							'sumber'	=> $this->input->post('sumber'),
//							'metakey'	=> $this->input->post('metakey'),
							'subtext'	=> $this->input->post('subtext'),
//							'subtext_eng'	=> $this->input->post('subtext_eng'),
//							'periode'	=> $this->input->post('periode'),
							'text'	=> $this->input->post('text'),
							'color'	=> $this->input->post('color'),
//							'deskripsi_eng'	=> $this->input->post('deskripsi_eng'),
//							'tanggal'	=> $tnow,
							'image1'	=> $namafile1
//							'userid'	=> $this->session->userdata('userid'),
//							'url'	=> $url
						);

			$this->registrasi_model->add($data);
			$this->session->set_flashdata('sukses','Data has been add');
			redirect(base_url('admin/registrasi'));
		}

	}

	public function edit($id_registrasi)
	{
			$registrasi = $this->registrasi_model->detail($id_registrasi);
//			$category = $this->category_model->listing();
//			$sized = $this->sized_model->listing();
//			$colors = $this->colors_model->listing();
		$config = $this->config_model->detail(1);

			$valid = $this->form_validation;
//			$valid->set_rules ('nama','Nama','required', 
//								array('required' => 'Nama Harus Diisi'
//								)
//					);
		$valid->set_rules ('title','Title','required');
//		$valid->set_rules ('category','Category','required');

		if($valid->run() === FALSE) {
			$data = array(	'title'	=>	'Edit Data Webinar Registrasi',
							'registrasi'	=> $registrasi,
//							'category'	=>	$category,
//							'colors'	=>	$colors,
//							'sized'	=>	$sized,
						'config'	=> $config,
							'isi'	=>	'admin/registrasi/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;

			if(basename($_FILES['image1']['name']) == "") { $namafile1 = $i->post('old-image1'); } else { $namafile1 = $this->do_upload('image1'); }
			if(!empty($i->post('url'))) { $url = $i->post('url'); } else { $url = ''; } 
//			$namafile = $this->do_upload('image1');

			$data = array(	'id'		=> $id_registrasi,
							'tanggal'		=> $i->post('tanggal'),
							'nama_lengkap'	=> $this->input->post('nama_lengkap'),
							'email'	=> $this->input->post('email'),
							'handphone'	=> $this->input->post('handphone')
						);
//			$data = array(	'title'	=> $this->input->post('title'),
//							'description'	=> $this->input->post('description'),
//							'price'	=> $this->input->post('price'),
//							'stock'	=> $this->input->post('stock')
//						);
//echo $namafile2;
//exit();
			$this->registrasi_model->edit($data);
			$this->session->set_flashdata('sukses','Data has been edit');
			redirect(base_url('admin/registrasi'));
		}

	}

	public function delete($id_registrasi)
	{
		$registrasi = $this->registrasi_model->detail($id_registrasi);
		$data = array('id' => $id_registrasi);
		$thefile = $registrasi->image;
//		echo $thefile;
		unlink($thefile);
//	exit;
		$this->registrasi_model->delete($data);
		$this->session->set_flashdata('sukses','Data has been add delete');
		redirect(base_url('admin/registrasi'));
	}

	public function detail($id_registrasi)
	{
		$registrasi = $this->registrasi_model->detail($id_registrasi);
		$config = $this->config_model->detail(1);

			$data = array(	'title'	=>	'Detail Data Formulir Pembukaan Rekening',
							'config'	=> $config,
							'registrasi'	=> $registrasi,
							'isi'	=>	'admin/registrasi/detail');
			$this->load->view('admin/layout/wrapper',$data);

	}

	public function subcategory()
	{
            $id = $this->input->post('catid');
            $response = $this->subcategory_model->listing($id);
            $htmlvalue='';
                     foreach($response as $valCat) { 
						 $htmlvalue .= "<option value='".$valCat->id."'>".$valCat->title."</option>";
					 }
			$callback = array('data_kota'=>$htmlvalue); // Masukan variabel html tadi ke dalam array $callback dengan index array : data_kota
			echo json_encode($callback);
	}

	public function exportxls()
	{
		$tglawal = $this->input->get('tglawal');
		$tglakhir = $this->input->get('tglakhir');

		if($tglawal == $tglakhir) {
			$ambildata = $this->tabel_model->export_data('st_registrasi','tanggal BETWEEN "'. date('Y-m-d H:i:s', strtotime($tglawal)). '" and "'. date('Y-m-d H:i:s', strtotime($tglakhir)+ 86400).'"');
		} else {
			$ambildata = $this->tabel_model->export_data('st_registrasi','tanggal BETWEEN "'. date('Y-m-d H:i:s', strtotime($tglawal)). '" and "'. date('Y-m-d H:i:s', strtotime($tglakhir)).'"');
		}

        if(count($ambildata)>0){

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()
                  ->setCreator("BNI Sekuritas") //creator
                    ->setTitle("BIONS");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('Data Registrasi Online'); //sheet title
             
            $objget->getStyle("A1:U1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'FFFFFF')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );

			$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ","BA","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BL");

            $val = array("Branch","acctype","RDN","Source OA","Nationality","FirstName","MiddleName","LastName","BirthPlace","BirthDate","Sex","ID.No","ID Place","ID Date","ID ExpDate","Religion","Education","MotherName","MaritalStatus","SpouseName","MobilePhone","email","ktp adr1","ktp adr2","ktp village","ktp subdistrict","ktp city","ktp prov","ktp cty","ktp zipcode","CurrentAdr","HomeTelp(1)","HomeTelp(2)","HomeTelp(3)","incometype","source income","montly income","yearly income","inv Obj","bankid","bankaccname","bankaccno","ocptype","position","linebusiness","npwp","compname","comp adr1","comp adr2","comp village","comp subdistrict","comp city","comp prov","comp cty","comp zipcode","mailing adr","cur .adr1","cur .adr2","cur .village","cur .subdictrict","cur .city","cur .prov","cur .cty","cur .zipcode");

            for ($a=0;$a<64; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);

                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AP')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AQ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AR')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AS')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AT')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AU')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AV')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AW')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AX')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AY')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AZ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BA')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('BB')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('BC')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BD')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BE')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BF')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BG')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BH')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BI')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BJ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BK')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BL')->setWidth(25); // Kontak

                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
			}

            $baris  = 2;
			$inc = 1;

           foreach ($ambildata as $frow){
				if($frow->ktp_berlaku_sampai == 'lifetime') { $ktpberlaku = '31-12-9998'; } else { $ktpberlaku = $frow->ktp_berlaku_tanggal; }
				if($frow->rekening_efek == 'syariah') { $rekefek = '01'; }  else { $rekefek = '01'; }
//				if($frow->frekuensi_penghasilan == 'm') { $fpenghasilan = 'MONTHLY'; }  else { $frow->frekuensi_penghasilan; }
				$fpenghasilan = $frow->frekuensi_penghasilan;

                $objset->setCellValue("A".$baris, '1905'); 
                $objset->setCellValue("B".$baris, $rekefek); 
                $objset->setCellValue("C".$baris, $frow->bank_rdi); 
                $objset->setCellValue("D".$baris, $frow->reff); 
                $objset->setCellValue("E".$baris, $frow->negara); 
                $objset->setCellValue("F".$baris, $frow->nama_depan); 
                $objset->setCellValue("G".$baris, $frow->nama_tengah); 
                $objset->setCellValue("H".$baris, $frow->nama_belakang); 
                $objset->setCellValue("I".$baris, $frow->tempat_lahir); 
                $objset->setCellValue("J".$baris, date('d-m-Y', strtotime($frow->tanggal_lahir))); 
                $objset->setCellValue("K".$baris, $frow->jenis_kelamin); 
                $objset->setCellValueExplicit("L".$baris, $frow->ktp,PHPExcel_Cell_DataType::TYPE_STRING); 
                $objset->setCellValue("M".$baris, $frow->ktp_tempat); 
                $objset->setCellValue("N".$baris, date('d-m-Y', strtotime($frow->ktp_terbit))); 
                $objset->setCellValue("O".$baris, date('d-m-Y', strtotime($ktpberlaku))); 
                $objset->setCellValueExplicit("P".$baris, $frow->agama,PHPExcel_Cell_DataType::TYPE_STRING); 
                $objset->setCellValue("Q".$baris, $frow->pendidikan); 
                $objset->setCellValue("R".$baris, $frow->ibu_kandung); 
                $objset->setCellValue("S".$baris, $frow->status_pernikahan); 
                $objset->setCellValue("T".$baris, $frow->nama_pasangan); 
                $objset->setCellValue("U".$baris, $frow->handphone); 
                $objset->setCellValue("V".$baris, $frow->email); 
                $objset->setCellValue("W".$baris, $frow->ktp_alamat); 
                $objset->setCellValue("X".$baris, $frow->ktp_rtrw); 
                $objset->setCellValue("Y".$baris, $frow->ktp_kelurahan); 
                $objset->setCellValue("Z".$baris, $frow->ktp_kecamatan); 
                $objset->setCellValue("AA".$baris, $frow->ktp_cityid); 
                $objset->setCellValue("AB".$baris, $frow->ktp_provinceid); 
                $objset->setCellValue("AC".$baris, $frow->ktp_negara); 
                $objset->setCellValue("AD".$baris, $frow->ktp_kodepos); 
                $objset->setCellValue("AE".$baris, $frow->alamatsama); 
                $objset->setCellValue("AF".$baris, $frow->kode_negara);
                $objset->setCellValue("AG".$baris, $frow->kode_area);
				$objset->setCellValue("AH".$baris, $frow->phone); 
                $objset->setCellValue("AI".$baris, $fpenghasilan); 
                $objset->setCellValue("AJ".$baris, $frow->sumber_penghasilan); 
                $objset->setCellValue("AK".$baris, $frow->penghasilan_bulan);
                $objset->setCellValue("AL".$baris, $frow->penghasilan_tahun);
                $objset->setCellValue("AM".$baris, $frow->investasi);
                $objset->setCellValue("AN".$baris, $frow->nama_bank);
                $objset->setCellValue("AO".$baris, $frow->nama_pemilik);
                $objset->setCellValueExplicit("AP".$baris, $frow->no_rekening,PHPExcel_Cell_DataType::TYPE_STRING); 
                $objset->setCellValue("AQ".$baris, $frow->pekerjaan);
                $objset->setCellValue("AR".$baris, $frow->jabatan); 
                $objset->setCellValue("AS".$baris, $frow->bidang_usaha); 
				$objset->setCellValueExplicit("AT".$baris, $frow->npwp,PHPExcel_Cell_DataType::TYPE_STRING); 
                $objset->setCellValue("AU".$baris, $frow->nama_perusahaan); 
                $objset->setCellValue("AV".$baris, $frow->alamat_perusahaan); 
                $objset->setCellValue("AW".$baris, $frow->perusahaan_rtrw); 
                $objset->setCellValue("AX".$baris, $frow->perusahaan_kelurahan); 
                $objset->setCellValue("AY".$baris, $frow->perusahaan_kecamatan); 
                $objset->setCellValue("AZ".$baris, $frow->perusahaan_cityid); 
                $objset->setCellValue("BA".$baris, $frow->perusahaan_provinceid); 
                $objset->setCellValue("BB".$baris, $frow->perusahaan_negara); 
                $objset->setCellValue("BC".$baris, $frow->perusahaan_kodepos); 
                $objset->setCellValue("BD".$baris, '');
				$objset->setCellValue("BE".$baris, $frow->ktp_alamat); 
                $objset->setCellValue("BF".$baris, $frow->terkini_rtrw); 
                $objset->setCellValue("BG".$baris, $frow->terkini_kelurahan); 
                $objset->setCellValue("BH".$baris, $frow->terkini_kecamatan); 
                $objset->setCellValue("BI".$baris, $frow->terkini_cityid); 
                $objset->setCellValue("BJ".$baris, $frow->terkini_provinceid); 
                $objset->setCellValue("BK".$baris, $frow->terkini_negara); 
                $objset->setCellValue("BL".$baris, $frow->terkini_kodepos); 
//                $objset->setCellValue("BH".$baris, $frow->terkini_kodepos); 
//                $objset->setCellValue("BI".$baris, $frow->terkini_kodepos); 
//                $objset->setCellValue("BJ".$baris, $frow->terkini_kodepos); 
//                $objset->setCellValue("BK".$baris, $frow->terkini_kodepos); 
//                $objset->setCellValue("BL".$baris, $frow->terkini_kodepos); 
//                $objset->setCellValue("AT".$baris, $frow->alamatsama); 
//                $objset->setCellValue("AU".$baris, $frow->terkini_alamat); 
//                $objset->setCellValue("AV".$baris, $frow->terkini_rtrw); 
//                $objset->setCellValue("AW".$baris, $frow->terkini_kelurahan); 
//                $objset->setCellValue("AX".$baris, $frow->terkini_kecamatan); 
//                $objset->setCellValue("AY".$baris, $frow->terkini_provinceid); 
//                $objset->setCellValue("AZ".$baris, $frow->terkini_cityid); 

//                $objset->setCellValue("BA".$baris, $frow->terkini_kodepos); 
//                $objset->setCellValue("BB".$baris, $frow->phone); 
//                $objset->setCellValue("BC".$baris, $frow->investasi); 
//                $objset->setCellValue("BD".$baris, $frow->pekerjaan); 
//                $objset->setCellValue("BE".$baris, $frow->npwp); 
//                $objset->setCellValue("BF".$baris, $frow->no_npwp); 
//                $objset->setCellValue("BG".$baris, $frow->nama_bank); 
//                $objset->setCellValue("BH".$baris, $frow->nama_pemilik); 
//                $objset->setCellValue("BI".$baris, $frow->no_rekening); 
//                $objset->setCellValue("BJ".$baris, $frow->fototabungan); 
//                $objset->setCellValue("BK".$baris, $frow->bank_rdi); 
//                $objset->setCellValue("BL".$baris, $frow->sumber_penghasilan); 

                $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                 
                $baris++; $inc++;
			}
            $objPHPExcel->getActiveSheet()->setTitle('Data Registrasi Online');
 
            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Dataregistrasionline".date("Y-m-d H:i:s").".xls");
               
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache
 
            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');

		} else {
            redirect(base_url().'admin/registrasi');
		} // end if count
	}

	public function exportxls1()
	{
		$tglawal = $this->input->get('tglawal');
		$tglakhir = $this->input->get('tglakhir');

		$ambildata = $this->tabel_model->export_data('st_registrasi','tanggal BETWEEN "'. date('Y-m-d', strtotime($tglawal)). '" and "'. date('Y-m-d', strtotime($tglakhir)).'"');

        if(count($ambildata)>0){

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()
                  ->setCreator("BNI Sekuritas") //creator
                    ->setTitle("BIONS");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('Data Registrasi Online'); //sheet title
             
            $objget->getStyle("A1:U1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'FFFFFF')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );

			$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ","BA","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BL","BM","BN","BO","BP","BQ","BR","BS","BT","BU","BV","BW","BX","BY","BZ","CA","CB","CC","CD");

            $val = array("Branch","acctype","RDN","Source OA","Nationality","FirstName","MiddleName","LastName","BirthPlace","BirthDate","Sex","ID.No","ID Place","ID Date","ID ExpDate","Religion","Education","MotherName","MaritalStatus","SpouseName","MobilePhone","email","ktp adr1","ktp adr2","ktp village","ktp subdictrict","ktp city","ktp prov","ktp zipcode","CurrentAdr","HomeTelp(1)","HomeTelp(2)","HomeTelp(3)","incometype","source income","montly income","yearly income","inv Obj","bankid","bankaccname","bankaccno","ocptype","position","linebusiness","npwp","compname","comp adr1","comp adr2","comp village","comp subdistrict","comp city","comp prov","comp cty","comp zipcode","mailing adr","cur .adr1","cur .adr2","cur .village","cur .subdictrict","cur .city","cur .prov","cur .cty","cur .zipcode");

//echo count($cols).'-'.count($val);
//exit();

            for ($a=0;$a<63; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);

                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AP')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AQ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AR')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AS')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AT')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AU')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AV')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AW')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AX')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AY')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AZ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BA')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('BB')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('BC')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BD')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BE')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BF')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BG')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BH')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BI')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BJ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BK')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BL')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BM')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BN')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BO')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BP')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BQ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BR')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BS')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BT')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BU')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BV')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BW')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BX')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BY')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BZ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CA')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CB')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CC')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CD')->setWidth(25); // Kontak

                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
			}

            $baris  = 2;
			$inc = 1;

            foreach ($ambildata as $frow){
				if($frow->ktp_berlaku_sampai == 'lifetime') { $ktpberlaku = '31-12-9998'; } else { $ktpberlaku = $frow->ktp_berlaku_tanggal; }

                $objset->setCellValue("A".$baris, ''); 
                $objset->setCellValue("B".$baris, ''); 
                $objset->setCellValue("C".$baris, ''); 
                $objset->setCellValue("D".$baris, ''); 
                $objset->setCellValue("E".$baris, ''); 
                $objset->setCellValue("F".$baris, $frow->nama_depan); 
                $objset->setCellValue("G".$baris, $frow->nama_tengah); 
                $objset->setCellValue("H".$baris, $frow->nama_belakang); 
                $objset->setCellValue("I".$baris, $frow->tempat_lahir); 
                $objset->setCellValue("J".$baris, date('d-m-Y', strtotime($frow->tanggal_lahir))); 
                $objset->setCellValue("K".$baris, $frow->jenis_kelamin); 
                $objset->setCellValueExplicit("L".$baris, $frow->ktp,PHPExcel_Cell_DataType::TYPE_STRING); 
                $objset->setCellValue("M".$baris, $frow->ktp_tempat); 
                $objset->setCellValue("N".$baris, date('d-m-Y', strtotime($frow->ktp_terbit))); 
                $objset->setCellValue("O".$baris, date('d-m-Y', strtotime($ktpberlaku))); 
                $objset->setCellValueExplicit("P".$baris, $frow->agama,PHPExcel_Cell_DataType::TYPE_STRING); 
                $objset->setCellValue("Q".$baris, $frow->pendidikan); 
                $objset->setCellValue("R".$baris, $frow->ibu_kandung); 
                $objset->setCellValue("S".$baris, $frow->status_pernikahan); 
                $objset->setCellValue("T".$baris, $frow->nama_pasangan); 
                $objset->setCellValue("U".$baris, $frow->handphone); 
                $objset->setCellValue("V".$baris, $frow->email); 
                $objset->setCellValue("W".$baris, $frow->ktp_alamat); 
                $objset->setCellValue("X".$baris, $frow->ktp_rtrw); 
                $objset->setCellValue("Y".$baris, $frow->ktp_kelurahan); 
                $objset->setCellValue("Z".$baris, $frow->ktp_kecamatan); 
                $objset->setCellValue("AA".$baris, $frow->ktp_cityid); 
                $objset->setCellValue("AB".$baris, $frow->ktp_provinceid); 
                $objset->setCellValue("AC".$baris, $frow->ktp_negara); 
                $objset->setCellValue("AD".$baris, $frow->ktp_kodepos); 
                $objset->setCellValue("AE".$baris, '0'); 
                $objset->setCellValue("AF".$baris, '');
                $objset->setCellValue("AG".$baris, '');
				
                $objset->setCellValue("AH".$baris, $frow->phone); 
                $objset->setCellValue("AI".$baris, ''); 
                $objset->setCellValue("AJ".$baris, ''); 
                $objset->setCellValue("AK".$baris, '');
                $objset->setCellValue("AL".$baris, '');
                $objset->setCellValue("AM".$baris, '');
                $objset->setCellValueExplicit("AN".$baris, $frow->no_rekening,PHPExcel_Cell_DataType::TYPE_STRING); 
                $objset->setCellValueExplicit("AO".$baris, $frow->npwp,PHPExcel_Cell_DataType::TYPE_STRING); 
                $objset->setCellValue("AP".$baris, $frow->nama_perusahaan); 
                $objset->setCellValue("AQ".$baris, $frow->alamat_perusahaan); 
                $objset->setCellValue("AR".$baris, $frow->perusahaan_rtrw); 
                $objset->setCellValue("AS".$baris, $frow->perusahaan_kelurahan); 
                $objset->setCellValue("AT".$baris, $frow->perusahaan_kecamatan); 
                $objset->setCellValue("AU".$baris, $frow->perusahaan_cityid); 
                $objset->setCellValue("AV".$baris, $frow->perusahaan_provinceid); 
                $objset->setCellValue("AW".$baris, $frow->perusahaan_negara); 
                $objset->setCellValue("AX".$baris, $frow->perusahaan_kodepos); 
                $objset->setCellValue("AY".$baris, '');
                $objset->setCellValue("AZ".$baris, $frow->ktp_alamat); 
                $objset->setCellValue("BA".$baris, $frow->terkini_rtrw); 
                $objset->setCellValue("BB".$baris, $frow->terkini_kelurahan); 
                $objset->setCellValue("BC".$baris, $frow->terkini_kecamatan); 
                $objset->setCellValue("BD".$baris, $frow->terkini_cityid); 
                $objset->setCellValue("BE".$baris, $frow->terkini_provinceid); 
                $objset->setCellValue("BF".$baris, $frow->terkini_negara); 
                $objset->setCellValue("BG".$baris, $frow->terkini_kodepos); 
//                $objset->setCellValue("AT".$baris, $frow->alamatsama); 
//                $objset->setCellValue("AU".$baris, $frow->terkini_alamat); 
//                $objset->setCellValue("AV".$baris, $frow->terkini_rtrw); 
//                $objset->setCellValue("AW".$baris, $frow->terkini_kelurahan); 
//                $objset->setCellValue("AX".$baris, $frow->terkini_kecamatan); 
//                $objset->setCellValue("AY".$baris, $frow->terkini_provinceid); 
//                $objset->setCellValue("AZ".$baris, $frow->terkini_cityid); 

//                $objset->setCellValue("BA".$baris, $frow->terkini_kodepos); 
//                $objset->setCellValue("BB".$baris, $frow->phone); 
//                $objset->setCellValue("BC".$baris, $frow->investasi); 
//                $objset->setCellValue("BD".$baris, $frow->pekerjaan); 
//                $objset->setCellValue("BE".$baris, $frow->npwp); 
//                $objset->setCellValue("BF".$baris, $frow->no_npwp); 
//                $objset->setCellValue("BG".$baris, $frow->nama_bank); 
//                $objset->setCellValue("BH".$baris, $frow->nama_pemilik); 
//                $objset->setCellValue("BI".$baris, $frow->no_rekening); 
//                $objset->setCellValue("BJ".$baris, $frow->fototabungan); 
//                $objset->setCellValue("BK".$baris, $frow->bank_rdi); 
//                $objset->setCellValue("BL".$baris, $frow->sumber_penghasilan); 

                $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                 
                $baris++; $inc++;
			}
            $objPHPExcel->getActiveSheet()->setTitle('Data Registrasi Online');
 
            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Dataregistrasionline".date("Y-m-d H:i:s").".xls");
               
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache
 
            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');

		} else {
            redirect(base_url().'admin/registrasi');
		}

	}

	public function exportxlsall()
	{
		$ambildata = $this->tabel_model->export_data('st_registrasi');
        if(count($ambildata)>0){

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()
                  ->setCreator("BNI Sekuritas") //creator
                    ->setTitle("BIONS");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('Data Registrasi Online'); //sheet title
             
            $objget->getStyle("A1:U1")->applyFromArray(
                array(
                    'fill' => array(
                        'type' => PHPExcel_Style_Fill::FILL_SOLID,
                        'color' => array('rgb' => 'FFFFFF')
                    ),
                    'font' => array(
                        'color' => array('rgb' => '000000')
                    )
                )
            );

//            $cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","A","B","C","D","E","F","G","H","I","J","BK","BL","BM","BN","BO","BP","BQ","BR","BS","BT","BU","BV","BW","BX","BY","BZ","CA","CB","CC","CD","CE","CF","CG","CH","CI","CJ","CK","CL","CM","CN","CO","CP","CQ","CR","CS","CT","CU","CV","CW","CX","CY","CZ");

//            $val = array("No","Tanggal","Nama Depan","Nama Tengah","Nama Belakang","Nama Alias","Kewarganegaraan","Negara","email","Handphone","Rekening Efek","Tipe Layanan","tempat lahir","tanggal lahir","jenis kelamin","agama","pendidikan","ibu kandung","status pernikahan","nama pasangan","ktp","ktp tempat","ktp terbit","ktp berlaku sampai","ktp berlaku tanggal","fotoktp","fotoselfie","paspor","paspor tempat","paspor terbit","paspor berlaku sampai","paspor berlaku tanggal","fotopaspor","kitas","kitas tempat","kitas terbit","kitas berlaku sampai","kitas berlaku tanggal","fotokitas","ktp alamat","ktp rtrw","ktp kelurahan","ktp kecamatan","ktp provinceid","ktp cityid","ktp kodepos","alamatsama","terkini alamat","terkini rtrw","terkini kelurahan","terkini kecamatan","terkini provinceid","terkini cityid","terkini kodepos","phone","investasi","pekerjaan","npwp","tanpa npwp","nama bank","nama pemilik","no. rekening","fototabungan","bank rdi","sumber penghasilan","penghasilan bulan","penghasilan tahun","kekayaan","nama perusahaan","alamat perusahaan","perusahaan alamat","perusahaan rtrw","perusahaan kelurahan","perusahaan kecamatan","perusahaan provinceid","perusahaan cityid","perusahaan kodepos","waktu investasi","tujuan investasi","resiko investasi","dana investasi","kuis1","kuis1 nama","kuis1 bagian","kuis2","kuis2 nama","kuis2 perusahaan","kuis3","kuis3 nama","kuis3 perusahaan","kuis4","kuis4 nama","kuis4 lembaga","kuis5a","kuis5b","kuis6a","kuis6b","kuis6c","kuis6d","kuis6e","kuis7","kuis8","status setuju");

			$cols = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ","BA","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BL","BM","BN","BO","BP","BQ","BR","BS","BT","BU","BV","BW","BX","BY","BZ","CA","CB","CC","CD","CE","CF","CG","CH","CI","CJ","CK","CL","CM","CN","CO","CP","CQ","CR","CS","CT","CU","CV","CW","CX");
             
            $val = array("No","Tanggal","Nama Depan","Nama Tengah","Nama Belakang","Nama Alias","Kewarganegaraan","Negara","email","Handphone","Rekening Efek","Tipe Layanan","tempat lahir","tanggal lahir","jenis kelamin","agama","pendidikan","ibu kandung","status pernikahan","nama pasangan","ktp","ktp tempat","ktp terbit","ktp berlaku sampai","ktp berlaku tanggal","fotoktp","paspor","paspor tempat","paspor terbit","paspor berlaku sampai","paspor berlaku tanggal","fotopaspor","kitas","kitas tempat","kitas terbit","kitas berlaku sampai","kitas berlaku tanggal","fotokitas","ktp alamat","ktp rtrw","ktp kelurahan","ktp kecamatan","ktp provinceid","ktp cityid","ktp kodepos","alamatsama","terkini alamat","terkini rtrw","terkini kelurahan","terkini kecamatan","terkini provinceid","terkini cityid","terkini kodepos","phone","investasi","pekerjaan","npwp","tanpa npwp","nama bank","nama pemilik","no. rekening","fototabungan","bank rdi","sumber penghasilan","penghasilan bulan","penghasilan tahun","kekayaan","nama perusahaan","alamat perusahaan","perusahaan alamat","perusahaan rtrw","perusahaan kelurahan","perusahaan kecamatan","perusahaan provinceid","perusahaan cityid","perusahaan kodepos","waktu investasi","tujuan investasi","resiko investasi","dana investasi","kuis1","kuis1 nama","kuis1 bagian","kuis2","kuis2 nama","kuis2 perusahaan","kuis3","kuis3 nama","kuis3 perusahaan","kuis4","kuis4 nama","kuis4 lembaga","kuis5a","kuis5b","kuis6a","kuis6b","kuis6c","kuis6d","kuis6e","kuis7","kuis8","status setuju");
//echo count($cols).'-'.count($val);
//exit();
            for ($a=0;$a<102; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);
                 
                //Setting lebar cell
                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AP')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AQ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AR')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AS')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AT')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AU')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AV')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AW')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AX')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AY')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('AZ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BA')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('BB')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('BC')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BD')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BE')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BF')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BG')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BH')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BI')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BJ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BK')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BL')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BM')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BN')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BO')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BP')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BQ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BR')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BS')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BT')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BU')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BV')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BW')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BX')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BY')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('BZ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CA')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('CB')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('CC')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CD')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CE')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CF')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CG')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CH')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CI')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CJ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CK')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CL')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CM')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CN')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CO')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CP')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CQ')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CR')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CS')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CT')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CU')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CV')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CW')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('CX')->setWidth(25); // Kontak
             
                $style = array(
                    'alignment' => array(
                        'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
                    )
                );
                $objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
            }

            $baris  = 2;
			$inc = 1;

            foreach ($ambildata as $frow){
                $objset->setCellValue("A".$baris, $inc); 
                $objset->setCellValue("B".$baris, date('d-m-Y H:i:s', strtotime($frow->tanggal))); 
                $objset->setCellValue("C".$baris, $frow->nama_depan); 
                $objset->setCellValue("D".$baris, $frow->nama_tengah); 
                $objset->setCellValue("E".$baris, $frow->nama_belakang); 
                $objset->setCellValue("F".$baris, $frow->nama_alias); 
                $objset->setCellValue("G".$baris, $frow->warganegara); 
                $objset->setCellValue("H".$baris, $frow->negara); 
                $objset->setCellValue("I".$baris, $frow->email); 
                $objset->setCellValue("J".$baris, $frow->handphone); 
                $objset->setCellValue("K".$baris, $frow->rekening_efek); 
                $objset->setCellValue("L".$baris, $frow->tipe_layanan); 
                $objset->setCellValue("M".$baris, $frow->tempat_lahir); 
                $objset->setCellValue("N".$baris, $frow->tanggal_lahir); 
                $objset->setCellValue("O".$baris, $frow->jenis_kelamin); 
                $objset->setCellValue("P".$baris, $frow->agama); 
                $objset->setCellValue("Q".$baris, $frow->pendidikan); 
                $objset->setCellValue("R".$baris, $frow->ibu_kandung); 
                $objset->setCellValue("S".$baris, $frow->status_pernikahan); 
                $objset->setCellValue("T".$baris, $frow->nama_pasangan); 
                $objset->setCellValue("U".$baris, $frow->ktp); 
                $objset->setCellValue("V".$baris, $frow->ktp_tempat); 
                $objset->setCellValue("W".$baris, $frow->ktp_terbit); 
                $objset->setCellValue("X".$baris, $frow->ktp_berlaku_sampai); 
                $objset->setCellValue("Y".$baris, $frow->ktp_berlaku_tanggal); 
                $objset->setCellValue("Z".$baris, $frow->fotoktp);
				
                $objset->setCellValue("AA".$baris, $frow->paspor); 
                $objset->setCellValue("AB".$baris, $frow->paspor_tempat); 
                $objset->setCellValue("AC".$baris, $frow->paspor_terbit); 
                $objset->setCellValue("AD".$baris, $frow->paspor_berlaku_sampai); 
                $objset->setCellValue("AE".$baris, $frow->paspor_berlaku_tanggal); 
                $objset->setCellValue("AF".$baris, $frow->fotopaspor); 
                $objset->setCellValue("AG".$baris, $frow->kitas); 
                $objset->setCellValue("AH".$baris, $frow->kitas_tempat); 
                $objset->setCellValue("AI".$baris, $frow->kitas_terbit); 
                $objset->setCellValue("AJ".$baris, $frow->kitas_berlaku_sampai); 
                $objset->setCellValue("AK".$baris, $frow->kitas_berlaku_tanggal); 
                $objset->setCellValue("AL".$baris, $frow->fotokitas); 
                $objset->setCellValue("AM".$baris, $frow->ktp_alamat); 
                $objset->setCellValue("AN".$baris, $frow->ktp_rtrw); 
                $objset->setCellValue("AO".$baris, $frow->ktp_kelurahan); 
                $objset->setCellValue("AP".$baris, $frow->ktp_kecamatan); 
                $objset->setCellValue("AQ".$baris, $frow->ktp_provinceid); 
                $objset->setCellValue("AR".$baris, $frow->ktp_cityid); 
                $objset->setCellValue("AS".$baris, $frow->ktp_kodepos); 
                $objset->setCellValue("AT".$baris, $frow->alamatsama); 
                $objset->setCellValue("AU".$baris, $frow->terkini_alamat); 
                $objset->setCellValue("AV".$baris, $frow->terkini_rtrw); 
                $objset->setCellValue("AW".$baris, $frow->terkini_kelurahan); 
                $objset->setCellValue("AX".$baris, $frow->terkini_kecamatan); 
                $objset->setCellValue("AY".$baris, $frow->terkini_provinceid); 
                $objset->setCellValue("AZ".$baris, $frow->terkini_cityid); 

                $objset->setCellValue("BA".$baris, $frow->terkini_kodepos); 
                $objset->setCellValue("BB".$baris, $frow->phone); 
                $objset->setCellValue("BC".$baris, $frow->investasi); 
                $objset->setCellValue("BD".$baris, $frow->pekerjaan); 
                $objset->setCellValue("BE".$baris, $frow->npwp); 
                $objset->setCellValue("BF".$baris, $frow->no_npwp); 
                $objset->setCellValue("BG".$baris, $frow->nama_bank); 
                $objset->setCellValue("BH".$baris, $frow->nama_pemilik); 
                $objset->setCellValue("BI".$baris, $frow->no_rekening); 
                $objset->setCellValue("BJ".$baris, $frow->fototabungan); 
                $objset->setCellValue("BK".$baris, $frow->bank_rdi); 
                $objset->setCellValue("BL".$baris, $frow->sumber_penghasilan); 
                $objset->setCellValue("BM".$baris, $frow->penghasilan_bulan); 
                $objset->setCellValue("BN".$baris, $frow->penghasilan_tahun); 
                $objset->setCellValue("BO".$baris, $frow->kekayaan); 
                $objset->setCellValue("BP".$baris, $frow->nama_perusahaan); 
                $objset->setCellValue("BQ".$baris, $frow->alamat_perusahaan); 
                $objset->setCellValue("BR".$baris, $frow->perusahaan_alamat); 
                $objset->setCellValue("BS".$baris, $frow->perusahaan_rtrw); 
                $objset->setCellValue("BT".$baris, $frow->perusahaan_kelurahan); 
                $objset->setCellValue("BU".$baris, $frow->perusahaan_kecamatan); 
                $objset->setCellValue("BV".$baris, $frow->perusahaan_provinceid); 
                $objset->setCellValue("BW".$baris, $frow->perusahaan_cityid); 
                $objset->setCellValue("BX".$baris, $frow->perusahaan_kodepos); 
                $objset->setCellValue("BY".$baris, $frow->waktu_investasi); 
                $objset->setCellValue("BZ".$baris, $frow->tujuan_investasi); 

                $objset->setCellValue("CA".$baris, $frow->resiko_investasi); 
                $objset->setCellValue("CB".$baris, $frow->dana_investasi); 
                $objset->setCellValue("CC".$baris, $frow->kuis1); 
                $objset->setCellValue("CD".$baris, $frow->kuis1_nama); 
                $objset->setCellValue("CE".$baris, $frow->kuis1_bagian); 
                $objset->setCellValue("CF".$baris, $frow->kuis2); 
                $objset->setCellValue("CG".$baris, $frow->kuis2_nama); 
                $objset->setCellValue("CH".$baris, $frow->kuis2_perusahaan); 
                $objset->setCellValue("CI".$baris, $frow->kuis3); 
                $objset->setCellValue("CJ".$baris, $frow->kuis3_nama); 
                $objset->setCellValue("CK".$baris, $frow->kuis3_perusahaan); 
                $objset->setCellValue("CL".$baris, $frow->kuis4); 
                $objset->setCellValue("CM".$baris, $frow->kuis4_nama); 
                $objset->setCellValue("CN".$baris, $frow->kuis4_lembaga); 
                $objset->setCellValue("CO".$baris, $frow->kuis5); 
                $objset->setCellValue("CP".$baris, $frow->kuis6); 
                $objset->setCellValue("CQ".$baris, $frow->kuis7); 
                $objset->setCellValue("CR".$baris, $frow->kuis8); 
                $objset->setCellValue("CS".$baris, $frow->kuis9); 
                $objset->setCellValue("CT".$baris, $frow->kuis10); 
                $objset->setCellValue("CU".$baris, $frow->kuis11); 
                $objset->setCellValue("CV".$baris, $frow->kuis12); 
                $objset->setCellValue("CW".$baris, $frow->kuis13); 
                $objset->setCellValue("CX".$baris, $frow->status_setuju); 

                $objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');
                 
                $baris++; $inc++;
			}

            $objPHPExcel->getActiveSheet()->setTitle('Data Pembayaran');
 
            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Dataregistrasionline".date("Y-m-d H:i:s").".xls");
               
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache
 
            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');

		} else {
            redirect(base_url().'admin/registrasi');
		}

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
    $tmppath="images/registrasi/".$this->session->userdata('userid').$tnow.uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
    if(is_uploaded_file($_FILES[$inputfie]["tmp_name"]))
    {
      move_uploaded_file($_FILES[$inputfie]['tmp_name'],$tmppath);
      return $tmppath; // returns the url of uploaded image.
    }
  }
  else
  {	
    redirect(base_url('admin/registrasi'));// redirect to show file type not support message
  }
}

}
