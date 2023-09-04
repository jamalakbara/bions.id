    <!--====== PAGE TITLE PART START ======-->
    
    <div class="page-title-area bg_cover" style="background-image: url(<?=base_url('assets/home/'.$config->template.'/')?>images/banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-title-content">
                        <span>Learning Centre</span>
                        <h3 class="title">WEBINAR EVENT</h3>
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
            <img src="<?=base_url('assets/home/'.$config->template.'/')?>images/page-thumb-event.png" alt="">
        </div>
    </div>
    
    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== BLOG PART START ======-->

    <section class="marketplace-area pt-180 pb-200">
        <div class="container">
	
<div class="container theme-showcase">
  <h1>Webinar Event Calendar</h1>
<div id="holder" class="row" ></div>
</div>

            </div>
        </div>
    </section>

    <section class="marketplace-area pt-180 pb-200">
	<div class="col-lg-6 col-md-6" style="float:none;margin:auto;">
        <div class="container" style="background: #ffffff; padding: 10px 10px 10px 10px;">
<div id="calendarIO"></div>
        </div>
	</div>
    </section>

    <section class="marketplace-area pt-180 pb-200">
        <div class="container">
            <!--<div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <span>Marketplace issues?</span>
                        <h3 class="title">Problems In Global Marketplace And Our Solutions</h3>
                    </div>
                </div>
            </div>-->
<?php
	foreach($event as $row) {
?>
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-7 order-lg-1 order-1">
                    <div class="marketplace-item mt-30">
						<table>
							<tr>
								<td width="35%"><img src="<?=base_url($row->image1)?>" alt=""></td>
								<td>
									<h3 class="title"><span><?=$row->tanggal?></span> | <?=$row->title?></h3>
									<?=$row->subtext?>
									<a class="main-btn main-btn-2" href="<?=base_url('event/detail/'.$row->id)?>">detail</a>
									<a href="<?=base_url('event/register/'.$row->id)?>" class="main-btn main-btn-2">Registrasi <?=$row->title?></a></p>
								</td>
							</tr>
						</table>
                    </div>
                </div>
			</div>
<?php
	}
?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination-area d-flex justify-content-start mt-50">
                        <nav aria-label="Page navigation ">
                          <ul class="pagination">
                            <?=$this->pagination->create_links();?>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
	
    <!--====== BLOG PART ENDS ======-->
