<?php 
	if($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-success">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
	}
?>
<br/>
	  <!-- Main row -->
		<div class="row">
			<div class="col-xs-12">

          <div class="box">
            <div class="box-header">
				<div class="col-xs-6">
					<h3 class="box-title"><?=$title?></h3>  
				</div>
				<div class="col-xs-6">
				</div>
            </div>
            <div class="box-body table-responsive no-padding">
<br/><br/>
				<div class="col-xs-12">
<?php
	echo form_open('admin/registrasi/listing', 'class="form-horizontal"');
?>
            <div class="box-body">
				<div class="col-xs-4">
                <div class="form-group">
                  <label for="input1" class="col-sm-6 control-label">Tanggal Awal</label>
                  <div class="col-sm-6">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
	                    <input type="text" name="tglawal" value="<?php echo set_value('tglawal'); ?>" class="form-control" id="datepicker31" placeholder="Tanggal Berangkat">
					</div>
                  </div>
                </div>
				</div>
				<div class="col-xs-4">
                <div class="form-group">
                  <label for="input1" class="col-sm-6 control-label">Tanggal Akhir</label>
                  <div class="col-sm-6">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
					 	<input type="text" name="tglakhir" value="<?php echo set_value('tglakhir'); ?>" class="form-control" id="datepicker32" placeholder="Tanggal Kembali">
					</div>
                  </div>
                </div>
				</div>
				<div class="col-xs-4">
                  <div class="col-sm-2">
					<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp;Cari</button>
                  </div>
				</div>
            </div>
<?php
	echo form_close();
?>
				</div>
				<div class="col-xs-12">

				</div>
            </div>
          </div>

			</div>
		</div>
      <!-- End Main row -->
