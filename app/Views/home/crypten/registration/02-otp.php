<?php
  if(!$_SESSION['data']){
    redirect(base_url('registration/pra'));
  }
?>

<script>
    var base_url = '<?php echo base_url() ?>';
</script>

<style>
.input-otp {
  -webkit-transition: none;
  transition: none;
  text-align: center;
  background-color: #E4E4E4 !important;
  border-radius: .25rem!important;
}

.input-otp:focus {
  color: #3F4254;
  background-color: #ffffff;
  border:none !important;
  box-shadow:2px 4px #888888 !important;
  outline: 0 !important;
}

.input-otp{

}

#countdown > .btn{
  background-color: #FF7A00 !important;
}
</style>
<div class="row content">
<div id="app">


<form class="col s12">
  <section class="page-area">
   <div class="">
        <h4 class="page-title" id="page-title">Verifikasi OTP</h4>
        <div class="row">
          <p class="col" id="otp-desc">Masukkan kode verifikasi yang dikirim ke alamat email kamu</p>
        </div>

        <div class="row">
          <div class="col s2">
            <input class="input-otp" type="number" id="first" maxlength="1" autocomplete="off"/>
          </div>
          <div class="col s2">
            <input class="input-otp" type="number" id="second" maxlength="1" autocomplete="off"/>
          </div>
          <div class="col s2">
            <input class="input-otp" type="number" id="third" maxlength="1" autocomplete="off"/>
          </div>
          <div class="col s2">
            <input class="input-otp" type="number" id="fourth" maxlength="1" autocomplete="off"/>
          </div>
          <div class="col s2">
            <input class="input-otp" type="number" id="fifth" maxlength="1" autocomplete="off"/>
          </div>
          <div class="col s2">
            <input class="input-otp" type="number" id="sixth" maxlength="1" autocomplete="off"/>
          </div>
        </div>

        <div class="row">
          <div style="margin: 0 auto;" >
            <p id="countdown">Kirim ulang OTP dalam waktu 10:00</p>
          </div>
        </div>
    </div>
    
  </section>
</form>

</div>
</div>

<div class="row footer col s12 btn-footer">
  <a class="waves-effect waves-light btn col s12 white-text btn-nextstepotp">LANJUT</a>

</div>
      


<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/02-otp.js?v=<?= rand() ?>"></script>
<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/02-otp-validation.js?v=<?= rand() ?>"></script>
