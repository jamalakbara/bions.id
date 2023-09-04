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
	echo form_open_multipart('admin/menu/add', 'class="form-horizontal"');

function getchild($categories,$parentid,$tree) {
	$CI=&get_instance();
	$tree=$tree+1;
	$child = $CI->menu_model->getchild($parentid);
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
					
					echo '<option value="'.$crow->id.'">'.$pre.'&nbsp;&nbsp;'.$crow->title.'</option>';

					if(count($cchild)!=0) {
						getchild($cchild,$crow->id,$tree);
					}
				}
			}
		}
}
?>
              <div class="box-body">
                                    <div class="form-group">
										<label for="input1" class="col-sm-2 control-label">Parent Menu</label>
										<div class="col-sm-10">
		                                <select name="parentid" id="categories" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="">Select Parent</option>
<?php $i = 1; foreach($menu as $row) { 

	if(!$row->parentid) {
		echo '<option value="'.$row->id.'">'.$row->title.'</option>';
		$child = $this->menu_model->getchild($row->id);
		if(count($child)!=0) {
			getchild($child,$row->id,0);
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
                    <input type="text" name="title" value="<?php echo set_value('title'); ?>" class="form-control" id="input1" placeholder="Title">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Link Url</label>
                  <div class="col-sm-10">
                    <input type="text" name="url" value="<?php echo set_value('url'); ?>" class="form-control" id="input1" placeholder="http://link">

				  <div class="checkbox">
                    <label class="control-labels">
                      &nbsp;&nbsp;<input name="newtab" type="checkbox" value="1">
                      bila dicentang maka url akan dibuka di newtab.
                    </label>
                  </div>

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
