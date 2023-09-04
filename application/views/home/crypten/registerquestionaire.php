<?php
				$tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
				$tyesterday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d")-1, gmdate("Y"));
				$tnow = date("Y-m-d", $tday);
				$tyday = date("Y-m-d", $tyesterday);
?>

<style>
.tabeledd td {
	padding: 2px;
}
</style>

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
                <div class="col-lg-10">
                    <div class="section-title text-center">
                        <!--<span>REGISTRASI BIONS</span>-->
                        <h3 class="title">Informasi Lainnya<br/>(Other Information)</h3>
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
<p class="mb-20"><h5>Lengkapi pertanyaan dibawah ini</h5></p>
<p class="mb-20"><h5>(Please complete the following question)</h5></p>
<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

	echo form_open_multipart('user/registersend', 'class="form-horizontal" onsubmit="return cekpersetujuan(this);"');
?>
                        <div class="contact-box">
<input type="hidden" name="reff" value="<?=$this->input->post('reff')?>">
<input type="hidden" name="nama_depan" value="<?=$this->input->post('nama_depan')?>">
<input type="hidden" name="nama_tengah" value="<?=$this->input->post('nama_tengah')?>">
<input type="hidden" name="nama_belakang" value="<?=$this->input->post('nama_belakang')?>">
<input type="hidden" name="nama_alias" value="<?=$this->input->post('nama_alias')?>">
<input type="hidden" name="warganegara" value="<?=$this->input->post('warganegara')?>">
<input type="hidden" name="negara" value="<?php if($this->input->post('warganegara') == 'WNI') { echo 'ID'; } else { echo $this->input->post('negara'); }?>">
<input type="hidden" name="email" value="<?=$this->input->post('email')?>">
<input type="hidden" name="handphone" value="<?=$this->input->post('handphone')?>">
<input type="hidden" name="rekening_efek" value="<?=$this->input->post('rekening_efek')?>">
<input type="hidden" name="tipe_layanan" value="<?=$this->input->post('tipe_layanan')?>">
<input type="hidden" name="cabang" value="<?=$this->input->post('cabang')?>">
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
<input type="hidden" name="ktp_negara" value="<?=$this->input->post('ktp_negara')?>">
<input type="hidden" name="alamatsama" value="<?=$this->input->post('alamatsama')?>">
<input type="hidden" name="terkini_alamat" value="<?=$this->input->post('terkini_alamat')?>">
<input type="hidden" name="terkini_rtrw" value="<?=$this->input->post('terkini_rtrw')?>">
<input type="hidden" name="terkini_kelurahan" value="<?=$this->input->post('terkini_kelurahan')?>">
<input type="hidden" name="terkini_kecamatan" value="<?=$this->input->post('terkini_kecamatan')?>">
<input type="hidden" name="terkini_provinceid" value="<?=$this->input->post('terkini_provinceid')?>">
<input type="hidden" name="terkini_cityid" value="<?=$this->input->post('terkini_cityid')?>">
<input type="hidden" name="terkini_kodepos" value="<?=$this->input->post('terkini_kodepos')?>">
<input type="hidden" name="terkini_negara" value="<?=$this->input->post('terkini_negara')?>">
<input type="hidden" name="kode_negara" value="<?=$this->input->post('kode_negara')?>">
<input type="hidden" name="kode_area" value="<?=$this->input->post('kode_area')?>">
<input type="hidden" name="phone" value="<?=$this->input->post('phone')?>">
<input type="hidden" name="investasi" value="<?=$this->input->post('investasi')?>">
<input type="hidden" name="pekerjaan" value="<?=$this->input->post('pekerjaan')?>">

<input type="hidden" name="nama_tempat_kerja" value="<?=$this->input->post('nama_tempat_kerja')?>">
<input type="hidden" name="kerja_tahun" value="<?=$this->input->post('kerja_tahun')?>">
<input type="hidden" name="kerja_bulan" value="<?=$this->input->post('kerja_bulan')?>">
<input type="hidden" name="bidang_usaha" value="<?=$this->input->post('bidang_usaha')?>">
<input type="hidden" name="jabatan" value="<?=$this->input->post('jabatan')?>">
<input type="hidden" name="frekuensi_penghasilan" value="<?=$this->input->post('frekuensi_penghasilan')?>">
<input type="hidden" name="kepemilikan_asset" value="<?=$this->input->post('kepemilikan_asset')?>">

