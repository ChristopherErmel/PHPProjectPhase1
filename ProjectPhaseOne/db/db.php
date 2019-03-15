<?php 

//127.0.0.1:52546 azure 6#vWHD_$
//localhost:3306 root 
	$conn = new PDO('mysql:host=127.0.0.1:52546;dbname=usersinfo', 'azure', '6#vWHD_$'); //used for pdo
	$con = new mysqli("127.0.0.1:52546", "azure", "6#vWHD_$", "usersinfo"); //used for getting last id with mysqli
 ?>

