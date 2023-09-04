    <section class="benefits-area pt-50 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="benefits-title text-center">
                        <!--<span>Mengapa Memilih BIONS ?</span>
                        <h3 class="titles">Mengapa Memilih BIONS ?</h3>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="benefits-item item-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="benefits-item-content">
                            <h3 class="title"><?=$bions->bions?></h3>
                            <p><a href="https://apps.apple.com/de/app/bions-mobile/id1469177051"><img style="margin: 10px;" src="<?=base_url($bions->appstoreimg)?>" alt="thumb"></a><a href="https://play.google.com/store/apps/details?id=id.zaisan.android"><img style="margin: 10px;" src="<?=base_url($bions->pstoreimg)?>" alt="thumb"></a></p><br/><br/><br/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="benefits-item-content">

								<div class="panel5">
									<!--<div class="panel-heading">
                                        
                                        <span style="color: #003d79" id="dsoIHSG">IHSG</span> &nbsp;
                                        <span style="color:#57481e;" id="dsoIHSGLast">5,059.22</span>  &nbsp;
                                        <span style="color:#1c8713;" id="dsoIHSGChg"><i class="fa fa-arrow-up"></i> 20.82</span> &nbsp;
                                        <span style="color: rgb(28, 135, 19);" id="dsoIHSGChgPercent"><i class="fa fa-arrow-up"></i> 0.41%</span>&nbsp;
                                        <span class="pull-right" style="color:#003d79;" id="dsoIHSGtime">15:12:54</span>
									</div>-->
									<div class="panel-body">
										<div class="tabpanel5" role="tabpanel">
											<!-- Nav tabs -->
											<ul class="nav nav-pills5" role="tablist">
												<li role="presentation" class="active"><a href="#MostActive" aria-controls="MostActive" role="tab" data-toggle="tab">Most Active</a></li>
												<li role="presentation"><a href="#TopGainer" aria-controls="TopGainer" role="tab" data-toggle="tab">Top Gainer</a></li>
												<li role="presentation"><a href="#TopVolume" aria-controls="TopVolume" role="tab" data-toggle="tab">Top Volume</a></li>
												<li role="presentation"><a href="#TopLoser" aria-controls="TopLoser" role="tab" data-toggle="tab">Top Loser</a></li>
											</ul>
											<!-- Tab panes -->
											<div class="tab-content">
												<div role="tabpanel" class="tab-pane active" id="MostActive">

<?php

function sortBymostactive($a, $b)
{
    $a = $a[12];
    $b = $b[12];

    if ($a == $b) return 0;
    return ($a > $b) ? -1 : 1;
}

function sortBytopgainer($a, $b)
{
    $a = $a[20];
    $b = $b[20];

    if ($a == $b) return 0;
    return ($a > $b) ? -1 : 1;
}

function sortBytopvolume($a, $b)
{
    $a = $a[10];
    $b = $b[10];

    if ($a == $b) return 0;
    return ($a > $b) ? -1 : 1;
}

function sortBytoploser($a, $b)
{
    $a = $a[20];
    $b = $b[20];

    if ($a == $b) return 0;
    return ($a < $b) ? -1 : 1;
}
$url = 'https://stock.bions.id/zaisan/web/ws/data/aggregate?q=MRD';
//$url = 'https://bions.id/zaisan/web/ws/data/aggregate?q=MRD'; // path to your JSON file
//$url = 'http://satejatechnology.com/bionswork/data/';
$arrindices = array();
$inc = 0;
$data = file_get_contents($url); // put the contents of the file into a variable
$json  = json_decode($data); // decode the JSON feed

