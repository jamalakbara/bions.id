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

	echo form_open_multipart('user/registeradditional', 'class="form-horizontal"');
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

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Tempat Lahir<br><i>(place of birth)</i></label>
    <div class="col-sm-8">
      <input type="text" name="tempat_lahir" class="form-control" placeholder="" required>
    </div>
  </div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tanggal Lahir (date of birth)</label>
							<div class="col-sm-5">
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="date" name="tanggal_lahir" placeholder="DD-MM-YYYY" required>
								</div>
							</div>
						</div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="jenis_kelamin">Jenis Kelamin (gender)</label>
	  <div class="col-sm-8">
                  <div class="radio">
                    <label>
                      <input type="radio" name="jenis_kelamin" id="pria" value="L" checked>
                      Pria
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="jenis_kelamin" id="wanita" value="P">
                      Wanita
                    </label>
                  </div>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="agama">Agama (religion)</label>
	  <div class="col-sm-8">
      <select style="width: 100%; display: block;" id="agama" name="agama" class="select2 form-control">
        <option value="">Select</option>
        <option value="01" selected>Islam</option>
        <option value="02">Protestan</option>
        <option value="03">Katholik</option>
        <option value="04">Budha</option>
        <option value="05">Hindu</option>
        <option value="06">Kong Hu Cu</option>
      </select>
    </div>
  </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="pendidikan">Pendidikan (Education)</label>
	  <div class="col-sm-8">
      <select id="pendidikan" name="pendidikan" class="select2 form-control">
        <option value="">Select</option>
        <option value="SD">SD</option>
        <option value="SMP">SMP</option>
        <option value="SMU/Sederajat">SMU/Sederajat</option>
        <option value="D1-D2">D1-D2</option>
        <option value="D3">D3</option>
        <option value="S1" selected>S1</option>
        <option value="S2">S2</option>
        <option value="S3">S3</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Ibu Kandung (mothers name)</label>
    <div class="col-sm-8">
      <input type="text" name="ibu_kandung" class="form-control" placeholder="" required>
    </div>
  </div>
    <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="status_pernikahan">Status Pernikahan (marital status)</label>
	  <div class="col-sm-8">
      <select id="status_pernikahan" name="status_pernikahan" class="select2 form-control">
        <option value="">Select</option>
        <option value="S">Lajang</option>
        <option value="M">Menikah</option>
        <option value="R">Duda</option>
        <option value="W">Janda</option>
      </select>
    </div>
  </div>
  <div id="pasangan" class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Pasangan (spouse name)</label>
    <div class="col-sm-8">
      <input type="text" name="nama_pasangan" class="form-control" placeholder="">
    </div>
  </div>
