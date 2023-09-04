<?php
	$tday = mktime(gmdate("H")+7,gmdate("i"),gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y"));
	$tnow = date("Y-m-d", $tday);
//	$lastid = $this->city_model->lastid();
//	echo $lastid[0]->kode;
//	if($lastid) {
//		$nourut = $lastid[0]->count+1;
//	} else {
//		$nourut = 1;
//	}
//	$str = 'KWI'.substr('000000' . $nourut, -6);

	echo validation_errors('<div class="alert alert-warning">','</div>');
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
			  <p style="color: red">WARNING! Pastikan data yg akan diimport sudah benar semua, karena proses ini akan menambah data pemilik secara otomatis</p>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<?php
	echo form_open_multipart('admin/user/upload/', 'class="form-horizontal"');
?>
              <div class="box-body">
                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="image1">Upload File Data</label>
                  <div class="col-sm-10">
                  <input type="file" name="file" id="file" required accept=".xls, .xlsx" >
                  <p class="help-block">make sure the extention is xls or xlsx.</p>
                  </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="#" onclick="window.history.go(-1); return false;" class="btn btn-default">Cancel</button></a>
                <button type="submit" class="btn btn-primary">Import Data</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>