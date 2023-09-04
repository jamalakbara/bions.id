<?php
  if(!$_SESSION['data']){
    redirect(base_url('registration/pra'));
  }
?>

<style>
  .fatca-info{
    padding-left: 35px;
  }

  .fatca-info .row{
    margin-bottom: 5px;
  }
</style>

<div id="app">

<form class="col s12" id="reg-form">
  <section class="page-area">
   <div class="">
      
      <h4 class="page-title">Pernyataan Tambahan</h4>
      <p>Tandai jika pernyataan dibawah ini benar</p>
      <!-- 1 -->
      <div class="component-group">
        <div v-bind:class="(vform.otherinfoemployeeof) ? 'row' : 'row mb-0'">
           <div class="input-field col s12 text-justify">
              <?php
                echo bnis_form_checkbox(array(
                  'id'    => 'otherinfoemployeeof',
                  'label' => 'Saya atau keluarga saya tidak bekerja di BNI Sekuritas, IDX, OJK, Perusahaan Efek lainnya',
                  'class' => "filled-in"
                  ));
              ?>
          </div>
        </div>

        <div class="fatca-info" v-bind:style="(vform.otherinfoemployeeof) ? 'display: none' : 'display: block'">
          <?php
           echo bnis_label_input(array(
            'id' => 'otherinfoemployeeofname',
            'label' => 'Nama'
            ));

           echo bnis_label_input(array(
            'id' => 'otherinfoemployeeofcompany',
            'label' => 'Nama Perusahaan'
            ));
          ?>
        </div>
      </div>

       <!-- 2 -->
      <div class="component-group">
        <div v-bind:class="(vform.otherinfoprohibited) ? 'row' : 'row mb-0'">
           <div class="input-field col s12 text-justify">
              <?php
                echo bnis_form_checkbox(array(
                  'id' => 'otherinfoprohibited',
                  'class'       => 'with-gap',
                  'label'       => 'Saya atau keluarga tidak mempunyai pengendalian pada suatu perusahaan public atau kepemilikan terhadap saham yang dilarang',
                  'class' => "filled-in"
                ));
              ?>
          </div>
        </div>

        <div class="fatca-info" v-bind:style="(vform.otherinfoprohibited) ? 'display: none' : 'display: block'">
          <?php
           echo bnis_label_input(array(
            'id' => 'otherinfoprohibitedname',
            'label' => 'Nama'
            ));

           echo bnis_label_input(array(
            'id' => 'otherinfoprohibitedcompany',
            'label' => 'Nama Perusahaan'
            ));
          ?>
        </div>
      </div>

      <!-- 3 -->
      <div class="component-group">
        <div class="row">
           <div class="input-field col s12 text-justify">
              <?php
                echo bnis_form_checkbox(array(
                  'id' => 'otherinfopoliticperson',
                  'class'       => 'with-gap',
                  'label'       => 'Saya atau keluarga tidak menduduki posisi sebagai pejabat atau sedang dicalonkan untuk suatu posisi public/ Politically Exposed Person (PEP)',
                  'class' => "filled-in"
                ));
              ?>
          </div>
        </div>
      </div>

      <!-- 4 -->
      <div class="component-group">
        <div class="row">
           <div class="input-field col s12 text-justify">
              <?php
                echo bnis_form_checkbox(array(
                  'id' => 'otherinfohavegreencard',
                  'class'       => 'with-gap',
                  'label'       => 'Saya tidak memiliki izin tinggal tetap (Green Card) di Amerika Serikat',
                  'class' => "filled-in"
                ));
              ?>
          </div>
        </div>
      </div>

      <!-- 5 -->
      <div class="component-group" v-bind:style="(vform.otherinfohavegreencard) ? 'display: block' : 'display: none'">
        <div class="row">
           <div class="input-field col s12 text-justify">
              <?php
                echo bnis_form_checkbox(array(
                  'id' => 'fatcaaddress',
                  'class'       => 'with-gap',
                  'label'       => 'Saya tidak memiliki alamat dan/atau alamat korespondensi dan/atau PO BOX di Amerika Serikat',
                  'class' => "filled-in"
                ));
              ?>
          </div>
        </div>
      </div>

       <!-- 6 -->
      <div class="component-group">
        <div class="row">
           <div class="input-field col s12 text-justify">
              <?php
                echo bnis_form_checkbox(array(
                  'id' => 'otherinfotaxoutsideindonesia',
                  'class'       => 'with-gap',
                  'label'       => 'Saya tidak memiliki Domisili Pajak di Luar Indonesia',
                  'class' => "filled-in"
                ));
              ?>
          </div>
        </div>
      </div>

      <!-- 7 -->
      <div class="component-group">
        <div class="row">
           <div class="input-field col s12 text-justify">
              <?php
                echo bnis_form_checkbox(array(
                  'id' => 'assetownership',
                  'class'       => 'with-gap',
                  'label'       => 'Saya tidak bertindak sebagai pihak lain (Beneficial Owner)',
                  'class' => "filled-in"
                ));
              ?>
          </div>
        </div>
      </div>           

      <div class="row">
        <div class="col s12">
          <a class="waves-effect waves-light btn col s12 white-text btn-fatca">LANJUT</a>

        </div>
      </div>
    </div>
  </section>


</form>

</div>


<script>
  var savedata = <?php echo json_encode($_SESSION['data'], true) ?>; 
</script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/09-fatca.js?v=<?= rand() ?>"></script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/09-fatca-validation.js?v=<?= rand() ?>"></script>