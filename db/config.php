<?php 
 $db = new mysqli('localhost','root','','payment');
 if($db->connect_errno){
 	die('Sorry, we are having some problems.');
 }