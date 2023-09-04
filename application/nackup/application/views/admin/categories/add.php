<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

//	echo form_open(base_url('admin/categories/add'));
//	echo form_open('admin/categories/add', 'class="form-horizontal"');
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
              <h3 class="box-title"><?=$title?> <?=$modules?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
<?php
	echo form_open('admin/categories/add/'.$modules, 'class="form-horizontal"');

function getchild($categories,$parentid,$tree) {
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
					
					echo '<option value="'.$crow->id.'">'.$pre.'&nbsp;&nbsp;'.$crow->title.'</option>';

					if(count($cchild)!=0) {
						getchild($cchild,$crow->id,$tree);
					}
				}
			}
		}
}
?>
                                    <div class="form-group">
										<label for="input1" class="col-sm-3 control-label">Parent Kategori <?=$modules?></label>
										<div class="col-sm-9">
		                                <select name="parentid" id="categories" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="">Select Parent</option>
<?php $i = 1; foreach($categories as $row) { 

	if(!$row->parentid) {
		echo '<option value="'.$row->id.'">'.$row->title.'</option>';
		$child = $this->categories_model->getchild($row->id);
		if(count($child)!=0) {
			getchild($child,$row->id,0);
		}
	}	
?>
<?php $i++; } ?>
										</select>
										</div>
                                    </div>

              <div class="box-body">
                <div class="form-group">
                  <label for="input1" class="col-sm-3 control-label">Title</label>
                  <div class="col-sm-9">
                    <input type="text" name="title" value="<?php echo set_value('title'); ?>" class="form-control" id="input1" placeholder="Title">
					<input type="hidden" name="modules" value="<?=$modules?>">
                  </div>
                </div>

				<!--<div class="form-group">
                  <label for="input2" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
					<textarea id="editor1" name="description" rows="10" cols="40">
                                            This is my textarea to be replaced with CKEditor.
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input3" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="price" class="form-control" id="input3" placeholder="Price">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input4" class="col-sm-2 control-label">Stock</label>
                  <div class="col-sm-10">
                    <input type="text" name="stock" class="form-control" id="input4" placeholder="Stock">
                  </div>
                </div> -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/categories'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>