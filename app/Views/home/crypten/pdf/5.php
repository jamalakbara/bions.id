<!-- 5 1-->
<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/fpr/additional/51.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
  <div style="position: absolute; top: 155px; left: 205px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->nama_depan?> <?=$registrasi->nama_tengah?> <?=$registrasi->nama_belakang?></span></div>

<?php if($registrasi->warganegara == 'WNI') { ?>  
  <div style="position: absolute; top: 150px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
<?php if($registrasi->paspor) { ?>
  <div style="position: absolute; top: 160px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->kitas) { ?>
  <div style="position: absolute; top: 170px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>
<?php } ?>

  <div style="position: absolute; top: 185px; left: 205px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->tempat_lahir?> <?=date("d-m-Y", strtotime($registrasi->tanggal_lahir))?></span></div>

  <div style="position: absolute; top: 185px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp?></span></div>

<?php if($registrasi->warganegara == 'WNI') { ?>  
  <div style="position: absolute; top: 205px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 215px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

<?php if($registrasi->warganegara == 'WNI') { ?>  
	<?php if($registrasi->ktp_berlaku_sampai == 'lifetime') { ?>
		<div style="position: absolute; top: 230px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
	<?php } else { ?>
		<div style="position: absolute; top: 208px; left: 485px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=date("d-m-Y", strtotime($registrasi->ktp_berlaku_tanggal))?></span></div>
	<?php } ?>	
<?php } else { ?>
	<?php if($registrasi->paspor_berlaku_sampai == 'lifetime') { ?>
		<div style="position: absolute; top: 230px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
	<?php } else { ?>
		<div style="position: absolute; top: 208px; left: 485px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=date("d-m-Y", strtotime($registrasi->paspor_berlaku_tanggal))?></span></div>
	<?php } ?>	
<?php } ?>

  <div style="position: absolute; top: 250px; left: 205px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp_alamat?></span></div>
  <div style="position: absolute; top: 270px; left: 205px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp_rtrw?></span></div>

<?php if($registrasi->warganegara == 'WNI') { ?>  
  <div style="position: absolute; top: 250px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp_tempat?></span></div>
  <div style="position: absolute; top: 270px; left: 485px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=date("d-m-Y", strtotime($registrasi->paspor_terbit))?></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 250px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->ktp_tempat?></span></div>
  <div style="position: absolute; top: 270px; left: 485px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=date("d-m-Y", strtotime($registrasi->paspor_terbit))?></span></div>
<?php } ?>

<?php if($registrasi->jenis_kelamin == 'L') { ?>  
  <div style="position: absolute; top: 290px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 300px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

<?php if($registrasi->status_pernikahan == 'L') { ?>  
  <div style="position: absolute; top: 360px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else { ?>
  <div style="position: absolute; top: 370px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

  <div style="position: absolute; top: 360px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->nama_tempat_kerja?></span></div>

<?php if($registrasi->sumber_penghasilan == '1') { ?>
  <div style="position: absolute; top: 390px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '2') { ?>
  <div style="position: absolute; top: 400px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '3') { ?>
  <div style="position: absolute; top: 410px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '8') { ?>
  <div style="position: absolute; top: 422px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '9') { ?>
  <div style="position: absolute; top: 432px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '4') { ?>
  <div style="position: absolute; top: 443px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } if($registrasi->sumber_penghasilan == '10') { ?>
  <div style="position: absolute; top: 455px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '7') { ?>
  <div style="position: absolute; top: 465px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '11') { ?>
  <div style="position: absolute; top: 477px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '13') { ?>
  <div style="position: absolute; top: 487px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->sumber_penghasilan == '5') { ?>
  <div style="position: absolute; top: 499px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->pekerjaan == '6') { ?>
  <div style="position: absolute; top: 520px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->pekerjaan == '12') { ?>
  <div style="position: absolute; top: 540px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

<?php if($registrasi->penghasilan_tahun == '01') { ?>
  <div style="position: absolute; top: 390px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->penghasilan_tahun == '02') { ?>
  <div style="position: absolute; top: 400px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->penghasilan_tahun == '03') { ?>
  <div style="position: absolute; top: 410px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->penghasilan_tahun == '04') { ?>
  <div style="position: absolute; top: 422px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->penghasilan_tahun == '05') { ?>
  <div style="position: absolute; top: 432px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->penghasilan_tahun == '06') { ?>
  <div style="position: absolute; top: 443px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>

  <div style="position: absolute; top: 590px; left: 470px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->manfaat_hubungan?></span></div>

  <div style="position: absolute; top: 660px; left: 205px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->manfaat_namapemilik?></span></div>

  <div style="position: absolute; top: 720px; left: 205px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->manfaat_idnum?></span></div>

  <div style="position: absolute; top: 740px; left: 205px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->manfaat_address?></span></div>

<?php if($registrasi->manfaat_dokumen == '1') { ?>
  <div style="position: absolute; top: 680px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->manfaat_dokumen == '2') { ?>
  <div style="position: absolute; top: 690px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } else if($registrasi->manfaat_dokumen == '3') { ?>
  <div style="position: absolute; top: 700px; left: 210px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><img src="<?=base_url('images/check.png')?>" style="position: absolute; width: 10px; height: 10px;" /></span></div>
<?php } ?>
 
</div>
<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/fpr/additional/52.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />

  <div style="position: absolute; top: 402px; left: 300px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->nama_depan?> <?=$registrasi->nama_tengah?> <?=$registrasi->nama_belakang?></span></div>

  <div style="position: absolute; top: 402px; left: 80px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->manfaat_namapemilik?></span></div>

</div>
