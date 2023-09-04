<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

//	echo form_open(base_url('admin/bank/add'));
//	echo form_open('admin/bank/add', 'class="form-horizontal"');
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
	echo form_open('admin/bank/edit/'.$bank->id, 'class="form-horizontal"');
?>
              <div class="box-body">
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">BANKID</label>
                  <div class="col-sm-10">
                    <input type="text" name="BANKID" value="<?=$bank->BANKID?>" class="form-control" id="input1" placeholder="BNI">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Nama Bank</label>
                  <div class="col-sm-10">
                    <input type="text" name="BANKNAME" value="<?=$bank->BANKNAME?>" class="form-control" id="input1" placeholder="PT. BANK NEGARA INDONESIA">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Bank IDK PEI</label>
                  <div class="col-sm-10">
                    <input type="text" name="BANKIDKPEI" value="<?=$bank->BANKIDKPEI?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Reff Bank</label>
                  <div class="col-sm-10">
                    <input type="text" name="REFBANK" value="<?=$bank->REFBANK?>" class="form-control" id="input1" placeholder="BNINIDJAXXX">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">CODE</label>
                  <div class="col-sm-10">
                    <input type="text" name="CODE" value="<?=$bank->CODE?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">CODE BI</label>
                  <div class="col-sm-10">
                    <input type="text" name="CODE_BI" value="<?=$bank->CODE_BI?>" class="form-control" id="input1" placeholder="BNINIDJA">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">MSB ID</label>
                  <div class="col-sm-10">
                    <input type="text" name="MSB_ID" value="<?=$bank->MSB_ID?>" class="form-control" id="input1" placeholder="BNI50F">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">CODE ARIA</label>
                  <div class="col-sm-10">
                    <input type="text" name="CODE_ARIA" value="<?=$bank->CODE_ARIA?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">No Urut</label>
                  <div class="col-sm-10">
                    <input type="text" name="NOURUT" value="<?=$bank->NOURUT?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <!--<div class="form-group">
                  <label for="input2" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
					<textarea id="editor1" name="description" rows="10" cols="40">
                                            <?=$bank->description?>
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input3" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="price" class="form-control" id="input3" value="<?=$bank->price?>" placeholder="Price">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input4" class="col-sm-2 control-label">Stock</label>
                  <div class="col-sm-10">
                    <input type="text" name="stock" class="form-control" id="input4" value="<?=$bank->stock?>" placeholder="Stock">
                  </div>
                </div>-->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/bank'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>