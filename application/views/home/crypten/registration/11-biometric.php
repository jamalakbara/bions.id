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

    transform: rotateY(180deg);
    -webkit-transform:rotateY(180deg); /* Safari and Chrome */
    -moz-transform:rotateY(180deg); /* Firefox */
}

canvas {
    width: 100%;
     height: auto;
     max-height:inherit;
}

#video-wrapper{
  overflow:hidden;
  display:block;
  position: relative;
}

#video-wrapper .overlay {
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0px;
    left: 0px;
    z-index: 2;
    background-size:100% 100%;
    opacity: 0.7;
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
        <h4 class="page-title">Mari kita mulai...</h4>
        
        <div class="row">
          <div class="col s12">
                <div id="video-wrapper" class="mb-10">
                  <div class="overlay"></div>
                  <video autoplay muted playsinline></video>
                  <canvas id="canvas" style="display:none;"></canvas>
                  
                </div>
                <a class="waves-effect waves-light btn col s12 white-text btn-takeselfiebiometric" style="display:none;">Ambil Foto</a>
                <a class="waves-effect waves-light btn col s12 white-text btn-retakeselfiebiometric" style="display:none">Ulangi Foto</a>
          </div>
        </div>
        
        
        
    </div>
  </section>

  <div class="row">
          <div class="col s12">
            <a class="waves-effect waves-light btn col s12 white-text btn-selfiebiometricnext" >Lanjut</a>
          </div>
        </div>
</form>

</div>

 <script>

</script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/11-biometric.js?v=<?= rand() ?>"></script>