//echo $json;
foreach ($json->data as $indices) {
//	echo $indices[0][0] . '<br>';
	foreach ($indices as $k => $v) {
//		echo $k.'='.$v[0].'<br/>';
	}
//echo $indices[0][0] . '<br>';
$cntarr = 0;
if($indices) {
if($indices[0][0] == 'SS') { 
//echo '<table class="table table5"><tbody>';
//echo '<tr class="titles"><td>Stock</td><td>Last</td><td>Change</td><td>Open</td></tr>';
}
}
if($indices) {
foreach ($indices as $k1) {
	if(count($k1) > 12) {
	if(is_array($k1)) {
//		echo ">>".$k1[0]. '<br>';
		if($k1[0] == 'SS') {
//		$cntarr = count($k1);
//		echo count($k1). '=<br>';
//		array_merge($arrindices,$k1);
//echo '<tr><td>'.$k1[2].'</td><td>'.number_format($k1[8]).'</td><td>'.number_format($k1[9]).'</td><td>'.number_format($k1[15]).'</td></tr>';
		$arrindices[$inc][0] = $k1[0];
		$arrindices[$inc][1] = $k1[1];
		$arrindices[$inc][2] = $k1[2];
		$arrindices[$inc][3] = $k1[3];
		$arrindices[$inc][4] = $k1[4];
		$arrindices[$inc][5] = $k1[5];
		$arrindices[$inc][6] = $k1[6];
		$arrindices[$inc][7] = $k1[7];
		$arrindices[$inc][8] = $k1[8];
		$arrindices[$inc][9] = $k1[9];
		$arrindices[$inc][10] = $k1[10];
		$arrindices[$inc][11] = $k1[11];
		$arrindices[$inc][12] = $k1[12];
		$arrindices[$inc][13] = $k1[13];
		$arrindices[$inc][14] = $k1[14];
		$arrindices[$inc][15] = $k1[15];
		$arrindices[$inc][16] = $k1[16];
		$arrindices[$inc][17] = $k1[17];
		$arrindices[$inc][18] = $k1[18];
		$arrindices[$inc][19] = $k1[19];
		$arrindices[$inc][20] = $k1[20];
//		usort($arrindices,);
//echo '<tr><td>'.$arrindices[$inc][2].'</td><td>'.number_format($arrindices[$inc][8]).'</td><td>'.number_format($arrindices[$inc][9]).'</td><td>'.number_format($arrindices[$inc][15]).'</td></tr>';
		foreach ($k1 as $k2) {			
//			if($k2 = 'SS') {
//			echo '<td>BBCA</td>';
//echo '<tr><td>BBCA</td><td>28,150</td><td><span>-2.17%</span></td><td>28,625</td></tr>';
//			 echo ">>".$k2. '<br>';
//			}
		}	

		}
	} else {
		echo '=====================<br>';
	}
	}
	$inc++;
}
}
if($indices) {
if($indices[0][0] == 'SS') { 
//		echo '</tr>';
//echo '</tbody></table>';
}
}
//	echo $indices[0][3] . '<br>';
//	print_r($indices);
}

//foreach ($json->data as $k => $v) {
//	echo $k."=".$v . '<br>';
//}

//echo count($json->data);
// print_r($arrindices);
//echo count($arrindices);

usort($arrindices, 'sortBymostactive');
//print_r($arrindices);
echo '<table class="table table5"><tbody>';
echo '<tr class="titles"><td>Stock</td><td>Last</td><td>Change</td><td>Open</td></tr>';
$i = 0;
foreach ($arrindices as $k3) {
//	if ($i < yourlimitnumber) {
echo '<tr><td>'.$k3[2].'</td><td>'.number_format($k3[8]).'</td><td>'.number_format($k3[9]).'</td><td>'.number_format($k3[15]).'</td></tr>';
//}
if (++$i == 9) break;
}
//for ($x = 0; $x <= 10; $x++) {
//echo '<tr><td>'.$arrindices[2].'</td><td>'.number_format($arrindices[8]).'</td><td>'.number_format($arrindices[9]).'</td><td>'.number_format($arrindices[15]).'</td><td>'.number_format($arrindices[12]).'</td><td>'.number_format($arrindices[10]).'</td><td>'.number_format($arrindices[20]).'</td></tr>';
//}
		echo '</tr>';
