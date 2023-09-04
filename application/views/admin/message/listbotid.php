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
					<h3 class="box-title"><?=$title?></h3>  
				</div>
				<div class="col-xs-6">
					<!--<a href="<?php echo base_url('admin/message/add/'); ?>" class="btn btn-primary pull-right" title="Add"><i class="fa fa-plus"></i> Tambah</a>-->
				</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="mytable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>botid</th>
                  <th>Added on</th>
                  <th>User</th>
                  <th>Message</th>
                </tr>
                </thead>
                <tbody>
<?php $i = 1; foreach($message as $row) { ?>
				<tr>
                  <td><?=$i?></td>
                  <td><?php echo $row->botid; ?></td>
                  <td><?php echo $row->added_on; ?></td>
                  <td><?php echo $row->type; ?></td>
                  <td><?php echo $row->message; ?></td>
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