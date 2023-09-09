<?php
  if(!$_SESSION['data']){
    redirect(base_url('registration/pra'));
  }
?>

<style>
  .container-agreement{
    height: calc(80vh - 200px);
    overflow: auto;
    padding: 30px;
    background-color: var(--color-tertiary-32);
    text-align: justify;
  }
</style>
<div id="app">

<form class="col s12" id="reg-form">
  <section class="page-area">
   <div class="">
      
      <h4 class="page-title">Persetujuan Syarat & Ketentuan</h4>
      
      <div class="row">
        <div class="col s12">
            <div class="container-agreement">
              <?php include 'element/perjanjian.php';?>
          </div>
        </div>  
      </div>

      <!-- aggree -->
      <div class="component-group">
        <div class="row">
           <div class="input-field col s12 text-justify">
              <?php
                echo bnis_form_checkbox(array(
                  'id' => 'agreed',
                  'class'       => 'with-gap',
                  'label'       => 'Saya menyatakan bahwa Saya telah membaca, memahami, menerima dan menyetujui Perjanjian Pembukaan Rekening Efek serta Syarat dan Ketentuan tanpa terkecuali. <br/><br/>Persetujuan ini memiliki kekuatan hukum yang sama seperti Saya menandatangani Perjanjian Pembukaan Rekening Efek serta Syarat dan Ketentuan tersebut secara langsung.',
                  'class' => "filled-in",
                  'value' => true
                ));
              ?>
          </div>
        </div>
      </div> 

      <div class="row">
        <div class="col s12">
          <a class="waves-effect waves-light btn col s12 white-text btn-syaratketentuan">LANJUT</a>

        </div>
      </div>
    </div>
  </section>


</form>

</div>


<script>
  var savedata = <?php echo json_encode($_SESSION['data'], true) ?>; 
</script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/09-syaratketentuan.js?v=<?= rand() ?>"></script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/09-syaratketentuan-validation.js?v=<?= rand() ?>"></script>