<input type="hidden" name="npwp" value="<?=$this->input->post('npwp')?>">
<input type="hidden" name="no_npwp" value="<?=$this->input->post('no_npwp')?>">
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
<input type="hidden" name="perusahaan_telp" value="<?=$this->input->post('perusahaan_telp')?>">
<input type="hidden" name="perusahaan_fax" value="<?=$this->input->post('perusahaan_fax')?>">
<input type="hidden" name="perusahaan_negara" value="<?=$this->input->post('perusahaan_negara')?>">
<input type="hidden" name="waktu_investasi" value="<?=$this->input->post('waktu_investasi')?>">
<input type="hidden" name="tujuan_investasi" value="<?=$this->input->post('tujuan_investasi')?>">
<input type="hidden" name="resiko_investasi" value="<?=$this->input->post('resiko_investasi')?>">
<input type="hidden" name="dana_investasi" value="<?=$this->input->post('dana_investasi')?>">
<input type="hidden" name="pengetahuan_investasi" value="<?=$this->input->post('pengetahuan_investasi')?>">

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-8 col-form-label">1. Apakah anda dan atau anggota keluarga (termasuk orang tua/saudara kandung) bekerja di PT BNI Sekuritas ? <i>(Are you any of your relatives (including parent/sibling) working for PT BNI Sekuritas.?)</i></label>
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

<div id="kuis1">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Nama <i>(Name)</i></label>
    <div class="col-sm-6">
      <input type="text" name="kuis1_nama" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Bagian <i>(Department)</i></label>
    <div class="col-sm-6">
      <input type="text" name="kuis1_bagian" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
</div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-8 col-form-label">2. Apakah anda mempunyai saudara atau anggota keluarga (ternasuk orang tua/saudara kandung)
yang bekerja pada perusahaan Efek, Bursa, Badan Pengawas Pasar Modal dan Lembaga Jasa Keuangan atau sejenis? <i>(Do you have any relatives (including parent/sibling) working in other securities company, Stock Exchange, other company under supervisor of Indonesian Stock Exchange, Indonesian Financial Service Authority or other similar financial institution.?)</i></label>
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

<div id="kuis2">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Nama <i>(Name)</i></label>
    <div class="col-sm-6">
      <input type="text" name="kuis2_nama" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Nama Perusahaan <i>(Company Name)</i></label>
    <div class="col-sm-6">
      <input type="text" name="kuis2_perusahaan" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
</div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-8 col-form-label">3. Apakah anda mempunyai saudara atau anggota keluarga (termasuk orangtua/saudara kandung
samoai dengan derajat ketiga) yang mempunyai status sebagai Direktur atau mempunyai pengendalian pada suatu perusahaan public atau kepemilikan terhadap saham yang dilarang? <i>(Do you have any relatives being an employee of a company, Director or having control to any
public company or having prohibiled stock?)</i></label>
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

<div id="kuis3">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Nama <i>(Name)</i></label>
    <div class="col-sm-6">
      <input type="text" name="kuis3_nama" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Nama Perusahaan <i>(Company Name)</i></label>
    <div class="col-sm-6">
      <input type="text" name="kuis3_perusahaan" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
</div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-8 col-form-label">4. Apakah anda mempunyai pasangan, anggota keluarga (termasuk orang tua/saudara kandung) sekarang/sebelumnya yang akan menduduki posisi sebagai pejabat atau calon untuk suatu posisi public/Politically Exposed Person (PEP)? <i>(Are you or your spouse, family member (including parent/sibling) now/previously/ will hold be nomunated for any position exposed to public (PEP).?)</i></label>
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
<label class="col-sm-12 col-form-label"><h6>Jika jawaban "Ya" silahkan melengkapi Formulir Uji Tuntas (EDD) <i>(Please complete ENHANCED DUE DILIGENCE FORM form, if any answer of above question is "Yes")</i></h6></label>
  </div>

