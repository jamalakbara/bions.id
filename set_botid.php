<?php
date_default_timezone_set('Asia/Jakarta');
include('database.inc.php');
$sessid=mysqli_real_escape_string($con,$_POST['sessid']);
$name=mysqli_real_escape_string($con,$_POST['name']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$hp=mysqli_real_escape_string($con,$_POST['hp']);
mysqli_query($con,"insert into st_messagemaster(botid,nama,email,handphone,added_on) values('$sessid','$name','$email','$handphone','$added_on')");
$html = 'session set';
echo $html;
?>