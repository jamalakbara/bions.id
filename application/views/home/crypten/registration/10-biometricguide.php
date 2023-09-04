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

.dot-arrow{
  float:left; 
  width: 16px;
}

.info-detail{
  padding-left: 25px;
  margin-top: 5px;
}
</style>
<div id="app">

<form class="col s12">
  <section class="page-area">
   <div class="">
        <h4 class="page-title"><?php echo $title ?></h4>
        
        <div class="row">
          <div class="col s12">
            <div class="card-panel card-info" style="background: rgba(133, 195, 204, 0.32);">
              <div class="card-logo teal-text text-lighten-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                </svg>
              </div>
              <div class="teal-text text-lighten-1 mt-30">
                Sebelum mulai, ikuti petunjuk berikut ya :
                <div>
                  <div>
                    <div class="dot-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                        </svg>
                    </div>
                    <div class="info-detail">
                      <span>Lepaskan aksesoris yang menutupi wajah (kacamata, masker, topi, dll)</span>
                    </div>
                  </div>
                  <div>
                    <div class="dot-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                        </svg>
                    </div>
                    <div class="info-detail">
                      <span>Rapikan rambut supaya tidak menutupi wajah</span>
                    </div>
                  </div>
                  <div>
                    <div class="dot-arrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                        </svg>
                    </div>
                    <div class="info-detail">
                      <span>Pastikan kamu mengambil foto dalam posisi portrait lurus kedepan</span>
                    </div>
                  </div>

                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12">
          <a class="waves-effect waves-light btn col s12 white-text btn-biometric"><?php echo $buttontext ?></a>

        </div>
      </div>
  </section>
  

  

</form>

</div>


<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/10-biometricguide.js?v=<?= rand() ?>"></script>