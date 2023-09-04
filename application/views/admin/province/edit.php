<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

	if($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-success">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
	}

//	echo form_open(base_url('admin/province/add'));
//	echo form_open('admin/province/add', 'class="form-horizontal"');
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
	echo form_open_multipart('admin/province/edit/'.$province->id, 'class="form-horizontal"');
?>
              <div class="box-body">

				<div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Nama Propinsi</label>
                  <div class="col-sm-10">
                    <input type="text" name="province" value="<?=$province->province?>" class="form-control" id="input1" placeholder="Province Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Kode</label>
                  <div class="col-sm-10">
                    <input type="text" name="provinceid" value="<?=$province->provinceid?>"  class="form-control" id="input1" placeholder="ID">
                  </div>
                </div>
			
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/province'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>