<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

//	echo form_open(base_url('admin/user/add'));
//	echo form_open('admin/user/add', 'class="form-horizontal"');
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
	echo form_open_multipart('admin/user/add', 'class="form-horizontal"');
?>
              <div class="box-body">
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">User Type</label>
                  <div class="col-sm-4">
                  <select name="usertype" class="form-control" id="usertype" >
				  <option value="0">Select User Type</option>
<?php $i = 1; foreach($usertype as $row) { if($row->id > 62) {?>
                    <option value="<?=$row->id?>"><?=$row->title?></option>
<?php $i++; } } ?>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Full Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="fullname" value="<?php echo set_value('fullname'); ?>" class="form-control" id="input1" placeholder="fullname">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control" id="input1" placeholder="username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control" id="input1" placeholder="password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" value="<?php echo set_value('email'); ?>" class="form-control" id="input1" placeholder="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Handphone</label>
                  <div class="col-sm-10">
                    <input type="text" name="handphone" value="<?php echo set_value('handphone'); ?>" class="form-control" id="input1" placeholder="handphone">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Jabatan</label>
                  <div class="col-sm-10">
                    <input type="text" name="jabatan" value="<?php echo set_value('jabatan'); ?>" class="form-control" id="input1" placeholder="fullname">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input2" class="col-sm-2 control-label">Profil Singkat</label>
                  <div class="col-sm-10">
					<textarea id="editor2" name="profil" rows="10" cols="40">                                            
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="image1">Photo</label>
                  <div class="col-sm-10">
                  <input type="file" name="fileinput" id="fileinput" accept="image/png,image/jpg,image/jpeg,image/gif">
                  <p class="help-block">Image File.</p>
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
			    <a href="<?php echo base_url('admin/user'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>