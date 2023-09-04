<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

//	echo form_open(base_url('admin/faq/add'));
//	echo form_open('admin/faq/add', 'class="form-horizontal"');
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
	echo form_open_multipart('admin/faq/add?catid='.$catid, 'class="form-horizontal"');
?>
              <div class="box-body">
                <!--<div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
	                    <input type="text" name="tanggal" value="<?php echo set_value('tglawalmasuk'); ?>" class="form-control" id="datepicker2" placeholder="tanggal">
					</div>
                  </div>
                </div>-->
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Question</label>
                  <div class="col-sm-10">
                    <input type="text" name="question" value="<?php echo set_value('question'); ?>" class="form-control" id="input1" placeholder="Question">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input2" class="col-sm-2 control-label">Answer</label>
                  <div class="col-sm-10">
					<textarea id="editor2" name="answer" rows="10" cols="40">                                            
                    </textarea>
                  </div>
                </div>
                <!--<div class="form-group">
                  <label  class="col-sm-2 control-label" for="image1">File Pdf</label>
                  <div class="col-sm-10">
                  <input type="file" name="fileinput" id="fileinput" accept="application/pdf,video/mp4">
                  <p class="help-block">File Pdf.</p>
                  </div>
                </div>-->
                  <input type="hidden" name="catid" value="<?=$catid?>" class="form-control">

			  </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/faq?catid='.$catid); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>
