    <!--====== PAGE TITLE PART START ======-->
    
    <div class="page-title-area bg_cover" style="background-image: url(<?= '/assets/home/'.$config['template'].'/'?>images/banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <span>Learning Center</span>
                        <h1 class="title"><?=strtoupper($category['title'])?></h1>
                        <form method="post" action="<?=base_url('edukasi/search')?>">
                            <div class="input-box">
                                <i class="far fa-search"></i>
                                <input type="text" name="search" placeholder="search">
								<input type="hidden" name="catid" value="<?=$catid?>" placeholder="search">
                            </div>
                            <!--<div class="item-1">
                                <select>
                                    <option value="0">Category</option>
<?php
	foreach($catmenu as $cat) {
?>
                                    <option value="<?=$cat['id']?>"><?=$cat['title']?></option>
<?php
	}
?>
                                </select>
                            </div>
                            <div class="item-2">
                                <select>
                                    <option value="1">archive  </option>
                                    <option value="2">Technology</option>
                                    <option value="3">Blockchain</option>
                                    <option value="4">Cryptocurrency</option>
                                    <option value="5">Consulting</option>
                                    <option value="6">The Future</option>
                                </select>
                            </div>
                            <div class="item-3">
                                <select>
                                    <option value="1">Type </option>
                                    <option value="2">Technology</option>
                                    <option value="3">Blockchain</option>
                                    <option value="4">Cryptocurrency</option>
                                    <option value="5">Consulting</option>
                                    <option value="6">The Future</option>
                                </select>
                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-thumb">
            <img src="<?= '/assets/home/'.$config['template'].'/' ?>images/page-thumb.png" alt="">
        </div>
    </div>
    
    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== BLOG PART START ======-->
    
    <div class="blog-area blog-page">
        <div class="container">
            <div class="row justify-content-center">
<?php
	foreach($learning as $row) { 
		$au = $this->user_model->detail($row->author);
		$author = $au->fullname;
?>
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog-item mt-30" style="height: 100% !important;">
                        <div class="blog-thumb" style="height: 37% !important; background-color: white !important;">
                            <img src="<?=base_url('images/learning/'.$row['file_name'])?>" alt="<?=$row['title']?>">
                        </div>
                        <div class="blog-content text-center" style="height: 57% !important;">
                            <span><span><?=$author?></span>    |    <?=$row['tanggal']?></span>
                            <br/>
                            <a href="<?php 
										if ($row['catid'] == 1) {
											echo base_url('edukasi/saham/'.$row['url']);
										} else if($row['catid'] == 2){
											echo base_url('edukasi/reksadana/'.$row['url']);
										} else if($row['catid'] == 3){
											echo base_url('edukasi/fixedincome/'.$row['url']);
										} else if($row['catid'] == 4){
											echo base_url('edukasi/video/'.$row['url']);
										}else if($row['catid'] == 13){
											echo base_url('edukasi/marketupdate/'.$row['url']);
										}
									?>"><?=$row['title']?></a>
                        </div>
                    </div>
                </div>
<?php
	}
?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination-area d-flex justify-content-start mt-50">					
                        <nav aria-label="Page navigation ">
						
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--====== BLOG PART ENDS ======-->
