kenapa
<?php
echo test
$url = 'https://bions.id/zaisan/web/ws/data/aggregate?q=MRD'; // path to your JSON file

$data = file_get_contents($url); // put the contents of the file into a variable
$json  = json_decode($data); // decode the JSON feed

//echo $json;

foreach ($json->data as $indices) {
//	echo count($indices) . '<br>';
foreach ($indices as $k1) {
	if(is_array($k1)) {
		echo count($k1). '=<br>';
		foreach ($k1 as $k2) {
//			if($k2 = 'SS')
			echo $k2. '<br>';
		}	
	} else {
		echo '=====================<br>';
	}
}

//	echo $indices[0][3] . '<br>';
//	print_r($indices);
}

//foreach ($json->data as $k => $v) {
//	echo $k."=".$v . '<br>';
//}

//echo count($json->data);
// print_r($json);
