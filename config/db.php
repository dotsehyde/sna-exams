<?php

$conn = mysqli_connect('localhost', 'root', 'root', 'sna');

if(!$conn){
	echo 'Connection error: ' . mysqli_connect_error();
}