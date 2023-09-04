<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');

//	echo form_open(base_url('admin/config/add'));
//	echo form_open('admin/config/add', 'class="form-horizontal"');
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
	echo form_open_multipart('admin/config/edit/'.$config->id, 'class="form-horizontal"');
?>
              <div class="box-body">
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Site Title</label>
                  <div class="col-sm-10">
                    <input type="config" name="site_title" value="<?=$config->site_title?>" class="form-control" id="input1" placeholder="site title">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Meta Tag</label>
                  <div class="col-sm-10">
                    <input type="site_meta" name="site_meta" value="<?=$config->site_meta?>" class="form-control" id="input1" placeholder="meta tag">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Meta Description</label>
                  <div class="col-sm-10">
                    <input type="pemilik" name="site_desc" value="<?=$config->site_desc?>" class="form-control" id="input1" placeholder="meta description">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Company Name</label>
                  <div class="col-sm-10">
                    <input type="pemilik" name="name" value="<?=$config->name?>" class="form-control" id="input1" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Footer Text</label>
                  <div class="col-sm-10">
                    <input type="pemilik" name="footertext" value="<?=$config->footertext?>" class="form-control" id="input1" placeholder="Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input type="pemilik" name="address" value="<?=$config->address?>" class="form-control" id="input1" placeholder="address">
                  </div>
                </div>
<!--
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Province</label>
                  <div class="col-sm-10">
                  <select name="provinceid" class="form-control" id="province" >
<?php 
				if(!$config->stateid) { echo '<option value="0">Select Province</option>'; }
?>
<?php $i = 1; foreach($propinsi as $row) { 
				if($config->stateid == $row->provinceid) { $selected = 'selected'; } else { $selected = ''; }
?>
                    <option value="<?=$row->provinceid?>" <?=$selected?>><?=$row->province?></option>
<?php $i++; } ?>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">City</label>
                  <div class="col-sm-10">
                  <select name="cityid" class="form-control" id="city" >
<?php 
				if(!$config->cityid) { echo '<option value="">Select City</option>'; } else { echo '<option value="'.$config->cityid.'">'.$config->city.'</option>'; }
?>
                  </select>
				<div id="loading" style="margin-top: 15px;">
					<img src="<?=base_url();?>images/loading.gif" width="18"> <small>Loading...</small>
				</div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Postal Code</label>
                  <div class="col-sm-10">
                    <input type="pemilik" name="postalcode" value="<?=$config->postalcode?>" class="form-control" id="input1" placeholder="Postal Code">
                  </div>
                </div>
-->
                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" name="phone" value="<?=$config->phone?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" value="<?=$config->email?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <!--<div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Jam Kerja</label>
                  <div class="col-sm-10">
                    <input type="text" name="jamkerja" value="<?=$config->jamkerja?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>-->

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Instagram</label>
                  <div class="col-sm-10">
                    <input type="text" name="instagram" value="<?=$config->instagram?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Facebook</label>
                  <div class="col-sm-10">
                    <input type="text" name="facebook" value="<?=$config->facebook?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Twitter</label>
                  <div class="col-sm-10">
                    <input type="text" name="twitter" value="<?=$config->twitter?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <!--<div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Youtube Video</label>
                  <div class="col-sm-10">
                    <input type="text" name="video" value="<?=$config->video?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Youtube Channel Id</label>
                  <div class="col-sm-10">
                    <input type="text" name="channel" value="<?=$config->channel?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Text Gallery ( home )</label>
                  <div class="col-sm-10">
                    <input type="text" name="texthomegallery" value="<?=$config->texthomegallery?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Title Product ( home )</label>
                  <div class="col-sm-10">
                    <input type="text" name="titlehomeproduct" value="<?=$config->titlehomeproduct?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Text Product ( home )</label>
                  <div class="col-sm-10">
                    <input type="text" name="texthomeproduct" value="<?=$config->texthomeproduct?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Title Articles ( home )</label>
                  <div class="col-sm-10">
                    <input type="text" name="titlehomearticles" value="<?=$config->titlehomearticles?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Title Partner ( home )</label>
                  <div class="col-sm-10">
                    <input type="text" name="titlehomepartner" value="<?=$config->titlehomepartner?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="image1">Image Page Product</label>
                  <div class="col-sm-10">
