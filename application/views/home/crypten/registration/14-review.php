<?php
  if(!$_SESSION['data']){
    redirect(base_url('registration/pra'));
  }
?>

<div id="app">

<form class="col s12" id="reg-form">
  <section class="page-area">
   <div class="">
      
      <h4 class="page-title">Konfirmasi Semua Data Kamu</h4>
      
      <!-- segmentation -->
      <p>Pilih jenis rekening investasimu</p>
      <div class="component-group">
        <div class="row">
           <div class="input-field col s6">
              <?php
                echo bnis_form_radio(array(
                  'id' => 'acctype',
                  'class'       => 'with-gap',
                  'value'       => '01',
                  'label'       => 'Regular'
                ));
              ?>
          </div>
           <div class="input-field col s6">
            <?php
                echo bnis_form_radio(array(
                  'id' => 'acctype',
                  'class'       => 'with-gap',
                  'value'       => '70',
                  'label'       => 'Syariah'
                ));
              ?>
          </div>
         
        </div>
      </div>

      <p>Pilih layanan yang cocok untuk kamu</p>
      <div class="component-group">
        <div class="row">
           <div class="input-field col s6">
              <?php
                echo bnis_form_radio(array(
                  'id' => 'onlinetype',
                  'class'       => 'with-gap',
                  'value'       => 'F',
                  'label'       => 'Online Trading'
                ));
              ?>
          </div>
           <div class="input-field col s6">
            <?php
                echo bnis_form_radio(array(
                  'id' => 'onlinetype',
                  'class'       => 'with-gap',
                  'value'       => 'H',
                  'label'       => 'Full Service'
                ));
              ?>
          </div>
         
        </div>
      </div>

      <div class="component-group" v-bind:style="vform.onlinetype == 'H' ?'display: block' : 'display: none'">
        <p>Cabang</p>
        <div class="row">
          <div class="col s12">
             <?php echo bnis_form_dropdown('branch', Lookups::branch(), '', '', '- Pilih cabang kami -'); ?>
          </div>
        </div>
      </div>
      <!-- end segmentation -->
      <br/><br/>
      
      <!-- ocr-review -->
      <?php include 'element/ocr-review.php';?>

      <br/><br/>

      <!-- add-data -->
      <?php include 'element/add-data.php';?>      
      
      <br/><br/>
        
      <!-- income -->
      <?php include 'element/income.php';?>

      <div class="row">
        <div class="col s12">
          <a class="waves-effect waves-light btn col s12 white-text btn-review">DATA SAYA SUDAH BENAR</a>

        </div>
      </div>
    </div>
  </section>


</form>

</div>


<script>
  var savedata = <?php echo json_encode($_SESSION['data'], true) ?>; 
</script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/14-review.js?v=<?= rand() ?>"></script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/14-review-validation.js?v=<?= rand() ?>"></script>