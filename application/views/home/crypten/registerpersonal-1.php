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
                        <h3 class="title">Data Pribadi<br/>(Personal Data)</h3>
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
<p class="mb-10"><h5>Lengkapi data diri kamu</h5></p>
<p class="mb-20"><h5><i>(please complete your personal data)</i></h5></p><br/>
<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

	echo form_open_multipart('user/registeradditional', 'class="form-horizontal" onsubmit="return registerpersonalValidation();"');
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
<input type="hidden" name="otp" value="<?=$this->input->post('otp')?>">

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Tempat Lahir<br><i>(place of birth)</i></label>
    <div class="col-sm-8">
      <input type="text" name="tempat_lahir" class="form-control" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' placeholder="" maxlength="100" value="<?=$this->input->post('tempat_lahir')?>" required>
    </div>
  </div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tanggal Lahir (date of birth)</label>
							<div class="col-sm-5">
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="date" max="<?php echo date("Y-m-d"); ?>" name="tanggal_lahir" placeholder="DD-MM-YYYY" value="<?=$this->input->post('tanggal_lahir')?>" required>
								</div>
							</div>
						</div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="jenis_kelamin">Jenis Kelamin (gender)</label>
	  <div class="col-sm-8">
                  <div class="radio">
<?php
	if($this->input->post('jenis_kelamin')) {
?>
                    <label>
                      <input type="radio" name="jenis_kelamin" id="pria" value="L" <?php if($this->input->post('jenis_kelamin') == "L") { echo 'checked'; } ?>>
                      Pria
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="jenis_kelamin" id="wanita" value="P" <?php if($this->input->post('jenis_kelamin') == "P") { echo 'checked'; } ?>>
                      Wanita
                    </label>
<?php
	} else {
?>
                    <label>
                      <input type="radio" name="jenis_kelamin" id="pria" value="L" checked>
                      Pria
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="jenis_kelamin" id="wanita" value="P">
                      Wanita
                    </label>
<?php
	}
?>
                  </div>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="agama">Agama (religion)</label>
	  <div class="col-sm-8">
      <select style="width: 100%; display: block;" id="agama" name="agama" class="select2 form-control">
<?php
	if($this->input->post('agama')) {
?>
        <option value="01" <?php if($this->input->post('agama') == "01") { echo 'selected'; } ?>>Islam</option>
        <option value="02" <?php if($this->input->post('agama') == "02") { echo 'selected'; } ?>>Protestan</option>
        <option value="03" <?php if($this->input->post('agama') == "03") { echo 'selected'; } ?>>Katholik</option>
        <option value="04" <?php if($this->input->post('agama') == "04") { echo 'selected'; } ?>>Budha</option>
        <option value="05" <?php if($this->input->post('agama') == "05") { echo 'selected'; } ?>>Hindu</option>
        <option value="06" <?php if($this->input->post('agama') == "06") { echo 'selected'; } ?>>Kong Hu Cu</option>
<?php
	} else {
?>
        <option value="01" selected>Islam</option>
        <option value="02">Protestan</option>
        <option value="03">Katholik</option>
        <option value="04">Budha</option>
        <option value="05">Hindu</option>
        <option value="06">Kong Hu Cu</option>
<?php
	}
?>
      </select>
    </div>
  </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="pendidikan">Pendidikan (Education)</label>
	  <div class="col-sm-8">
      <select id="pendidikan" name="pendidikan" class="select2 form-control">
<?php
	if($this->input->post('pendidikan')) {
?>
        <option value="SD" <?php if($this->input->post('pendidikan') == "SD") { echo 'selected'; } ?>>SD</option>
        <option value="SMP" <?php if($this->input->post('pendidikan') == "SMP") { echo 'selected'; } ?>>SMP</option>
        <option value="SMU/Sederajat" <?php if($this->input->post('pendidikan') == "SMU/Sederajat") { echo 'selected'; } ?>>SMU/Sederajat</option>
        <option value="D1-D2" <?php if($this->input->post('pendidikan') == "D1-D2") { echo 'selected'; } ?>>D1-D2</option>
        <option value="D3" <?php if($this->input->post('pendidikan') == "D3") { echo 'selected'; } ?>>D3</option>
        <option value="S1"  <?php if($this->input->post('pendidikan') == "S1") { echo 'selected'; } ?>>S1</option>
        <option value="S2" <?php if($this->input->post('pendidikan') == "S2") { echo 'selected'; } ?>>S2</option>
        <option value="S3" <?php if($this->input->post('pendidikan') == "S3") { echo 'selected'; } ?>>S3</option>
<?php
	} else {
?>
        <option value="SD">SD</option>
        <option value="SMP">SMP</option>
        <option value="SMU/Sederajat">SMU/Sederajat</option>
        <option value="D1-D2">D1-D2</option>
        <option value="D3">D3</option>
        <option value="S1" selected>S1</option>
        <option value="S2">S2</option>
        <option value="S3">S3</option>
<?php
	}
?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Ibu Kandung (mothers name)</label>
    <div class="col-sm-8">
      <input type="text" name="ibu_kandung" class="form-control" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' placeholder="" maxlength="100" value="<?=$this->input->post('ibu_kandung')?>" required>
    </div>
  </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="status_pernikahan">Status Pernikahan (marital status)</label>
	  <div class="col-sm-8">
      <select id="status_pernikahan" name="status_pernikahan" class="select2 form-control">
