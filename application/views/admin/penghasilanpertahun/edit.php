<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

//	echo form_open(base_url('admin/penghasilanpertahun/add'));
//	echo form_open('admin/penghasilanpertahun/add', 'class="form-horizontal"');
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
	echo form_open('admin/penghasilanpertahun/edit/'.$penghasilanpertahun->id, 'class="form-horizontal"');
?>
              <div class="box-body">
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Penghasilanpertahun</label>
                  <div class="col-sm-10">
                    <input type="text" name="penghasilanpertahun" value="<?=$penghasilanpertahun->penghasilanpertahun?>" class="form-control" id="input1" placeholder="Islam">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">BOAS Code</label>
                  <div class="col-sm-10">
                    <input type="text" name="boascode" value="<?=$penghasilanpertahun->boascode?>" class="form-control" id="input1" placeholder="01">
                  </div>
                </div>


                <!--<div class="form-group">
                  <label for="input2" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
					<textarea id="editor1" name="description" rows="10" cols="40">
                                            <?=$penghasilanpertahun->description?>
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input3" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="price" class="form-control" id="input3" value="<?=$penghasilanpertahun->price?>" placeholder="Price">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input4" class="col-sm-2 control-label">Stock</label>
                  <div class="col-sm-10">
                    <input type="text" name="stock" class="form-control" id="input4" value="<?=$penghasilanpertahun->stock?>" placeholder="Stock">
                  </div>
                </div>-->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/penghasilanpertahun'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>