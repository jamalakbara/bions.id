<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

	if($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-success">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
	}

//	echo form_open(base_url('admin/banner/add'));
//	echo form_open('admin/banner/add', 'class="form-horizontal"');
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
	echo form_open_multipart('admin/banner/edit/'.$banner->id, 'class="form-horizontal"');
?>
              <div class="box-body">

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" value="<?=$banner->title?>" class="form-control" id="input1" placeholder="Title">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Title 2</label>
                  <div class="col-sm-10">
                    <input type="text" name="title2" value="<?=$banner->title2?>" class="form-control" id="input1" placeholder="Title 2">
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="image1">Image</label>
                  <div class="col-sm-10">
<?php if($banner->image1) { ?>
				  <img height="80" src="<?php echo base_url().$banner->image1; ?>"><br/><br/>
<?php } ?>
                  <input type="file" name="image1" id="image">
				  <input type="hidden" name="old-image1" value="<?=$banner->image1?>">
                  <p class="help-block">saran ukuran image 770 x 714 pixel.</p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Button 1</label>
                  <div class="col-sm-10">
                    <input type="text" name="button1" value="<?=$banner->button1?>" class="form-control" id="input1" placeholder="Button 1">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Url 1</label>
                  <div class="col-sm-10">
                    <input type="text" name="url1" value="<?=$banner->url1?>" class="form-control" id="input1" placeholder="https://link">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Button 2</label>
                  <div class="col-sm-10">
                    <input type="text" name="button2" value="<?=$banner->button2?>" class="form-control" id="input1" placeholder="Button 2">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Url 2</label>
                  <div class="col-sm-10">
                    <input type="text" name="url2" value="<?=$banner->url2?>" class="form-control" id="input1" placeholder="https://link">
                  </div>
                </div>

				
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/banner'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>