<?php
// redirect URL
$page = strtolower(str_replace($root, '', $page));
$url = '';

// redirects
$redir = array(

	'index' => '',
	'news' => '',
	'service' => 'services',
	'product' => 'services',
	'install' => 'services',
	'window' => 'services/replacement-windows-installation',
	'door' => 'services/replacement-doors-installation',
	'repair' => 'services/window-door-repair',
	'conserv' => 'services/conservatory-installation',
	'glass' => 'services/glass-work',
	'glaz' => 'services/glass-work',
	'gutter' => 'services/facias-soffits-guttering',
	'soffit' => 'services/facias-soffits-guttering',
	'fac' => 'services/facias-soffits-guttering',
	'portfolio' => 'case-studies',
	'example' => 'case-studies',
	'stud' => 'case-studies',
	'testimonial' => 'case-studies',
	'custom' => 'case-studies',
	'about' => 'exmouth-window-company',
	'us' => 'exmouth-window-company',
	'company' => 'exmouth-window-company',
	'promise' => 'exmouth-window-company/promise-guarantee',
	'rant' => 'exmouth-window-company/promise-guarantee',
	'call' => 'contact-dk-windows',
	'contact' => 'contact-dk-windows',
	'mail' => 'contact-dk-windows',
	'tel' => 'contact-dk-windows',
	'phone' => 'contact-dk-windows',
	'visit' => 'contact-dk-windows'

);
foreach ($redir as $pold => $pnew) if (strpos($page, $pold) !== false) $url = $root . $pnew;

if ($url !== '') {

	// redirect found
	header('HTTP/1.1 301 Moved Permanently');
	header('Location: ' . $url);

}
else {

	// show error page
	$eurl = 'http' . ($_SERVER['SERVER_PORT'] == 443 ? 's' : '') . '://' . $host . $root . 'error404';

	$fcont = file_get_contents($eurl);
	if ($fcont !== false) {
		header('HTTP/1.0 404 Not Found');
		echo $fcont;
	}
	else header('Location: ' . $eurl);

}
?>
