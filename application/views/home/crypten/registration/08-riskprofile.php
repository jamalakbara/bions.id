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
      
      <h4 class="page-title">Profil Resiko</h4>

      <!-- 1 -->
      <p>Lama Rencana jangka waktu Investasi</p>
      <div class="component-group">
        <div class="row mb-0">
           <div class="input-field col s6">
              <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofilelonginvest',
                  'class'       => 'with-gap',
                  'value'       => '5',
                  'label'       => '< 1 tahun'
                ));
              ?>
          </div>
           <div class="input-field col s6">
            <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofilelonginvest',
                  'class'       => 'with-gap',
                  'value'       => '10',
                  'label'       => '1 - 3 tahun'
                ));
              ?>
          </div>
         
        </div>
        <div class="row">
           <div class="input-field col s6">
              <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofilelonginvest',
                  'class'       => 'with-gap',
                  'value'       => '15',
                  'label'       => '3 - 5 tahun'
                ));
              ?>
          </div>
           <div class="input-field col s6">
            <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofilelonginvest',
                  'class'       => 'with-gap',
                  'value'       => '20',
                  'label'       => '> 5 tahun'
                ));
              ?>
          </div>
         
        </div>
      </div>


      <!-- 2 -->
      <p>Tujuan Investasi</p>
      <div class="component-group">
        <div class="row mb-0">
           <div class="input-field col s12">
              <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofilepurpose',
                  'class'       => 'with-gap',
                  'value'       => '5',
                  'label'       => 'Keamanan Dana Investasi'
                ));
              ?>
          </div>
        </div>
        <div class="row mb-0">
          <div class="input-field col s12">
            <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofilepurpose',
                  'class'       => 'with-gap',
                  'value'       => '10',
                  'label'       => 'Pendapatan & Keamanan Dana Investasi'
                ));
              ?>
          </div>
        </div>
        <div class="row mb-0">
          <div class="input-field col s12">
            <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofilepurpose',
                  'class'       => 'with-gap',
                  'value'       => '15',
                  'label'       => 'Pendapatan & Pertumbuhan Jangka Panjang'
                ));
              ?>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofilepurpose',
                  'class'       => 'with-gap',
                  'value'       => '20',
                  'label'       => 'Pertumbuhan'
                ));
              ?>
          </div>
        </div>
       
      </div>
      
      <!-- 3 -->
      <p>Tingkat Resiko yang dapat Ditoleransi</p>
      <div class="component-group">
        <div class="row mb-0">
           <div class="input-field col s6">
              <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofileloss',
                  'class'       => 'with-gap',
                  'value'       => '5',
                  'label'       => '0%'
                ));
              ?>
          </div>
           <div class="input-field col s6">
            <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofileloss',
                  'class'       => 'with-gap',
                  'value'       => '10',
                  'label'       => '< 25%'
                ));
              ?>
          </div>
         
        </div>
        <div class="row">
           <div class="input-field col s6">
              <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofileloss',
                  'class'       => 'with-gap',
                  'value'       => '15',
                  'label'       => '26-50%'
                ));
              ?>
          </div>
           <div class="input-field col s6">
            <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofileloss',
                  'class'       => 'with-gap',
                  'value'       => '20',
                  'label'       => '> 50%'
                ));
              ?>
          </div>
         
        </div>
      </div>

      <!-- 4 -->
      <p>Persentase Pendapatan untuk Investasi</p>
      <div class="component-group">
        <div class="row mb-0">
           <div class="input-field col s6">
              <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofileagreeincome',
                  'class'       => 'with-gap',
                  'value'       => '5',
                  'label'       => '< 10%'
                ));
              ?>
          </div>
           <div class="input-field col s6">
            <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofileagreeincome',
                  'class'       => 'with-gap',
                  'value'       => '10',
                  'label'       => '10 - 25%'
                ));
              ?>
          </div>
         
        </div>
        <div class="row">
           <div class="input-field col s6">
              <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofileagreeincome',
                  'class'       => 'with-gap',
                  'value'       => '15',
                  'label'       => '26-50%'
                ));
              ?>
          </div>
           <div class="input-field col s6">
            <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofileagreeincome',
                  'class'       => 'with-gap',
                  'value'       => '20',
                  'label'       => '> 50%'
                ));
              ?>
          </div>
         
        </div>
      </div>

      <!-- 5 -->
      <p>Tingkat Pengetahuan Investasi</p>
      <div class="component-group">
        <div class="row mb-0">
           <div class="input-field col s12">
              <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofileknowledge',
                  'class'       => 'with-gap',
                  'value'       => '5',
                  'label'       => 'Rendah'
                ));
              ?>
          </div>
        </div>
        <div class="row mb-0">
          <div class="input-field col s12">
            <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofileknowledge',
                  'class'       => 'with-gap',
                  'value'       => '15',
                  'label'       => 'Menengah'
                ));
              ?>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <?php
                echo bnis_form_radio(array(
                  'id' => 'riskprofileknowledge',
                  'class'       => 'with-gap',
                  'value'       => '20',
                  'label'       => 'Tinggi'
                ));
              ?>
          </div>
        </div>
      </div>

       <div class="row">
        <div class="col s12">
          <div class="card-panel text-justify" style="border: 2px solid var(--color-primary); background-color: var(--color-background);">
            <div v-if="vform.riskprofiletotalscore <= 35">
                <h6>Konservatif</h6><hr/>
                <p>Anda lebih memprioritaskan perlindungan pokok investasi, akus kas yang likuid dengan fluktuasi nilai investasi yang rendah</p>
            </div>

            <div v-if="vform.riskprofiletotalscore > 35 && vform.riskprofiletotalscore <= 55">
                <h6>Moderat</h6><hr/>
                <p>Prioritas Anda dalam investasi lebih kepada pertumbuhan nilai investasi yang relatif tinggi dan bersedia menerima risiko fluktuasi nilai investasi</p>
            </div>

            <div v-if="vform.riskprofiletotalscore > 55">
                <h6>Agresif</h6><hr/>
                <p>Tujuan investasi Anda memperoleh pertumbuhan yang sangat tinggi dalam jangka panjang dan siap menerima fluktuasi yang tinggi atas nilai investasi anda</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col s12">
          <a class="waves-effect waves-light btn col s12 white-text btn-nextriskprofile">LANJUT</a>

        </div>
      </div>
    </div>
  </section>


</form>

</div>


<script>
  var savedata = <?php echo json_encode($_SESSION['data'], true) ?>; 
</script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/08-riskprofile.js?v=<?= rand() ?>"></script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/08-riskprofile-validation.js?v=<?= rand() ?>"></script>