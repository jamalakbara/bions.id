<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

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
	echo form_open_multipart('admin/city/add', 'class="form-horizontal"');
?>
              <div class="box-body">
                                    <div class="form-group">
										<label for="input1" class="col-sm-2 control-label">Propinsi</label>
										<div class="col-sm-10">
		                                <select name="parentid" id="categories" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="">Select Propinsi</option>
<?php $i = 1; foreach($province as $row) { 
		echo '<option value="'.$row->id.'">'.$row->province.'</option>';
?>
<?php $i++; } ?>
										</select>
										</div>
                                    </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Type</label>
                  <div class="col-sm-10">
				  	<select name="type" id="type" class="select2 form-control custom-select" style="width: 100%; height:36px;">
						<option value="Kabupaten">Kabupaten</option>
						<option value="Kota">Kota</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Nama Kota</label>
                  <div class="col-sm-10">
                    <input type="text" name="city" value="<?php echo set_value('city'); ?>" class="form-control" id="input1" placeholder="Nama Kota">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Kode</label>
                  <div class="col-sm-10">
                    <input type="text" name="cityid" value="<?php echo set_value('cityid'); ?>" class="form-control" id="input1" placeholder="1">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Kode Pos</label>
                  <div class="col-sm-10">
                    <input type="text" name="postalcode" value="<?php echo set_value('postalcode'); ?>" class="form-control" id="input1" placeholder="10000">
                  </div>
                </div>
                <!--<div class="form-group">
                  <label for="input2" class="col-sm-2 control-label">Text</label>
                  <div class="col-sm-10">
					<textarea id="editor2" name="text" rows="10" cols="40">                                            
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="image1">Image</label>
                  <div class="col-sm-10">
                  <input type="file" name="image1" id="image1">
                  <p class="help-block">saran ukuran image 1170 x 587 pixel.</p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Link Url</label>
                  <div class="col-sm-10">
                    <input type="text" name="url" value="<?php echo set_value('url'); ?>" class="form-control" id="input1" placeholder="http://link">
                  </div>
                </div>-->

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
