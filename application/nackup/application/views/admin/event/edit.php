<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

//	echo form_open(base_url('admin/event/add'));
//	echo form_open('admin/event/add', 'class="form-horizontal"');
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
	echo form_open_multipart('admin/event/edit/'.$event->id, 'class="form-horizontal"');
?>
              <div class="box-body">

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
	                    <input type="text" autocomplete="off" name="tanggal" value="<?=$event->tanggal?>" class="form-control" id="datepicker2" placeholder="tanggal">
					</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" value="<?=$event->title?>" class="form-control" id="input1" placeholder="Title">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input2" class="col-sm-2 control-label">Sub Description</label>
                  <div class="col-sm-10">
					<textarea id="editor1" name="subtext" rows="10" cols="20">                                            
					<?=$event->subtext?>
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input2" class="col-sm-2 control-label">Full Description</label>
                  <div class="col-sm-10">
					<textarea id="editor2" name="text" rows="10" cols="40">                                            
					<?=$event->text?>
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="image1">Image</label>
                  <div class="col-sm-10">
<?php if($event->image1) { ?>
				  <img height="80" src="<?php echo base_url().$event->image1; ?>"><br/><br/>
<?php } ?>
                  <input type="file" name="image1" id="image">
				  <input type="hidden" name="old-image1" value="<?=$event->image1?>">
                  <p class="help-block">saran ukuran image 1170 x 587 pixel.</p>
                  </div>
                </div>

				
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/event'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>