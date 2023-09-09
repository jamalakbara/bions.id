<?php
  if(!$_SESSION['data']){
    redirect(base_url('registration/pra'));
  }
?>

<style>
  .modal{
    height: inherit !important;
  }
</style>

<div id="app">

<form class="col s12" id="reg-form">
  <section class="page-area">
   <div class="">
      
        <h4 class="page-title">Periksa Kembali Data Kamu </h4>

        <div class="row" >
        
        
        <div class="col s12" style="padding-left:1rem;padding-right:1rem">
          <img v-bind:src="vform.idcardphoto" alt="" class="img-fluid rounded center-block">
        </div>
      </div>
        
      <?php include 'element/ocr-review.php';?>

        <div class="row">
          <div class="col s12">
            <a class="waves-effect waves-light btn col s12 white-text btn-nextocrreview">DATA SAYA SUDAH BENAR</a>

          </div>
        </div>
    </div>
  </section>


</form>

</div>


<script>
  var savedata = <?php echo json_encode($_SESSION['data'], true) ?>; 
</script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/05-ocr-review.js?v=<?= rand() ?>"></script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/05-ocr-review-validation.js?v=<?= rand() ?>"></script>