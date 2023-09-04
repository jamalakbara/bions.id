    <header class="header-area">
        <div class="header-nav">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navigation">
                            <nav class="navbar navbar-expand-lg navbar-light ">
                                <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url('assets/home/'.$config->template.'/')?>images/logo.png" alt=""></a> <img class="logobni" src="<?=base_url('assets/home/'.$config->template.'/')?>images/logobnisek.png" alt=""><!-- logo -->
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button> <!-- navbar toggler -->
                                                                  
                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul class="navbar-nav m-auto">
<?php 
	$i = 1; 
	foreach($menu as $row) { 
		if(!$row->parentid) {
?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?=$row->url?>"><?=$row->title?></a>
<?php
			$child = $this->menu_model->getchild($row->id);
			if(count($child)>0) {
?>
                                            <ul class="sub-menu">
<?php 
				foreach($child as $rowc) { 
				$url = str_replace('bionsweb/', base_url(), $rowc->url);
?>
                                                <li><a href="<?=$url?>"><?=$rowc->title?></a></li>
<?php 
				}	
?>
                                            </ul>
<?php
			}
?>
                                        </li>
<?php
		}
	}
?>                                      
                                    </ul>
                                </div> <!-- navbar collapse -->
                                <div class="navbar-btn d-none d-sm-flex">
                                    <a class="main-btn" href="#">Register</a>
                                </div>
                            </nav>
                        </div> <!-- navigation -->
                    </div>
                </div>
            </div>
        </div>
    </header>