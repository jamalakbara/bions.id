    <section class="blog-area">
        <div class="container">
            <!--<div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <span>Marketplace issues?</span>
                        <h3 class="title">Problems In Global Marketplace And Our Solutions</h3>
                    </div>
                </div>
            </div>-->
            <div id="freetrial" class="row justify-content-center">
                <div class="col-lg-12 col-md-7 order-lg-1 order-1">
                    <div class="marketplace-item mt-30 text-center">
						<div class="row">
							<div class="col-sm-3 align-self-center">
							<img height="100" src="<?=base_url('images/trialaccount.png')?>" />
							</div>
							<label class="col-sm-5 align-self-center control-label normal">
							<h3 class="title">Subscribe to our FREE TRIAL</h3>
									<p>Get the latest information on your inbox.</p>
							</label>
							<div class="col-sm-4 align-self-center">
<?php
	// echo validation_errors('<div class="alert alert-warning">','</div>');
	// echo form_open('user/registertrial', 'class="form-horizontal"');
?>
<div class="input-group mb-3">
  <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
</div>
<div class="input-group mb-3">
  <input type="text" class="form-control" name="handphone" placeholder="Handphone" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
</div>
<div class="input-group mb-3">
  <input type="email" class="form-control" name="email" placeholder="Alamat Email" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
  <div class="input-group-append">
    <button style="color: white;" class="btn btn-outline-secondary btn-primary" type="submit"><i class="fal fa-arrow-right"></i> Subscribe</button>
  </div>
</div>
<?php
	// echo form_close();
?> 

							</div>
						</div>

                    </div>
                </div>
			</div>

        </div>
    </section>