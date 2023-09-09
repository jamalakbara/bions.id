    <!--====== PAGE TITLE PART START ======-->
    
    <div class="page-title-area bg_cover" style="background-image: url(<?=base_url('assets/home/'.$config->template.'/')?>images/banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-title-content">
                        <span>REGISTRASI BIONS</span>
                        <h3 class="title">Formulir Aplikasi Pembukaan Rekening</h3>
                    </div>
                </div>
                <!--<div class="col-lg-6">
                    <div class="title-social d-flex justify-content-lg-end justify-content-start">
                        <div class="item">
                            <span>Share</span>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-github"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
        <div class="page-thumb">
            <img src="<?=base_url('assets/home/'.$config->template.'/')?>images/page-thumb-regist.png" alt="">
        </div>
    </div>
    
    <!--====== PAGE TITLE PART ENDS ======-->
<style>
i, span, a {
    display: block;
}
</style>
    <!--====== BLOG PART START ======-->
    
    <section class="faq-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <!--<span>REGISTRASI BIONS</span>-->
                        <h3 class="title">Data Quisionaire<br/>(Quisionaire Data)</h3>
                        <!--<ul class="nav nav-pills" id="pills-tab-2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-a-tab" data-toggle="pill" href="#pills-a" role="tab" aria-controls="pills-a" aria-selected="true">Informasi Dasar</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-b-tab" data-toggle="pill" href="#pills-b" role="tab" aria-controls="pills-b" aria-selected="false">Informasi Tambahan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-c-tab" data-toggle="pill" href="#pills-c" role="tab" aria-controls="pills-c" aria-selected="false">Kuesioner</a>
                            </li>
                        </ul>-->
                    </div>
                    <div class="tab-content" id="pills-tabContent-2">
                        <div class="tab-pane fade show active" id="pills-a" role="tabpanel" aria-labelledby="pills-a-tab">

    <section class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
<?php 
	if($this->session->flashdata('error')) {
		echo '<div class="alert alert-danger">';
		echo $this->session->flashdata('error');
		echo '</div>';
	}
?>
<p class="mb-20">Lengkapi Data Quisionaire</p>
<p class="mb-20">(please complete following Quisionaire info)</p>
<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

	echo form_open_multipart('user/registerquestionaire', 'class="form-horizontal"');
?>
                        <div class="contact-box">
