    <!--====== PAGE TITLE PART START ======-->
    
    <div class="page-title-area bg_cover" style="background-image: url(<?=base_url('assets/home/'.$config->template.'/')?>images/banner-bg.png);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content">
                        <span>Learning Centre</span>
                        <h3 class="title"><?=strtoupper($category->title)?></h3>
                        <form action="#">
                            <div class="input-box">
                                <i class="far fa-search"></i>
                                <input type="text" placeholder="search">
                            </div>
                            <div class="item-1">
                                <select>
                                    <option value="0">Category</option>
<?php
	foreach($catmenu as $cat) {
?>
                                    <option value="<?=$cat->id?>"><?=$cat->title?></option>
<?php
	}
?>
                                </select>
                            </div>
                            <!--<div class="item-2">
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
            <img src="<?=base_url('assets/home/'.$config->template.'/')?>images/page-thumb.png" alt="">
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
                    <div class="blog-item mt-30">
                        <div class="blog-thumb">
                            <img src="<?=base_url('images/learning/'.$row->file_name)?>" alt="<?=$row->title?>">
                        </div>
                        <div class="blog-content text-center">
                            <span><span><?=$author?></span>    |    <?=$row->tanggal?></span>
                            <a href="<?=base_url('learning/detail/'.$row->id)?>"><?=$row->title?></a>
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
						<?=$this->pagination->create_links();?>	
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--====== BLOG PART ENDS ======-->
