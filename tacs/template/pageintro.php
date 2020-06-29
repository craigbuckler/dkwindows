[[<?php
// top section
if (isset($PAGEINTRO) && $PAGEINTRO != '') {

	$title = 'excellent quality sensible prices';
	$img = 'loft-windows-1';
	$imgtitle = 'Exmouth loft conversion and skylight windows';
	$buttonpage = 'contact';
	$button = 'Free Estimate';

	switch ($PAGEINTRO) {
	
		case 'services':
			$title = 'the best windows the best value';
			$img = 'window-installation-1';
			$imgtitle = 'Exmouth window and door installation';
			$button = 'Contact Us';
			break;
			
		case 'examples':
			$title = 'window installation at a fair price';
			$img = 'roof-skylight-1';
			$imgtitle = 'Exmouth windows, doors and conservatories';
			$button = 'Contact Us';
			break;
			
		case 'about':
			$title = 'Exmouth\'s best window fitter';
			$img = 'window-repair';
			$imgtitle = 'window installation and repair in Exmouth';
			$button = 'Contact Us';
			break;
			
		case 'contact':
			$img = 'roof-fascia';
			$imgtitle = 'Exmouth windows, doors, conservatories, guttering and fascias';
			$button = 'Our Promise to You';
			$buttonpage = 'promise';
			break;

	}

	echo
		"<section id=\"intro\"><div>\n",
		
		"<div id=\"mainimage\">\n",
		"<img src=\"${root}images/intro/$img.jpg\" width=\"613\" height=\"170\" alt=\"$imgtitle\" />\n",
		"</div>\n",
	
		"<p class=\"main\">$title</p>",
		"<p><a href=\"" . $link[$buttonpage] . "\" class=\"button\">$button</a></p>",

		"</div></section>\n";
	
}
?>]]