<input type="hidden" name="nama_depan" value="<?=$this->input->post('nama_depan')?>">
<input type="hidden" name="nama_tengah" value="<?=$this->input->post('nama_tengah')?>">
<input type="hidden" name="nama_belakang" value="<?=$this->input->post('nama_belakang')?>">
<input type="hidden" name="warganegara" value="<?=$this->input->post('warganegara')?>">
<input type="hidden" name="negara" value="<?php if($this->input->post('warganegara') == 'WNI') { echo 'ID'; } else { $this->input->post('negara'); }?>">
<input type="hidden" name="email" value="<?=$this->input->post('email')?>">
<input type="hidden" name="handphone" value="<?=$this->input->post('handphone')?>">
<input type="hidden" name="rekening_efek" value="<?=$this->input->post('rekening_efek')?>">
<input type="hidden" name="tipe_layanan" value="<?=$this->input->post('tipe_layanan')?>">
<input type="hidden" name="tempat_lahir" value="<?=$this->input->post('tempat_lahir')?>">
<input type="hidden" name="tanggal_lahir" value="<?=$this->input->post('tanggal_lahir')?>">
<input type="hidden" name="jenis_kelamin" value="<?=$this->input->post('jenis_kelamin')?>">
<input type="hidden" name="agama" value="<?=$this->input->post('agama')?>">
<input type="hidden" name="pendidikan" value="<?=$this->input->post('pendidikan')?>">
<input type="hidden" name="ibu_kandung" value="<?=$this->input->post('ibu_kandung')?>">
<input type="hidden" name="status_pernikahan" value="<?=$this->input->post('status_pernikahan')?>">
<input type="hidden" name="nama_pasangan" value="<?=$this->input->post('nama_pasangan')?>">
<?php if($this->input->post('warganegara') == 'WNI') { ?>
<input type="hidden" name="ktp" value="<?=$this->input->post('ktp')?>">
<input type="hidden" name="ktp_tempat" value="<?=$this->input->post('ktp_tempat')?>">
<input type="hidden" name="ktp_terbit" value="<?=$this->input->post('ktp_terbit')?>">
<input type="hidden" name="ktp_berlaku_sampai" value="<?=$this->input->post('ktp_berlaku_sampai')?>">
<input type="hidden" name="ktp_berlaku_tanggal" value="<?=$this->input->post('ktp_berlaku_tanggal')?>">
<input type="hidden" name="fotoktp" value="<?=$this->input->post('fotoktp')?>">
<input type="hidden" name="fotoselfie" value="<?=$this->input->post('fotoselfie')?>">
<?php } else { ?>
<input type="hidden" name="paspor" value="<?=$this->input->post('paspor')?>">
<input type="hidden" name="paspor_tempat" value="<?=$this->input->post('paspor_tempat')?>">
<input type="hidden" name="paspor_terbit" value="<?=$this->input->post('paspor_terbit')?>">
<input type="hidden" name="paspor_berlaku_sampai" value="<?=$this->input->post('paspor_berlaku_sampai')?>">
<input type="hidden" name="paspor_berlaku_tanggal" value="<?=$this->input->post('paspor_berlaku_tanggal')?>">
<input type="hidden" name="fotopaspor" value="<?=$this->input->post('fotopaspor')?>">
<input type="hidden" name="kitas" value="<?=$this->input->post('kitas')?>">
<input type="hidden" name="kitas_tempat" value="<?=$this->input->post('kitas_tempat')?>">
<input type="hidden" name="kitas_terbit" value="<?=$this->input->post('kitas_terbit')?>">
<input type="hidden" name="kitas_berlaku_sampai" value="<?=$this->input->post('kitas_berlaku_sampai')?>">
<input type="hidden" name="kitas_berlaku_taanggal" value="<?=$this->input->post('kitas_berlaku_taanggal')?>">
<input type="hidden" name="fotokitas" value="<?=$this->input->post('fotokitas')?>">
<?php } ?>
<input type="hidden" name="ktp_alamat" value="<?=$this->input->post('ktp_alamat')?>">
<input type="hidden" name="ktp_rtrw" value="<?=$this->input->post('ktp_rtrw')?>">
<input type="hidden" name="ktp_kelurahan" value="<?=$this->input->post('ktp_kelurahan')?>">
<input type="hidden" name="ktp_kecamatan" value="<?=$this->input->post('ktp_kecamatan')?>">
<input type="hidden" name="ktp_provinceid" value="<?=$this->input->post('ktp_provinceid')?>">
<input type="hidden" name="ktp_cityid" value="<?=$this->input->post('ktp_cityid')?>">
<input type="hidden" name="ktp_kodepos" value="<?=$this->input->post('ktp_kodepos')?>">
<input type="hidden" name="alamatsama" value="<?=$this->input->post('alamatsama')?>">
<input type="hidden" name="terkini_alamat" value="<?=$this->input->post('terkini_alamat')?>">
<input type="hidden" name="terkini_rtrw" value="<?=$this->input->post('terkini_rtrw')?>">
<input type="hidden" name="terkini_kelurahan" value="<?=$this->input->post('terkini_kelurahan')?>">
<input type="hidden" name="terkini_kecamatan" value="<?=$this->input->post('terkini_kecamatan')?>">
<input type="hidden" name="terkini_provinceid" value="<?=$this->input->post('terkini_provinceid')?>">
<input type="hidden" name="terkini_cityid" value="<?=$this->input->post('terkini_cityid')?>">
<input type="hidden" name="terkini_kodepos" value="<?=$this->input->post('terkini_kodepos')?>">
<input type="hidden" name="phone" value="<?=$this->input->post('phone')?>">
<input type="hidden" name="investasi" value="<?=$this->input->post('investasi')?>">
<input type="hidden" name="pekerjaan" value="<?=$this->input->post('pekerjaan')?>">
<input type="hidden" name="npwp" value="<?=$this->input->post('npwp')?>">
<input type="hidden" name="nama_bank" value="<?=$this->input->post('nama_bank')?>">
<input type="hidden" name="nama_pemilik" value="<?=$this->input->post('nama_pemilik')?>">
<input type="hidden" name="no_rekening" value="<?=$this->input->post('no_rekening')?>">
<input type="hidden" name="fototabungan" value="<?=$this->input->post('fototabungan')?>">
<input type="hidden" name="bank_rdi" value="<?=$this->input->post('bank_rdi')?>">

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Saya dan/atau anggota keluarga bekerja pada BNI Sekuritas</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis1" type="radio" id="kuis11" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis1" type="radio" id="kuis12" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Saya dan/atau anggota keluarga bekerja pada perusahaan efek, Bursa Efek, perusahaan yang diatur oleh OJK, Bank, Asuransi atau lembaga keuangan sejenis</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis2" type="radio" id="kuis21" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis2" type="radio" id="kuis22" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Saya dan/atau anggota keluarga mempunyai pengendalian pada suatu perusahaan publik atau kepemilikan terhadap saham yang dilarang</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis3" type="radio" id="kuis31" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis3" type="radio" id="kuis32" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Saya dan/atau anggota keluarga sekarang/ sebelumnya/ akan menduduki posisi/ sedang dicalonkan untuk suatu posisi publik/Politically Exposed Person (PEP)</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis4" type="radio" id="kuis41" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis4" type="radio" id="kuis42" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Saya memiliki kewarganegaraan Amerika Serikat atau Warga Negara dari daerah teritori Amerika Serikat</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis5" type="radio" id="kuis51" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis5" type="radio" id="kuis52" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Saya memiliki Green Card/ Kartu Permanen Residen, termasuk visa kerja yang masih berlaku</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis6" type="radio" id="kuis61" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis6" type="radio" id="kuis62" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Saya memiliki domisili pajak di luar Indonesia</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis7" type="radio" id="kuis71" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis7" type="radio" id="kuis72" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Saya bertindak mewakili pemilik manfaat (beneficiary owner)</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis8" type="radio" id="kuis81" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis8" type="radio" id="kuis82" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="warganegara"><h5>Data Pemilik Manfaat</h5></label>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Hubungan (relationship)</label>
    <div class="col-sm-8">
      <input type="text" name="manfaat_hubungan" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Lengkap (full name)</label>
    <div class="col-sm-8">
      <input type="text" name="manfaat_nama_lengkap" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Tempat Lahir (place of birth)</label>
    <div class="col-sm-8">
      <input type="text" name="manfaat_tempat_lahir" class="form-control" placeholder="">
    </div>
  </div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tanggal Lahir (date of birth)</label>
							<div class="col-sm-5">
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="text" id="datepicker2"  name="manfaat_tanggal_lahir">
								</div>
							</div>
						</div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="manfaat_status_pernikahan">Status Pernikahan (marital status)</label>
	  <div class="col-sm-8">
      <select id="manfaat_status_pernikahan" name="manfaat_status_pernikahan" class="select2 form-control">
        <option value="">Select</option>
        <option value="S">Lajang</option>
        <option value="M">Menikah</option>
        <option value="R">Duda</option>
        <option value="W">Janda</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="manfaat_warganegara">Warga Negara<br>Nationality</label>
	  <div class="col-sm-8">
      <select id="manfaat_warganegara" name="manfaat_warganegara" class="form-control">
        <option value="">Select</option>
        <option value="WNI">WNI</option>
        <option value="WNA">WNA</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Tanda Pengenal (ID Card)</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="manfaat_idcard" type="radio" id="manfaat_idcard1" value="ktp">
			<label class="form-check-label" for="inlineRadio1">KTP</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="manfaat_idcard" type="radio" id="manfaat_idcard2" value="paspor">
			<label class="form-check-label" for="inlineRadio2">Paspor</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nomor KTP (ID No)</label>
    <div class="col-sm-8">
      <input type="text" name="manfaat_idcardno" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Tempat KTP Diterbitkan (Place of issuance)</label>
    <div class="col-sm-8">
      <input type="text" name="manfaat_tempat" class="form-control" placeholder="">
    </div>
  </div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tanggal KTP Diterbitkan (Date of issuance)</label>
							<div class="col-sm-5">
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="text" id="datepicker3"  name="manfaat_terbit">
								</div>
							</div>
						</div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Berlaku Sampai (expired date)</label>
    <div class="col-sm-8">