<?php
	if($this->input->post('status_pernikahan')) {
?>
        <option value="">Select</option>
        <option value="S" <?php if($this->input->post('status_pernikahan') == "S") { echo 'selected'; } ?>>Lajang</option>
        <option value="M" <?php if($this->input->post('status_pernikahan') == "M") { echo 'selected'; } ?>>Menikah</option>
        <option value="R" <?php if($this->input->post('status_pernikahan') == "R") { echo 'selected'; } ?>>Duda</option>
        <option value="W" <?php if($this->input->post('status_pernikahan') == "W") { echo 'selected'; } ?>>Janda</option>
<?php
	} else {
?>
        <option value="">Select</option>
        <option value="S">Lajang</option>
        <option value="M">Menikah</option>
        <option value="R">Duda</option>
        <option value="W">Janda</option>
<?php
	}
?>
      </select>
    </div>
  </div>
  <div id="pasangan" class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Pasangan (spouse name)</label>
    <div class="col-sm-8">
      <input type="text" name="nama_pasangan" id="nama_pasangan" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' class="form-control" value="<?=$this->input->post('nama_pasangan')?>" maxlength="100" placeholder="">
    </div>
  </div>
<?php if($this->input->post('warganegara') == 'WNI') { ?>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nomor KTP (ID No)</label>
    <div class="col-sm-8">
      <input type="text" id="ktp" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.keyCode == 8 || event.keyCode == 46' name="ktp" maxlength="16" class="form-control" value="<?=$this->input->post('ktp')?>" placeholder="" <?php if($this->input->post('warganegara') == 'WNI') { echo 'required'; }?>>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Tempat KTP Diterbitkan (Place of issuance)</label>
    <div class="col-sm-8">
      <input type="text" oninput="charOnly(this.id);" name="ktp_tempat" id="ktp_tempat" class="form-control" maxlength="100" placeholder="" value="<?=$this->input->post('ktp_tempat')?>" <?php if($this->input->post('warganegara') == 'WNI') { echo 'required'; }?>>
    </div>
  </div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tanggal KTP Diterbitkan (Date of issuance)</label>
							<div class="col-sm-5">
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="date" max="<?php echo date("Y-m-d"); ?>" name="ktp_terbit" placeholder="DD-MM-YYYY" value="<?=$this->input->post('ktp_terbit')?>" <?php if($this->input->post('warganegara') == 'WNI') { echo 'required'; }?>>
								</div>
							</div>
						</div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Berlaku Sampai (expired date)</label>
    <div class="col-sm-8">
<?php
	if($this->input->post('ktp_berlaku_sampai')) {
?>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="ktp_berlaku_sampai" type="radio" id="inlineRadio1" value="lifetime" <?php if($this->input->post('ktp_berlaku_sampai') == "lifetime") { echo 'checked'; } ?>>
  <label class="form-check-label" for="inlineRadio1">Seumur Hidup (lifetime)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="ktp_berlaku_sampai" type="radio" id="inlineRadio2" value="ddmmyyyy" <?php if($this->input->post('ktp_berlaku_sampai') == "ddmmyyyy") { echo 'checked'; } ?>>
  <label class="form-check-label" for="inlineRadio2">DDMMYYYY</label>
</div>
<?php
	} else {
?>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="ktp_berlaku_sampai" type="radio" id="inlineRadio1" value="lifetime" checked>
  <label class="form-check-label" for="inlineRadio1">Seumur Hidup (lifetime)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="ktp_berlaku_sampai" type="radio" id="inlineRadio2" value="ddmmyyyy">
  <label class="form-check-label" for="inlineRadio2">DDMMYYYY</label>
</div>
<?php
	}
?>
								<div style="display:none;" id="ktpberlaku" class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off"  max="<?php echo date("Y-m-d"); ?>" class="form-control text-left" type="date" name="ktp_berlaku_tanggal" placeholder="DD-MM-YYYY" value="<?=$this->input->post('ktp_berlaku_tanggal')?>">
								</div>
    </div>
  </div>
                <div class="form-group row">
                  <label  class="col-sm-4 control-label" for="image1">Upload Foto KTP</label>
                  <div class="col-sm-8">
                  <input type="file" name="fotoktp" id="fotoktp" accept="image/png,image/jpg,image/jpeg,image/gif" <?php if($this->input->post('warganegara') == 'WNI') { echo 'required'; }?>>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-4 control-label" for="image1">Upload Selfie dengan KTP</label>
                  <div class="col-sm-8">
                  <input type="file" name="fotoselfie" id="fotoselfie" accept="image/png,image/jpg,image/jpeg,image/gif" <?php if($this->input->post('warganegara') == 'WNI') { echo 'required'; }?>>
                  </div>
                </div>
<?php } else { ?>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nomor PASSPORT (ID No)</label>
    <div class="col-sm-8">
      <input type="text" name="paspor" class="form-control" placeholder="" value="<?=$this->input->post('paspor')?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Tempat PASSPORT Diterbitkan (Place of issuance)</label>
    <div class="col-sm-8">
      <input type="text" name="paspor_tempat" class="form-control" placeholder="" value="<?=$this->input->post('paspor_tempat')?>" required>
    </div>
  </div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tanggal PASSPORT Diterbitkan (Date of issuance)</label>
							<div class="col-sm-5">
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="date" name="paspor_terbit" placeholder="DD-MM-YYYY" value="<?=$this->input->post('paspor_terbit')?>" required>
								</div>
							</div>
						</div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Berlaku Sampai (expired date)</label>
    <div class="col-sm-8">
<?php
	if($this->input->post('paspor_berlaku_sampai')) {
?>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="paspor_berlaku_sampai" type="radio" id="inlineRadio1" value="lifetime" <?php if($this->input->post('paspor_berlaku_sampai') == "lifetime") { echo 'selected'; } ?>>
  <label class="form-check-label" for="inlineRadio1">Seumur Hidup (lifetime)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="paspor_berlaku_sampai" type="radio" id="inlineRadio2" value="ddmmyyyy" <?php if($this->input->post('paspor_berlaku_sampai') == "ddmmyyyy") { echo 'selected'; } ?>>
  <label class="form-check-label" for="inlineRadio2">DDMMYYYY</label>
</div>
<?php
	} else {
?>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="paspor_berlaku_sampai" type="radio" id="inlineRadio1" value="lifetime" checked>
  <label class="form-check-label" for="inlineRadio1">Seumur Hidup (lifetime)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="paspor_berlaku_sampai" type="radio" id="inlineRadio2" value="ddmmyyyy">
  <label class="form-check-label" for="inlineRadio2">DDMMYYYY</label>
</div>
<?php
	}
?>

								<div style="display:none;" id="pasporberlaku" class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="date" name="paspor_berlaku_tanggal" value="<?=$this->input->post('paspor_berlaku_tanggal')?>" placeholder="DD-MM-YYYY">
								</div>
    </div>
  </div>
                <div class="form-group row">
                  <label  class="col-sm-4 control-label" for="image1">Upload Foto PASSPORT</label>
                  <div class="col-sm-8">
                  <input type="file" name="fotopaspor" id="fotopaspor" accept="image/png,image/jpg,image/jpeg,image/gif" required>
                  </div>
                </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nomor KITAS (ID No)</label>
    <div class="col-sm-8">
      <input type="text" name="kitas" class="form-control" placeholder="" value="<?=$this->input->post('kitas')?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Tempat KITAS Diterbitkan (Place of issuance)</label>
    <div class="col-sm-8">
      <input type="text" name="kitas_tempat" class="form-control" placeholder="" value="<?=$this->input->post('kitas_tempat')?>" required>
    </div>
  </div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tanggal KITAS Diterbitkan (Date of issuance)</label>
							<div class="col-sm-5">
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="date" name="kitas_terbit" value="<?=$this->input->post('kitas_terbit')?>" placeholder="DD-MM-YYYY" required>
								</div>
							</div>
						</div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Berlaku Sampai (expired date)</label>
    <div class="col-sm-8">
<?php
	if($this->input->post('kitas_berlaku_sampai')) {
?>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="kitas_berlaku_sampai" type="radio" id="inlineRadio1" value="lifetime" <?php if($this->input->post('kitas_berlaku_sampai') == "lifetime") { echo 'selected'; } ?>>
  <label class="form-check-label" for="inlineRadio1">Seumur Hidup (lifetime)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="kitas_berlaku_sampai" type="radio" id="inlineRadio2" value="ddmmyyyy" <?php if($this->input->post('kitas_berlaku_sampai') == "ddmmyyyy") { echo 'selected'; } ?>>
  <label class="form-check-label" for="inlineRadio2">DDMMYYYY</label>
</div>
<?php
	} else {
?>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="kitas_berlaku_sampai" type="radio" id="inlineRadio1" value="lifetime" checked>
  <label class="form-check-label" for="inlineRadio1">Seumur Hidup (lifetime)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="kitas_berlaku_sampai" type="radio" id="inlineRadio2" value="ddmmyyyy">
  <label class="form-check-label" for="inlineRadio2">DDMMYYYY</label>
</div>
<?php
	}
?>

								<div style="display:none;" id="kitasberlaku" class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="date" name="kitas_berlaku_tanggal" value="<?=$this->input->post('kitas_berlaku_tanggal')?>" placeholder="DD-MM-YYYY">
								</div>
    </div>
  </div>
                <div class="form-group row">
                  <label  class="col-sm-4 control-label" for="image1">Upload Foto KITAS</label>
                  <div class="col-sm-8">
                  <input type="file" name="fotokitas" id="fotokitas" accept="image/png,image/jpg,image/jpeg,image/gif" required>
                  </div>
                </div>
<?php } ?>
  <div class="form-group row">