<div id="kuis4">
  <div class="form-group row">
  	<label for="staticEmail" class="col-form-label">Data Anggota Keluarga (Family Member Data)</label><br/>
  	<table class="tabeledd">
		<tr>
			<td>Nama Lengkap / Full Name</td>
			<td>Tempat & Tanggal Lahir / Place & Birth Date</td>
			<td>Pekerjaan / Occupation</td>
			<td>Hubungan Kekeluargaan / Family Relation</td>
		</tr>
		<tr>
			<td><input type="text" name="edd_nama1" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_tgllahir1" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_pekerjaan1" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_hubungan1" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
		</tr>
		<tr>
			<td><input type="text" name="edd_nama2" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_tgllahir2" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_pekerjaan2" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_hubungan2" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
		</tr>
		<tr>
			<td><input type="text" name="edd_nama3" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_tgllahir3" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_pekerjaan3" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_hubungan3" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
		</tr>
		<tr>
			<td><input type="text" name="edd_nama4" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_tgllahir4" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_pekerjaan4" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_hubungan4" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
		</tr>
		<tr>
			<td><input type="text" name="edd_nama5" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_tgllahir5" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_pekerjaan5" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="edd_hubungan5" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
		</tr>
	</table>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Status Tempat Tinggal di Luar Indonesia (Residence Status Outside Indonesia)</label>
    <div class="col-sm-8">
      <input type="text" name="edd_tinggal" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Jenis Tempat Tinggal (Residential Type)</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_rumah" type="radio" id="edd_rumah1" value="1">
			<label class="form-check-label" for="inlineRadio1">Apartemen / Apartment</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_rumah" type="radio" id="edd_rumah2" value="2">
			<label class="form-check-label" for="inlineRadio2">Rumah / House</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_rumah" type="radio" id="edd_rumah3" value="3">
			<label class="form-check-label" for="inlineRadio2">Rumah Dinas / Official Residence</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_rumah" type="radio" id="edd_rumah4" value="4">
			<label class="form-check-label" for="inlineRadio2">Villa / Town House / Cluster</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kepemilikan Rumah yang Ditempati (Ownership of The Occupied House)</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_milik" type="radio" id="edd_milik1" value="1">
			<label class="form-check-label" for="inlineRadio1">Milik sendiri / self-owned</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_milik" type="radio" id="edd_milik2" value="2">
			<label class="form-check-label" for="inlineRadio2">Rumah orang tua / parent's owned</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_milik" type="radio" id="edd_milik3" value="3">
			<label class="form-check-label" for="inlineRadio2">Sewa kontrak / contract lease</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_milik" type="radio" id="edd_milik4" value="4">
			<label class="form-check-label" for="inlineRadio2">Lainnya / others</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-12 col-form-label" for="warganegara">Kepemilikan Rumah Milik Sendiri lainnya (Ownership of Other Self-Owned House)</label>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">a.</label>
    <div class="col-sm-8">
      <input type="text" name="edd_owner_a" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">b.</label>
    <div class="col-sm-8">
      <input type="text" name="edd_owner_b" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">c.</label>
    <div class="col-sm-8">
      <input type="text" name="edd_owner_c" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">d.</label>
    <div class="col-sm-8">
      <input type="text" name="edd_owner_d" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">e.</label>
    <div class="col-sm-8">
      <input type="text" name="edd_owner_e" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kepemilikan Kendaraan Bermotor (Ownership of Motor Vehicles)</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_kendaraan" type="radio" id="edd_kendaraan1" value="1">
			<label class="form-check-label" for="inlineRadio1">Mobil Sedan/ Saloon Car</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_kendaraan" type="radio" id="edd_kendaraan2" value="2">
			<label class="form-check-label" for="inlineRadio2">Station Wagon</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_kendaraan" type="radio" id="edd_kendaraan3" value="3">
			<label class="form-check-label" for="inlineRadio2">Mobil Sport / Sports Car</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_kendaraan" type="radio" id="edd_kendaraan4" value="4">
			<label class="form-check-label" for="inlineRadio2">Motor / Motorcycle</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_kendaraan" type="radio" id="edd_kendaraan5" value="5">
			<label class="form-check-label" for="inlineRadio2">Lainnya / Others</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-12 col-form-label" for="warganegara">Sumber Pendapatan (Estimasi) / Source of Income (Estimation)</label>
  </div>
  <div class="form-group row">
  	<table class="tabeledd">
		<tr>
			<td></td>
			<td>IDR</td>
			<td>Foreign Currency</td>
		</tr>
		<tr>
			<td>Gaji / Salary</td>
			<td><input type="number" name="edd_gaji1" class="form-control" onkeypress='return isnumber(this);' placeholder=""></td>
			<td><input type="text" name="edd_gaji2" class="form-control" onkeypress='return isnumber(this);' placeholder=""></td>
		</tr>
		<tr>
			<td>Investasi / Investment</td>
			<td><input type="number" name="edd_investasi1" class="form-control" onkeypress='return isnumber(this);' placeholder=""></td>
			<td><input type="text" name="edd_investasi2" class="form-control" onkeypress='return isnumber(this);' placeholder=""></td>
		</tr>
		<tr>
			<td>Dividen / Dividend</td>
			<td><input type="number" name="edd_dividen1" class="form-control" onkeypress='return isnumber(this);' placeholder=""></td>
			<td><input type="text" name="edd_dividen2" class="form-control" onkeypress='return isnumber(this);' placeholder=""></td>
		</tr>
		<tr>
			<td>Bisnis / Business</td>
			<td><input type="number" name="edd_bisnis1" class="form-control" onkeypress='return isnumber(this);' placeholder=""></td>
			<td><input type="text" name="edd_bisnis2" class="form-control" onkeypress='return isnumber(this);' placeholder=""></td>
		</tr>
		<tr>
			<td>Lainnya / Others</td>
			<td><input type="number" name="edd_lainnya1" class="form-control" onkeypress='return isnumber(this);' placeholder=""></td>
			<td><input type="text" name="edd_lainnya2" class="form-control" onkeypress='return isnumber(this);' placeholder=""></td>
		</tr>
	</table>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Sumber Kekayaan (Source of Wealth)</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_sumber" type="radio" id="edd_sumber1" value="1">
			<label class="form-check-label" for="inlineRadio1">Warisan / Inheritance</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_sumber" type="radio" id="edd_sumber2" value="2">
			<label class="form-check-label" for="inlineRadio2">Bisnis / Business </label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_sumber" type="radio" id="edd_sumber3" value="3">
			<label class="form-check-label" for="inlineRadio2">Investasi / Investment</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_sumber" type="radio" id="edd_sumber4" value="4">
			<label class="form-check-label" for="inlineRadio2">Profesi / Professional</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="edd_sumber" type="radio" id="edd_sumber5" value="5">
			<label class="form-check-label" for="inlineRadio2">Lainnya / Others</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Estimasi Kekayaan / Wealth Estimation</label>
    <div class="col-sm-6">
      <input type="text" name="edd_estimasi" class="form-control" onkeypress='return isnumber(this);' placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Tujuan Pembukaan Rekening / Purpose of Account Opening:</label>
    <div class="col-sm-6">
      <input type="text" name="edd_tujuan" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-12 col-form-label" for="warganegara">Produk yang Dimiliki Nasabah / Products Owned by Customer</label>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">a. Di BNI Sekuritas / At BNI Sekuritas</label>
    <div class="col-sm-6">
      <input type="text" name="edd_produk_bni" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">b. Di Perusahaan Sekuritas Lain / At other Securities Company</label>
    <div class="col-sm-6">
      <input type="text" name="edd_produk_lain" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