<div class="form-check form-check-inline">
  <input class="form-check-input" name="manfaat_berlaku_sampai" type="radio" id="inlineRadio1" value="lifetime" checked>
  <label class="form-check-label" for="inlineRadio1">Seumur Hidup (lifetime)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="manfaat_berlaku_sampai" type="radio" id="inlineRadio2" value="ddmmyyyy">
  <label class="form-check-label" for="inlineRadio2">DDMMYYYY</label>
</div>
								<div style="display:none;" id="ktpberlaku" class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="text" id="datepicker4"  name="manfaat_berlaku_tanggal">
								</div>
    </div>
  </div>









  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="sumber_penghasilan">Sumber Penghasilan (source of income)</label>
	  <div class="col-sm-8">
      <select id="sumber_penghasilan" name="sumber_penghasilan" class="select2 form-control">
        <option value="">Select</option>
        <option value="1">Gaji</option>
        <option value="10">Deposito</option>
        <option value="11">Pinjaman</option>
        <option value="14">Tax Amnesty</option>
        <option value="2">Hasil Usaha</option>
        <option value="3">Bunga Bank</option>
        <option value="4">Warisan</option>
        <option value="5">Hibah dari Orang tua</option>
        <option value="6">Hibah dari Pasangan</option>
        <option value="7">Uang Pensiun</option>
        <option value="8">Hasil Undian</option>
        <option value="9">Hasil Investasi</option>
        <option value="12">Lainnya</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="penghasilan_bulan">Penghasilan Per Bulan (monthly income)</label>
	  <div class="col-sm-8">
      <select id="penghasilan_bulan" name="penghasilan_bulan" class="select2 form-control">
        <option value="">Select</option>
        <option value="1">0-10 juta</option>
        <option value="2">5-10Juta</option>
        <option value="3">10-20Juta</option>
        <option value="4">20-50Juta</option>
        <option value="5">50-100Juta</option>
        <option value="6">Diatas 100juta</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="penghasilan_tahun">Penghasilan Per Tahun (annual income)</label>
	  <div class="col-sm-8">
      <select id="penghasilan_tahun" name="penghasilan_tahun" class="select2 form-control">
        <option value="">Select</option>
        <option value="00">0-10 juta</option>
        <option value="01">10-50 juta</option>
        <option value="02">1 - 2,5Milyar</option>
        <option value="03">100-500 juta</option>
        <option value="05">500 juta-1 Milyar</option>
        <option value="06">Diatas 1 Milyar</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="kekayaan">Kekayaan Bersih (net worth)</label>
	  <div class="col-sm-8">
      <select id="kekayaan" name="kekayaan" class="select2 form-control">
        <option value="">Select</option>
        <option value="01">0-500juta</option>
        <option value="02">500Juta - 1Milyar</option>
        <option value="03">1 - 2,5Milyar</option>
        <option value="04">2,5 - 5Milyar</option>
        <option value="05">5 - 10Milyarr</option>
        <option value="06">Diatas 10Milyar</option>
      </select>
    </div>
  </div>
 <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Jalan (Street Name)</label>
    <div class="col-sm-8">
      <input type="text" name="perusahaan_alamat" id="perusahaan_alamat" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">RT/RW/Perumahan</label>
    <div class="col-sm-8">
      <input type="text" name="perusahaan_rtrw" id="perusahaan_rtrw" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kelurahan (Village)</label>
    <div class="col-sm-8">
      <input type="text" name="perusahaan_kelurahan" id="perusahaan_kelurahan" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kecamatan (Sub-District)</label>
    <div class="col-sm-8">
      <input type="text" name="perusahaan_kecamatan" id="perusahaan_kecamatan" class="form-control" placeholder="">
    </div>
  </div>
                <div class="form-group row">
                  <label for="input1" class="col-sm-4 control-label">Provinsi (Province)</label>
                  <div class="col-sm-8">
                  <select name="perusahaan_provinceid" class="select2 form-control" id="perusahaan_province" >
				  <option value="0">Select Provinsi (Province)</option>
