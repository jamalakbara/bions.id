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
					<h3 class="box-title">Data Agama</h3>  
				</div>
				<div class="col-xs-6">
					<a href="<?php echo base_url('admin/agama/add/'); ?>" class="btn btn-primary pull-right" title="Add"><i class="fa fa-edit"></i> Add Agama</a>
				</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="mytable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Boas Code</th>
                  <th>Agama</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
<?php $i = 1; foreach($agama as $row) { ?>
				<tr>
                  <td><?=$i?></td>
                  <td><?php echo $row->boascode; ?></td>
                  <td><?php echo $row->agama; ?></td>
                  <td><a href="<?php echo base_url('admin/agama/edit/'.$row->id); ?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a> <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default<?=$row->id?>"><i class="fa fa-trash"></i></button>
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
                <a href="<?php echo base_url('admin/agama/delete/'.$row->id); ?>" class="btn btn-primary"><i class="fa fa-trash"></i> Yes, Delete this data!</a>
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