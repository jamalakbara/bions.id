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
      
      <h4 class="page-title">Data Tambahan </h4>

      <?php include 'element/add-data.php';?>

      <div class="row">
        <div class="col s12">
          <a class="waves-effect waves-light btn col s12 white-text btn-nextadddata">LANJUT</a>

        </div>
      </div>
    </div>
  </section>


</form>

</div>


<script>
  var savedata = <?php echo json_encode($_SESSION['data'], true) ?>; 
</script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/06-add-data.js?v=<?= rand() ?>"></script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/06-add-data-validation.js?v=<?= rand() ?>"></script>