<?php if($this->input->post('warganegara') == 'WNI') { ?>
      <label class="col-sm-4 col-form-label" for="warganegara"><h5>Alamat KTP</h5></label>
<?php } else { ?>
	  <label class="col-sm-4 col-form-label" for="warganegara"><h5>Alamat Sesuai Tanda Pengenal</h5></label>
<?php } ?>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Jalan (Street Name)</label>
    <div class="col-sm-8">
      <input type="text" name="ktp_alamat" id="ktp_alamat" maxlength="60" class="form-control" placeholder="" value="<?=$this->input->post('ktp_alamat')?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">RT/RW/Perumahan</label>
    <div class="col-sm-8">
      <input type="text" name="ktp_rtrw" id="ktp_rtrw" class="form-control" placeholder="" maxlength="60" value="<?=$this->input->post('ktp_rtrw')?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kelurahan (Village)</label>
    <div class="col-sm-8">
      <input type="text" name="ktp_kelurahan" id="ktp_kelurahan" class="form-control" placeholder="" value="<?=$this->input->post('ktp_kelurahan')?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kecamatan (Sub-District)</label>
    <div class="col-sm-8">
      <input type="text" name="ktp_kecamatan" id="ktp_kecamatan" class="form-control" placeholder="" value="<?=$this->input->post('ktp_kecamatan')?>" required>
    </div>
  </div>
                <div class="form-group row">
                  <label for="input1" class="col-sm-4 control-label">Provinsi (Province)</label>
                  <div class="col-sm-8">
                  <select name="ktp_provinceid" class="select2 form-control" id="ktp_province" >
				  <option value="0">Select Provinsi (Province)</option>
