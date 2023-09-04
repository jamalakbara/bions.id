<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

	if($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-success">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
	}

//	echo form_open(base_url('admin/city/add'));
//	echo form_open('admin/city/add', 'class="form-horizontal"');
?>

        <div class="col-md-12">
          <!--
          <div class="box box-primary">
            <form  class="form-horizontal" role="form">
            </form>
          </div>
          -->

          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?=$title?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<?php
	echo form_open_multipart('admin/city/edit/'.$city->id, 'class="form-horizontal"');
?>
              <div class="box-body">

              <div class="box-body">
                                    <div class="form-group">
										<label for="input1" class="col-sm-2 control-label">Propinsi</label>
										<div class="col-sm-10">
		                                <select name="parentid" id="categories" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="">Select Propinsi</option>
<?php $i = 1; foreach($province as $row) {
		if($row->id == $city->provinceid) { $selected = "selected"; } else { $selected = ""; }
		echo '<option value="'.$row->id.'" '.$selected.'>'.$pre.'&nbsp;&nbsp;'.$row->province.'</option>';
?>
<?php $i++; } ?>
										</select>
										</div>
                                    </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Type</label>
                  <div class="col-sm-10">
				  	<select name="type" id="type" class="select2 form-control custom-select" style="width: 100%; height:36px;">
						<option value="Kabupaten" <?php if($city->type == 'Kabupaten') { echo 'selected'; }?>>Kabupaten</option>
						<option value="Kota" <?php if($city->type == 'Kota') { echo 'selected'; }?>>Kota</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Nama Kota</label>
                  <div class="col-sm-10">
                    <input type="text" name="city" value="<?=$city->city?>" class="form-control" id="input1" placeholder="Nama Kota">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Kode</label>
                  <div class="col-sm-10">
                    <input type="text" name="cityid" value="<?=$city->cityid?>" class="form-control" id="input1" placeholder="1">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Kode Pos</label>
                  <div class="col-sm-10">
                    <input type="text" name="postalcode" value="<?=$city->postalcode?>" class="form-control" id="input1" placeholder="10000">
                  </div>
                </div>
			
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/city'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>