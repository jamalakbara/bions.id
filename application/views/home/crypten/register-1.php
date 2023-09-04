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

    <!--====== BLOG PART START ======-->
    
    <section class="faq-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <!--<span>REGISTRASI BIONS</span>-->
                        <h3 class="title">Pra Registrasi<br/>(Pre-Registration)</h3>
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
<p class="mb-20">Sebelum memulai registrasi, silahkan mempersiapkan foto KTP, NPWP, Buku Tabungan dan Foto Selfie dengan KTP</p>
<p class="mb-20">(Before starting registration, please prepare your ID card photo, Tax ID photo, Statement of Bank Account Photo and Selfie with your ID)</p>
<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

	echo form_open('user/registerotp', 'class="form-horizontal" onsubmit="return registerValidation();"');
?>
                        <div class="contact-box">
  <input type="hidden" name="reff" class="form-control" value="<?=$this->input->get('reff')?>">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Depan<br/><i>First Name</i></label>
    <div class="col-sm-8">
      <input type="text" name="nama_depan" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' class="form-control" placeholder="" maxlength="35" value="<?=$this->input->post('nama_depan')?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Tengah<br><i>Middle Name</i></label>
    <div class="col-sm-8">
      <input type="text" name="nama_tengah" class="form-control" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' maxlength="35" placeholder=""value="<?=$this->input->post('nama_tengah')?>" >
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Belakang<br><i>Last Name</i></label>
    <div class="col-sm-8">
      <input type="text" name="nama_belakang" class="form-control" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' maxlength="35" placeholder="" value="<?=$this->input->post('nama_belakang')?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Alias<br><i>Nick Name</i></label>
    <div class="col-sm-8">
      <input type="text" name="nama_alias" class="form-control" maxlength="35" placeholder="" value="<?=$this->input->post('nama_alias')?>" required>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="warganegara">Warga Negara<br><i>Nationality</i></label>
	  <div class="col-sm-8">
                  <div class="radio">
<?php
	if($this->input->post('warganegara')) {
?>
                    <label>
                      <input type="radio" name="warganegara" id="wni" value="WNI" <?php if($this->input->post('warganegara') == "WNI") { echo 'checked'; } ?>>
                      WNI
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="warganegara" id="wna" value="WNA" <?php if($this->input->post('warganegara') == "WNA") { echo 'checked'; } ?>>
                      WNA
                    </label>
<?php
	} else {
?>
                    <label>
                      <input type="radio" name="warganegara" id="wni" value="WNI" checked>
                      WNI
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="warganegara" id="wna" value="WNA">
                      WNA
                    </label>
<?php
	}
?>
                  </div>
    </div>
  </div>
  <div id="container" class="form-group row">
      <label class="col-sm-4 col-form-label" for="negara">Negara<br/><i>Country</i></label>
	  <div class="col-sm-8">
      <select id="negara" name="negara" class="form-control">
        <option value="">Select</option>
<?php
	foreach($country as $row) {
		if($this->input->post('negara')) {
			if($row->iso == $this->input->post('negara')) { $selected = 'selected'; } else { $selected = ''; }	
		} else { $selected = ''; }
?>
        <option value="<?=$row->iso?>" <?=$selected;?>><?=$row->country_name?></option>
<?php
	}
?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
    <div class="col-sm-8">
      <input type="email" name="email" class="form-control" placeholder="" value="<?=$this->input->post('email')?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Handphone</label>
    <div class="col-sm-8">
      <input type="text" oninput="numberOnly(this.id);" name="handphone" id="handphone" class="form-control" placeholder="" value="<?=$this->input->post('handphone')?>" required>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="rekeningefek">Tipe Rekening Efek<br/><i>(Account Type)</i></label>
	  <div class="col-sm-8">
                  <div class="radio">