</div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-8 col-form-label">5. a. Apakah anda Warga Negara Amerika Serikat atau Warga Negara dari daerah territory Amerika Serikat? <i>(Are you a U.S. Citizen of a.U.S Territory?)</i></label>
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
    <label for="staticEmail" class="col-sm-8 col-form-label">5. b. Apakah anda merupakan pemilik Green Card/Kartu Permanen Residen termasuk pemilik visa kerja yang masih berlaku?<i>(Do you have hold a U.S. Permanent Resident Card (Green Card) including a current work permit?)</i></label>
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
	<label class="col-sm-12 col-form-label"><h6>Jika salah satu jawaban adalah "Ya" silahkan melengkapi FORM W-9 <i>(Please complete the W-9 form , if any answer of above question is "Yes")</i></h6></label>
  </div>

<div id="kuis5">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Name (as shown on your income tax return). Name is required on this line; do not leave this line blank.</label>
    <div class="col-sm-6">
      <input type="text" name="w9_nama" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Business name/disregarded entity name, if different from above</label>
    <div class="col-sm-6">
      <input type="text" name="w9_bisnis" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-12 col-form-label" for="warganegara">Check appropriate box for federal tax classification of the person whose name is entered on line</label>
  </div>
  <div class="form-group row">
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="w9_tax" type="radio" id="w9_tax1" value="1">
			<label class="form-check-label" for="inlineRadio1">Individual/sole proprietor or single-member LLC</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="w9_tax" type="radio" id="w9_tax2" value="2">
			<label class="form-check-label" for="inlineRadio2">C Corporation</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="w9_tax" type="radio" id="w9_tax3" value="3">
			<label class="form-check-label" for="inlineRadio2">S Corporation</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="w9_tax" type="radio" id="w9_tax4" value="4">
			<label class="form-check-label" for="inlineRadio2">Partnership</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="w9_tax" type="radio" id="w9_tax5" value="5">
			<label class="form-check-label" for="inlineRadio2">Limited liability company.</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="w9_tax" type="radio" id="w9_tax5" value="6">
			<label class="form-check-label" for="inlineRadio2">Trust/estate</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="w9_tax" type="radio" id="w9_tax5" value="7">
			<label class="form-check-label" for="inlineRadio2">Other</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-12 col-form-label" for="warganegara">Exemptions</label>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Exempt payee code (if any)</label>
    <div class="col-sm-6">
      <input type="text" name="w9_payee" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Exemption from FATCA reporting code (if any)</label>
    <div class="col-sm-6">
      <input type="text" name="w9_fatca" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Address (number, street, and apt. or suite no.).</label>
    <div class="col-sm-6">
      <input type="text" name="w9_address" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">City, state, and ZIP code</label>
    <div class="col-sm-6">
      <input type="text" name="w9_city" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">List account number(s) here (optional)</label>
    <div class="col-sm-6">
      <input type="text" name="w9_accnumber" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-12 col-form-label" for="warganegara">Taxpayer Identification Number (TIN)</label>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Social security number</label>
    <div class="col-sm-6">
      <input type="text" name="w9_social" maxlength="9" pattern="\d{9}" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Employer identification number</label>
    <div class="col-sm-6">
      <input type="text" name="w9_id" maxlength="9" pattern="\d{9}" class="form-control" placeholder="">
    </div>
  </div>
