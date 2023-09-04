<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

//	echo form_open(base_url('admin/event/add'));
//	echo form_open('admin/event/add', 'class="form-horizontal"');
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
	echo form_open_multipart('admin/event/add', 'class="form-horizontal"');
?>
              <div class="box-body">
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Tanggal</label>
                  <div class="col-sm-10">
					<div class="input-group date">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
	                    <input type="text" autocomplete="off" name="tanggal" value="<?php echo set_value('tanggal'); ?>" class="form-control" id="datepicker2" placeholder="tanggal">
					</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" name="title" value="<?php echo set_value('title'); ?>" class="form-control" id="title" placeholder="Title" onchange="autoFillFromTitle(); validateTitleValue()" onkeyup="autoFillFromTitle(); validateTitleValue()">
										<p class="help-block" id="title_warning" style="color: red; display:none;"></p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input2" class="col-sm-2 control-label">Sub Description</label>
                  <div class="col-sm-10">
										<textarea id="editor1" name="subtext" rows="10" cols="20">
											<?php echo set_value('subtext'); ?>                                            
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input2" class="col-sm-2 control-label">Full Description</label>
                  <div class="col-sm-10">
										<textarea id="editor2" name="text" rows="10" cols="40">      
											<?php echo set_value('text'); ?>                                      
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="image1">Image</label>
                  <div class="col-sm-10">
                  <input type="file" name="image1" id="image1">
                  <p class="help-block">saran ukuran image 1170 x 587 pixel.</p>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Color</label>
                  <div class="col-sm-10">
						<input type="text" name="color" value="<?php echo set_value('color'); ?>"  data-jscolor="{hash:true}" class="form-control jscolor" id="input1" placeholder="">
                  </div>
                </div>

			  </div>
              <!-- /.box-body -->
							<div class="box box-info">
      <div class="box-header with-border">
        <h6 class="box-title">Tambah Data Meta SEO</h6>
      </div>

      <div class="box-body">
        <div class="form-group">
          <label for="input1" class="col-sm-2 control-label">Meta Title</label>
          <div class="col-sm-10">
            <input type="text" name="meta_title" value="<?php echo set_value('meta_title'); ?>" class="form-control" id="meta_title" placeholder="Meta Title" onchange="validateMetaTitleValue()" onkeyup="validateMetaTitleValue()">
            <p class="help-block" id="meta_title_warning" style="color: red; display:none;"></p>
          </div>
        </div>
        <div class="form-group">
          <label for="input1" class="col-sm-2 control-label">Meta Description</label>
          <div class="col-sm-10">
            <textarea id="meta_desc" name="meta_desc" rows="4" cols="40" class="form-control" onchange="countMetaDescValue()" onkeyup="countMetaDescValue()"><?php echo set_value('meta_desc'); ?></textarea>
            <p class="help-block"><span id="meta_desc_car">0</span>/1000 karakter</p>
          </div>
        </div>
        <div class="form-group">
          <label for="input1" class="col-sm-2 control-label">Meta Slug</label>
          <div class="col-sm-10">
            <input type="text" name="meta_slug" value="<?php echo set_value('meta_slug'); ?>" class="form-control" id="meta_slug" placeholder="Meta Slug" onchange="validateMetaSlugValue()" onkeyup="validateMetaSlugValue()">
            <p class="help-block">Result <?=base_url()?>edukasi/event/<span id="meta_slug_sample"></span></p>
            <p class="help-block" id="meta_slug_warning" style="color: red; display:none;"></p>
          </div>
        </div>
        <input type="hidden" name="meta_seo_valid" value="<?php echo set_value('meta_seo_valid'); ?>" class="form-control" id="meta_seo_valid">
      </div>
    </div>
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/event'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button id="btn_submit" type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>

				<script src="<?=base_url('assets/admin/')?>js/event.js?v=<?= rand() ?>"></script>