echo '</tbody></table>';


?>
												
												</div>
												<div role="tabpanel" class="tab-pane" id="TopGainer">
<?php 
usort($arrindices, 'sortBytopgainer');
//print_r($arrindices);
echo '<table class="table table5"><tbody>';
echo '<tr class="titles"><td>Stock</td><td>Last</td><td>Change</td><td>Open</td></tr>';
$i = 0;
foreach ($arrindices as $k3) {
//	if ($i < yourlimitnumber) {
echo '<tr><td>'.$k3[2].'</td><td>'.number_format($k3[8]).'</td><td>'.number_format($k3[9]).'</td><td>'.number_format($k3[15]).'</td></tr>';
//}
if (++$i == 9) break;
}
//for ($x = 0; $x <= 10; $x++) {
//echo '<tr><td>'.$arrindices[2].'</td><td>'.number_format($arrindices[8]).'</td><td>'.number_format($arrindices[9]).'</td><td>'.number_format($arrindices[15]).'</td><td>'.number_format($arrindices[12]).'</td><td>'.number_format($arrindices[10]).'</td><td>'.number_format($arrindices[20]).'</td></tr>';
//}
		echo '</tr>';
echo '</tbody></table>';
?>
												</div>

												<div role="tabpanel" class="tab-pane" id="TopVolume">
<?php 
usort($arrindices, 'sortBytopvolume');
//print_r($arrindices);
echo '<table class="table table5"><tbody>';
echo '<tr class="titles"><td>Stock</td><td>Last</td><td>Change</td><td>Open</td></tr>';
$i = 0;
foreach ($arrindices as $k3) {
//	if ($i < yourlimitnumber) {
echo '<tr><td>'.$k3[2].'</td><td>'.number_format($k3[8]).'</td><td>'.number_format($k3[9]).'</td><td>'.number_format($k3[15]).'</td></tr>';
//}
if (++$i == 9) break;
}
//for ($x = 0; $x <= 10; $x++) {
//echo '<tr><td>'.$arrindices[2].'</td><td>'.number_format($arrindices[8]).'</td><td>'.number_format($arrindices[9]).'</td><td>'.number_format($arrindices[15]).'</td><td>'.number_format($arrindices[12]).'</td><td>'.number_format($arrindices[10]).'</td><td>'.number_format($arrindices[20]).'</td></tr>';
//}
		echo '</tr>';
echo '</tbody></table>';
?>												
												</div>

												<div role="tabpanel" class="tab-pane" id="TopLoser">
<?php 
usort($arrindices, 'sortBytoploser');
//print_r($arrindices);
echo '<table class="table table5"><tbody>';
echo '<tr class="titles"><td>Stock</td><td>Last</td><td>Change</td><td>Open</td></tr>';
$i = 0;
foreach ($arrindices as $k3) {
//	if ($i < yourlimitnumber) {
echo '<tr><td>'.$k3[2].'</td><td>'.number_format($k3[8]).'</td><td>'.number_format($k3[9]).'</td><td>'.number_format($k3[15]).'</td></tr>';
//}
if (++$i == 9) break;
}
//for ($x = 0; $x <= 10; $x++) {
//echo '<tr><td>'.$arrindices[2].'</td><td>'.number_format($arrindices[8]).'</td><td>'.number_format($arrindices[9]).'</td><td>'.number_format($arrindices[15]).'</td><td>'.number_format($arrindices[12]).'</td><td>'.number_format($arrindices[10]).'</td><td>'.number_format($arrindices[20]).'</td></tr>';
//}
		echo '</tr>';
echo '</tbody></table>';
?>
												</div>

											</div>
										</div>
										<div class="info"> &nbsp; </div>
									</div>
								</div>
<!-- ============================= -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>