<?php if($this->input->post('warganegara') == 'WNI') { ?>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nomor KTP (ID No)</label>
    <div class="col-sm-8">
      <input type="number" name="ktp" class="form-control" placeholder="" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Tempat KTP Diterbitkan (Place of issuance)</label>
    <div class="col-sm-8">
      <input type="text" name="ktp_tempat" class="form-control" placeholder="" required>
    </div>
  </div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tanggal KTP Diterbitkan (Date of issuance)</label>
							<div class="col-sm-5">
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="date" name="ktp_terbit" placeholder="DD-MM-YYYY" required>
								</div>
							</div>
						</div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Berlaku Sampai (expired date)</label>
    <div class="col-sm-8">
<div class="form-check form-check-inline">
  <input class="form-check-input" name="ktp_berlaku_sampai" type="radio" id="inlineRadio1" value="lifetime" checked>
  <label class="form-check-label" for="inlineRadio1">Seumur Hidup (lifetime)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="ktp_berlaku_sampai" type="radio" id="inlineRadio2" value="ddmmyyyy">
  <label class="form-check-label" for="inlineRadio2">DDMMYYYY</label>
</div>
								<div style="display:none;" id="ktpberlaku" class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="date" name="ktp_berlaku_tanggal" placeholder="DD-MM-YYYY">
								</div>
    </div>
  </div>
                <div class="form-group row">
                  <label  class="col-sm-4 control-label" for="image1">Upload Foto KTP</label>
                  <div class="col-sm-8">
                  <input type="file" name="fotoktp" id="fotoktp" accept="image/png,image/jpg,image/jpeg,image/gif" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label  class="col-sm-4 control-label" for="image1">Upload Selfie dengan KTP</label>
                  <div class="col-sm-8">
                  <input type="file" name="fotoselfie" id="fotoselfie" accept="image/png,image/jpg,image/jpeg,image/gif" required>
                  </div>
                </div>
<?php } else { ?>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nomor PASSPORT (ID No)</label>
    <div class="col-sm-8">
      <input type="text" name="paspor" class="form-control" placeholder="" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Tempat PASSPORT Diterbitkan (Place of issuance)</label>
    <div class="col-sm-8">
      <input type="text" name="paspor_tempat" class="form-control" placeholder="" required>
    </div>
  </div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tanggal PASSPORT Diterbitkan (Date of issuance)</label>
							<div class="col-sm-5">
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="date" name="paspor_terbit" placeholder="DD-MM-YYYY" required>
								</div>
							</div>
						</div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Berlaku Sampai (expired date)</label>
    <div class="col-sm-8">
<div class="form-check form-check-inline">
  <input class="form-check-input" name="paspor_berlaku_sampai" type="radio" id="inlineRadio1" value="lifetime" checked>
  <label class="form-check-label" for="inlineRadio1">Seumur Hidup (lifetime)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="paspor_berlaku_sampai" type="radio" id="inlineRadio2" value="ddmmyyyy">
  <label class="form-check-label" for="inlineRadio2">DDMMYYYY</label>
</div>
								<div style="display:none;" id="ktpberlaku" class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="date" name="paspor_berlaku_tanggal" placeholder="DD-MM-YYYY">
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
      <input type="text" name="kitas" class="form-control" placeholder="" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Tempat KITAS Diterbitkan (Place of issuance)</label>
    <div class="col-sm-8">
      <input type="text" name="kitas_tempat" class="form-control" placeholder="" required>
    </div>
  </div>
						<div class="form-group row">
							<label class="col-sm-4 col-form-label">Tanggal KITAS Diterbitkan (Date of issuance)</label>
							<div class="col-sm-5">
								<div class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="date" name="kitas_terbit" placeholder="DD-MM-YYYY" required>
								</div>
							</div>
						</div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Berlaku Sampai (expired date)</label>
    <div class="col-sm-8">
<div class="form-check form-check-inline">
  <input class="form-check-input" name="kitas_berlaku_sampai" type="radio" id="inlineRadio1" value="lifetime" checked>
  <label class="form-check-label" for="inlineRadio1">Seumur Hidup (lifetime)</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" name="kitas_berlaku_sampai" type="radio" id="inlineRadio2" value="ddmmyyyy">
  <label class="form-check-label" for="inlineRadio2">DDMMYYYY</label>
</div>
								<div style="display:none;" id="ktpberlaku" class="input-group">
									<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
									</div>
									<input autocomplete="off" class="form-control text-left" type="date" name="kitas_berlaku_tanggal" placeholder="DD-MM-YYYY">
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
      <label class="col-sm-4 col-form-label" for="warganegara"><h5>Alamat KTP</h5></label>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Jalan (Street Name)</label>
    <div class="col-sm-8">
      <input type="text" name="ktp_alamat" id="ktp_alamat" class="form-control" placeholder="" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">RT/RW/Perumahan</label>
    <div class="col-sm-8">
      <input type="text" name="ktp_rtrw" id="ktp_rtrw" class="form-control" placeholder="" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kelurahan (Village)</label>
    <div class="col-sm-8">
      <input type="text" name="ktp_kelurahan" id="ktp_kelurahan" class="form-control" placeholder="" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kecamatan (Sub-District)</label>
    <div class="col-sm-8">
      <input type="text" name="ktp_kecamatan" id="ktp_kecamatan" class="form-control" placeholder="" required>
    </div>
  </div>
                <div class="form-group row">
                  <label for="input1" class="col-sm-4 control-label">Provinsi (Province)</label>
                  <div class="col-sm-8">
                  <select name="ktp_provinceid" class="select2 form-control" id="ktp_province" >
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
                  <select name="ktp_cityid" class="select2 form-control" id="ktp_city" >
				  <option value="">Select Kota/Kabupaten (City)</option>
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
      <label class="col-sm-4 col-form-label"><h5>Alamat Domisili</h5></label>
	  
	                    <div class="radio">
						Alamat domisili sesuai dengan ID (Ya/Tidak)<br/>
                    <label>
                      <input type="radio" name="alamatsama" id="ya" value="1" checked>
                      Ya
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="alamatsama" id="tidak" value="0">
                      Tidak
                    </label>
                  </div>
  </div>

<div id="containerdomisili">
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Jalan (Street Name)</label>
    <div class="col-sm-8">
      <input type="text" name="terkini_alamat" id="terkini_alamat" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">RT/RW/Perumahan</label>
    <div class="col-sm-8">
      <input type="text" name="terkini_rtrw" id="terkini_rtrw" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kelurahan (Village)</label>
    <div class="col-sm-8">
      <input type="text" name="terkini_kelurahan" id="terkini_kelurahan" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kecamatan (Sub-District)</label>
    <div class="col-sm-8">
      <input type="text" name="terkini_kecamatan" id="terkini_kecamatan" class="form-control" placeholder="">
    </div>
  </div>
                <div class="form-group row">
                  <label for="input1" class="col-sm-4 control-label">Provinsi (Province)</label>
                  <div class="col-sm-8">
                  <select name="terkini_provinceid" class="select2 form-control" id="terkini_province" >
				  <option value="0">Select Province</option>
<?php $i = 1; foreach($propinsi as $row) { ?>
                    <option value="<?=$row->provinceid?>"><?=$row->province?></option>
<?php $i++; } ?>
                  </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input1" class="col-sm-4 control-label">Kota/Kabupaten (City)</label>
                  <div class="col-sm-8">
                  <select name="terkini_cityid" class="select2 form-control" id="terkini_city" >
				  <option value="">Select Kota/Kabupaten (City)</option>
                  </select>
				<div id="terkiniloading" style="margin-top: 15px;">
					<img src="<?=base_url();?>images/loading.gif" width="18"> <small>Loading...</small>
				</div>
                  </div>
                </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kodepos (Zip Code)</label>
    <div class="col-sm-8">
      <input type="number" name="terkini_kodepos" id="terkini_kodepos" class="form-control" placeholder="">
    </div>
  </div>
</div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Telepon (phone number)</label>
    <div class="col-sm-8">
      <input type="number" name="phone" class="form-control" placeholder="" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Tujuan Investasi (Investment Objectives)</label>
    <div class="col-sm-8">
      <select id="status_pernikahan" name="investasi" class="select2 form-control">
        <option value="">Select</option>
        <option value="IV" selected>Investasi</option>
        <option value="PA">Apresiasi Harga</option>
        <option value="IN">Pendapatan</option>
        <option value="SP">Spekulasi</option>
        <option value="OT">Lainnya</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="pekerjaan">Pekerjaan (Occupation)</label>
	  <div class="col-sm-8">
      <select id="pekerjaan" name="pekerjaan" class="select2 form-control">
        <option value="">Select</option>
        <option value="Karyawan">Karyawan</option>
        <option value="Wiraswasta">Wiraswasta</option>
        <option value="Pelajar">Pelajar</option>
        <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
        <option value="Pegawai Negeri">Pegawai Negeri</option>
        <option value="TNI/Polisi">TNI/Polisi</option>
        <option value="Pensiunan">Pensiunan</option>
        <option value="Lainnya">Lainnya</option>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Tempat Bekerja<i>(Company Name)</i></label>
    <div class="col-sm-8">
      <input type="text" name="tempat_kerja" class="form-control" placeholder="" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Lama Bekerja<i>(Length of Work)</i></label>
    <div class="col-sm-2">
      <input type="number" name="kerja_tahun" class="form-control" placeholder="" required>
    </div>
    <label for="staticEmail" class="col-sm-2 col-form-label">Tahun<i>(Year)</i></label>
    <div class="col-sm-2">
      <input type="number" name="kerja_bulan" class="form-control" placeholder="" required>
    </div>
    <label for="staticEmail" class="col-sm-2 col-form-label">Bulan<i>(Month)</i></label>
  </div>
  <div id="bidangusaha" class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Bidang Usaha<i>(Line of Business)</i></label>
    <div class="col-sm-8">
      <input type="text" name="bidang_usaha" class="form-control" placeholder="" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Jabatan<i>(Job Position)</i></label>
    <div class="col-sm-8">
      <input type="text" name="jabatan" class="form-control" placeholder="" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Frekuensi Penghasilan (Income Freq)</label>
    <div class="col-sm-8">
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
	</div>
   </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kepemilikan Asset (Asset Owner)</label>
    <div class="col-sm-8">
		<div class="form-check form-check-inline">
		<input class="form-check-input" name="kepemilikan_asset" type="radio" id="inlineRadio1" value="sendiri" checked>
		<label class="form-check-label" for="inlineRadio1">Milik Sendiri (Myself)</label>
		</div>
		<div class="form-check form-check-inline">
		<input class="form-check-input" name="kepemilikan_asset" type="radio" id="inlineRadio2" value="perwakilan">
		<label class="form-check-label" for="inlineRadio2">Perwakilan (Representative)</label>
		</div>
	</div>
   </div>

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">NPWP (Tax ID)</label>
    <div class="col-sm-8">
      <input type="number" name="npwp" id="npwp" class="form-control" placeholder="">
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="rekeningefek"></label>
	  <div class="col-sm-8">
                  <div class="radio">
                    <label>
                      <input type="radio" name="no_npwp" id="reguler" value="belum">
                      Belum memiliki NPWP
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="no_npwp" id="syariah" value="bukan">
                      Bukan subjek pajak
                    </label>
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
//	if($row->kode == '1905') { $selected = 'selected'; } else { $selected = ''; }	
?>
			<option value="<?=$row->BANKID?>"><?=$row->BANKNAME?></option>
<?php $i++; } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nama Pemilik Rekening</label>
    <div class="col-sm-8">
      <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control" placeholder="" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Nomor Rekening (Account Number)</label>
    <div class="col-sm-8">
      <input type="number" name="no_rekening" id="no_rekening" class="form-control" placeholder="" required>
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
        <option value="BNI">PT. BANK NEGARA INDONESIA</option>
        <option value="BRI">PT. BANK RAKYAT INDONESIA</option>
        <option value="BCA">PT. BANK CENTRAL ASIA</option>
<?php } else { ?>
        <option value="BNISYARIAH" selected>PT. BANK NEGARA INDONESIA SYARIAH</option>
<?php } ?>
      </select>
    </div>
  </div>
  <p class="mb-20">"Rekening Dana Investor (RDI) adalah rekening dana wajib atas nama investor yang dibuka pada bank administrator untuk mencatat mutasi transaksi investasi"</p>
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
<script>



</script>