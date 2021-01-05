<?php
include_once 'phpqrcode.php';
QRcode::png( str_replace(array('[http]','[https]'), array('http://', 'https://'), urldecode($_GET['URL']) ), false, 6, 6);
?>