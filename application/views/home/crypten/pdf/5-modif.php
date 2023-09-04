<!-- 5 1-->
<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/fpr/additional/51.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
  <div style="position: absolute; top: 155px; left: 205px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->nama_depan?> <?=$registrasi->nama_tengah?> <?=$registrasi->nama_belakang?></span></div>

  <div style="position: absolute; top: 185px; left: 205px; width: 100%; text-align: left; color: black; line-height: 1.5"><span style="background-color: none; padding: .5em;"><?=$registrasi->tempat_lahir?> <?=date("d-m-Y", strtotime($registrasi->tanggal_lahir))?></span></div>

</div>
<div style="position: relative; border: 0px solid black; width: 700px; height: 940px; margin: auto;">
  <img src="<?=base_url('images/fpr/additional/52.jpg')?>" style="position: absolute; width: 700px; height: 940px; z-index: -1000;" />
</div>