</div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-8 col-form-label">6. a. Apakah anda dilahirkan di Amerika Serikat? <i>(Are you Born in U.S)?</i></label>
    <div class="col-sm-4">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis7" type="radio" id="kuis71" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya (Yes)</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis7" type="radio" id="kuis72" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak (No)</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-8 col-form-label">6. b. Apakah anda memiliki alamat dan/atau alamat korespodensi dan/atau PO BOX di Amerika
Serikat? <i>(Do you have a U.S. residence and/or U.S. correspondence and/or U.S. PO BOX.?)</i></label>
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
    <label for="staticEmail" class="col-sm-8 col-form-label">6. c. Apakah anda memberikan Surat Kuasa atau kewenangan tandatangan yang masih berlaku
kepada seseorang yang memiliki alamat di Amerika Serikat? <i>(Do you grant any effective Power of Attorney (POA) or signatory authority to a person with U.S address?)</i></label>
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
    <label for="staticEmail" class="col-sm-8 col-form-label">6. d. Apakah anda memberikan instruksi otomatis untuk melakukan transfer dana ke rekening
yang dikelola di Amerika Serikat? <i>(Do you give any standing instructions to transfer funds to U.S. account?)</i></label>
    <div class="col-sm-4">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis10" type="radio" id="kuis91" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis10" type="radio" id="kuis92" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-8 col-form-label">6. e. Apakah anda memiliki alamat "in care of" atau "hold mail" sebagai satu-satunya alamat? <i>(Do you have an "in care of" or "hold mail" address as the sole address?)</i></label>
    <div class="col-sm-4">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis11" type="radio" id="kuis101" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis11" type="radio" id="kuis102" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
	<label class="col-sm-12 col-form-label"><h6>Jika salah satu jawaban di atas adalah "Ya", silahkan melengkapi Formulir W-8BEN-E yang akan di email <i>(Please complete the Form W-8BEN-E which will be email, if any answer of above question is "Yes")</i></h6></label>
  </div>

<div id="kuis6">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Name of individual who is the beneficial owner</label>
    <div class="col-sm-6">
      <input type="text" name="w8_nama" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Country of citizenship</label>
    <div class="col-sm-6">
      <input type="text" name="w8_countrycitizen" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Permanent residence address (street, apt. or suite no., or rural route). Do not use a P.O. box or in-care-of address.</label>
    <div class="col-sm-6">
      <input type="text" name="w8_address" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">City or town, state or province. Include postal code where appropriate</label>
    <div class="col-sm-6">
      <input type="text" name="w8_city" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Country</i></label>
    <div class="col-sm-6">
      <input type="text" name="w8_country" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Mailing address (if different from above)</label>
    <div class="col-sm-6">
      <input type="text" name="w8_mailing" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">City or town, state or province. Include postal code where appropriate</label>
    <div class="col-sm-6">
      <input type="text" name="w8_mailing_city" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Country</label>
    <div class="col-sm-6">
      <input type="text" name="w8_mailing_country" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">U.S. taxpayer identification number (SSN or ITIN), if required</label>
    <div class="col-sm-6">
      <input type="text" name="w8_ssn" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Foreign tax identifying number</label>
    <div class="col-sm-6">
      <input type="text" name="w8_tax" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Reference number(s)</label>
    <div class="col-sm-6">
      <input type="text" name="w8_ref" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Date of birth (DD-MM-YYYY)</label>
    <div class="col-sm-6">
      <input type="date" name="w8_birth" class="form-control" max="<?php echo $tyday; //echo date("Y-m-d"); ?>" placeholder="">
    </div>
  </div>

