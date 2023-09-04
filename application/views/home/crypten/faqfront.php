   
    <section class="faq-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-titles text-center">
                        <!--<span>Frequently Asked Questions</span>-->
                        <h3 class="title">Frequently Asked Questions</h3>
                        <!--<ul class="nav nav-pills" id="pills-tab-2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-a-tab" data-toggle="pill" href="#pills-a" role="tab" aria-controls="pills-a" aria-selected="true">general</a>
                            </li>
                        </ul>-->
                    </div>
                    <div class="tab-content" id="pills-tabContent-2">
                        <div class="tab-pane fade show active" id="pills-a" role="tabpanel" aria-labelledby="pills-a-tab">
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
                    </div>
                </div>
            </div>
        </div>
    </section>