<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

//	echo form_open(base_url('admin/country/add'));
//	echo form_open('admin/country/add', 'class="form-horizontal"');
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
	echo form_open_multipart('admin/country/add', 'class="form-horizontal"');
?>
              <div class="box-body">
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Nama Negara</label>
                  <div class="col-sm-10">
                    <input type="text" name="country_name" value="<?php echo set_value('country_name'); ?>" class="form-control" id="input1" placeholder="Country Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Kode ISO 2 Digit</label>
                  <div class="col-sm-10">
                    <input type="text" name="iso" value="<?php echo set_value('iso'); ?>" class="form-control" id="input1" placeholder="ID">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Kode ISO 3 Digit</label>
                  <div class="col-sm-10">
                    <input type="text" name="ios3" value="<?php echo set_value('iso3'); ?>" class="form-control" id="input1" placeholder="IDR">
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
			    <a href="<?php echo base_url('admin/country'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>