<?php
	if($this->input->post('rekening_efek')) {
?>
                    <label>
                      <input type="radio" name="rekening_efek" id="reguler" value="reguler" <?php if($this->input->post('rekening_efek') == "reguler") { echo 'checked'; } ?>>
                      Reguler
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="rekening_efek" id="syariah" value="syariah" <?php if($this->input->post('rekening_efek') == "syariah") { echo 'checked'; } ?>>
                      Syariah
                    </label>
<?php
	} else {
?>
                    <label>
                      <input type="radio" name="rekening_efek" id="reguler" value="reguler" checked>
                      Reguler
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="rekening_efek" id="syariah" value="syariah">
                      Syariah
                    </label>
<?php
	}
?>
                  </div>

    </div>
  </div>
  <input type="hidden" name="tipe_layanan" id="online" value="online">
  <input type="hidden" name="cabang" id="cabang" value="1905">
  <!--<div class="form-group row">
      <label class="col-sm-4 col-form-label" for="service">Tipe Layanan<br/><i>(Service Type)</i></label>
	  <div class="col-sm-8">
<?php
	if($this->input->post('tipe_layanan')) {
?>
                  <div class="radio">
                    <label>
                      <input type="radio" name="tipe_layanan" id="online" value="online" <?php if($this->input->post('tipe_layanan') == "online") { echo 'checked'; } ?>>
                      Online<br/>"Transaksi secara langsung melalui aplikasi, tanpa perantara"<br/>Fee Beli 0.17%<br/>Fee Jual 0.27%<br/>(dapatkan promo fee 0.15%-0.25% selama 1 bulan untuk nasabah baru online)
                    </label>
				  <div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="tipe_layanan" id="sales" value="sales" <?php if($this->input->post('tipe_layanan') == "sales") { echo 'checked'; } ?>>
                      Sales<br/>"Transaksi melalui sales"<br/>Fee Beli 0.25%<br/>Fee Jual 0.35%
                    </label>
                  </div>
<?php
	} else {
?>
                  <div class="radio">
                    <label>
                      <input type="radio" name="tipe_layanan" id="online" value="online" checked>
                      Online<br/>"Transaksi secara langsung melalui aplikasi, tanpa perantara"<br/>Fee Beli 0.17%<br/>Fee Jual 0.27%<br/>(dapatkan promo fee 0.15%-0.25% selama 1 bulan untuk nasabah baru online)
                    </label>
				  <div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="tipe_layanan" id="sales" value="sales">
                      Sales<br/>"Transaksi melalui sales"<br/>Fee Beli 0.25%<br/>Fee Jual 0.35%
                    </label>
                  </div>
<?php
	}
?>

    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="cabang">Cabang (Branch)</label>
	  <div class="col-sm-8">
<?php
	if($this->input->post('cabang')) {
?>
      <select style="width: 100%; display: block;" id="cabang" name="cabang" class="form-control">
        <option value="">Select</option>
<?php 
	$i = 1; foreach($cabang as $row) { 
	if($row->kode == $this->input->post('cabang')) { $selected = 'selected'; } else { $selected = ''; }	
?>
			<option value="<?=$row->kode?>" <?=$selected?>><?=$row->cabang?></option>
<?php $i++; } ?>
      </select>
<?php
	} else {
?>
      <select style="width: 100%; display: block;" id="cabang" name="cabang" class="form-control">
        <option value="">Select</option>
<?php 
	$i = 1; foreach($cabang as $row) { 
	if($row->kode == '1905') { $selected = 'selected'; } else { $selected = ''; }	
?>
			<option value="<?=$row->kode?>" <?=$selected?>><?=$row->cabang?></option>
<?php $i++; } ?>
      </select>
<?php
	}
?>
    </div>
  </div>-->
  <p class="mb-20">Sebelum mengisi data selanjutnya, kami akan melakukan verifikasi terlebih dahulu ke alamat email anda. untuk melanjutkan silahkan tekan tombol Get OTP</p>
<button type="submit" class="main-btn">Get OTP  <i class="fal fa-arrow-right"></i></button>
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

<script>
<?php
	if($this->input->post('warganegara') == 'WNA') {
?>
	$("div#container").show();
<?php
	}
?>

    function registerValidation(){
		if (document.getElementById('wna').checked) {
			var card = document.getElementById("negara");
			if(card.selectedIndex == 0) {
				alert('Mohon Pilih Negara');
				return false;
			}			
		} else {
			return true;
		}
    }
</script>