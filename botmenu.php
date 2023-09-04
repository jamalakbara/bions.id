<?php
$con=mysqli_connect('localhost','root','','bions2020');
$sql10="select title from st_botmenu";
$res10=mysqli_query($con,$sql10);
$row10=mysqli_fetch_assoc($res10);
$wa=$row10[title'];
//echo $wa;
?>