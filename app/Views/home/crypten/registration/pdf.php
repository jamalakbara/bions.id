<script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!--====== PAGE TITLE PART START ======-->
    
    <div class="page-title-area bg_cover" style="background-image: url(<?=base_url('assets/home/'.$config->template.'/')?>images/banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-title-content">
                        <span>Download</span>
                        <h3 class="title">Report PDF</h3>
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
                    
                    <div class="tab-content" id="pills-tabContent-2">
                        <div class="tab-pane fade show active" id="pills-a" role="tabpanel" aria-labelledby="pills-a-tab">

    <section>
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
	echo validation_errors('<div class="alert alert-warning">','</div>');

	echo form_open('/registration/download/report/pdf', array('class="form-horizontal"', 'method'=>'get'));
?>
                        <div class="contact-box">
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Form No</label>
    <div class="col-sm-8">
      <input type="text" name="formno" oninput="let p=this.selectionStart;this.value=this.value.toUpperCase();this.setSelectionRange(p, p);" class="form-control" placeholder="" maxlength="35" value="<?=$this->input->post('formno')?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-4 col-form-label">Email</label>
    <div class="col-sm-8">
      <input type="email" name="email" class="form-control" value="<?=$this->input->post('email')?>" >
    </div>
  </div>
  <div class="form-group row">
      <label class="col-sm-4 col-form-label" for="cabang">Cabang</label>
      <div class="col-sm-8">
        <select name="branch" class="form-control" required>
      <?php 
      foreach (Lookups::branch() as $key => $val)  {
      ?>

        <option value="<?=$key?>"><?=$val?></option>
      <?php
        }
      ?>
  </select>

            

    </div>
</div>
 
 
 
 


 
 
<button id="dwnldBtn" class="main-btn">Download  <i class="fal fa-arrow-right"></i></button>
                        </div>
<?php
	echo form_close();
?> 
                </div>
            </div>
        </div>
    </section>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== BLOG PART ENDS ======-->

<style>
    .nice-select{
        display: none;
    }

    select{
        display: block !important;
    }
</style>