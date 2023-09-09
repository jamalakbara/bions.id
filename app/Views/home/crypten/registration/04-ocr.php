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
        <h4 class="page-title">Yuk, Foto eKTP-mu</h4>
        <div class="row">
          <div class="col s12">
                <div id="video-wrapper" class="mb-10">
                  <div class="overlay"></div>
                  <video autoplay muted playsinline></video>
                  <canvas id="canvas" style="display:none;"></canvas>
                </div>
                <a class="waves-effect waves-light btn col s12 white-text btn-takephotoocr" style="display:none">Ambil Foto</a>
                <a class="waves-effect waves-light btn col s12 white-text btn-retakephotoocr" style="display:none">Ulangi Foto</a>
          </div>
        </div>
        
        <div class="row">
          <div class="col s12">
              
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <p>Mohon diperhatikan</p>
            <p>1. Posisi eKTP mengikuti petunjuk</p>
            <p>2. Hasil foto dapat terbaca dengan jelas</p>
          </div>
        </div>
        

  </section>

  <div class="row">
          <div class="col s12">
            <a class="waves-effect waves-light btn col s12 white-text btn-ocrnext" >LANJUT</a>
          </div>
        </div>
</form>

</div>

 <script>

</script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/04-ocr.js?v=<?= rand() ?>"></script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/04-ocr-validation.js?v=<?= rand() ?>"></script>
