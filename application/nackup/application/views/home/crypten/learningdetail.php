    <div class="page-title-area page-title-2-area bg_cover" style="background-image: url(<?=base_url('assets/home/'.$config->template.'/')?>images/banner-bg.png);">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="page-title-content">
                        <span><?=$user->fullname?>    |    <?=$learning->tanggal?></span>
                        <h3 class="title"><?=$learning->title?></h3>
                    </div>
                </div>
                <div class="col-lg-6">
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
                </div>
            </div>
        </div>
    </div>
    <div class="page-title-thumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-thumb">
                        <img src="<?=base_url('images/learning/'.$learning->file_name)?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog-post-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-post-item">
                        <div class="blog-post-top-content">
                            <?=$learning->text?>
                        </div>
                        <div class="blog-post-tag">
                            <ul>
<?php
	$tags = explode(',',$learning->tag);
//	echo count($tags);
	for ($x = 0; $x < count($tags); $x++) {
		echo '<li><a href="#">'.$tags[$x].'</a></li>';
	}
?>
                            </ul>
                        </div>
                        <div class="blog-post-reading">
                            <div class="blog-title">
                                <h3 class="title">Related Tutorial</h3>
                            </div>
                            <div class="row justify-content-center">
<?php
	foreach($related as $rel) {
		$au = $this->user_model->detail($rel->author);
		$author = $au->fullname;
?>
                                <div class="col-lg-6 col-md-6 col-sm-8">
                                    <div class="blog-item mt-30">
                                        <div class="blog-thumb">
                                            <img src="<?=base_url('images/learning/'.$rel->file_name)?>" alt="">
                                        </div>
                                        <div class="blog-content text-center">
                                            <span><span><?=$author?></span>    |    <?=$rel->tanggal?></span>
                                            <a href="#"><?=$rel->title?></a>
                                        </div>
                                    </div>
                                </div>
<?php
	}
?>
                            </div>
                        </div>
                        <div class="blog-post-comments">
                            <div class="blog-title pb-55">
                                <h3 class="title">Author Detail</h3>
                            </div>
                            <div class="blog-comments-item">
                                <div class="item d-block d-sm-flex align-items-center">
                                    <div class="thumb">
<?php
	if($user->file_name) {
		echo '<img src="'.base_url('images/user/'.$user->file_name).'" alt="">';
	} else {
		echo '<img src="'.base_url('images/user/mybions.jpg').'" alt="">';
	}
?>
                                    </div>
                                    <div class="comments-content">
                                        <h4 class="title"><?=$user->fullname?></h4>
                                        <span><?=$user->jabatan?></span><br/>
                                        <?=$user->profil?>
                                        <!--<a class="main-btn" href="#">reply</a>-->
                                    </div>
                                </div>
                                <!--<div class="item d-block d-sm-flex align-items-center pl-100 center">
                                    <div class="thumb">
                                        <img src="assets/images/cmt-2.png" alt="">
                                    </div>
                                    <div class="comments-content">
                                        <h4 class="title">Jack William</h4>
                                        <span>June 19, 2019</span>
                                        <p>Couldn’t agree more Mark. It’s a must read for someone looking to understand the whole process.</p>
                                        <a class="main-btn" href="#">reply</a>
                                    </div>
                                </div>
                                <div class="item d-block d-sm-flex align-items-center">
                                    <div class="thumb">
                                        <img src="assets/images/cmt-3.png" alt="">
                                    </div>
                                    <div class="comments-content">
                                        <h4 class="title">Mark Robbin</h4>
                                        <span>June 19, 2019</span>
                                        <p>Very interesitng article. I must say your insights munc rhoncus felis eget nulla aliquet id fermentum est ucibus estibulum mcorper hendrerit.</p>
                                        <a class="main-btn" href="#">reply</a>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <!--<div class="blog-post-form">
                            <form action="#">
                                <div class="blog-title pb-55">
                                    <h3 class="title">Leave A Comment</h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box mt-10">
                                            <input type="text" placeholder="Name">
                                        </div>
                                        <div class="input-box mt-10">
                                            <input type="email" placeholder="Email Address">
                                        </div>
                                        <div class="input-box mt-10">
                                            <input type="text" placeholder="Website">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box item-2 mt-10">
                                            <textarea name="#" id="#" cols="30" rows="10" placeholder="Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-box text-center mt-20">
                                            <button class="main-btn" type="submit">post comment  <i class="fal fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="left:0px; top:350px;">
    <a class="a2a_button_facebook"></a>
    <a class="a2a_button_twitter"></a>
    <a class="a2a_button_pinterest"></a>
    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
</div>

<script async src="https://static.addtoany.com/menu/page.js"></script>