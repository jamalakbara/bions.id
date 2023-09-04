<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

//	echo form_open(base_url('admin/trialregistrasi/add'));
//	echo form_open('admin/trialregistrasi/add', 'class="form-horizontal"');
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
	echo form_open_multipart('admin/trialregistrasi/edit/'.$trialregistrasi->id, 'class="form-horizontal"');
?>
              <div class="box-body">

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
	                    <input type="text" autocomplete="off" name="tanggal" value="<?=$trialregistrasi->tanggal?>" class="form-control" id="datepicker2" placeholder="tanggal">
					</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" value="<?=$trialregistrasi->nama_lengkap?>" class="form-control" id="input1" placeholder="Title">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" value="<?=$trialregistrasi->email?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Handphone</label>
                  <div class="col-sm-10">
                    <input type="text" name="handphone" value="<?=$trialregistrasi->handphone?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>
				
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/trialregistrasi'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>