<div id="app">

<form class="col s12">
  <section class="page-area">
      <div>
        <h4 class="page-title">Pengenalan Wajah Sukses!</h4>
        
        <div class="row" >
          <div class="col s12" style="padding-left:1rem;padding-right:1rem;">
            <img id="biometricphoto" src="" alt="" class="img-fluid rounded center-block" style="border: 2px solid var(--color-primary);">
          </div>
        </div>

        <div class="row">
          <div class="col s12 text-center">
            <span class="teal-text lighten-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
              </svg>
            </span>
            <span style="margin-left: 10px;font-size: 1.5rem;">
              Berhasil diverifikasi
            </span>
          </div>
        </div>
        
      </div>
      <div class="row">
        <div class="col s12 ">
          <a class="waves-effect waves-light btn col s12 white-text btn-biometricsuccess">LANJUT</a>

        </div>
      </div>
  </section>

</form>

</div>

<script>
  var biometricphoto = <?php echo json_encode($_SESSION['data']['selfiebiometric'], true) ?>; 
</script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/12-biometricsuccess.js?v=<?= rand() ?>"></script>