<?php if($config->imageproduct) { ?>
				  <img height="80" src="<?php echo base_url().$config->imageproduct; ?>"><br/><br/>
<?php } ?>
                  <input type="file" name="imageproduct" id="imageproduct">
				  <input type="hidden" name="old-imageproduct" value="<?=$config->imageproduct?>">
                  <p class="help-block">Gambar Latar Products (1170 x 470 pixel).</p>
                  </div>
                </div>

				<div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Title Event ( home )</label>
                  <div class="col-sm-10">
                    <input type="text" name="titlehomeevent" value="<?=$config->titlehomeevent?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>
				<div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Text Event ( home )</label>
                  <div class="col-sm-10">
                    <input type="text" name="texthomeevent" value="<?=$config->texthomeevent?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="image1">Image Event ( home )</label>
                  <div class="col-sm-10">
<?php if($config->imagehomeevent) { ?>
				  <img height="80" src="<?php echo base_url().$config->imagehomeevent; ?>"><br/><br/>
<?php } ?>
                  <input type="file" name="imagehomeevent" id="imagehomeevent">
				  <input type="hidden" name="old-imagehomeevent" value="<?=$config->imagehomeevent?>">
                  <p class="help-block">Gambar Latar Products (1170 x 470 pixel).</p>
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="image1">Image Page Event</label>
                  <div class="col-sm-10">
<?php if($config->imageevent) { ?>
				  <img height="80" src="<?php echo base_url().$config->imageevent; ?>"><br/><br/>
<?php } ?>
                  <input type="file" name="imageevent" id="imageproduct">
				  <input type="hidden" name="old-imageevent" value="<?=$config->imageevent?>">
                  <p class="help-block">Gambar Latar Products (1170 x 470 pixel).</p>
                  </div>
                </div>-->

                <div class="form-group">
                  <label  class="col-sm-2 control-label" for="image1">Image Page Contact</label>
                  <div class="col-sm-10">
<?php if($config->imagecontact) { ?>
				  <img height="80" src="<?php echo base_url().$config->imagecontact; ?>"><br/><br/>
<?php } ?>
                  <input type="file" name="imagecontact" id="imagecontact">
				  <input type="hidden" name="old-imagecontact" value="<?=$config->imagecontact?>">
                  <p class="help-block">Gambar Latar Products (570 x 333 pixel).</p>
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Text Page Contact 1</label>
                  <div class="col-sm-10">
                    <input type="text" name="textcontact1" value="<?=$config->textcontact1?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="input1" class="col-sm-2 control-label">Text Page Contact 2</label>
                  <div class="col-sm-10">
                    <input type="text" name="textcontact2" value="<?=$config->textcontact2?>" class="form-control" id="input1" placeholder="">
                  </div>
                </div>

                <!--<div class="form-group">
                  <label for="input2" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
					<textarea id="editor1" name="description" rows="10" cols="40">
                                            <?=$config->description?>
                    </textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="input3" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="price" class="form-control" id="input3" value="<?=$config->price?>" placeholder="Price">
                  </div>
                </div>
                <div class="form-group">
                  <label for="input4" class="col-sm-2 control-label">Stock</label>
                  <div class="col-sm-10">
                    <input type="text" name="stock" class="form-control" id="input4" value="<?=$config->stock?>" placeholder="Stock">
                  </div>
                </div>-->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
			    <a href="<?php echo base_url('admin/config'); ?>" class="btn btn-default">Cancel</button></a>
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <!-- /.box-footer -->
<?php
	echo form_close();
?>          </div>
          <!-- /.box -->
        </div>