<?php $i = 1; foreach($propinsi as $row) { 
		if($this->input->post('ktp_provinceid')) {
			if($row->provinceid == $this->input->post('ktp_provinceid')) { $selected = 'selected'; } else { $selected = ''; }	
		} else { $selected = ''; }									
									?>
                    <option value="<?=$row->provinceid?>" <?=$selected;?>><?=$row->province?></option>
<?php $i++; } ?>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input1" class="col-sm-4 control-label">Kota/Kabupaten (City)</label>
                  <div class="col-sm-8">
                  <select name="ktp_cityid" class="select2 form-control" id="ktp_city" >
<?php
	if($this->input->post('ktp_cityid')) {
		if($this->input->post('ktp_cityid')) {
			$ktpcity = $this->tabel_model->listdata('city','provinceid',$this->input->post('ktp_provinceid'));
//			$ktpcity = $this->tabel_model->detail('city',$this->input->post('ktp_cityid'));
			foreach($ktpcity as $row) {
				if($row->cityid == $this->input->post('ktp_cityid')) { $selected = 'selected'; } else { $selected = ''; }	
				echo '<option value="'.$row->cityid.'" '.$selected.'>'.$row->city.'</option>';
			}
		} else { echo '<option value="">Select Kota/Kabupaten (City)</option>'; }
?>
<?php
	} else {
?>
				  <option value="">Select Kota/Kabupaten (City)</option>
<?php
	}
?>
                  </select>
				<div id="ktploading" style="margin-top: 15px;">
					<img src="<?=base_url();?>images/loading.gif" width="18"> <small>Loading...</small>
				</div>
                  </div>
                </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kodepos (Zip Code)</label>
    <div class="col-sm-8">
      <input type="number" name="ktp_kodepos" id="ktp_kodepos" class="form-control" placeholder="" required>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="negara">Negara<br/><i>Country</i></label>
	  <div class="col-sm-8">
      <select id="negara" name="ktp_negara" class="form-control">
        <option value="">Select</option>
<?php
	foreach($country as $row) {
		if($this->input->post('ktp_negara')) {
			if($row->iso == $this->input->post('ktp_negara')) { $selected = 'selected'; } else { if($row->iso == 'ID') { $selected = 'selected'; } else { $selected = ''; } }
		} else {
			if($row->iso == 'ID') { $selected = 'selected'; } else { $selected = ''; }
		}
?>
        <option value="<?=$row->iso?>" <?=$selected?>><?=$row->country_name?></option>
<?php
	}
?>
      </select>
    </div>
  </div>


  <div class="form-group row">
      <label class="col-sm-4 col-form-label"><h5>Alamat Domisili</h5></label>
	  
	                    <div class="radio">
						Alamat domisili sesuai dengan ID (Ya/Tidak)<br/>
<?php
	if($this->input->post('alamatsama')) {
?>
                    <label>
                      <input type="radio" name="alamatsama" id="ya" value="1" <?php if($this->input->post('alamatsama') == "1") { echo 'checked'; } ?>>
                      Ya
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="alamatsama" id="tidak" value="0" <?php if($this->input->post('alamatsama') == "0") { echo 'checked'; } ?>>
                      Tidak
                    </label>
<?php
	} else  {
?>
                    <label>
                      <input type="radio" name="alamatsama" id="ya" value="1" checked>
                      Ya
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="alamatsama" id="tidak" value="0">
                      Tidak
                    </label>
<?php
	}
?>
                  </div>
  </div>

<div id="containerdomisili">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Jalan (Street Name)</label>
    <div class="col-sm-8">
      <input type="text" name="terkini_alamat" id="terkini_alamat" class="form-control" placeholder="" value="<?=$this->input->post('terkini_alamat')?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">RT/RW/Perumahan</label>
    <div class="col-sm-8">
      <input type="text" name="terkini_rtrw" id="terkini_rtrw" class="form-control" placeholder="" value="<?=$this->input->post('terkini_rtrw')?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kelurahan (Village)</label>
    <div class="col-sm-8">
      <input type="text" name="terkini_kelurahan" id="terkini_kelurahan" class="form-control" placeholder="" value="<?=$this->input->post('terkini_kelurahan')?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kecamatan (Sub-District)</label>
    <div class="col-sm-8">
      <input type="text" name="terkini_kecamatan" id="terkini_kecamatan" class="form-control" placeholder="" value="<?=$this->input->post('terkini_kecamatan')?>">
    </div>
  </div>
                <div class="form-group row">
                  <label for="input1" class="col-sm-4 control-label">Provinsi (Province)</label>
                  <div class="col-sm-8">
                  <select name="terkini_provinceid" class="select2 form-control" id="terkini_province" >
				  <option value="0">Select Province</option>
<?php $i = 1; foreach($propinsi as $row) { 
		if($this->input->post('terkini_provinceid')) {
			if($row->provinceid == $this->input->post('terkini_provinceid')) { $selected = 'selected'; } else { $selected = ''; }	
		} else { $selected = ''; }										
?>
                    <option value="<?=$row->provinceid?>" <?=$selected;?>><?=$row->province?></option>
<?php $i++; } ?>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input1" class="col-sm-4 control-label">Kota/Kabupaten (City)</label>
                  <div class="col-sm-8">
                  <select name="terkini_cityid" class="select2 form-control" id="terkini_city" >
