<?php

$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'php');

 if($con){
 //echo "conn";
 }else
 {
 	echo 'conect no';
 }
?>