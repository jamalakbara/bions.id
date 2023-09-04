      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-social-usd"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dibayar</span>
              <span class="info-box-number"><?= count($orderconfirm) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa ion-bag"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Dikirim</span>
              <span class="info-box-number"><?= count($ordershipped) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-android-happy"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Selesai</span>
              <span class="info-box-number"><?= count($orderfinisihed) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Members</span>
              <span class="info-box-number"><?= count($users) ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

<div class="row">

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Transaksi Baru</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="mytable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th>User</th>
                  <th>Nama</th>
                  <th>Invoice</th>
                  <th>Item</th>
                  <th>Grand Total</th>
                  <th>Payment</th>
                  <th>Payment Status</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
<?php $i = 1; foreach($orders as $row) { 
if($row->canceled==1) {
	$status = 'Cancel';
} else if($row->finished==1) {
	$status = 'Selesai';
} else if($row->shipped==1) {
	$status = 'Dikirim';
} else if($row->paid==1) {
	$status = 'Dibayar';
} else {
	$status = 'Belum Dibayar';
}
if($row->paid==1) {
	$paystatus = 'Dibayar';
} else {
	$paystatus = 'Belum Dibayar';
}
	?>
				<tr>
                  <td><?=$i?></td>
                  <td><?php echo $row->date; ?></td>
                  <td><?php echo $row->time; ?></td>
                  <td><?php $usr = $this->user_model->detail($row->userid); echo $usr->fullname; ?></td>
                  <td><?php echo $row->name; ?></td>
                  <td><?php echo $row->invoiceid; ?></td>
                  <td>
<?php 
$i = 1; foreach($orderitems as $item) { 
	if($item->orderid == $row->id) {
		echo $item->productname.' x '.$item->productqty.'<br/>';
	}
}
?>
				  </td>
                  <td><?php echo number_format($row->grandtotal); ?></td>
                  <td><?php echo $row->payvia; ?></td>
                  <td><?php echo $paystatus; ?></td>
                  <td><?php echo $status; ?></td>
                  <td><a href="<?php echo base_url('admin/order/detail/'.$row->id); ?>" class="btn btn-primary btn-sm" title="View"><i class="fa fa-eye"></i></a> <!--<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default<?=$row->id?>"><i class="fa fa-trash"></i></button>-->
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
                <a href="<?php echo base_url('admin/order/delete/'.$row->id); ?>" class="btn btn-primary"><i class="fa fa-trash"></i> Yes, Delete this data!</a>
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


            <div class="box-footer clearfix">
              <a href="<?=base_url()?>admin/order" class="btn btn-sm btn-info btn-flat pull-left">View All Orders</a>
              <!--<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right"></a> -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

</div>
<!-- /.row -->
