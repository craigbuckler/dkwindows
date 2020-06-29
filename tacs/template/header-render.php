[[<?php
// render variables
$cset = 'UTF-8';
mb_internal_encoding($cset);
mb_http_output($cset);
date_default_timezone_set('UTC');

global $host, $page, $url, $local, $root;
$host = $_SERVER['HTTP_HOST'];
$page = str_replace('?' . $_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']);
$url = 'http://' . $host . $page;
$local = (strpos($host , '.co') === false);
$root = ($local ? '/dkwindows/' : '/');
$COMPANY = 'DK Glass &amp; Windows';

// debug
define('DEBUG', $local);

// error handling
@error_reporting(DEBUG ? -1 : 0);
@ini_set('display_errors', DEBUG);
?>]][["menu.php"]]