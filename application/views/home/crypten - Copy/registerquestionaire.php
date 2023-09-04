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

	echo form_open_multipart('user/registersend', 'class="form-horizontal"');
?>
                        <div class="contact-box">
<input type="hidden" name="reff" value="<?=$this->input->post('reff')?>">
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
<input type="text" name="ktp_berlaku_sampai" value="<?=$this->input->post('ktp_berlaku_sampai')?>">
<input type="text" name="ktp_berlaku_tanggal" value="<?=$this->input->post('ktp_berlaku_tanggal')?>">
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
<input type="hidden" name="sumber_penghasilan" value="<?=$this->input->post('sumber_penghasilan')?>">
<input type="hidden" name="penghasilan_bulan" value="<?=$this->input->post('penghasilan_bulan')?>">
<input type="hidden" name="penghasilan_tahun" value="<?=$this->input->post('penghasilan_tahun')?>">
<input type="hidden" name="kekayaan" value="<?=$this->input->post('kekayaan')?>">
<input type="hidden" name="nama_perusahaan" value="<?=$this->input->post('nama_perusahaan')?>">
<input type="hidden" name="alamat_perusahaan" value="<?=$this->input->post('alamat_perusahaan')?>">
<input type="hidden" name="perusahaan_alamat" value="<?=$this->input->post('perusahaan_alamat')?>">
<input type="hidden" name="perusahaan_rtrw" value="<?=$this->input->post('perusahaan_rtrw')?>">
<input type="hidden" name="perusahaan_kelurahan" value="<?=$this->input->post('perusahaan_kelurahan')?>">
<input type="hidden" name="perusahaan_kecamatan" value="<?=$this->input->post('perusahaan_kecamatan')?>">
<input type="hidden" name="perusahaan_provinceid" value="<?=$this->input->post('perusahaan_provinceid')?>">
<input type="hidden" name="perusahaan_cityid" value="<?=$this->input->post('perusahaan_cityid')?>">
<input type="hidden" name="perusahaan_kodepos" value="<?=$this->input->post('perusahaan_kodepos')?>">
<input type="hidden" name="waktu_investasi" value="<?=$this->input->post('waktu_investasi')?>">
<input type="hidden" name="tujuan_investasi" value="<?=$this->input->post('tujuan_investasi')?>">
<input type="hidden" name="resiko_investasi" value="<?=$this->input->post('resiko_investasi')?>">
<input type="hidden" name="dana_investasi" value="<?=$this->input->post('dana_investasi')?>">

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-8 col-form-label">Saya dan/atau anggota keluarga bekerja pada BNI Sekuritas</label>
    <div class="col-sm-4">
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
    <label for="staticEmail" class="col-sm-8 col-form-label">Saya dan/atau anggota keluarga bekerja pada perusahaan efek, Bursa Efek, perusahaan yang diatur oleh OJK, Bank, Asuransi atau lembaga keuangan sejenis</label>
    <div class="col-sm-4">
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
    <label for="staticEmail" class="col-sm-8 col-form-label">Saya dan/atau anggota keluarga mempunyai pengendalian pada suatu perusahaan publik atau kepemilikan terhadap saham yang dilarang</label>
    <div class="col-sm-4">
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
    <label for="staticEmail" class="col-sm-8 col-form-label">Saya dan/atau anggota keluarga sekarang/ sebelumnya/ akan menduduki posisi/ sedang dicalonkan untuk suatu posisi publik/Politically Exposed Person (PEP)</label>
    <div class="col-sm-4">
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
    <label for="staticEmail" class="col-sm-8 col-form-label">Saya memiliki kewarganegaraan Amerika Serikat atau Warga Negara dari daerah teritori Amerika Serikat</label>
    <div class="col-sm-4">
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
    <label for="staticEmail" class="col-sm-8 col-form-label">Saya memiliki Green Card/ Kartu Permanen Residen, termasuk visa kerja yang masih berlaku</label>
    <div class="col-sm-4">
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
    <label for="staticEmail" class="col-sm-8 col-form-label">Saya memiliki domisili pajak di luar Indonesia</label>
    <div class="col-sm-4">
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
    <label for="staticEmail" class="col-sm-8 col-form-label">Saya bertindak mewakili pemilik manfaat (beneficiary owner)</label>
    <div class="col-sm-4">
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
    <label for="staticEmail" class="col-sm-8 col-form-label">Apakah Anda dilahirkan di Amerika Serikat?</label>
    <div class="col-sm-4">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis9" type="radio" id="kuis91" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis9" type="radio" id="kuis92" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-8 col-form-label">Apakah Anda memberikan Surat Kuasa atau kewenangan tandatangan yang masih berlaku kepada seseorang yang memiliki alamat di Amerika Serikat ?</label>
    <div class="col-sm-4">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis10" type="radio" id="kuis101" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis10" type="radio" id="kuis102" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-8 col-form-label">Apakah anda memberikan instruksi otomatis untuk melakukan transfer dana ke rekening yang dikelola di Amerika Serikat ?</label>
    <div class="col-sm-4">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis11" type="radio" id="kuis111" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis11" type="radio" id="kuis112" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-8 col-form-label">Apakah Anda memiliki alamat "in care of" atau "hold mail" sebagai satu-satunya alamat ?
</label>
    <div class="col-sm-4">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis12" type="radio" id="kuis121" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis12" type="radio" id="kuis122" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>


  <!--<p class="mb-20">"Rekening Dana Investor (RDI) adalah rekening dana wajib atas nama investor yang dibuka pada bank administrator untuk mencatat mutasi transaksi investasi"</p>-->
<button type="submit" class="main-btn">Submit Registration Data <i class="fal fa-arrow-right"></i></button>
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
