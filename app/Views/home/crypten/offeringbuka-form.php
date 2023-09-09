

    <!--====== PAGE TITLE PART START ======-->
    
    <div class="page-title-area bg_cover" style="background-image: url(<?=base_url('assets/home/'.$config->template.'/')?>images/banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-title-content">
                        <span>IPO</span>
                        <h3 class="title">Penawaran Umum IPO Bukalapak</h3>
                    </div>
                </div>

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
                <div class="col-lg-12">
                    
                    <div class="tab-content" id="pills-tabContent-2">
                        <div class="tab-pane fade show active" id="pills-a" role="tabpanel" aria-labelledby="pills-a-tab">

    <section >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

<?php
    echo validation_errors('<div class="alert alert-warning">','</div>');
?>
    <span class="btn btn-default btn-flat"> <?php echo "Selamat Datang " . strtoupper($this->session->userdata('userid')) . "  |  " ?>
  <a href="<?=base_url()?>offeringbuka/logout" >Sign out</a>
  </span>
                <div class="contact-box">
                    <div class="row-container">
            <div class="second-row">
                    <div prefill-inherit data-paperform-id="dezxh5iq" prefill="90kot=<?php echo strtoupper($this->session->userdata('userid')); ?>"></div><script>(function() {var script = document.createElement('script'); script.src = "https://paperform.co/__embed.min.js"; document.body.appendChild(script); })()</script>
                    </div>
                    </div>
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
    
