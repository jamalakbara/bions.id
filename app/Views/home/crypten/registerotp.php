    <!--====== PAGE TITLE PART START ======-->
    
    <div class="page-title-area bg_cover" style="background-image: url(<?=base_url('assets/home/'.$config->template.'/')?>images/banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-title-content">
                        <span>REGISTRASI BIONS</span>
                        <h3 class="title">Formulir Aplikasi Pembukaan Rekening</h3>
                    </div>
                </div>
                <!--<div class="col-lg-6">
                    <div class="title-social d-flex justify-content-lg-end justify-content-start">
                        <div class="item">
                            <span>Share</span>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-github"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
        <div class="page-thumb">
            <img src="<?=base_url('assets/home/'.$config->template.'/')?>images/page-thumb-regist.png" alt="">
        </div>
    </div>
    
    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== BLOG PART START ======-->
    
    <section class="faq-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <!--<span>REGISTRASI BIONS</span>-->
                        <h3 class="title">Validasi Kode OTP<br/>(OTP Code Validation)</h3>
                        <!--<ul class="nav nav-pills" id="pills-tab-2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-a-tab" data-toggle="pill" href="#pills-a" role="tab" aria-controls="pills-a" aria-selected="true">Informasi Dasar</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-b-tab" data-toggle="pill" href="#pills-b" role="tab" aria-controls="pills-b" aria-selected="false">Informasi Tambahan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-c-tab" data-toggle="pill" href="#pills-c" role="tab" aria-controls="pills-c" aria-selected="false">Kuesioner</a>
                            </li>
                        </ul>-->
                    </div>
                    <div class="tab-content" id="pills-tabContent-2">
                        <div class="tab-pane fade show active" id="pills-a" role="tabpanel" aria-labelledby="pills-a-tab">

    <section class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
<?php 
	if($errorotp) {
		echo '<div class="alert alert-danger">';
		echo $errorotp;
		echo '</div>';
	}
?>
<p class="mb-20">Silahkan masukkan kode OTP yang telah dikirimkan ke email anda</p>
<p class="mb-20"><i>(Please enter OTP code that has been sent to your email)</i></p>
<?php
	echo validation_errors('<div class="alert alert-warning">','</div>');
	echo form_open('user/registerpersonal', 'class="form-horizontal"');
?>
                        <div class="contact-box">
<input type="hidden" name="reff" value="<?=$this->input->post('reff')?>">
<input type="hidden" name="nama_depan" value="<?=$this->input->post('nama_depan')?>">
<input type="hidden" name="nama_tengah" value="<?=$this->input->post('nama_tengah')?>">
<input type="hidden" name="nama_belakang" value="<?=$this->input->post('nama_belakang')?>">
<input type="hidden" name="nama_alias" value="<?=$this->input->post('nama_alias')?>">
<input type="hidden" name="warganegara" value="<?=$this->input->post('warganegara')?>">
<input type="hidden" name="negara" value="<?php if($this->input->post('warganegara') == 'WNI') { echo 'ID'; } else { echo $this->input->post('negara'); }?>">
<input type="hidden" name="email" value="<?=$this->input->post('email')?>">
<input type="hidden" name="handphone" value="<?=$this->input->post('handphone')?>">
<input type="hidden" name="rekening_efek" value="<?=$this->input->post('rekening_efek')?>">
<input type="hidden" name="tipe_layanan" value="<?=$this->input->post('tipe_layanan')?>">
<input type="hidden" name="cabang" value="<?=$this->input->post('cabang')?>">

  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">Kode OTP<br><i>OTP Code</i></label>
    <div class="col-sm-8">
      <input type="text" name="otp" class="form-control" placeholder="">
    </div>
  </div>
<a class="main-btn" role="button" href="#" onclick="document.getElementById('form-back').submit()">Back</a>
<button type="submit" class="main-btn">VERIFY  <i class="fal fa-arrow-right"></i></button>
                        </div>
<?php
	echo form_close();
?>

<?php
	echo form_open('user/register', 'class="form-horizontal" id="form-back"');
?>
<input type="hidden" name="reff" value="<?=$this->input->post('reff')?>">
<input type="hidden" name="nama_depan" value="<?=$this->input->post('nama_depan')?>">
<input type="hidden" name="nama_tengah" value="<?=$this->input->post('nama_tengah')?>">
<input type="hidden" name="nama_belakang" value="<?=$this->input->post('nama_belakang')?>">
<input type="hidden" name="nama_alias" value="<?=$this->input->post('nama_alias')?>">
<input type="hidden" name="warganegara" value="<?=$this->input->post('warganegara')?>">
<input type="hidden" name="negara" value="<?php if($this->input->post('warganegara') == 'WNI') { echo 'ID'; } else { echo $this->input->post('negara'); }?>">
<input type="hidden" name="email" value="<?=$this->input->post('email')?>">
<input type="hidden" name="handphone" value="<?=$this->input->post('handphone')?>">
<input type="hidden" name="rekening_efek" value="<?=$this->input->post('rekening_efek')?>">
<input type="hidden" name="tipe_layanan" value="<?=$this->input->post('tipe_layanan')?>">
<input type="hidden" name="cabang" value="<?=$this->input->post('cabang')?>">
<?php
	echo form_close();
?>

<br/><br/><br/>
<?php
	echo form_open('user/resendotp', 'class="form-horizontal"');
?>
<input type="hidden" name="nama_depan" value="<?=$this->input->post('nama_depan')?>">
<input type="hidden" name="nama_tengah" value="<?=$this->input->post('nama_tengah')?>">
<input type="hidden" name="nama_belakang" value="<?=$this->input->post('nama_belakang')?>">
<input type="hidden" name="warganegara" value="<?=$this->input->post('warganegara')?>">
<input type="hidden" name="negara" value="<?php if($this->input->post('warganegara') == 'WNI') { echo 'ID'; } else { echo $this->input->post('negara'); }?>">
<input type="hidden" name="email" value="<?=$this->input->post('email')?>">
<input type="hidden" name="handphone" value="<?=$this->input->post('handphone')?>">
<input type="hidden" name="rekening_efek" value="<?=$this->input->post('rekening_efek')?>">
<input type="hidden" name="tipe_layanan" value="<?=$this->input->post('tipe_layanan')?>">
<p><div id="ten-countdown"></div></p>
<?php
	echo form_close();
?>

				</div>
            </div>
        </div>
    </section>
                        </div>
                        <div class="tab-pane fade" id="pills-b" role="tabpanel" aria-labelledby="pills-b-tab">

                        </div>
                        <div class="tab-pane fade" id="pills-c" role="tabpanel" aria-labelledby="pills-c-tab">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== BLOG PART ENDS ======-->

<script>
function countdown( elementName, minutes, seconds )
{
    var element, endTime, hours, mins, msLeft, time;

    function twoDigits( n )
    {
        return (n <= 1 ? "0" + n : n);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        if ( msLeft < 1000 ) {
            element.innerHTML = "Time's up! Silahkan Kirim Ulang OTP <button type=\"submit\" class=\"main-btn\">Resend OTP  <i class=\"fal fa-arrow-right\"></i></button>";
        } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = 'Anda dapat mengirim ulang kode OTP dalam waktu : ' + (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }

    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();
}

countdown( "ten-countdown", 2, 0 );
</script>