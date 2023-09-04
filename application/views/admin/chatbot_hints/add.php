<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

//	echo form_open(base_url('admin/chatbot_hints/add'));
//	echo form_open('admin/chatbot_hints/add', 'class="form-horizontal"');
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
	echo form_open_multipart('admin/chatbot_hints/add', 'class="form-horizontal"');
?>
              <div class="box-body">
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Question</label>
                  <div class="col-sm-10">
                    <input type="text" name="question" value="<?php echo set_value('question'); ?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>
                  <label for="input1" class="col-sm-2 control-label">Reply</label>
                  <div class="col-sm-10">
						<input type="text" name="reply" value="<?php echo set_value('reply'); ?>"class="form-control" id="input1" placeholder="">
                  </div>
                </div>

			  </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/chatbot_hints'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>
