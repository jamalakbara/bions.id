<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

//	echo form_open(base_url('admin/pilihan/add'));
//	echo form_open('admin/pilihan/add', 'class="form-horizontal"');
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
	echo form_open_multipart('admin/pilihan/add', 'class="form-horizontal"');
?>
              <div class="box-body">
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Pilihan</label>
                  <div class="col-sm-10">
                    <input type="text" name="pilihan" value="<?php echo set_value('pilihan'); ?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>
                  <label for="input1" class="col-sm-2 control-label">Jawaban</label>
                  <div class="col-sm-10">
					<textarea id="editor8" name="jawaban" rows="10" cols="40">
                    </textarea>
                  </div>
                </div>

			  </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/pilihan'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>