<?php
	if($this->input->post('terkini_cityid')) {
		if($this->input->post('terkini_cityid')) {
			$ktpcity = $this->tabel_model->listdata('city','provinceid',$this->input->post('terkini_provinceid'));
//			$ktpcity = $this->tabel_model->detail('city',$this->input->post('terkini_cityid'));
			foreach($ktpcity as $row) {
				if($row->cityid == $this->input->post('terkini_cityid')) { $selected = 'selected'; } else { $selected = ''; }	
				echo '<option value="'.$row->cityid.'" '.$selected.'>'.$row->city.'</option>';
			}
		} else { echo '<option value="">Select Kota/Kabupaten (City)</option>'; }
?>
<?php
	} else {
?>
				  <option value="">Select Kota/Kabupaten (City)</option>
<?php
	}
?>

                  </select>
				<div id="terkiniloading" style="margin-top: 15px;">
					<img src="<?=base_url();?>images/loading.gif" width="18"> <small>Loading...</small>
				</div>
                  </div>
                </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kodepos (Zip Code)</label>
    <div class="col-sm-8">
      <input type="number" name="terkini_kodepos" id="terkini_kodepos" class="form-control" placeholder="" value="<?=$this->input->post('terkini_kodepos')?>">
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="negara">Negara<br/><i>Country</i></label>
	  <div class="col-sm-8">
      <select id="negara" name="terkini_negara" class="form-control">
        <option value="">Select</option>
<?php
	foreach($country as $row) {
		if($this->input->post('terkini_negara')) {
			if($row->iso == $this->input->post('terkini_negara')) { $selected = 'selected'; } else { if($row->iso == 'ID') { $selected = 'selected'; } else { $selected = ''; } }
		} else {
			if($row->iso == 'ID') { $selected = 'selected'; } else { $selected = ''; }
		}
?>
        <option value="<?=$row->iso?>" <?=$selected?>><?=$row->country_name?></option>
<?php
	}
?>
      </select>
    </div>
  </div>

</div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Telepon (phone number)</label>
    <div class="col-sm-8">
      <input type="number" name="phone" class="form-control" placeholder="" value="<?=$this->input->post('phone')?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Tujuan Investasi (Investment Objectives)</label>
    <div class="col-sm-8">
      <select id="status_pernikahan" name="investasi" class="select2 form-control">
<?php
	if($this->input->post('investasi')) {
?>
        <option value="IV" <?php if($this->input->post('investasi') == "IV") { echo 'selected'; } ?>>Investasi</option>
        <option value="PA" <?php if($this->input->post('investasi') == "PA") { echo 'selected'; } ?>>Apresiasi Harga</option>
        <option value="IN" <?php if($this->input->post('investasi') == "IN") { echo 'selected'; } ?>>Pendapatan</option>
        <option value="SP" <?php if($this->input->post('investasi') == "SP") { echo 'selected'; } ?>>Spekulasi</option>
        <option value="OT" <?php if($this->input->post('investasi') == "OT") { echo 'selected'; } ?>>Lainnya</option>
<?php
	} else {
?>
        <option value="IV" selected>Investasi</option>
        <option value="PA">Apresiasi Harga</option>
        <option value="IN">Pendapatan</option>
        <option value="SP">Spekulasi</option>
        <option value="OT">Lainnya</option>
<?php
	}
?>
      </select>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="pekerjaan">Pekerjaan (Occupation)</label>
	  <div class="col-sm-8">
      <select id="pekerjaan" name="pekerjaan" class="select2 form-control">
<?php
	if($this->input->post('pekerjaan')) {
?>
        <option value="Karyawan" <?php if($this->input->post('pekerjaan') == "Karyawan") { echo 'selected'; } ?>>Karyawan</option>
        <option value="Wiraswasta" <?php if($this->input->post('pekerjaan') == "Wiraswasta") { echo 'selected'; } ?>>Wiraswasta</option>
        <option value="Pelajar" <?php if($this->input->post('pekerjaan') == "Pelajar") { echo 'selected'; } ?>>Pelajar</option>
        <option value="Guru" <?php if($this->input->post('pekerjaan') == "Guru") { echo 'selected'; } ?>>Guru</option>
        <option value="Ibu Rumah Tangga" <?php if($this->input->post('pekerjaan') == "Ibu Rumah Tangga") { echo 'selected'; } ?>>Ibu Rumah Tangga</option>
        <option value="Pegawai Negeri" <?php if($this->input->post('pekerjaan') == "Pegawai Negeri") { echo 'selected'; } ?>>Pegawai Negeri</option>
        <option value="TNI/Polisi" <?php if($this->input->post('pekerjaan') == "TNI/Polisi") { echo 'selected'; } ?>>TNI/Polisi</option>
        <option value="Pensiunan" <?php if($this->input->post('pekerjaan') == "Pensiunan") { echo 'selected'; } ?>>Pensiunan</option>
        <option value="Lainnya" <?php if($this->input->post('pekerjaan') == "Lainnya") { echo 'selected'; } ?>>Lainnya</option>
<?php
	} else {
?>
        <option value="Karyawan" selected>Karyawan</option>
        <option value="Wiraswasta">Wiraswasta</option>
        <option value="Pelajar">Pelajar</option>
        <option value="Guru">Guru</option>
        <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
        <option value="Pegawai Negeri">Pegawai Negeri</option>
        <option value="TNI/Polisi">TNI/Polisi</option>
        <option value="Pensiunan">Pensiunan</option>
        <option value="Lainnya">Lainnya</option>
<?php
	}