</div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-8 col-form-label">7. Apakah anda memiliki domisili pajak di luar Indonesia? <i>(Do you have a tax residence outside Indonesia?)</i></label>
    <div class="col-sm-4">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis12" type="radio" id="kuis111" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis12" type="radio" id="kuis112" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
	<label class="col-sm-12 col-form-label"><h6>Jika "Ya", silahkan melengkapi Surat Pernyataan Nasabah Asing <i>(Please complete the Individual-Self Certification, if answer of above question is "Yes")</i></h6></label>
  </div>

<div id="kuis7">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Nama / Name</label>
    <div class="col-sm-6">
      <input type="text" name="pernyataan_nama" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-12 col-form-label" for="warganegara">Jenis dokumen Identitas / Identity document type</label>
  </div>
  <div class="form-group row">
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="pernyataan_dokumen" type="radio" id="pernyataan_dokumen1" value="1">
			<label class="form-check-label" for="inlineRadio1">Paspor /Passport</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="pernyataan_dokumen" type="radio" id="pernyataan_dokumen2" value="2">
			<label class="form-check-label" for="inlineRadio2">Kartu Izin Tinggal Terbatas (KITAS) /Limited Stay Permit Card</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="pernyataan_dokumen" type="radio" id="pernyataan_dokumen3" value="3">
			<label class="form-check-label" for="inlineRadio2">Kartu Izin Tinggal Tetap (KITAP) /Permanent Stay Permit Card</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="pernyataan_dokumen" type="radio" id="pernyataan_dokumen5" value="4">
			<label class="form-check-label" for="inlineRadio2">Lainnya / Other</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Nomor dokumen identitas / Identity document number</label>
    <div class="col-sm-6">
      <input type="text" name="pernyataan_dokid" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Tempat dan tanggal lahir / Place and Date of Birth</label>
    <div class="col-sm-6">
      <input type="text" name="pernyataan_birth" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Alamat domisili / Residence Address</label>
    <div class="col-sm-6">
      <input type="text" name="pernyataan_domisili" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Alamat korespondensi Mailing address</label>
    <div class="col-sm-6">
      <input type="text" name="pernyataan_korespondensi" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Negara domisili Country of residence address</label>
    <div class="col-sm-6">
      <input type="text" name="pernyataan_domisili_country" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Nomor rekening efek / Securities account number</label>
    <div class="col-sm-6">
      <input type="text" name="pernyataan_rekening" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
  	<label for="staticEmail" class="col-form-label">NEGARA / YURISDIKSI DOMISILI PAJAK ( COUNTRY / JURISDICTION OF TAX RESIDENCY )</label><br/>
  	<table class="tabeledd">
		<tr>
			<td>Negara domisili pajak / Country of tax residence</td>
			<td>Nomor identifikasi pembayar pajak /Taxpayer Identification Number (TIN)</td>
			<td>Alasan jika Nomor identifikasi pembayar pajak tidak tersedia / The reason if TIN is unavailable</td>
		</tr>
		<tr>
			<td><input type="text" name="pernyataan_pajak1" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="pernyataan_nomor1" class="form-control" placeholder=""></td>
			<td><input type="text" name="pernyataan_alasan1" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
		</tr>
		<tr>
			<td><input type="text" name="pernyataan_pajak2" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="pernyataan_nomor2" class="form-control" placeholder=""></td>
			<td><input type="text" name="pernyataan_alasan2" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
		</tr>
		<tr>
			<td><input type="text" name="pernyataan_pajak3" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
			<td><input type="text" name="pernyataan_nomor3" class="form-control" placeholder=""></td>
			<td><input type="text" name="pernyataan_alasan3" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder=""></td>
		</tr>
	</table>
  </div>