<?php $i = 1; foreach($propinsi as $row) { ?>
                    <option value="<?=$row->provinceid?>"><?=$row->province?></option>
<?php $i++; } ?>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input1" class="col-sm-4 control-label">Kota/Kabupaten (City)</label>
                  <div class="col-sm-8">
                  <select name="perusahaan_cityid" class="select2 form-control" id="perusahaan_city" >
				  <option value="">Select Kota/Kabupaten (City)</option>
                  </select>
				<div id="perusahaanloading" style="margin-top: 15px;">
					<img src="<?=base_url();?>images/loading.gif" width="18"> <small>Loading...</small>
				</div>
                  </div>
                </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kodepos (Zip Code)</label>
    <div class="col-sm-8">
      <input type="text" name="perusahaan_kodepos" id="perusahaan_kodepos" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="warganegara"><h5>PROFIL RISIKO (Risk Profile)</h5></label>
  </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">2. apa tujuan investasi anda?</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="tujuan_investasi" type="radio" id="tujuan_investasi1" value="5">
			<label class="form-check-label" for="inlineRadio1">keamanan dana investasi</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="tujuan_investasi" type="radio" id="tujuan_investasi2" value="10">
			<label class="form-check-label" for="inlineRadio2">pendapatan & keamanan dana investasi</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="tujuan_investasi" type="radio" id="tujuan_investasi3" value="15">
			<label class="form-check-label" for="inlineRadio2">pendapatan dan pertumbuhan jangkapanjang</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="tujuan_investasi" type="radio" id="tujuan_investasi4" value="20">
			<label class="form-check-label" for="inlineRadio2">pertumbuhan</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">3. berapa tingkat risiko yang dapat anda toleransi?</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="resiko_investasi" type="radio" id="resiko_investasi1" value="5">
			<label class="form-check-label" for="inlineRadio1">0%</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="resiko_investasi" type="radio" id="resiko_investasi2" value="10">
			<label class="form-check-label" for="inlineRadio2">< 25%</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="resiko_investasi" type="radio" id="resiko_investasi3" value="15">
			<label class="form-check-label" for="inlineRadio2">26-50%</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="resiko_investasi" type="radio" id="resiko_investasi4" value="20">
			<label class="form-check-label" for="inlineRadio2">>50%</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">4. berapa % dari pendapatan anda yang akan digunakan untuk investasi?</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="dana_investasi" type="radio" id="dana_investasi1" value="5">
			<label class="form-check-label" for="inlineRadio1">< 10%</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="dana_investasi" type="radio" id="dana_investasi2" value="10">
			<label class="form-check-label" for="inlineRadio2">10-25%</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="dana_investasi" type="radio" id="dana_investasi3" value="15">
			<label class="form-check-label" for="inlineRadio2">26-50%</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="dana_investasi" type="radio" id="dana_investasi4" value="20">
			<label class="form-check-label" for="inlineRadio2">>50%</label>
		</div>
    </div>
  </div>

  <!--<p class="mb-20">"Rekening Dana Investor (RDI) adalah rekening dana wajib atas nama investor yang dibuka pada bank administrator untuk mencatat mutasi transaksi investasi"</p>-->
<button type="submit" class="main-btn">Lanjut  <i class="fal fa-arrow-right"></i></button>
                        </div>
<?php
	echo form_close();
?> 
                </div>
            </div>
        </div>
    </section>
                        </div>
                        <div class="tab-pane fade" id="pills-b" role="tabpanel" aria-labelledby="pills-b-tab">

                        </div>
                        <div class="tab-pane fade" id="pills-c" role="tabpanel" aria-labelledby="pills-c-tab">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== BLOG PART ENDS ======-->