?>
      </select>
    </div>
  </div>

  <!--<div id="namatempatkerja" class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Tempat Bekerja<i>(Company Name)</i></label>
    <div class="col-sm-8">
      <input type="text" name="nama_tempat_kerja" class="form-control" placeholder="" value="<?=$this->input->post('nama_tempat_kerja')?>" required>
    </div>
  </div>-->

<!-----//////////-->
<div id="alamatperusahaan">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Perusahaan/Universitas (company/university name)</label>
    <div class="col-sm-8">
      <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="" value="<?=$this->input->post('nama_perusahaan')?>" required>
	  <i>"jika anda adalah pelajar, maka sebutkan nama universitas/ if you are a student, please mention your university name</i>
    </div>
  </div>
  <!--<div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Alamat Perusahaan/Universitas (company/university address)</label>
    <div class="col-sm-8">
      <input type="text" name="alamat_perusahaan" class="form-control" placeholder="" value="<?=$this->input->post('alamat_perusahaan')?>" required>
	  <i>"jika anda adalah pelajar, maka sebutkan alamat universitas/ if you are a student, please mention your university address"</i>
    </div>
  </div>-->
 <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Jalan (Street Name)</label>
    <div class="col-sm-8">
      <input type="text" name="perusahaan_alamat" id="perusahaan_alamat" class="form-control" placeholder="" value="<?=$this->input->post('perusahaan_alamat')?>" required>
	  <i>"jika anda adalah pelajar, maka sebutkan alamat universitas/ if you are a student, please mention your university address"</i>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">RT/RW/Perumahan</label>
    <div class="col-sm-8">
      <input type="text" name="perusahaan_rtrw" id="perusahaan_rtrw" class="form-control" placeholder="" value="<?=$this->input->post('perusahaan_rtrw')?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kelurahan (Village)</label>
    <div class="col-sm-8">
      <input type="text" name="perusahaan_kelurahan" id="perusahaan_kelurahan" class="form-control" placeholder="" value="<?=$this->input->post('perusahaan_kelurahan')?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kecamatan (Sub-District)</label>
    <div class="col-sm-8">
      <input type="text" name="perusahaan_kecamatan" id="perusahaan_kecamatan" class="form-control" placeholder="" value="<?=$this->input->post('perusahaan_kecamatan')?>" required>
    </div>
  </div>
                <div class="form-group row">
                  <label for="input1" class="col-sm-4 control-label">Provinsi (Province)</label>
                  <div class="col-sm-8">
                  <select name="perusahaan_provinceid" class="select2 form-control" id="perusahaan_province" >
				  <option value="0">Select Provinsi (Province)</option>
<?php $i = 1; foreach($propinsi as $row) { 
		if($this->input->post('perusahaan_provinceid')) {
			if($row->provinceid == $this->input->post('perusahaan_provinceid')) { $selected = 'selected'; } else { $selected = ''; }	
		} else { $selected = ''; }										
?>
                    <option value="<?=$row->provinceid?>" <?=$selected;?>><?=$row->province?></option>
<?php $i++; } ?>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input1" class="col-sm-4 control-label">Kota/Kabupaten (City)</label>
                  <div class="col-sm-8">
                  <select name="perusahaan_cityid" class="select2 form-control" id="perusahaan_city" >
<?php
	if($this->input->post('perusahaan_cityid')) {
		if($this->input->post('perusahaan_cityid')) {
			$ktpcity = $this->tabel_model->listdata('city','provinceid',$this->input->post('perusahaan_provinceid'));
//			$ktpcity = $this->tabel_model->detail('city',$this->input->post('perusahaan_cityid'));
			foreach($ktpcity as $row) {
				if($row->cityid == $this->input->post('perusahaan_cityid')) { $selected = 'selected'; } else { $selected = ''; }	
				echo '<option value="'.$row->cityid.'" '.$selected.'>'.$row->city.'</option>';
			}
		} else { echo '<option value="">Select Kota/Kabupaten (City)</option>'; }
?>
<?php
	} else {
?>
				  <option value="">Select Kota/Kabupaten (City)</option>
<?php
	}
?>
                  </select>
				<div id="perusahaanloading" style="margin-top: 15px;">
					<img src="<?=base_url();?>images/loading.gif" width="18"> <small>Loading...</small>
				</div>
                  </div>
                </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kodepos (Zip Code)</label>
    <div class="col-sm-8">
      <input type="number" name="perusahaan_kodepos" id="perusahaan_kodepos" class="form-control" placeholder="" value="<?=$this->input->post('perusahaan_kodepos')?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Telepon Kantor (Company Phone)</label>
    <div class="col-sm-8">
      <input type="number" name="perusahaan_telp" id="perusahaan_telp" class="form-control" placeholder="" value="<?=$this->input->post('perusahaan_telp')?>" required>
    </div>
  </div>
 <!-- <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Fax Kantor (Company Fax)</label>
    <div class="col-sm-8">
      <input type="number" name="perusahaan_fax" id="perusahaan_fax" class="form-control" placeholder="" value="<?=$this->input->post('perusahaan_fax')?>" required>
    </div>
  </div>-->
  <input type="hidden" name="perusahaan_fax" id="perusahaan_fax" class="form-control" value="">
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="negara">Negara<br/><i>Country</i></label>
	  <div class="col-sm-8">
      <select id="perusahaan_negara" name="perusahaan_negara" class="form-control">
        <option value="">Select</option>
