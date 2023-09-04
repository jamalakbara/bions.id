<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include('database.inc.php');
$txt=mysqli_real_escape_string($con,$_POST['txt']);
$name=mysqli_real_escape_string($con,$_POST['name']);
//$email=mysqli_real_escape_string($con,$_POST['email']);
//$hp=mysqli_real_escape_string($con,$_POST['handphone']);
$sql10="select wa from st_config";
$res10=mysqli_query($con,$sql10);
$row10=mysqli_fetch_assoc($res10);
$wa=$row10['wa'];

$botid=mysqli_real_escape_string($con,$_POST['sessid']);
$sql="select reply from st_chatbot_hints where question like '%$txt%' AND reply IS NOT NULL";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
	$row=mysqli_fetch_assoc($res);
	$html=$row['reply'];
}else{
	mysqli_query($con,"insert into st_chatbot_hints(question) values('$txt')");
//	$html='Maaf kami tidak dapat memahami chat Anda, bila anda membutuhkan jawaban terperinci silahkan hubungi customer service kami di <a style="color:black;" target="_blank" class="text-black" href="https://web.whatsapp.com/send?phone=62895395283995&amp;text=Halo%20Sateja%2C%20saya%20mau%20tanya">Customer Service 1</span></a>';
	$html='Hmmm ... Dapatkah kamu memberitahu Dina apa yang sedang kamu cari?<br/><br/>';
	$sql2="select id, pilihan from st_pilihan";
	$res2=mysqli_query($con,$sql2);
//	$row2=mysqli_fetch_assoc($res2);
	while ($field = mysqli_fetch_assoc($res2)) {
		$html .= '<a onclick="send_pilihan('.$field['id'].')" href="#" >'.$field['pilihan'].'</a><br/>';
	}
	$html .= '<br/>Mau disambungkan dengan staff kami? <a style="color:black; text-decoration: underline;" target="_blank" class="text-black" href="https://web.whatsapp.com/send?phone='.$wa.'&amp;text=Halo%20Dina%2C%20saya%20ingin%20bertanya%20mengenai%20bions.id">Staff Marketing</span></a>';
}
$added_on=date('Y-m-d H:i:s');
mysqli_query($con,"insert into st_message(message,added_on,type,botid) values('$txt','$added_on','$name','$botid')");
$added_on=date('Y-m-d H:i:s');
mysqli_query($con,"insert into st_message(message,added_on,type,botid) values('$html','$added_on','bot','$botid')");
echo $html;
?>