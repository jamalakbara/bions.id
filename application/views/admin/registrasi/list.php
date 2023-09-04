      <div class="row">
<!--<div class="col-xs-12 col-sm-12 visible-xs visible-sm">-->
	<div class="col-xs-12 col-sm-12 visible-xs visible-sm">
			<div class="box" style="padding: 10px 0px 10px 0px;">
					<a href="<?= base_url('admin/dashboard') ?>" class="faq btn btn-app">
						<i class="fa fa-dashboard"></i> Home
					</a>
					<a href="<?= base_url('admin/bank') ?>" class="faq btn btn-app">
						<i class="fa fa-cc-mastercard"></i> Data Bank
					</a>
			</div>
	</div>
      </div>
	
	<div class="row">
		<div class="col-xs-12">

<?php 
	if($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-success">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
	}
?>

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
				<div class="col-xs-6">
					<h3 class="box-title">Data Registrasi Pembukaan Rekening</h3>  
				</div>
				<div class="col-xs-6">
					<a style="margin-left: 10px;" href="<?php echo base_url('admin/registrasi/exportxls/?tglawal='.$tglawal.'&tglakhir='.$tglakhir); ?>" class="btn btn-primary pull-right" title="Export Xls"><i class="fa fa-file-excel-o"></i> Export Xls</a>
					<!--<a href="<?php echo base_url('admin/registrasi/add/'); ?>" class="btn btn-primary pull-right" title="Add"><i class="fa fa-plus"></i> Tambah</a>-->
				</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="mytable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Referer</th>
                  <th>Tanggal Registrasi</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Handphone</th>
                  <th>Attachment</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
<?php $i = 1; foreach($registrasi as $row) { ?>
				<tr>
                  <td><?=$i?></td>
                  <td><?php echo $row->reff; ?></td>
                  <td><?php echo $row->tanggal; ?></td>
                  <td><?php echo $row->nama_depan; ?></td>
                  <td><?php echo $row->email; ?></td>
                  <td><?php echo $row->handphone; ?></td>
				  <td>
<?php if($row->fotoktp) {?>
				  <a class="btn btn-primary" href="<?=base_url($row->fotoktp)?>" target="_blank">Foto KTP</a>
<?php }?>
<?php if($row->fotoselfie) {?>
				  <a class="btn btn-primary" href="<?=base_url($row->fotoselfie)?>" target="_blank">Foto Selfie KTP</a>
<?php }?>
<?php if($row->fotopaspor) {?>
				  <a class="btn btn-primary" href="<?=base_url($row->fotopaspor)?>" target="_blank">Foto Paspor</a>
<?php }?>
<?php if($row->fotokitas) {?>
				  <a class="btn btn-primary" href="<?=base_url($row->fotokitas)?>" target="_blank">Foto KITAS</a>
<?php }?>
<?php if($row->fototabungan) {?>
				  <a class="btn btn-primary" href="<?=base_url($row->fototabungan)?>" target="_blank">Foto Tabungan</a>
<?php }?>
<?php if($row->signature) {?>
				  <a class="btn btn-primary" href="<?=base_url($row->signature)?>" target="_blank">Signature</a>
<?php }?>
				  </td>
                  <td><a href="<?php echo base_url('admin/registrasi/detail/'.$row->id); ?>" class="btn btn-primary btn-sm" title="View"><i class="fa fa-eye"></i></a> <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default<?=$row->id?>"><i class="fa fa-trash"></i></button>
        <div class="modal fade" id="modal-default<?=$row->id?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure want to delete this data ?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="<?php echo base_url('admin/registrasi/delete/'.$row->id); ?>" class="btn btn-primary"><i class="fa fa-trash"></i> Yes, Delete this data!</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->				  
				  </td>
                </tr>
<?php $i++; } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
		</div>
		<!-- /.col-xs-12 -->
	</div>