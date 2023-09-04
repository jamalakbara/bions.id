	<div class="row">
		<div class="col-xs-12">
<style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 4px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
</style>
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
					<h3 class="box-title">Data Kategori</h3>  
				</div>
				<div class="col-xs-6">
					<a href="<?php echo base_url('admin/menu/add/'); ?>" class="btn btn-primary pull-right" title="Add"><i class="fa fa-edit"></i> Tambah Data kategori</a>
				</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="mytable" class="table table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Kategori</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
<?php $i = 1; foreach($menu as $row) { 
	if(!$row->parentid) {
?>
				<tr>
                  <td></td>
                  <td><?php echo $row->title; ?></td>
                  <td>
<?php
		$child = $this->menu_model->getchild($row->id);	
//		if(count($child)==0) {
?>
				  <a href="<?php echo base_url('admin/menu/edit/'.$row->id); ?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a> <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default<?=$row->id?>"><i class="fa fa-trash"></i>Hapus</button>
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
                <a href="<?php echo base_url('admin/menu/delete/'.$row->id); ?>" class="btn btn-primary"><i class="fa fa-trash"></i> Yes, Delete this data!</a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
<?php //} ?>		
				  </td>
                </tr>
<?php
		$child = $this->menu_model->getchild($row->id);
		if(count($child)!=0) {
			getchild($child,$row->id,0,$i);
		}
	}
$i++; }

function getchild($menu,$parentid,$tree,$i) {
	$audiovideo = array('AUDIO','VIDEO','FOTO');
	$CI=&get_instance();
	$tree=$tree+1;
	$i++;
	$child = $CI->menu_model->getchild($parentid);
//		if(count($child)!=0) { echo '<ul>'; }
		if(count($child)!=0) {
			foreach ( $child as $crow ) {
				if($crow->parentid == $parentid) {
						$pre = '|';
						for ($x = 0; $x < $tree; $x++) {
//						    $pre .= "<sup>&#151;</sup>&nbsp;";
						    $pre .= "___";
						} 

					$cchild = $CI->menu_model->getchild($crow->id);
					if(count($cchild)==0) {
//						getchild($cchild,$crow->id,$tree,$i);
//						    $pre .= '<img height="10" src="'.base_url('images/tree.png').'">';
						    $pre .= "__&nbsp;&nbsp;";
					}
?>
				<tr>
                  <td></td>
                  <td><?php echo $pre.'&nbsp;&nbsp;'.$crow->title; ?></td>
                  <td>
<?php
		$childs = $CI->menu_model->getchild($crow->id);	
		if(count($childs)==0) {	
?>

<?php } ?>		
				  </td>
                </tr>
<?php
//					$cchild = $CI->menu_model->getchild($crow->id);
					if(count($cchild)!=0) {
						getchild($cchild,$crow->id,$tree,$i);
					}
//					echo '</li>';
				}
			}
		}
//		if(count($child)!=0) { echo '</ul>'; }
}
?>
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