<div id="app">

<form class="col s12" id="reg-pra">
  <section class="page-area">
   <div class="">
      
        <h4 class="page-title">Let's get started...</h4>
        
        <?php
          echo bnis_wide_input(array(
            'id' => 'referral',
            'label' => 'Please Enter referral code (if any)'
            ));

           echo bnis_wide_input(array(
            'id' => 'fullname',
            'label' => 'Full Name'
            ));

           echo bnis_wide_input(array(
            'id' => 'email',
            'label' => 'Email Address',
            'uppercase' => false,
            'lowercase' => true
            ));

           echo bnis_wide_input(array(
            'id' => 'handphone',
            'label' => 'Cell Phone Number',
            'type' => 'number'
            ));
        ?>


        <p>Nationality</p>
        <div class="component-group">
          <div class="row" v-bind:class="vform.investortype == 'I' ?'' : 'mb-0'">
             <div class="input-field col s6">
                <?php
                  echo bnis_form_radio(array(
                    'id' => 'investortype',
                    'class'       => 'with-gap',
                    'value'       => 'I',
                    'label'       => 'Indonesia'
                  ));
                ?>
            </div>
             <div class="input-field col s6">
              <?php
                  echo bnis_form_radio(array(
                    'id' => 'investortype',
                    'class'       => 'with-gap',
                    'value'       => 'A',
                    'label'       => 'Foreign Citizen'
                  ));
                ?>
            </div>
           
          </div>
        </div>

        <div class="row" v-bind:style="vform.investortype == 'I' ?'display: none' : 'display: block'">
          <div class="col s12">
             <?php echo bnis_form_dropdown('nationality', Lookups::nationalities(), '', '', '- Nama Negara (Country) -'); ?>
          </div>
        </div>

        <p>How did you hear about BIONS?</i></p>
        <div class="component-group">
          <div class="row mb-0" >
             <div class="input-field col s12">
              <?php
                echo bnis_form_radio(array(
                  'id'    => 'reference',
                  'class' => 'with-gap',
                  'value' => 'digiads',
                  'label' => 'Digital Ads'
                  ));
              ?>
            </div>
          </div>
          <div class="row mb-0" >
            <div class="input-field col s12">
               <?php
                echo bnis_form_radio(array(
                  'id'    => 'reference',
                  'class' => 'with-gap',
                  'value' => 'sosmed',
                  'label' => 'Social Media'
                  ));
              ?>
              
            </div>
          </div>

          <div class="row mb-0" >
            <div class="input-field col s12">
              <?php
              echo bnis_form_radio(array(
                'id'    => 'reference',
                'class' => 'with-gap',
                'value' => 'bniemployee',
                'label' => 'Bank BNI Employee'
                ));
              ?>
              
            </div>
          </div>

          <div class="row mb-0" >
            <div class="input-field col s12">
              <?php
                echo bnis_form_radio(array(
                  'id'    => 'reference',
                  'class' => 'with-gap',
                  'value' => 'friendfamily',
                  'label' => 'Friends/Family'
                  ));
              ?>
              
            </div>
          </div>

          <div class="row" >
             <div class="input-field col s12">
              <?php
                echo bnis_form_radio(array(
                  'id'    => 'reference',
                  'class' => 'with-gap',
                  'value' => 'other',
                  'label' => 'Others'
                  ));
              ?>
            </div>
          </div>
        </div>

        <p>What is your investment choice?</p>
        <div class="component-group">
          <div class="row mb-0" >
             <div class="input-field col s12">
              <?php
                echo bnis_form_checkbox(array(
                  'id'    => 'producttype',
                  'value' => 'E',
                  'label' => 'Stock',
                  'class' => "filled-in"
                  ));
              ?>
            </div>
          </div>
          <div class="row mb-0" >
             <div class="input-field col s12">
              <?php
                echo bnis_form_checkbox(array(
                  'id'    => 'producttype',
                  'value' => 'M',
                  'label' => 'Mutual Fund',
                  'class' => "filled-in"
                  ));
              ?>
            </div>
          </div>
           
          <div class="row mb-0" >
             <div class="input-field col s6">
              <?php
                echo bnis_form_checkbox(array(
                  'id'    => 'producttype',
                  'value' => 'A',
                  'label' => 'EBA',
                  'class' => "filled-in"
                  ));
              ?>
            </div>
          </div>
          <div class="row" >
             <div class="input-field col s6">
              <?php
                echo bnis_form_checkbox(array(
                  'id'    => 'producttype',
                  'value' => 'O',
                  'label' => 'Bond',
                  'class' => "filled-in"
                  ));
              ?>
            </div>
          </div>
        </div>

        <p class="text-justify">Do you already have a BNI Saving Account and will it be used for withdrawing funds?</p>
        <div class="component-group">
          <div class="row" >
             <div class="input-field col s6">
                <?php
                  echo bnis_form_radio(array(
                    'id' => 'havebniacc',
                    'class'       => 'with-gap',
                    'value'       => '1',
                    'label'       => 'Ya <i>(Yes)</i>'
                  ));
                ?>
            </div>
             <div class="input-field col s6">
              <?php
                  echo bnis_form_radio(array(
                    'id' => 'havebniacc',
                    'class'       => 'with-gap',
                    'value'       => '0',
                    'label'       => 'Tidak <i>(No)</i>'
                  ));
                ?>
            </div>
           
          </div>
        </div>

        <div class="row">
          <div class="col s12">
            <a class="waves-effect waves-light btn col s12 white-text btn-nextstep1">NEXT</a>

          </div>
        </div>
    </div>
  </section>


</form>

</div>


<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/01-pra.js?v=<?= rand() ?>"></script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/01-pra-validation.js?v=<?= rand() ?>"></script>