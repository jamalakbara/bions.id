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
					<h3 class="box-title">Data User</h3>  
				</div>
				<div class="col-xs-6">
					<a href="<?php echo base_url('admin/user/add/'); ?>" class="btn btn-primary pull-right" title="Add"><i class="fa fa-edit"></i> Add User</a>
				</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="mytable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Fullname</th>
                  <th>Usertype</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
<?php $i = 1; foreach($user as $row) { if($row->usertype != 61 ) { ?>
				<tr>
                  <td><?=$i?></td>
                  <td><?php echo $row->username; ?></td>
                  <td><?php 
				  echo $row->fullname;
				  if($row->address) { echo '<br/>'.$row->address; }
				  if($row->region) { echo ', '.$row->region; }
				  if($row->area) { echo ', '.$row->area; }
				  if($row->city) { echo ', '.$row->city; }
				  if($row->state) { echo ', '.$row->state; }
				  if($row->postalcode) { echo ', '.$row->postalcode; }
				  if($row->handphone) { echo '<br/>'.$row->handphone; }
				  ?></td>
                  <td><?php echo $row->usertype; ?></td>
                  <td><a href="<?php echo base_url('admin/user/edit/'.$row->id); ?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a> <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default<?=$row->id?>"><i class="fa fa-trash"></i></button>
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
                <a href="<?php echo base_url('admin/user/delete/'.$row->id); ?>" class="btn btn-primary"><i class="fa fa-trash"></i> Yes, Delete this data!</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->				  
				  </td>
                </tr>
<?php $i++; } } ?>
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