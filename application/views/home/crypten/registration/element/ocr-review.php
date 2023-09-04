<body onload="replaceChar('addressstreet', '[&\'\\\-{},]')">
<?php
  echo bnis_label_input(array(
    'id' => 'identitynum',
    'label' => 'NIK',
    'type' => 'number',
    'oninput' => "replaceChar('identitynum', '[&\'\\\-{},]'), maxLengthInput('identitynum', '16')"
    ));

   echo bnis_label_input(array(
    'id' => 'fullname',
    'label' => 'Nama'
    ));

   echo bnis_label_input(array(
    'id' => 'birthplace',
    'label' => 'Tempat Lahir',
    ));

   echo bnis_label_input(array(
    'id' => 'birthday',
    'label' => 'Tanggal Lahir',
    'class' => 'datepicker'
    ));
?>

<label class="label-field-grey">Jenis Kelamin</label>
<div class="component-group">
  <div class="row">
     <div class="input-field col s6">
        <?php
          echo bnis_form_radio(array(
            'id' => 'gender',
            'class'       => 'with-gap',
            'value'       => 'L',
            'label'       => 'Laki-Laki'
          ));
        ?>
    </div>
     <div class="input-field col s6">
      <?php
          echo bnis_form_radio(array(
            'id' => 'gender',
            'class'       => 'with-gap',
            'value'       => 'P',
            'label'       => 'Perempuan'
          ));
        ?>
    </div>
   
  </div>
</div>
<?php
   echo bnis_label_input(array(
    'id' => 'addressstreet',
    'label' => 'Alamat',
    'oninput' => "replaceChar('addressstreet', '[&\'\\\-{},]')"
    ));

   echo bnis_label_input(array(
    'id' => 'addresshousing',
    'label' => 'RT/RW',
    'oninput' => "replaceChar('addresshousing', '[&\'\\\-{},]')"
    ));

?>

<label class="label-field-grey">Provinsi</label>
<div class="row">
  <div class="col s12 input-right">
     <?php echo bnis_form_dropdown('addressprovince',  Lookups::provinces(), '', '', '- Provinsi -'); ?>
  </div>
</div>

<label class="label-field-grey">Kota/Kabupaten</label>
<div class="row">
  <div class="col s12 input-right">
     <?php echo bnis_form_dropdown('addresscity', array(), '', '', '- Kota/Kabupaten -'); ?>
  </div>
</div>

<label class="label-field-grey">Kecamatan</label>
<div class="row">
  <div class="col s12 input-right">
     <?php echo bnis_form_dropdown('addresssubdistrict', array(), '', '', '- Kecamatan -'); ?>
  </div>
</div>

<label class="label-field-grey">Kelurahan</label>
<div class="row">
  <div class="col s12 input-right">
     <?php echo bnis_form_dropdown('addressvillage', array(), '', '', '- Kelurahan -'); ?>
  </div>
</div>

<label class="label-field-grey">Agama</label>
<div class="row">
  <div class="col s12 input-right">
     <?php echo bnis_form_dropdown('religion',  Lookups::religions(), '', '', '- Agama -'); ?>
  </div>
</div>

<label class="label-field-grey">Status Perkawinan</label>
<div class="row">
  <div class="col s12 input-right">
     <?php echo bnis_form_dropdown('maritalstatus',  Lookups::maritalStatuses(), '', '', '- Status Perkawinan -'); ?>
  </div>
</div>

<label class="label-field-grey">Pekerjaan</label>
<div class="row">
  <div class="col s12 input-right">
     <?php echo bnis_form_dropdown('occupationaltype',  Lookups::employmentTypes(), '', '', '- Pekerjaan -'); ?>
  </div>
</div>

<div v-bind:style="vform.occupationaltype === 'OTHERS' ?'display: block' : 'display: none'">
<div class="row">
    <div class="input-field input-right col s12">
        <?php echo bnis_form_input(array('id' => 'occupationaltypeother')); ?>
    </div>
  </div>
</div>

<?php
   echo bnis_label_input(array(
    'id' => 'identityissuedplace',
    'label' => 'Tempat Terbit KTP'
    ));

   echo bnis_label_input(array(
    'id' => 'identityissueddate',
    'label' => 'Tanggal Terbit KTP',
    'class' => 'datepicker'
    ));
?>

<div class="row">
  <div class="input-field input-right col s6">
    <?php
       echo bnis_form_input(array(
        'id' => 'identityexpireddate',
        'label' => 'Berlaku Sampai',
        'class' => 'datepicker'
        ));
    ?>
    <label for="identityexpireddate">Berlaku Sampai</label>
  </div>
  <div class="input-field col s6">
    <?php
      echo bnis_form_checkbox(array(
        'id'    => 'identityexpireddate_lifetime',
        'label' => 'Seumur Hidup',
        'class' => "filled-in"
        ));
    ?>
  </div>
</div>



<div class="bg-user-input">
  <label class="label-field-grey">Kode Pos</label>
  <div class="row">
    <div class="col s12 input-right">
       <?php echo bnis_form_dropdown('addresspostalcode', array(), '', '', '- Kode Pos -'); ?>
    </div>
  </div>

<label class="label-field-grey">Pendidikan Terakhir</label>
<div class="row">
  <div class="col s12 input-right">
     <?php echo bnis_form_dropdown('educationalbg',  Lookups::education(), '', '', '- Pendidikan Terakhir -'); ?>
  </div>
</div>
<?php
   echo bnis_label_input(array(
    'id' => 'mothername',
    'label' => 'Nama Ibu Kandung'
    ));
?>
<div v-bind:style="vform.maritalstatus === 'M' ?'display: block' : 'display: none'">
  <?php
    echo bnis_label_input(array(
    'id' => 'spousename',
    'label' => 'Nama Pasangan'
    ));
  ?>
</div>
</div>
</body>
