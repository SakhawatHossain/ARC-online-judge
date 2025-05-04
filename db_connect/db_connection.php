<?php


$conn = mysqli_connect('localhost', 'root', '', 'arcoj');


if(!$conn){
	echo 'Connection erron: '.mysqli_connect_error();
}


?>