</div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-8 col-form-label">8. Apakah anda bertindak untuk kepentingan Pemilik Manfaat? <i>(Are you acting on behalf of
Beneficial Owner?)</i></label>
    <div class="col-sm-4">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis13" type="radio" id="kuis121" value="ya">
			<label class="form-check-label" for="inlineRadio2">Ya</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="kuis13" type="radio" id="kuis122" value="tidak" checked>
			<label class="form-check-label" for="inlineRadio1">Tidak</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
	<label class="col-sm-12 col-form-label"><h6>Jika "Ya" silahkan melengkapi Surat Pernyataan Pemilik Manfaat (Bagi Nasabah Perorangan)<i>(Please complete Statement Letter - Beneficial Owner (for Individual Customer), if any answer of above question is "Yes")</i></h6></label>
  </div>

<div id="kuis8">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Hubungan Hukum dengan Nasabah* (Relationship with the Customer)*</label>
    <div class="col-sm-6">
      <input type="text" name="manfaat_hubungan" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-12 col-form-label" for="warganegara">Selanjutnya disebut "Pemilik Manfaat" "Hereinafter referred to as "Beneficial Owner")</label>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Nama (sesuai identitas) Name (as stated on ID)</label>
    <div class="col-sm-6">
      <input type="text" name="manfaat_namapemilik" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-12 col-form-label" for="warganegara">Tanda Pengenal (Identity)</label>
  </div>
  <div class="form-group row">
    <div class="col-sm-12">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="manfaat_dokumen" type="radio" id="manfaat_dokumen1" value="1">
			<label class="form-check-label" for="inlineRadio1">KTP / IDCARD</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="manfaat_dokumen" type="radio" id="manfaat_dokumen2" value="2">
			<label class="form-check-label" for="inlineRadio1">Paspor /Passport</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="manfaat_dokumen" type="radio" id="manfaat_dokumen3" value="3">
			<label class="form-check-label" for="inlineRadio2">KITAS / KITAP (Temporary Permit)</label>
		</div>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">No. Tanda Pengenal (Identity Number)</label>
    <div class="col-sm-6">
      <input type="text" name="manfaat_idnum" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-6 col-form-label">Alamat Tempat Tinggal (Residence Address)</label>
    <div class="col-sm-6">
      <input type="text" name="manfaat_address" class="form-control" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" placeholder="">
    </div>
  </div>

</div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Alamat Korespondensi (Correspondence)</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="alamat_korespondensi" type="radio" id="tujuan_investasi1" value="ktp">
			<label class="form-check-label" for="inlineRadio1">Alamat KTP (ID Address)</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="alamat_korespondensi" type="radio" id="tujuan_investasi2" value="terkini">
			<label class="form-check-label" for="inlineRadio2">Alamat Terkini (Current Address)</label>
		</div>
		<div class="form-check form-check-inline">
			<input class="form-check-input" name="alamat_korespondensi" type="radio" id="tujuan_investasi3" value="kantor">
			<label class="form-check-label" for="inlineRadio2">Alamat Kantor (Company Address)</label>
		</div>
    </div>
  </div>

  <div class="form-group row">
        <div class="col-md-12">
            <label class="" for="">Signature:</label>
            <br/>
            <div id="sig" ></div>
            <br/>
            <button class="btn btn-primary" id="clear">Clear Signature</button>
            <textarea id="signature64" name="signed" style="display: none"></textarea>
        </div>
  </div>

				<div class="form-group row">
                  <div class="checkbox">
                    <label class="col-sm-12 col-form-label">
                      &nbsp;&nbsp;<input name="status_setuju" type="checkbox" value="1">
                      saya telah menyetujui seluruh syarat dan ketentuan Pembukaan Rekening Efek di BNI Sekuritas, sehingga karenanya persetujuan tersebut merupakan alat bukti yang sempurna bagi BNI Sekuritas dan calon Nasabah, seperti layaknya bukti tertulis atau seperti layaknya pemberian persetujuan dengan memberikan tanda tangan pada Perjanjian Pembukaan Rekening Efek.
                    </label>
                  </div>
				</div>


  <!--<p class="mb-20">"Rekening Dana Investor (RDI) adalah rekening dana wajib atas nama investor yang dibuka pada bank administrator untuk mencatat mutasi transaksi investasi"</p>-->
<a class="main-btn" role="button" href="#" onclick="document.getElementById('form-back').submit()">Back</a>
<button type="submit" class="main-btn">Submit Registration Data <i class="fal fa-arrow-right"></i></button>
                        </div>
<?php
	echo form_close();
?> 
                </div>
            </div>
        </div>
    </section>

<?php
	echo form_open('user/registeradditional', 'class="form-horizontal" id="form-back"');
