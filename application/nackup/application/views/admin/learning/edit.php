<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

//	echo form_open(base_url('admin/learning/add'));
//	echo form_open('admin/learning/add', 'class="form-horizontal"');
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
	echo form_open_multipart('admin/learning/edit/'.$learning->id.'?catid='.$catid, 'class="form-horizontal"');
?>
              <div class="box-body">
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
	                    <input type="text" autocomplete="off" name="tanggal" value="<?=$learning->tanggal?>" class="form-control" id="datepicker2" placeholder="tanggal">
					</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" value="<?=$learning->title?>" class="form-control" id="input1" placeholder="Title">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input2" class="col-sm-2 control-label">Text</label>
                  <div class="col-sm-10">
					<textarea id="editor2" name="text" rows="10" cols="40">
					<?=$learning->text?>
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Tag</label>
                  <div class="col-sm-10">
                    <input type="text" name="tag" value="<?=$learning->tag?>" class="form-control" id="input1" placeholder="Tag">
					<p class="help-block">gunakan # (tagar) dan , (koma) sebagai pemisah contoh #whitepaper,#bions</p>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="image1">Image</label>
                  <div class="col-sm-10">
<?php
	if($learning->file_name) {
		echo '<img height="40" src="'.base_url('images/learning/'.$learning->file_name).'">';
	}
?>
                  <input type="file" name="fileinput" id="fileinput" accept="image/png,image/jpg,image/jpeg,image/gif">
				  <input type="hidden" name="oldfilename" value="<?=$learning->file_name?>">
                  <p class="help-block">image file.</p>
				  <input type="hidden" name="catid" value="<?=$catid?>" class="form-control">
                  </div>
                </div>

				
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/learning'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>