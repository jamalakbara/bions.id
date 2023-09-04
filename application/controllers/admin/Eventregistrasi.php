<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventregistrasi extends CI_Controller {

    public function __construct()
    {
         parent::__construct();
         $this->load->model('tabel_model');
         $this->load->model('config_model');
         $this->load->model('event_model');
         $this->load->model('eventregistrasi_model');
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
		$eventregistrasi = $this->eventregistrasi_model->listing();
//		$eventregistrasi = $this->eventregistrasi_model->listingbyuser($this->session->userdata('userid'));
		$config = $this->config_model->detail(1);

		$data = array(	'title'	=>	'Data Webinar Eventregistrasi',
						'config'	=> $config,
						'eventregistrasi' => $eventregistrasi,
						'isi'	=>	'admin/eventregistrasi/listtgl');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function listing()
	{
		$tglawal = $this->input->post('tglawal');
		$tglakhir = $this->input->post('tglakhir');

		$eventregistrasi = $this->eventregistrasi_model->listing();
		$config = $this->config_model->detail(1);

		$eventregistrasi = $this->tabel_model->searchtgl('eventregistrasi',$tglawal,$tglakhir);

		$data = array(	'title'	=>	'Data Webinar Eventregistrasi',
						'config'	=> $config,
						'eventregistrasi' => $eventregistrasi,
						'tglawal'	=> $tglawal,
						'tglakhir'	=> $tglakhir,
						'isi'	=>	'admin/eventregistrasi/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	public function exportxls()
	{
		$tglawal = $this->input->get('tglawal');
		$tglakhir = $this->input->get('tglakhir');

		$ambildata = $this->tabel_model->export_data('st_eventregistrasi','tanggal BETWEEN "'. date('Y-m-d', strtotime($tglawal)). '" and "'. date('Y-m-d', strtotime($tglakhir)).'"');

        if(count($ambildata)>0){

            $objPHPExcel = new PHPExcel();

            $objPHPExcel->getProperties()
                  ->setCreator("BNI Sekuritas") //creator
                    ->setTitle("BIONS");  //file title
 
            $objset = $objPHPExcel->setActiveSheetIndex(0); //inisiasi set object
            $objget = $objPHPExcel->getActiveSheet();  //inisiasi get object
 
            $objget->setTitle('Data Registrasi Event'); //sheet title
             
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

			$cols = array("A","B","C","D","E");

            $val = array("Event","Tanggal","Nama","Email","Handphone");

//echo count($cols).'-'.count($val);
//exit();

            for ($a=0;$a<5; $a++) 
            {
                $objset->setCellValue($cols[$a].'1', $val[$a]);

                $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(25); // NAMA
                $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // ALAMAT
                $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(25); // Kontak
                $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Kontak

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
//				if($frow->ktp_berlaku_sampai == 'lifetime') { $ktpberlaku = '31-12-9998'; } else { $ktpberlaku = $frow->ktp_berlaku_tanggal; }
				$event = $this->event_model->detail($frow->eventid);

                $objset->setCellValue("A".$baris, $event->title); 
                $objset->setCellValue("B".$baris, date('d-m-Y', strtotime($frow->tanggal)));
                $objset->setCellValue("C".$baris, $frow->nama_lengkap); 
                $objset->setCellValue("D".$baris, $frow->email); 
                $objset->setCellValue("E".$baris, $frow->handphone); 
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
            $objPHPExcel->getActiveSheet()->setTitle('Data Registrasi Event');
 
            $objPHPExcel->setActiveSheetIndex(0);  
            $filename = urlencode("Dataeventregistrasionline".date("Y-m-d H:i:s").".xls");
               
              header('Content-Type: application/vnd.ms-excel'); //mime type
              header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
              header('Cache-Control: max-age=0'); //no cache
 
            $objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');                
            $objWriter->save('php://output');

		} else {
            redirect(base_url().'admin/eventregistrasi');
		}

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
			$data = array(	'title'	=>	'Tambah Data Webinar Eventregistrasi',
//							'category'	=>	$category,
//							'colors'	=>	$colors,
//							'sized'	=>	$sized,
						'config'	=> $config,
							'isi'	=>	'admin/eventregistrasi/add');
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

			$this->eventregistrasi_model->add($data);
			$this->session->set_flashdata('sukses','Data has been add');
			redirect(base_url('admin/eventregistrasi'));
		}

	}

	public function edit($id_eventregistrasi)
	{
			$eventregistrasi = $this->eventregistrasi_model->detail($id_eventregistrasi);
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
			$data = array(	'title'	=>	'Edit Data Webinar Eventregistrasi',
							'eventregistrasi'	=> $eventregistrasi,
//							'category'	=>	$category,
//							'colors'	=>	$colors,
//							'sized'	=>	$sized,
						'config'	=> $config,
							'isi'	=>	'admin/eventregistrasi/edit');
			$this->load->view('admin/layout/wrapper',$data);
		} else {
			$i = $this->input;

			if(basename($_FILES['image1']['name']) == "") { $namafile1 = $i->post('old-image1'); } else { $namafile1 = $this->do_upload('image1'); }
			if(!empty($i->post('url'))) { $url = $i->post('url'); } else { $url = ''; } 
//			$namafile = $this->do_upload('image1');

			$data = array(	'id'		=> $id_eventregistrasi,
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
			$this->eventregistrasi_model->edit($data);
			$this->session->set_flashdata('sukses','Data has been edit');
			redirect(base_url('admin/eventregistrasi'));
		}

	}

	public function delete($id_eventregistrasi)
	{
		$eventregistrasi = $this->eventregistrasi_model->detail($id_eventregistrasi);
		$data = array('id' => $id_eventregistrasi);
		$thefile = $eventregistrasi->image;
//		echo $thefile;
		unlink($thefile);
//	exit;
		$this->eventregistrasi_model->delete($data);
		$this->session->set_flashdata('sukses','Data has been add delete');
		redirect(base_url('admin/eventregistrasi'));
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

function do_upload($inputfie)
{
  $tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
  $tnow = date("Ymd", $tday);

  $url = base_url()."images/eventregistrasi";
  $image=basename($_FILES[$inputfie]['name']);
  $image=str_replace(' ','|',$image);
  $type = explode(".",$image);
  $type = $type[count($type)-1];
  if (in_array($type,array('jpg','jpeg','png','gif')))
  {
    $tmppath="images/eventregistrasi/".$this->session->userdata('userid').$tnow.uniqid(rand()).".".$type; // uniqid(rand()) function generates unique random number.
    if(is_uploaded_file($_FILES[$inputfie]["tmp_name"]))
    {
      move_uploaded_file($_FILES[$inputfie]['tmp_name'],$tmppath);
      return $tmppath; // returns the url of uploaded image.
    }
  }
  else
  {	
    redirect(base_url('admin/eventregistrasi'));// redirect to show file type not support message
  }
}

}
