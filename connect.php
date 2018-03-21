<?php

$host = 'localhost';
$dbname = 'netologi';
$user = 'root';
$pass = '';

$db = new PDO('mysql:host='.$host. ';dbname='. $dbname. ';charset=utf8',$user,$pass);
