<div class="row content" style="vertical-align: middle;">
<div id="app">

<form class="col s12">
  <section class="page-area">
      <div >
        
          <div>
            <div class="text-center teal-text lighten-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
              </svg>
            </div>            

            <div class="text-center mb-30">
                <h5>Terima Kasih <br/><br/>
              Rekening investasi kamu akan segera diproses
            </h5>
            </div>
            <div class="card-panel teal lighten-1" style="border-radius: 20px; padding-top:15px; padding-bottom:30px; padding-right: 40px; padding-left: 40px;">
              <h5 class="white-text text-center">
              Nomor Registrasi <br/>
              <strong><?php echo $_SESSION['data']['formno']?></strong>
              </h5>

              <div class="white-text text-center mt-20" style="font-size: 15px;">
                  Kami akan mengirimkan notifikasi pembukaan rekening investasi ke alamat email yang kamu daftarkan
              </div>
            </div>

            <div class="text-center mt-20">
              <p><a href="https://help.bions.id" target="_blank"><u>Yuk, kenalan dengan BIONS di sini</u></a></p>
            </div>

          </div>
        
      </div>
      
  </section>

</form>

</div>
</div>
<div class="row footer col s12 btn-footer">
  <a class="waves-effect waves-light btn col s12 white-text btn-thankyou">SELESAI</a>
</div>

<script src="<?=base_url('assets/home/'.$config->template.'/')?>js/registration/15-thankyou.js?v=<?= rand() ?>"></script>
