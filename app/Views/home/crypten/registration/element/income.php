<div v-bind:style="(vform.occupationaltype == 'HOUSE WIFE' || vform.occupationaltype == 'STUDENT' || vform.occupationaltype == 'RETIREMENT') ? 'display: none' : 'display: block'">
    <?php
        echo bnis_label_input(array(
        'id' => 'taxidnum',
        'label' => 'NPWP',
        'type' => 'number',
        'oninput' => "replaceChar('taxidnum', '[&\'\\\-{},]'), maxLengthInput('taxidnum', '15')",
        'maxlength'=> "15"
        ));
    ?>
  </div>

  <label class="label-field-grey">Sumber Penghasilan</label>
  <div v-bind:class="(vform.occupationalsourceofincome == '12') ? 'row mb-0' : 'row'">
    <div class="col s12 input-right">
       <?php echo bnis_form_dropdown('occupationalsourceofincome', Lookups::sourceOfIncome(), '', '', '- Sumber Penghasilan -'); ?>
    </div>
  </div>

  <div v-bind:style="(vform.occupationalsourceofincome == '12') ? 'display: block' : 'display: none'">
  <?php
     echo bnis_label_input(array(
      'id' => 'occupationalsourceofincomeother',
      'label' => '',
      'oninput' => "replaceChar('occupationalsourceofincomeother', '[^a-zA-Z ]')"
      ));
  ?>
</div>

  <label class="label-field-grey">Penghasilan Per Bulan</label>
  <div class="row">
    <div class="col s12 input-right">
       <?php echo bnis_form_dropdown('occupationalmonthlyincome', Lookups::monthlyIncome(), '', '', '- Penghasilan Per Bulan -'); ?>
    </div>
  </div>

  <label class="label-field-grey">Penghasilan Per Tahun</label>
  <div class="row">
    <div class="col s12 input-right">
       <?php echo bnis_form_dropdown('occupationalannualincome', Lookups::annualIncome(), '', '', '- Penghasilan Per Tahun -'); ?>
    </div>
  </div>
    
  <div class="bg-user-input">
    

    <label class="label-field-grey">Nama Bank</label>
    <div class="row">
      <div class="col s12 input-right">
         <?php echo bnis_form_dropdown('bankname', Lookups::bankNames(), '', '', '- Nama Bank -'); ?>
      </div>
    </div>

    <?php
     echo bnis_label_input(array(
      'id' => 'bankbeneficiaryaccount',
      'label' => 'Nomor Rekening Bank',
      'type' => 'number'
      ));

     echo bnis_label_input(array(
      'id' => 'bankbeneficiaryname',
      'label' => 'Nama Pemilik'
      ));
    ?>
  </div>
