[[<?php
include('config.php');

// show lightbox images
if (isset($lightbox)) {

	$lb = '';
	$i = 0;

	// find all images
	foreach($lightbox as $img => $desc) {
		$lb .= 
			'<li' . ($i % 3 == 0 ? ' class="row"' : '') . '>' . 
			'<a href="' . $root . $portfolio['full'] . $img . '.jpg"><img src="' . $root . $portfolio['thumb'] . $img . '.jpg" width="180" height="135" alt="DK Glass &amp; Windows portfolio example" />';
		$i++;
		$lb .= 
			'<strong>' . $desc . '</strong>' .
			'<span>photograph ' . $i . ' of #</span>' .
			"</a></li>\n";
	}
	
	// lightbox
	if ($lb != '') {
		echo
			"<ol class=\"lightbox\">\n",
			str_replace('#', $i, $lb),
			"</ol>\n";
	}

}
?>]]