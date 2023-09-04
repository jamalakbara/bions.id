<div class="row mb-0" >
   <div class="input-field col s12">
    <?php
      echo bnis_form_checkbox(array(
        'id'    => 'addresspsame',
        'label' => 'alamat domisili sesuai dengan eKTP',
        'class' => "filled-in"
        ));
    ?>
  </div>
</div>
<div class="bg-user-input" v-bind:style="vform.addresspsame ?'display: none' : 'display: block'">
  <?php
    echo bnis_label_input(array(
      'id' => 'addresspstreet',
      'label' => 'Alamat',
      'oninput' => "replaceChar('addresspstreet', '[&\'\\\-{},]')"
      ));

     echo bnis_label_input(array(
      'id' => 'addressphousing',
      'label' => 'RT/RW',
      'oninput' => "replaceChar('addressphousing', '[&\'\\\-{},]')"
      ));
    ?>
        <label class="label-field-grey">Negara</label>
    <div class="row">
      <div class="col s12 input-right">
         <?php echo bnis_form_dropdown('addresspcountry', Lookups::countries(), '', '', '- Negara -'); ?>
      </div>
    </div>

    <label class="label-field-grey">Provinsi</label>
    <div class="row">
      <div class="col s12 input-right">
         <?php echo bnis_form_dropdown('addresspprovince',  Lookups::provinces(), '', '', '- Provinsi -'); ?>
      </div>
    </div>

    <label class="label-field-grey">Kota/Kabupaten</label>
    <div class="row">
      <div class="col s12 input-right">
         <?php echo bnis_form_dropdown('addresspcity', array(), '', '', '- Kota/Kabupaten -'); ?>
      </div>
    </div>

    <label class="label-field-grey">Kecamatan</label>
    <div class="row">
      <div class="col s12 input-right">
         <?php echo bnis_form_dropdown('addresspsubdistrict', array(), '', '', '- Kecamatan -'); ?>
      </div>
    </div>

    <label class="label-field-grey">Kelurahan</label>
    <div class="row">
      <div class="col s12 input-right">
         <?php echo bnis_form_dropdown('addresspvillage', array(), '', '', '- Kelurahan -'); ?>
      </div>
    </div>
    
    <label class="label-field-grey">Kode Pos</label>
    <div class="row">
      <div class="col s12 input-right">
         <?php echo bnis_form_dropdown('addressppostalcode', array(), '', '', '- Kode Pos -'); ?>
      </div>
    </div>
   
</div>

<label class="label-field-grey">No Telp Rumah</label>
<div class="component-group">
  <div class="row mb-0">
    <div class="col s6">
       <?php echo bnis_form_dropdown('addressphonecountry', Lookups::phoneCountries(), '', '', '- Kode Negara -'); ?>
    </div>
    <div class="col s6">
      <?php echo bnis_form_dropdown('addressphonearea', array(), '', '', '- Kode Area -'); ?>
    </div>
  </div>
  <div class="row">
    <div class="input-field input-right col s12">
        <?php echo bnis_form_input(array('id' => 'phone', 'type' => 'number')); ?>
    </div>
  </div>
</div>
  
  <div v-bind:style="(vform.occupationaltype == 'HOUSE WIFE' || vform.occupationaltype == 'STUDENT' || vform.occupationaltype == 'RETIREMENT') ? 'display: none' : 'display: block'">
    <?php
    echo bnis_label_input(array(
      'id' => 'occupationalworkingplace',
      'label' => 'Nama Tempat Bekerja',
      'oninput' => "replaceChar('occupationalworkingplace', '[&\'\\\-{},]')"
      ));
      ?>
  </div>

  <div v-bind:style="(vform.occupationaltype == 'CIVIL SERVANT' || vform.occupationaltype == 'TNI-POLICE') ? 'display: block' : 'display: none'">
    <?php
      echo bnis_label_input(array(
      'id' => 'occupationaljobposition',
      'label' => 'Jabatan',
      ));
    ?>
  </div>

  <div v-bind:style="(vform.occupationaltype == 'SELF EMPLOYED') ? 'display: block' : 'display: none'">
    <?php
     echo bnis_label_input(array(
      'id' => 'occupationallinebusiness',
      'label' => 'Bidang Usaha'
      ));
    ?>
  </div>
  

    <div v-bind:style="(vform.occupationaltype == 'HOUSE WIFE' || vform.occupationaltype == 'STUDENT' || vform.occupationaltype == 'RETIREMENT') ? 'display: none' : 'display: block'">
      
      <label class="label-field-grey">Domisili Tempat Bekerja</label>
      <div class="row">
        <div class="col s12 input-right">
           <?php echo bnis_form_dropdown('occupationalcountry', Lookups::countries(), '', '', '- Domisili Tempat Bekerja -'); ?>
        </div>
      </div>

      <?php
        echo bnis_label_input(array(
        'id' => 'occupationalstreet',
        'label' => 'Alamat Tempat Bekerja',
        'oninput' => "replaceChar('occupationalstreet', '[&\'\\\-{},]')"
        ));

      ?>

      <label class="label-field-grey">Kode Pos Tempat Bekerja</label>
      <div class="row">
        <div class="col s12 input-right">
           <?php echo bnis_form_dropdown('occupationalpostalcode', array(), '', '', '- Kode Pos Tempat Bekerja -'); ?>
        </div>
      </div>

      <!--label class="label-field-grey">Kelurahan Tempat Bekerja</label>
      <div class="row input-right">
      <?php
        echo bnis_form_input(array(
        'id' => 'occupationalvillage',
        'class' => 'input-right',
        'disabled' => true
        ));
      ?>
      </div>

      <label class="label-field-grey">Kecamatan Tempat Bekerja</label>
      <div class="row input-right">
      <?
       echo bnis_form_input(array(
        'id' => 'occupationalsubdistrict',
        'disabled' => true
        ));
      ?>
    </div>

      <label class="label-field-grey">Kota/Kabupaten Tempat Bekerja</label>
      <div class="row">
        <div class="col s12 input-right">
           <?php echo bnis_form_dropdown('occupationalcity', array(), '', 'disabled=true', '- Kota/Kabupaten Tempat Bekerja -'); ?>
        </div>
      </div>

      <label class="label-field-grey">Provinsi Tempat Bekerja</label>
      <div class="row">
        <div class="col s12 input-right">
           <?php echo bnis_form_dropdown('occupationalprovince',  Lookups::provinces(), '', 'disabled=true', '- Provinsi Tempat Bekerja -'); ?>
        </div>
      </div-->

    </div>

    <label class="label-field-grey">Alamat Korespondensi</label>
    <div class="row">
      <div class="col s12 input-right">
         <?php echo bnis_form_dropdown('correspondencetype', Lookups::correspondenceTypes(), '', '', '- Alamat Korespondensi -'); ?>
      </div>
    </div>
