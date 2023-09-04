<?php
  if(!$_SESSION['data']){
    redirect(base_url('registration/pra'));
  }
?>
<script>
  function hasGetUserMedia() {
    return !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia);
  }
  if (hasGetUserMedia()) {
    console.log('punya user media');
  } else {
    alert("getUserMedia() is not supported by your browser");
  }
</script>


<style>
video {
     width: 100%;
     height: auto;
     max-height:inherit;
}

canvas {
    width: 100%;
     height: auto;
     max-height:inherit;
}

#video-wrapper{
  border: 2px solid var(--color-primary);
  overflow:hidden;
  display:block;
}
</style>

<div class="row" id="app-camera-error" style="display: none">
  <div class="col s12">
    Kamera tidak terdeteksi atau izinkan akses kamera
  </div>
</div>

<div id="app">

<form class="col s12">
  <section class="page-area">
   <div class="">
        <h4 class="page-title">Foto Tanda Tangan Kamu</h4>
        
        <div class="row">
          <div class="col s12">
                <div id="video-wrapper" class="mb-10">
                  <video autoplay muted playsinline></video>
                  <canvas id="canvas" style="display:none;"></canvas>
                  
                </div>
                <a class="waves-effect waves-light btn col s12 white-text btn-takesignature" >Ambil Foto</a>
                <a class="waves-effect waves-light btn col s12 white-text btn-retakesignature" style="display:none">Ulangi Foto</a>
          </div>
        </div>
        
        <div class="row">
          <div class="col s12">
            <p class="text-center">Foto tanda tangan terbaik kamu pada selembar kertas putih</p>
          </div>
        </div>
        
    </div>
  </section>

  <div class="row">
          <div class="col s12">
            <a class="waves-effect waves-light btn col s12 white-text btn-signaturenext" >Lanjut</a>
          </div>
        </div>
</form>

</div>

 <script>

</script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/12-signature.js?v=<?= rand() ?>"></script>
