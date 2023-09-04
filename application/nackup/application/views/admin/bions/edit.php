<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

	if($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-success">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
	}

//	echo form_open(base_url('admin/bions/add'));
//	echo form_open('admin/bions/add', 'class="form-horizontal"');
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
	echo form_open_multipart('admin/bions/edit/'.$bions->id, 'class="form-horizontal"');
?>
              <div class="box-body">

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Banner Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" value="<?=$bions->title?>" class="form-control" id="input1" placeholder="Title">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Banner Title 2</label>
                  <div class="col-sm-10">
                    <input type="text" name="title2" value="<?=$bions->title2?>" class="form-control" id="input1" placeholder="Title 2">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="image1">Banner Image</label>
                  <div class="col-sm-10">
<?php if($bions->image1) { ?>
				  <img height="80" src="<?php echo base_url().$bions->image1; ?>"><br/><br/>
<?php } ?>
                  <input type="file" name="image1" id="image">
				  <input type="hidden" name="old-image1" value="<?=$bions->image1?>">
                  <p class="help-block">gif, saran ukuran image 770 x 714 pixel.</p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Banner Button 1</label>
                  <div class="col-sm-10">
                    <input type="text" name="button1" value="<?=$bions->button1?>" class="form-control" id="input1" placeholder="Button 1">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Banner Button 1 Url</label>
                  <div class="col-sm-10">
                    <input type="text" name="url1" value="<?=$bions->url1?>" class="form-control" id="input1" placeholder="https://link">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Banner Button 2</label>
                  <div class="col-sm-10">
                    <input type="text" name="button2" value="<?=$bions->button2?>" class="form-control" id="input1" placeholder="Button 2">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Banner Button 2 Url</label>
                  <div class="col-sm-10">
                    <input type="text" name="url2" value="<?=$bions->url2?>" class="form-control" id="input1" placeholder="https://link">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">App Store Url</label>
                  <div class="col-sm-10">
                    <input type="text" name="appstore" value="<?=$bions->appstore?>" class="form-control" id="input1" placeholder="https://link">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Play Store Url</label>
                  <div class="col-sm-10">
                    <input type="text" name="pstore" value="<?=$bions->pstore?>" class="form-control" id="input1" placeholder="https://link">
                  </div>
                </div>

				
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/bions'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>