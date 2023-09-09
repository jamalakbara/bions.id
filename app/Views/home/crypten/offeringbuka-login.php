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
                <div class="col-lg-8">
                    <div class="section-title text-center">                        
                        <h3 class="title">Login</h3>
                    </div>
                    <div class="tab-content" id="pills-tabContent-2">
                        <div class="tab-pane fade show active" id="pills-a" role="tabpanel" aria-labelledby="pills-a-tab">

    <section class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
<?php 
    if($this->session->flashdata('error')) {
        echo '<div class="alert alert-danger">';
        echo $this->session->flashdata('error');
        echo '</div>';
    }
?>

<?php 
    if($this->session->flashdata('login_error')) {
        echo '<div class="alert alert-danger">';
        echo $this->session->flashdata('login_error');
        echo '</div>';
    }
    if($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }
//  echo md5('malesngoding123');
?>

<?php
    echo validation_errors('<div class="alert alert-warning">','</div>');

    echo form_open('offeringbuka/loginaction', 'class="form-horizontal" onsubmit="return registerValidation();"');
?>
                        <div class="contact-box">
  
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">User ID</label>
    <div class="col-sm-8">
      <input type="text" name="userid" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);"  class="form-control" placeholder="" maxlength="10" value="<?=$this->input->post('userid')?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-4 col-form-label">PIN Trading</label>
    <div class="col-sm-8">
      <input type="password" name="pintrading" class="form-control" oninput="let p=this.selectionStart;this.setSelectionRange(p, p);"  maxlength="35" placeholder=""value="<?=$this->input->post('pintrading')?>" required>
    </div>
  </div>

    <button type="submit" class="main-btn">Login  <i class="fal fa-arrow-right"></i></button>
                        </div>
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
    