<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $config->site_title ?> | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/')?>bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
  <style>
.login-page, .register-page {
    background: #F9F9F9;
	/*background-image: url("<?=base_url()?>images/bg2.jpg");*/
}
.login-box-body, .register-box-body {
    background: #fff;
    padding: 40px;
    border-top: 0;
    color: #666;
	border-radius: 15px;
	margin-top: 5px;
	margin: 1% auto;
}
input.form-control, select.form-control, .alert {
	border-radius: 5px;
}
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
  <div class="login-logo">
    <a href="<?=base_url()?>admin/dashboard"><b><?= $config->name ?></b></a>
  </div>
<?php 
	if($this->session->flashdata('login_error')) {
		echo '<div class="alert alert-danger">';
		echo $this->session->flashdata('login_error');
		echo '</div>';
	}
//	echo md5('malesngoding123');
?>
<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');
?>
    <p class="login-box-msg">Isi data diri Anda</p>

<?php
	echo form_open('admin/login/registeraction', 'class="form-horizontal"');
?>
      <div class="form-group has-feedback">
        <input name="fullname" type="text" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="email" type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
	  <hr>
      <div class="form-group has-feedback">
        <input name="namatoko" type="text" class="form-control" placeholder="Nama Toko">
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="url" type="text" class="form-control" placeholder="Url untuk toko ( http://fo/u/url_toko )">
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="alamattoko" type="text" class="form-control" placeholder="Alamat Toko">
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
                                    <div class="form-group">
		                                <select name="propinsiid" id="propinsi" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="0">Select Propinsi</option>
<?php $i = 1; foreach($propinsi as $row) { ?>
                    <option value="<?=$row->id?>"><?=$row->name?></option>
<?php $i++; } ?>
										</select>
                                    </div>
                                    <div class="form-group">
		                                <select name="kabupatenkotaid" id="kabupatenkota" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="0">Select Kabupaten / Kota</option>
										</select>
                                    </div>
                                    <div class="form-group">
		                                <select name="kecamatanid" id="kecamatan" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="0">Select Kecamatan</option>
										</select>
                                    </div>
                                    <div class="form-group">
		                                <select name="kelurahanid" id="kelurahan" class="select2 form-control custom-select" style="width: 100%; height:36px;">
											<option value="0">Select Kelurahan</option>
										</select>
                                    </div>
		<hr/>
      <div class="form-group has-feedback">
        <input name="username" type="text" class="form-control" placeholder="User name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password2" type="password2" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input name="aggree" type="checkbox"> Saya mneyetujui semua <a href="#">Term & Agreement</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
        </div>
        <!-- /.col -->
      </div>
<?php
	echo form_close();
?>


<!--    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <!--<a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>-->
	
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Select2 -->
  <script src="<?=base_url('assets/admin/')?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- iCheck -->
<script src="<?=base_url()?>assets/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('.select2').select2()

	$('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script>
$(document).ready(function(){
	$('#propinsi').parent().show();
	$('#kabupatenkota').parent().hide();
	$('#kecamatan').parent().hide();
	$('#kelurahan').parent().hide();

	$("#propinsi").change(function(){ 
		$('#kabupatenkota').parent().show();
			$.ajax({
				type: "POST", 
				url: "<?=base_url()?>admin/login/getkota", 
				data: {prov_id : $("#propinsi").val()},
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){
					setTimeout(function(){
						$("#kabupatenkota").html(response.data_kota).show();
					}, 10);
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(thrownError);
				}
			});
	});

	$("#kabupatenkota").change(function(){ 
		$('#kecamatan').parent().show();
			$.ajax({
				type: "POST", 
				url: "<?=base_url()?>admin/login/getkecamatan", 
				data: {kota_id : $("#kabupatenkota").val()},
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){
					setTimeout(function(){
						$("#kecamatan").html(response.data_kecamatan).show();
					}, 10);
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(thrownError);
				}
			});		
	});

	$("#kecamatan").change(function(){ 
		$('#kelurahan').parent().show();
			$.ajax({
				type: "POST", 
				url: "<?=base_url()?>admin/login/getkelurahan", 
				data: {kec_id : $("#kecamatan").val()},
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){
					setTimeout(function(){
						$("#kelurahan").html(response.data_kelurahan).show();
					}, 10);
				},
				error: function (xhr, ajaxOptions, thrownError) {
					alert(thrownError);
				}
			});
	});

});
</script>
</body>
</html>
