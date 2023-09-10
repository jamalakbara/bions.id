<footer class="footer-area">
        <div class="container">
            <div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
          <img src="<?= '/images/bions-white-logo.png' ?>" alt="thumb">
					<p style="color: white; margin-top: 20px;">BNI Sekuritas berizin dan diawasi oleh Otoritas Jasa Keuangan</p>

				</div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-list mt-30">
                        <h4 class="title">legal</h4>
                        <ul>
<?php 
	$i = 1; 
	foreach($botmenu as $row) { 
			if($row["newtab"]) { $newtab = 'target="_blank"'; } else { $newtab = ''; }
?>
                            <li><a <?=$newtab?> href="<?=$row["url"]?>"><?=$row["title"]?></a></li>
                                        <li>
<?php
	}
?>   
                        </ul>
                    </div>                
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-list mt-30">
                        <h4 class="title">HUBUNGI KAMI</h4>
						<p style="color: white;" >Telp. 021 2554-3946<br/>
						   Fax. 021 5793-5831
						</p><br/>
						<img src="<?= '/images/14016.png' ?>" alt="thumb">
                    </div>                
                </div>
			</div>
        </div>
    </footer>
    <footer style="background: #003535; margin-top: 0px; padding-top: 0px;" class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="margin-top: 50px; padding-top: 0px;" class="footer-copyright d-flex justify-content-sm-between justify-content-center align-items-center">
                        <p style="color: white;" >Copyright &copy; 2020. PT. BNI Sekuritas is a subsidiary of PT.Bank Negara Indonesia (Persero) Tbk</p>
                        <ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>