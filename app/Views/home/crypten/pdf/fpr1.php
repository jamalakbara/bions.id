<!-- fpr hal 1 -->
<?php
		   
	switch ($registrasi->agama) {
		case 01: $agama = 'Islam'; break;
		case 02: $agama = 'Protestan'; break;
		case 03: $agama = 'Katholik'; break;
		case 04: $agama = 'Budha'; break;
		case 05: $agama = 'Hindu'; break;
		case 06: $agama = 'Kong Hu Cu'; break;
		default: $agama = ''; break;
	}

	$countrisk = $registrasi->waktu_investasi + $registrasi->tujuan_investasi + $registrasi->resiko_investasi + $registrasi->dana_investasi + $registrasi->pengetahuan_investasi;

	if($countrisk >= 25 && $countrisk <= 35 ) { $typeinvestor = 'Konservatif'; } else if($countrisk >= 36 && $countrisk <= 55 ) { $typeinvestor = 'Moderat'; } else if($countrisk >= 25 && $countrisk <= 35 ) { $typeinvestor = 'Agresif'; } 
?>
<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/fpr/reguler/fpr1.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />

<?php if($registrasi->rekening_efek == 'reguler') { ?>
  <div style="position: absolute; top: 232px; left: 75px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 232px; left: 150px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

<?php if($registrasi->tipe_layanan == 'online') { ?>
  <div style="position: absolute; top: 232px; left: 305px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 232px; left: 385px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

  <div style="position: absolute; top: 232px; left: 455px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?php $row = $this->tabel_model->detailwhere('cabang','kode = '.$registrasi->cabang); echo $row->cabang; ?></span></div>

  <div style="position: absolute; top: 306px; left: 195px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->nama_depan?> <?=$registrasi->nama_tengah?> <?=$registrasi->nama_belakang?></span></div>

  <div style="position: absolute; top: 334px; left: 195px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->nama_alias?></span></div>

  <div style="position: absolute; top: 334px; left: 495px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$typeinvestor?></span></div>

  <div style="position: absolute; top: 362px; left: 495px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->warganegara?></span></div>

<?php if($registrasi->jenis_kelamin == 'L') { ?>
  <div style="position: absolute; top: 358px; left: 195px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 358px; left: 270px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

  <div style="position: absolute; top: 388px; left: 195px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->tempat_lahir?></span></div>

  <div style="position: absolute; top: 388px; left: 495px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=date("d-m-Y", strtotime($registrasi->tanggal_lahir))?></span></div>

  <div style="position: absolute; top: 415px; left: 195px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$agama?></span></div>

<?php if($registrasi->status_pernikahan == 'S') { ?>
  <div style="position: absolute; top: 438px; left: 195px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->status_pernikahan == 'R' OR $registrasi->status_pernikahan == 'W' ) { ?>
  <div style="position: absolute; top: 438px; left: 275px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 438px; left: 360px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

<?php if($registrasi->status_pernikahan == 'M') { ?>
  <div style="position: absolute; top: 442px; left: 500px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->nama_pasangan?></span></div>
<?php } ?>

  <div style="position: absolute; top: 468px; left: 195px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ibu_kandung?></span></div>

<?php if($registrasi->pendidikan == 'SMU/Sederajat') { ?>
  <div style="position: absolute; top: 490px; left: 200px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->pendidikan == 'D3') { ?>
  <div style="position: absolute; top: 490px; left: 280px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->pendidikan == 'S1') { ?>
  <div style="position: absolute; top: 490px; left: 360px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->pendidikan == 'S2') { ?>
  <div style="position: absolute; top: 490px; left: 430px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->pendidikan == 'S3') { ?>
  <div style="position: absolute; top: 490px; left: 490px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

<?php if($registrasi->warganegara == 'WNI') { ?>
  <div style="position: absolute; top: 520px; left: 200px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 520px; left: 280px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

<?php if($registrasi->warganegara == 'WNI') { ?>
  <div style="position: absolute; top: 523px; left: 495px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp?></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 523px; left: 495px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->paspor?></span></div>
<?php } ?>

<?php if($registrasi->warganegara == 'WNI') { ?>
  <div style="position: absolute; top: 550px; left: 195px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp_tempat?></span></div>
  <div style="position: absolute; top: 550px; left: 495px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=date("d-m-Y", strtotime($registrasi->ktp_terbit))?></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 550px; left: 195px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->paspor_tempat?></span></div>
  <div style="position: absolute; top: 550px; left: 495px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=date("d-m-Y", strtotime($registrasi->paspor_terbit))?></span></div>
<?php } ?>

<?php if($registrasi->warganegara == 'WNI') { ?>
<?php if($registrasi->ktp_berlaku_sampai != 'lifetime') { ?>
  <div style="position: absolute; top: 575px; left: 195px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp_berlaku_tanggal?></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 575px; left: 475px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>
<?php } else { ?>
<?php if($registrasi->paspor_berlaku_sampai != 'lifetime') { ?>
  <div style="position: absolute; top: 575px; left: 195px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->paspor_berlaku_tanggal?></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 575px; left: 475px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>
<?php } ?>

  <div style="position: absolute; top: 608px; left: 125px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->phone?></span></div>
  <div style="position: absolute; top: 608px; left: 335px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->handphone?></span></div>
  <div style="position: absolute; top: 608px; left: 515px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->email?></span></div>
<?php if($registrasi->alamatsama == '1') { ?>
  <div style="position: absolute; top: 638px; left: 545px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

  <div style="position: absolute; top: 666px; left: 150px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp_alamat?></span></div>
  <div style="position: absolute; top: 666px; left: 465px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->terkini_alamat?></span></div>

  <div style="position: absolute; top: 695px; left: 150px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp_rtrw?></span></div>
  <div style="position: absolute; top: 695px; left: 465px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->terkini_rtrw?></span></div>

  <div style="position: absolute; top: 720px; left: 150px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp_kelurahan?></span></div>
  <div style="position: absolute; top: 720px; left: 465px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->terkini_kelurahan?></span></div>

  <div style="position: absolute; top: 748px; left: 150px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp_kecamatan?></span></div>
  <div style="position: absolute; top: 748px; left: 465px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp_kecamatan?></span></div>

  <div style="position: absolute; top: 775px; left: 150px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?php $row = $this->tabel_model->detail('city',$registrasi->ktp_cityid); echo $row->type.' '.$row->city; ?></span></div>
  <div style="position: absolute; top: 775px; left: 465px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?php $row = $this->tabel_model->detail('city',$registrasi->terkini_cityid); echo $row->type.' '.$row->city; ?></span></div>

  <div style="position: absolute; top: 798px; left: 150px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?php $row = $this->tabel_model->detail('province',$registrasi->ktp_provinceid); echo $row->province; ?></span></div>
  <div style="position: absolute; top: 798px; left: 465px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?php $row = $this->tabel_model->detail('province',$registrasi->terkini_provinceid); echo $row->province; ?></span></div>

  <div style="position: absolute; top: 827px; left: 150px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp_kodepos?></span></div>
  <div style="position: absolute; top: 827px; left: 465px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp_kodepos?></span></div>

  <div style="position: absolute; top: 855px; left: 150px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?php $row = $this->tabel_model->detailcountry('country',$registrasi->negara); echo $row->country_name;?></span></div>
  <div style="position: absolute; top: 855px; left: 465px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?php $row = $this->tabel_model->detailcountry('country',$registrasi->negara); echo $row->country_name;?></span></div>

</div>

<!-- fpr hal 2 -->
<?php
	$lamakerja = '';
	if($registrasi->kerja_tahun) { $lamakerja .= $registrasi->kerja_tahun.' tahun '; }
	if($registrasi->kerja_bulan) { $lamakerja .= $registrasi->kerja_bulan.' bulan '; }
	 
?>
<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/fpr/reguler/fpr2.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />

<?php if($registrasi->pekerjaan == 'Pelajar') { ?>
  <div style="position: absolute; top: 105px; left: 200px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->pekerjaan == 'Karyawan') { ?>
  <div style="position: absolute; top: 105px; left: 280px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->pekerjaan == 'Pensiunan') { ?>
  <div style="position: absolute; top: 105px; left: 365px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->pekerjaan == 'Ibu Rumah Tangga') { ?>
  <div style="position: absolute; top: 105px; left: 445px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->pekerjaan == 'Pegawai Negeri') { ?>
  <div style="position: absolute; top: 105px; left: 530px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->pekerjaan == 'Guru') { ?>
  <div style="position: absolute; top: 105px; left: 615px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->pekerjaan == 'Wiraswasta') { ?>
  <div style="position: absolute; top: 130px; left: 200px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->pekerjaan == 'TNI/Polisi') { ?>
  <div style="position: absolute; top: 130px; left: 280px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->pekerjaan == 'Lainnya') { ?>
  <div style="position: absolute; top: 130px; left: 365px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

  <div style="position: absolute; top: 160px; left: 195px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->npwp?></span></div>
<?php if($registrasi->no_npwp == 'belum') { ?>
  <div style="position: absolute; top: 160px; left: 465px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 160px; left: 595px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

  <div style="position: absolute; top: 188px; left: 195px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->nama_tempat_kerja?></span></div>

  <div style="position: absolute; top: 188px; left: 515px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$lamakerja?></span></div>

  <div style="position: absolute; top: 215px; left: 195px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->bidang_usaha?></span></div>

  <div style="position: absolute; top: 215px; left: 515px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->jabatan?></span></div>

<?php if($registrasi->frekuensi_penghasilan == 'bulanan') { ?>
  <div style="position: absolute; top: 238px; left: 200px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->frekuensi_penghasilan == 'mingguan') { ?>
  <div style="position: absolute; top: 238px; left: 280px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 238px; left: 365px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

<?php if($registrasi->kepemilikan_asset == 'sendiri') { ?>
  <div style="position: absolute; top: 238px; left: 560px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 238px; left: 640px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>
</div>

<?php if($registrasi->sumber_penghasilan == '1') { ?>
  <div style="position: absolute; top: 268px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '2') { ?>
  <div style="position: absolute; top: 268px; left: 285px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '3') { ?>
  <div style="position: absolute; top: 268px; left: 365px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '8') { ?>
  <div style="position: absolute; top: 268px; left: 445px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '9') { ?>
  <div style="position: absolute; top: 268px; left: 530px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '4') { ?>
  <div style="position: absolute; top: 268px; left: 617px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } if($registrasi->sumber_penghasilan == '10') { ?>
  <div style="position: absolute; top: 293px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '7') { ?>
  <div style="position: absolute; top: 293px; left: 285px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '11') { ?>
  <div style="position: absolute; top: 293px; left: 365px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '13') { ?>
  <div style="position: absolute; top: 293px; left: 445px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '5') { ?>
  <div style="position: absolute; top: 293px; left: 530px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->pekerjaan == '6') { ?>
  <div style="position: absolute; top: 323px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->pekerjaan == '12') { ?>
  <div style="position: absolute; top: 323px; left: 345px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>


<?php if($registrasi->penghasilan_bulan == '1') { ?>
  <div style="position: absolute; top: 350px; left: 215px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->penghasilan_bulan == '2') { ?>
  <div style="position: absolute; top: 350px; left: 370px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->penghasilan_bulan == '3') { ?>
  <div style="position: absolute; top: 350px; left: 530px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->penghasilan_bulan == '4') { ?>
  <div style="position: absolute; top: 380px; left: 215px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->penghasilan_bulan == '5') { ?>
  <div style="position: absolute; top: 380px; left: 370px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->penghasilan_bulan == '6') { ?>
  <div style="position: absolute; top: 380px; left: 530px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

<?php if($registrasi->penghasilan_tahun == '01') { ?>
  <div style="position: absolute; top: 405px; left: 215px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->penghasilan_tahun == '02') { ?>
  <div style="position: absolute; top: 405px; left: 370px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->penghasilan_tahun == '03') { ?>
  <div style="position: absolute; top: 405px; left: 530px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->penghasilan_tahun == '04') { ?>
  <div style="position: absolute; top: 435px; left: 215px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->penghasilan_tahun == '05') { ?>
  <div style="position: absolute; top: 435px; left: 370px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->penghasilan_tahun == '06') { ?>
  <div style="position: absolute; top: 435px; left: 530px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

<?php if($registrasi->kekayaan == '01') { ?>
  <div style="position: absolute; top: 460px; left: 215px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->kekayaan == '02') { ?>
  <div style="position: absolute; top: 460px; left: 370px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->kekayaan == '02') { ?>
  <div style="position: absolute; top: 460px; left: 530px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->kekayaan == '02') { ?>
  <div style="position: absolute; top: 490px; left: 215px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->kekayaan == '02') { ?>
  <div style="position: absolute; top: 490px; left: 370px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->kekayaan == '02') { ?>
  <div style="position: absolute; top: 490px; left: 530px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

  <div style="position: absolute; top: 535px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->perusahaan_alamat?></span></div>

  <div style="position: absolute; top: 565px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->perusahaan_rtrw?></span></div>

  <div style="position: absolute; top: 565px; left: 520px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->perusahaan_kelurahan?></span></div>

  <div style="position: absolute; top: 592px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->perusahaan_kecamatan?></span></div>

  <div style="position: absolute; top: 592px; left: 520px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->perusahaan_cityid?></span></div>

  <div style="position: absolute; top: 620px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->perusahaan_provinceid?></span></div>

  <div style="position: absolute; top: 620px; left: 520px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->perusahaan_kodepos?></span></div>

  <div style="position: absolute; top: 645px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->perusahaan_telp?></span></div>

  <div style="position: absolute; top: 645px; left: 520px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->perusahaan_fax?></span></div>

  <div style="position: absolute; top: 670px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->perusahaan_negara?></span></div>

  <div style="position: absolute; top: 760px; left: 230px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->nama_bank?></span></div>

  <div style="position: absolute; top: 785px; left: 230px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->nama_pemilik?></span></div>

  <div style="position: absolute; top: 812px; left: 230px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->no_rekening?></span></div>

</div>

<!-- fpr hal 3 -->

<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/fpr/reguler/fpr3.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />


<?php if($registrasi->tujuan_investasi == '10') { ?>
  <div style="position: absolute; top: 55px; left: 160px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->tujuan_investasi == '15') { ?>
  <div style="position: absolute; top: 55px; left: 265px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->tujuan_investasi == '5') { ?>
  <div style="position: absolute; top: 55px; left: 345px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->tujuan_investasi == '20') { ?>
  <div style="position: absolute; top: 55px; left: 425px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 55px; left: 505px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

<?php if($registrasi->alamat_korespondensi == 'ktp') { ?>
  <div style="position: absolute; top: 105px; left: 160px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->alamat_korespondensi == 'terkini') { ?>
  <div style="position: absolute; top: 105px; left: 310px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } else if($registrasi->alamat_korespondensi == 'kantor') { ?>
  <div style="position: absolute; top: 105px; left: 485px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 20px; height: 20px;" /></span></div>
<?php } ?>

<?php if($registrasi->kuis1 == 'ya') { ?>
  <div style="position: absolute; top: 215px; left: 455px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 215px; left: 570px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

  <div style="position: absolute; top: 228px; left: 555px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->kuis1_nama?></span></div>
  <div style="position: absolute; top: 240px; left: 555px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->kuis1_bagian?></span></div>

<?php if($registrasi->kuis2 == 'ya') { ?>
  <div style="position: absolute; top: 270px; left: 455px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 270px; left: 570px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

  <div style="position: absolute; top: 288px; left: 555px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->kuis2_nama?></span></div>
  <div style="position: absolute; top: 300px; left: 555px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->kuis2_perusahaan?></span></div>

<?php if($registrasi->kuis3 == 'ya') { ?>
  <div style="position: absolute; top: 340px; left: 455px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 340px; left: 570px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

  <div style="position: absolute; top: 370px; left: 555px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->kuis3_nama?></span></div>
  <div style="position: absolute; top: 382px; left: 555px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->kuis3_perusahaan?></span></div>

<?php if($registrasi->kuis4 == 'ya') { ?>
  <div style="position: absolute; top: 455px; left: 105px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 455px; left: 330px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

<?php if($registrasi->kuis5 == 'ya') { ?>
  <div style="position: absolute; top: 510px; left: 105px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 510px; left: 330px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

<?php if($registrasi->kuis6 == 'ya') { ?>
  <div style="position: absolute; top: 560px; left: 105px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 560px; left: 330px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

<?php if($registrasi->kuis7 == 'ya') { ?>
  <div style="position: absolute; top: 595px; left: 450px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 595px; left: 565px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

<?php if($registrasi->kuis8 == 'ya') { ?>
  <div style="position: absolute; top: 620px; left: 450px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 620px; left: 565px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

<?php if($registrasi->kuis9 == 'ya') { ?>
  <div style="position: absolute; top: 645px; left: 450px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 645px; left: 565px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

<?php if($registrasi->kuis10 == 'ya') { ?>
  <div style="position: absolute; top: 678px; left: 450px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 678px; left: 565px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

<?php if($registrasi->kuis11 == 'ya') { ?>
  <div style="position: absolute; top: 715px; left: 450px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 715px; left: 565px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

<?php if($registrasi->kuis12 == 'ya') { ?>
  <div style="position: absolute; top: 775px; left: 450px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 775px; left: 570px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

<?php if($registrasi->kuis13 == 'ya') { ?>
  <div style="position: absolute; top: 820px; left: 450px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 820px; left: 570px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

</div>

<!-- fpr hal 4 -->
<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/fpr/reguler/fpr4.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>

<!-- fpr hal 5 -->
<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/fpr/reguler/fpr5.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />

 <div style="position: absolute; top: 615px; left: 0px; width: 100%; text-align: center; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->nama_depan?> <?=$registrasi->nama_tengah?> <?=$registrasi->nama_belakang?></span></div>

  <div style="position: absolute; top: 695px; left: 200px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url($registrasi->signature)?>" style="position: absolute; width: 100px; height: 50px;" /></span></div>

  <div style="position: absolute; top: 695px; left: 380px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url($registrasi->signature)?>" style="position: absolute; width: 100px; height: 50px;" /></span></div>

 <div style="position: absolute; top: 745px; left: -170px; width: 100%; text-align: center; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->nama_depan?> <?=$registrasi->nama_tengah?> <?=$registrasi->nama_belakang?></span></div>

 <div style="position: absolute; top: 745px; left: 170px; width: 100%; text-align: center; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->nama_depan?> <?=$registrasi->nama_tengah?> <?=$registrasi->nama_belakang?></span></div>

</div>