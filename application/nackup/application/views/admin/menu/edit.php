<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

//	echo form_open(base_url('admin/menu/add'));
//	echo form_open('admin/menu/add', 'class="form-horizontal"');
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
	echo form_open_multipart('admin/menu/edit/'.$menu->id, 'class="form-horizontal"');
?>
              <div class="box-body">
<?php
function getchild($categories2,$parentid,$tree,$catid) {
	$CI=&get_instance();
	$tree=$tree+1;
	$child = $CI->categories_model->getchild($parentid);
		if(count($child)!=0) {
			foreach ( $child as $crow ) {
				if($crow->parentid == $parentid) {
						$pre = '|';
						for ($x = 0; $x < $tree; $x++) {
//						    $pre .= "<sup>&#151;</sup>&nbsp;";
						    $pre .= "___";
						} 
					$cchild = $CI->categories_model->getchild($crow->id);

					if(count($cchild)==0) {
//						getchild($cchild,$crow->id,$tree,$i);
//						    $pre .= '<img height="10" src="'.base_url('images/tree.png').'">';
						    $pre .= "__&nbsp;&nbsp;";
					}

					if($crow->id == $catid) { $selected = "selected"; } else { $selected = ""; }
					echo '<option value="'.$crow->id.'" '.$selected.'>'.$pre.'&nbsp;&nbsp;'.$crow->title.'</option>';

					if(count($cchild)!=0) {
						getchild($cchild,$crow->id,$tree,$catid);
					}
				}
			}
		}
}
?>
                                    <div class="form-group">
										<label for="input1" class="col-sm-3 control-label">Parent Menu</label>
										<div class="col-sm-9">
		                                <select name="parentid" id="categories" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="0">Select Parent</option>
<?php $i = 1; foreach($menulist as $row) { 

	if(!$row->parentid) {
		if($row->id == $menu->parentid) { $selected = "selected"; } else { $selected = ""; }
		echo '<option value="'.$row->id.'" '.$selected.'>'.$row->title.'</option>';
		$child = $this->menu_model->getchild($row->id);
		if(count($child)!=0) {
			getchild($child,$row->id,0,$menu->parentid);
		}
	}	
?>
<?php $i++; } ?>
										</select>
										</div>
                                    </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" value="<?=$menu->title?>" class="form-control" id="input1" placeholder="Title">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Link Url</label>
                  <div class="col-sm-10">
                    <input type="text" name="url" value="<?=$menu->url?>" class="form-control" id="input1" placeholder="http://link">
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/menu'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>