<?php
	foreach($country as $row) {
		if($this->input->post('perusahaan_negara')) {
			if($row->iso == $this->input->post('perusahaan_negara')) { $selected = 'selected'; } else { if($row->iso == 'ID') { $selected = 'selected'; } else { $selected = ''; } }
		} else {
			if($row->iso == 'ID') { $selected = 'selected'; } else { $selected = ''; }
		}
?>
        <option value="<?=$row->iso?>" <?=$selected?>><?=$row->country_name?></option>
<?php
	}
?>
      </select>
    </div>
  </div>
</div>
<!-----//////////-->


  <div id="inputlamakerja" class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Lama Bekerja<i>(Length of Work)</i></label>
    <div class="col-sm-2">
      <input type="number" name="kerja_tahun" id="kerja_tahun" class="form-control" placeholder="" value="<?=$this->input->post('kerja_tahun')?>" required>
    </div>
    <label for="staticEmail" class="col-sm-2 col-form-label">Tahun<i>(Year)</i></label>
    <div class="col-sm-2">
      <input type="number" name="kerja_bulan" id="kerja_bulan" class="form-control" placeholder="" value="<?=$this->input->post('kerja_bulan')?>" required>
    </div>
    <label for="staticEmail" class="col-sm-2 col-form-label">Bulan<i>(Month)</i></label>
  </div>
  <div id="bidangusaha" class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Bidang Usaha<i>(Line of Business)</i></label>
    <div class="col-sm-8">
      <input type="text" name="bidang_usaha" id="bidang_usaha" class="form-control" placeholder="" value="<?=$this->input->post('bidang_usaha')?>">
    </div>
  </div>
  <div id="inputjabatan" class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Jabatan<i>(Job Position)</i></label>
    <div class="col-sm-8">
      <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="" value="<?=$this->input->post('jabatan')?>" required>
    </div>
  </div>
  <input type="hidden" name="frekuensi_penghasilan" value="m">
  <!--<div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Frekuensi Penghasilan (Income Freq)</label>
    <div class="col-sm-8">
<?php
	if($this->input->post('frekuensi_penghasilan')) {
?>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="frekuensi_penghasilan" type="radio" id="inlineRadio1" value="bulanan" <?php if($this->input->post('frekuensi_penghasilan') == "bulanan") { echo 'checked'; } ?>>
  <label class="form-check-label" for="inlineRadio1">Bulanan (Monthly)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="frekuensi_penghasilan" type="radio" id="inlineRadio2" value="mingguan" <?php if($this->input->post('frekuensi_penghasilan') == "mingguan") { echo 'checked'; } ?>>
  <label class="form-check-label" for="inlineRadio2">Mingguan (Weekly)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="frekuensi_penghasilan" type="radio" id="inlineRadio2" value="harian" <?php if($this->input->post('frekuensi_penghasilan') == "harian") { echo 'checked'; } ?>>
  <label class="form-check-label" for="inlineRadio2">Harian (Daily)</label>
</div>
<?php
	} else {
?>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="frekuensi_penghasilan" type="radio" id="inlineRadio1" value="bulanan" checked>
  <label class="form-check-label" for="inlineRadio1">Bulanan (Monthly)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="frekuensi_penghasilan" type="radio" id="inlineRadio2" value="mingguan">
  <label class="form-check-label" for="inlineRadio2">Mingguan (Weekly)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="frekuensi_penghasilan" type="radio" id="inlineRadio2" value="harian">
  <label class="form-check-label" for="inlineRadio2">Harian (Daily)</label>
</div>
<?php
	}
?>

	</div>
   </div>-->

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kepemilikan Asset (Asset Owner)</label>
    <div class="col-sm-8">
<?php
	if($this->input->post('kepemilikan_asset')) {
?>
		<div class="form-check form-check-inline">
		<input class="form-check-input" name="kepemilikan_asset" type="radio" id="inlineRadio1" value="sendiri" <?php if($this->input->post('kepemilikan_asset') == "sendiri") { echo 'checked'; } ?>>
		<label class="form-check-label" for="inlineRadio1">Milik Sendiri (Myself)</label>
		</div>
		<div class="form-check form-check-inline">
		<input class="form-check-input" name="kepemilikan_asset" type="radio" id="inlineRadio2" value="perwakilan" <?php if($this->input->post('kepemilikan_asset') == "perwakilan") { echo 'checked'; } ?>>
		<label class="form-check-label" for="inlineRadio2">Perwakilan (Representative)</label>
		</div>
<?php
	} else {
?>
		<div class="form-check form-check-inline">
		<input class="form-check-input" name="kepemilikan_asset" type="radio" id="inlineRadio1" value="sendiri" checked>
		<label class="form-check-label" for="inlineRadio1">Milik Sendiri (Myself)</label>
		</div>
		<div class="form-check form-check-inline">
		<input class="form-check-input" name="kepemilikan_asset" type="radio" id="inlineRadio2" value="perwakilan">
		<label class="form-check-label" for="inlineRadio2">Perwakilan (Representative)</label>
		</div>
<?php
	}
?>
	</div>
   </div>
<div id="opsinpwp">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">NPWP (Tax ID)</label>
    <div id="inputnpwp" class="col-sm-8">
      <input type="text" name="npwp" oninput="numberOnly(this.id);" maxlength="15" id="npwp" class="form-control" placeholder="" value="<?=$this->input->post('npwp')?>">
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="rekeningefek"></label>
	  <div class="col-sm-8">
                  <div class="radio">
