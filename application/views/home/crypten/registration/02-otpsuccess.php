<?php
  if(!$_SESSION['data']){
    redirect(base_url('registration/pra'));
  }
?>


<style>
.card-logo{
    top: -10px;
    left: 50%;
    transform: translateX(-50%);
    position: absolute;
    margin-bottom: 50px;
}

</style>
<div id="app">

<form class="col s12">
  <section class="page-area">
   <div class="">
        <h4 class="page-title">Verifikasi OTP Sukses</h4>
        <div class="row mb-20">
          <div class="col">
            <p>Yeay! verifikasi email kamu sudah berhasil</p>
            <p>Selanjutnya kita akan mulai pengisian data registrasi</p>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <div class="card-panel card-info" style="background: rgba(133, 195, 204, 0.32);">
              <div class="card-logo teal-text text-lighten-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
              </div>
              <div class="teal-text text-lighten-1 mt-30">
                Supaya registrasi lancar, siapkan ini dulu ya <i class="bi bi-align-bottom"></i>
                <div class="pl-4">
                  <div>    
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                      </svg>
                      <span class="pl-2 mt-2">eKTP</span>
                  </div>
                  <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                      </svg>
                     <span class="pl-2 mt-2">NPWP (jika ada)</span>
                  </div>
                  <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                      </svg>
                     <span class="pl-2 mt-2">Informasi Rekening Tabungan</span>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
          <a class="waves-effect waves-light btn col s12 white-text" onclick="window.location.href = '<?php echo base_url('registration/segmentation'); ?> ';">LANJUT</a>

        </div>
      </div>
  </section>
  

  

</form>

</div>

