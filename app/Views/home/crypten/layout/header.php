    <header class="header-area">
        <div class="header-nav">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navigation">
                            <nav class="navbar navbar-expand-lg navbar-light ">
                                <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url('assets/home/'.$config['template'].'/')?>images/logo.png" alt=""></a> <a class="navbar-brand" href="https://www.bnisekuritas.co.id/"><img class="logobni1" src="<?=base_url('assets/home/'.$config['template'].'/')?>images/logobnisek.png" alt=""></a><!-- logo -->
								<span class="register-btn d-sm-flex" ><a href="https://bions.id/registration"><img src="<?=base_url()?>images/iconregist2.png" height="40" alt=""></a></span>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button> <!-- navbar toggler -->
                                                                  
                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul class="navbar-nav m-auto">
<a class="navbar-brand" href="<?=base_url()?>"><img class="logobni2" src="<?=base_url('assets/home/'.$config['template'].'/')?>images/logobnisek.png" alt=""></a>
<?php 
	$i = 1; 
	foreach($menu as $row) { 
		if(!$row["parentid"]) {
			if($row["newtab"]) { $newtab = 'target="_blank"'; } else { $newtab = ''; }
?>
                                        <li class="nav-item">
                                            <a <?=$newtab?> class="nav-link" href="<?=$row["url"]?>"><?=$row["title"]?></a>
<?php
			$child = $menuModel->getChild($row["id"]);
			if(count($child)>0) {
?>
                                            <ul class="sub-menu">
<?php 
				foreach($child as $rowc) { 
				$url = str_replace('bionsweb/', base_url(), $rowc["url"]);
					if($rowc["newtab"]) { $newtab2 = 'target="_blank"'; } else { $newtab2 = ''; }
?>
                                                <li><a <?=$newtab2?> href="<?=$url?>"><?=$rowc["title"]?></a></li>
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
                                    <a class="main-btn" href="https://app.bions.id/reg/lets-get-started/wb">Register</a>
                                </div>
                            </nav>
                        </div> <!-- navigation -->
                    </div>
                </div>
            </div>
                                <!--<center><div class="register-btn d-sm-flex">
                                    <a class="main-btn" href="https://bions.id/registration">Register</a>
                                </div></center>-->
        </div>
    </header>