<?php
	if($this->input->post('no_npwp')) {
?>
                    <label>
                      <input type="radio" name="no_npwp" id="belumnpwp" value="punya" <?php if($this->input->post('no_npwp') == "punya") { echo 'checked'; } ?>>
                      Memiliki NPWP
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="no_npwp" id="belumnpwp" value="belum" <?php if($this->input->post('no_npwp') == "belum") { echo 'checked'; } ?>>
                      Belum memiliki NPWP
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="no_npwp" id="bukannpwp" value="bukan" <?php if($this->input->post('no_npwp') == "bukan") { echo 'checked'; } ?>>
                      Bukan subjek pajak
                    </label>
<?php
	} else {
?>
                    <label>
                      <input type="radio" name="no_npwp" id="belumnpwp" value="punya">
                      Memiliki NPWP
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="no_npwp" id="belumnpwp" value="belum">
                      Belum memiliki NPWP
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="no_npwp" id="bukannpwp" value="bukan">
                      Bukan subjek pajak
                    </label>
<?php
	}
?>
                  </div>
    </div>
  </div>
</div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label"><h5>Data Bank</h5></label>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="nama_bank">Nama Bank (Bank Name)</label>
	  <div class="col-sm-8">
      <select id="nama_bank" name="nama_bank" class="form-control">
        <option value="">Select</option>
<?php 
	$i = 1; foreach($bank as $row) { 

		if($this->input->post('nama_bank')) {
			if($row->BANKID == $this->input->post('nama_bank')) { $selected = 'selected'; } else { $selected = ''; }	
		} else { $selected = ''; }									

//	if($row->kode == '1905') { $selected = 'selected'; } else { $selected = ''; }	
?>
			<option value="<?=$row->BANKID?> <?=$selected?>"><?=$row->BANKNAME?></option>
<?php $i++; } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Pemilik Rekening</label>
    <div class="col-sm-8">
      <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control" placeholder="" value="<?php if($this->input->post('nama_pemilik')) {  echo $this->input->post('nama_pemilik'); } else { echo $this->input->post('nama_depan').' '.$this->input->post('nama_tengah').' '.$this->input->post('nama_belakang'); } ?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nomor Rekening (Account Number)</label>
    <div class="col-sm-8">
      <input type="number" name="no_rekening" id="no_rekening" class="form-control" placeholder="" value="<?=$this->input->post('no_rekening')?>"  required>
    </div>
  </div>
                <div class="form-group row">
                  <label  class="col-sm-4 control-label" for="image1">Upload Foto Buku Tabungan</label>
                  <div class="col-sm-8">
                  <input type="file" name="fototabungan" id="fototabungan" accept="image/png,image/jpg,image/jpeg,image/gif" required>
                  </div>
                </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="bank_rdi">Pilihan Bank RDI (Investor Account Bank)</label>
	  <div class="col-sm-8">
      <select id="bank_rdi" name="bank_rdi" class="form-control">
        <option value="">Select</option>
<?php if($this->input->post('rekening_efek') == 'reguler')  {?>
        <option value="BNI" <?php if($this->input->post('bank_rdi') == "BNI") { echo 'selected'; } ?>>PT. BANK NEGARA INDONESIA</option>
        <option value="BRI" <?php if($this->input->post('bank_rdi') == "BRI") { echo 'selected'; } ?>>PT. BANK RAKYAT INDONESIA</option>
        <option value="BCA" <?php if($this->input->post('bank_rdi') == "BCA") { echo 'selected'; } ?>>PT. BANK CENTRAL ASIA</option>
<?php } else { ?>
        <option value="BNISYARIAH" selected>PT. BANK NEGARA INDONESIA SYARIAH</option>
<?php } ?>
      </select>
    </div>
  </div>
  <p class="mb-20">"Rekening Dana Investor (RDI) adalah rekening dana wajib atas nama investor yang dibuka pada bank administrator untuk mencatat mutasi transaksi investasi"</p>
<a class="main-btn" role="button" href="#" onclick="document.getElementById('form-back').submit()">Back</a>
<button type="submit" class="main-btn">Lanjut  <i class="fal fa-arrow-right"></i></button>
                        </div>
<?php
	echo form_close();
?> 
                </div>
            </div>
        </div>
    </section>

<?php
	echo form_open('user/register', 'class="form-horizontal" id="form-back"');
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

<script>
    function registerpersonalValidation(){
		var card = document.getElementById("status_pernikahan");
		var bank = document.getElementById("nama_bank");
		var rdi = document.getElementById("bank_rdi");
		var namapasangan = document.getElementById("nama_pasangan").value;
		var ktp = document.getElementById("ktp").value;
		var npwp = document.getElementById("npwp").value;
		if(card.selectedIndex == 0) {
			alert('Mohon Pilih Status Pernikahan');
			return false;
		} else if(card.selectedIndex == 2) {
			if(namapasangan == "") {
				alert('Mohon Tulis Nama Pasangan');
				return false;
			}
		} else if(bank.selectedIndex == 0) {
			alert('Mohon Pilih Nama Bank');
			return false;
		} else if(rdi.selectedIndex == 0) {
			alert('Mohon Pilih Bank RDI');
			return false;
		} else if(ktp.length<16 || ktp.length> 16) {
			alert('Ktp harus 16 Digit');
			return false;			
		} else if(npwp.length<15 || npwp.length> 15) {
			alert('Npwp harus 15 Digit');
			return false;			
		} else {
			return true;
		}
	}
</script>