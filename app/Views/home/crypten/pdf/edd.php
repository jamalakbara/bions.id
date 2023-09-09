<!-- edd 1-->
<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/fpr/additional/edd1.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />

  <div style="position: absolute; top: 119px; left: 365px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->nama_depan?> <?=$registrasi->nama_tengah?> <?=$registrasi->nama_belakang?></span></div>
  <div style="position: absolute; top: 130px; left: 365px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->tempat_lahir?> <?=date("d-m-Y", strtotime($registrasi->tanggal_lahir))?></span></div>
  <div style="position: absolute; top: 141px; left: 365px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->warganegara?></span></div>
  <div style="position: absolute; top: 152px; left: 365px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->pekerjaan?></span></div>
  <div style="position: absolute; top: 163px; left: 365px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->perusahaan_alamat?></span></div>
  <div style="position: absolute; top: 174px; left: 365px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?php $row = $this->tabel_model->detail('city',$registrasi->perusahaan_cityid); echo $row->type.' '.$row->city; ?></span></div>
  <div style="position: absolute; top: 185px; left: 365px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->perusahaan_telp?></span></div>

  <div style="position: absolute; top: 262px; left: 120px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;">1</span></div>
  <div style="position: absolute; top: 262px; left: 145px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_nama1?></span></div>
  <div style="position: absolute; top: 262px; left: 260px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_tgllahir1?></span></div>
  <div style="position: absolute; top: 262px; left: 395px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_pekerjaan1?></span></div>
  <div style="position: absolute; top: 262px; left: 500px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_hubungan1?></span></div>

  <div style="position: absolute; top: 275px; left: 120px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;">2</span></div>
  <div style="position: absolute; top: 275px; left: 145px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_nama2?></span></div>
  <div style="position: absolute; top: 275px; left: 260px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_tgllahir2?></span></div>
  <div style="position: absolute; top: 275px; left: 395px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_pekerjaan2?></span></div>
  <div style="position: absolute; top: 275px; left: 500px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_hubungan2?></span></div>

  <div style="position: absolute; top: 288px; left: 120px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;">3</span></div>
  <div style="position: absolute; top: 288px; left: 145px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_nama3?></span></div>
  <div style="position: absolute; top: 288px; left: 260px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_tgllahir3?></span></div>
  <div style="position: absolute; top: 288px; left: 395px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_pekerjaan3?></span></div>
  <div style="position: absolute; top: 288px; left: 500px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_hubungan3?></span></div>

  <div style="position: absolute; top: 300px; left: 120px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;">4</span></div>
  <div style="position: absolute; top: 300px; left: 145px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_nama4?></span></div>
  <div style="position: absolute; top: 300px; left: 260px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_tgllahir4?></span></div>
  <div style="position: absolute; top: 300px; left: 395px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_pekerjaan4?></span></div>
  <div style="position: absolute; top: 300px; left: 500px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_hubungan4?></span></div>

  <div style="position: absolute; top: 311px; left: 120px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;">5</span></div>
  <div style="position: absolute; top: 311px; left: 145px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_nama5?></span></div>
  <div style="position: absolute; top: 311px; left: 260px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_tgllahir5?></span></div>
  <div style="position: absolute; top: 311px; left: 395px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_pekerjaan5?></span></div>
  <div style="position: absolute; top: 311px; left: 500px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_hubungan5?></span></div>

  <div style="position: absolute; top: 341px; left: 325px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_tinggal?></span></div>

<?php if($registrasi->edd_rumah == '1') { ?>
  <div style="position: absolute; top: 375px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->edd_rumah == '2') { ?>
  <div style="position: absolute; top: 385px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->edd_rumah == '3') { ?>
  <div style="position: absolute; top: 400px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->edd_rumah == '4') { ?>
  <div style="position: absolute; top: 410px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

<?php if($registrasi->edd_milik == '1') { ?>
  <div style="position: absolute; top: 445px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->edd_milik == '2') { ?>
  <div style="position: absolute; top: 455px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->edd_milik == '3') { ?>
  <div style="position: absolute; top: 465px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->edd_milik == '4') { ?>
  <div style="position: absolute; top: 475px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

  <div style="position: absolute; top: 505px; left: 165px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_owner_a?></span></div>
  <div style="position: absolute; top: 515px; left: 165px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_owner_b?></span></div>
  <div style="position: absolute; top: 525px; left: 165px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_owner_c?></span></div>
  <div style="position: absolute; top: 535px; left: 165px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_owner_d?></span></div>
  <div style="position: absolute; top: 545px; left: 165px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_owner_e?></span></div>

<?php if($registrasi->edd_kendaraan == '1') { ?>
  <div style="position: absolute; top: 585px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->edd_kendaraan == '2') { ?>
  <div style="position: absolute; top: 595px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->edd_kendaraan == '3') { ?>
  <div style="position: absolute; top: 605px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->edd_kendaraan == '4') { ?>
  <div style="position: absolute; top: 615px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->edd_kendaraan == '5') { ?>
  <div style="position: absolute; top: 625px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

  <div style="position: absolute; top: 668px; left: 335px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_gaji1?></span></div>
  <div style="position: absolute; top: 668px; left: 480px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_gaji2?></span></div>

  <div style="position: absolute; top: 682px; left: 335px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_investasi1?></span></div>
  <div style="position: absolute; top: 682px; left: 480px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_investasi2?></span></div>

  <div style="position: absolute; top: 696px; left: 335px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_dividen1?></span></div>
  <div style="position: absolute; top: 696px; left: 480px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_dividen2?></span></div>

  <div style="position: absolute; top: 710px; left: 335px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_bisnis1?></span></div>
  <div style="position: absolute; top: 710px; left: 480px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_bisnis2?></span></div>

  <div style="position: absolute; top: 724px; left: 335px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_lainnya1?></span></div>
  <div style="position: absolute; top: 724px; left: 480px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_lainnya2?></span></div>

<?php if($registrasi->edd_sumber == '1') { ?>
  <div style="position: absolute; top: 780px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->edd_sumber == '2') { ?>
  <div style="position: absolute; top: 790px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->edd_sumber == '3') { ?>
  <div style="position: absolute; top: 800px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->edd_sumber == '4') { ?>
  <div style="position: absolute; top: 810px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->edd_sumber == '5') { ?>
  <div style="position: absolute; top: 820px; left: 130px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

</div>

<!-- edd 2-->
<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/fpr/additional/edd2.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />

  <div style="position: absolute; top: 79px; left: 265px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_estimasi?></span></div>

  <div style="position: absolute; top: 113px; left: 125px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_tujuan?></span></div>

  <div style="position: absolute; top: 158px; left: 125px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_produk_bni?></span></div>

  <div style="position: absolute; top: 223px; left: 125px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->edd_produk_lain?></span></div>

  <div style="position: absolute; top: 400px; left: 110px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em; font-size: 6pt;"><?=$registrasi->nama_depan?> <?=$registrasi->nama_tengah?> <?=$registrasi->nama_belakang?></span></div>

</div>