?>
<input type="hidden" name="reff" value="<?=$this->input->post('reff')?>">
<input type="hidden" name="nama_depan" value="<?=$this->input->post('nama_depan')?>">
<input type="hidden" name="nama_tengah" value="<?=$this->input->post('nama_tengah')?>">
<input type="hidden" name="nama_belakang" value="<?=$this->input->post('nama_belakang')?>">
<input type="hidden" name="nama_alias" value="<?=$this->input->post('nama_alias')?>">
<input type="hidden" name="warganegara" value="<?=$this->input->post('warganegara')?>">
<input type="hidden" name="negara" value="<?php if($this->input->post('warganegara') == 'WNI') { echo 'ID'; } else { echo $this->input->post('negara'); }?>">
<input type="hidden" name="email" value="<?=$this->input->post('email')?>">
<input type="hidden" name="handphone" value="<?=$this->input->post('handphone')?>">
<input type="hidden" name="rekening_efek" value="<?=$this->input->post('rekening_efek')?>">
<input type="hidden" name="tipe_layanan" value="<?=$this->input->post('tipe_layanan')?>">
<input type="hidden" name="cabang" value="<?=$this->input->post('cabang')?>">
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
<input type="hidden" name="ktp_negara" value="<?=$this->input->post('ktp_negara')?>">
<input type="hidden" name="alamatsama" value="<?=$this->input->post('alamatsama')?>">
<input type="hidden" name="terkini_alamat" value="<?=$this->input->post('terkini_alamat')?>">
<input type="hidden" name="terkini_rtrw" value="<?=$this->input->post('terkini_rtrw')?>">
<input type="hidden" name="terkini_kelurahan" value="<?=$this->input->post('terkini_kelurahan')?>">
<input type="hidden" name="terkini_kecamatan" value="<?=$this->input->post('terkini_kecamatan')?>">
<input type="hidden" name="terkini_provinceid" value="<?=$this->input->post('terkini_provinceid')?>">
<input type="hidden" name="terkini_cityid" value="<?=$this->input->post('terkini_cityid')?>">
<input type="hidden" name="terkini_kodepos" value="<?=$this->input->post('terkini_kodepos')?>">
<input type="hidden" name="terkini_negara" value="<?=$this->input->post('terkini_negara')?>">
<input type="hidden" name="kode_negara" value="<?=$this->input->post('kode_negara')?>">
<input type="hidden" name="kode_area" value="<?=$this->input->post('kode_area')?>">
<input type="hidden" name="phone" value="<?=$this->input->post('phone')?>">
<input type="hidden" name="investasi" value="<?=$this->input->post('investasi')?>">
<input type="hidden" name="pekerjaan" value="<?=$this->input->post('pekerjaan')?>">

<input type="hidden" name="nama_tempat_kerja" value="<?=$this->input->post('nama_tempat_kerja')?>">
<input type="hidden" name="kerja_tahun" value="<?=$this->input->post('kerja_tahun')?>">
<input type="hidden" name="kerja_bulan" value="<?=$this->input->post('kerja_bulan')?>">
<input type="hidden" name="bidang_usaha" value="<?=$this->input->post('bidang_usaha')?>">
<input type="hidden" name="jabatan" value="<?=$this->input->post('jabatan')?>">
<input type="hidden" name="frekuensi_penghasilan" value="<?=$this->input->post('frekuensi_penghasilan')?>">
<input type="hidden" name="kepemilikan_asset" value="<?=$this->input->post('kepemilikan_asset')?>">

<input type="hidden" name="npwp" value="<?=$this->input->post('npwp')?>">
<input type="hidden" name="no_npwp" value="<?=$this->input->post('no_npwp')?>">
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
<input type="hidden" name="perusahaan_telp" value="<?=$this->input->post('perusahaan_telp')?>">
<input type="hidden" name="perusahaan_fax" value="<?=$this->input->post('perusahaan_fax')?>">
<input type="hidden" name="perusahaan_negara" value="<?=$this->input->post('perusahaan_negara')?>">
<input type="hidden" name="waktu_investasi" value="<?=$this->input->post('waktu_investasi')?>">
<input type="hidden" name="tujuan_investasi" value="<?=$this->input->post('tujuan_investasi')?>">
<input type="hidden" name="resiko_investasi" value="<?=$this->input->post('resiko_investasi')?>">
<input type="hidden" name="dana_investasi" value="<?=$this->input->post('dana_investasi')?>">
<input type="hidden" name="pengetahuan_investasi" value="<?=$this->input->post('pengetahuan_investasi')?>">
<?php
	echo form_close();
?>

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