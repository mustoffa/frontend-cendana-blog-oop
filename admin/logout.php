<?php
include_once('../config/config.php');

//log user out
$user->logout();
header('Location: index.php'); 

?>