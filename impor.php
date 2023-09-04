<?php
// connecting dB
$mysqli = new mysqli('localhost','root','','ci_bions');

$file = fopen("bank.csv","r");
while(!feof($file))
  {
  $data = fgetcsv($file,1000,';');
//  echo count($data);
	for($field=0;$field<count($data);$field++){
//	if($field>0) { $data_ins = ", "; }
	$data_ins .= "'" . $data[$field]."'";
}
	echo $data_ins.'<br/>';
  }

fclose($file);
exit();

// opening csv
$fp = fopen('bank.csv','r');
$data = fgetcsv($fp);
echo count($data);
for($field=0;$field< count($data);$field++){
//	$col_ins = "'" . $col[$field] . "' , " . $col_ins;
	echo "'" . $col[$field] . "' , " . $col_ins;
}
//print_r(fgetcsv($fp,1000,';'));
//fclose($fp);
exit();
// creating a blank string to store values of fields of first row, to be used in query
$col_ins = '';

// creating a blank string to store values of fields after first row, to be used in query
$data_ins = '';

// read first line and get the name of fields
//$data = fgetcsv($fp);
//for($field=0;$field< count($data);$field++){
//    $col_ins = "'" . $col[$field] . "' , " . $col_ins;
//}

// reading next lines and insert into dB
while($data=fgetcsv($fp,1000,';')){
//	print_r($data);
    for($field=0;$field<count($data);$field++){
        $data_ins = "'" . $data[$field] . "' , " . $data_ins;
    }
	$col_ins = "'BANKID','BANKNAME','BANKIDKPEI','REFBANK','CODE','CODE_BI','MSB_ID','CODE_ARIA','NOURUT'";
    $query = "INSERT INTO `st_bank` (".$col_ins.") VALUES(".$data_ins.")";
	echo $query.'<br/>';
//    $mysqli->query($query);
}    
echo 'Imported...';