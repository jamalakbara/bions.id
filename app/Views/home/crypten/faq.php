    <!--====== PAGE TITLE PART START ======-->
    
    <div class="page-title-area bg_cover" style="background-image: url(<?=base_url('assets/home/'.$config->template.'/')?>images/banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-title-content">
                        <span>Frequently Asked Question</span>
                        <h3 class="title">FAQ</h3>
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
            <img src="<?=base_url('assets/home/'.$config->template.'/')?>images/page-thumb-faq.png" alt="">
        </div>
    </div>
    
    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== BLOG PART START ======-->
    
    <section class="faq-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <span>our Knowledgebase</span>
                        <h3 class="title">Frequently Asked Questions</h3>
                        <ul class="nav nav-pills" id="pills-tab-2" role="tablist">
<?php
	$cnt1 = 0;
	foreach($categories as $row) { 
			if($cnt1 == 0) { $active = "active"; } else { $active = ""; }
?>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link <?=$active?>" id="pills-<?=$row->id?>-tab" data-toggle="pill" href="#pills-<?=$row->id?>" role="tab" aria-controls="pills-<?=$row->id?>" aria-selected="true"><?=$row->title?></a>
                            </li>
<?php
	$cnt1++;
	}
?>
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent-2">
<?php
	$cnt2 = 0;
	foreach($categories as $row) { 
		$faq = $this->faq_model->listingcat($row->id);
			if($cnt2 == 0) { $tabactive = "show active"; } else { $tabactive = ""; }
?>
                        <div class="tab-pane fade <?=$tabactive?>" id="pills-<?=$row->id?>" role="tabpanel" aria-labelledby="pills-<?=$row->id?>-tab">
                            <div class="faq-accordion">
                                <div class="accrodion-grp"  data-grp-name="faq-accrodion">
<?php
		$cnt3 = 0;
		foreach($faq as $rowfaq) { 
			if($cnt3 == 0) { $listactive = "active"; } else { $listactive = ""; }
?>
                                    <div class="accrodion <?=$listactive?>  animated wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="0ms">
                                        <div class="accrodion-inner">
                                            <div class="accrodion-title">
                                                <h4><?=$rowfaq->question?>?</h4>
                                            </div>
                                            <div class="accrodion-content">
                                                <div class="inner">
                                                    <?=$rowfaq->answer?>
                                                </div><!-- /.inner -->
                                            </div>
                                        </div><!-- /.accrodion-inner -->
                                    </div>
<?php
		$cnt3++;
		}
?>
                                </div>
                            </div>
                        </div>
<?php
	$cnt2++;
	}
?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--====== BLOG PART ENDS ======-->
