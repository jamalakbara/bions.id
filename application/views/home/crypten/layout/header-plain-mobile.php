
<header class="header-area">
    <div id="navbar">
        <div class="d-flex justify-content-between align-items-center" style="width: auto; display: inline-block;">
            <?php
                $logobnis = "logobnis-color.png";
                $logobions = "logobions-color.png";

                if(isset($_SESSION['theme'])){
                    if($_SESSION['theme'] == 'dark'){
                        $logobnis = "logobnis-white.png";
                        $logobions = "logobions-white.png";
                    }
                }
            ?>
            <div >
                <img class="responsive-img logo-img" src="<?=base_url('assets/home/'.$config->template.'/')?>images/<?= $logobions ?>" alt=""/>
            </div>

            <div>
                <img class="responsive-img logo-img" src="<?=base_url('assets/home/'.$config->template.'/')?>images/<?= $logobnis ?>" alt=""/>
            </div>
            

        </div>
       
    </div>
</header>

<div id="loading"></div>
<div id="reg-progress">
    <div class="progress">
      <div class="determinate" style="width: <?php echo (isset($progress) ? $progress:0) ?>%"></div>
    </div>
</div>