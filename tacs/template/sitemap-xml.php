[["header.php"]]<?php
header('Content-type: text/xml');
echo '<', '?xml version="1.0" encoding="UTF-8"?', ">\n";
?>[[<?php

// XML sitemap
echo
	'<urlset xmlns="http://www.google.com/schemas/sitemap/0.84">', "\n",
	SiteMapMenu($menu),
	"</urlset>\n";


// recurse all menu items
function SiteMapMenu($menu) {

	global $root;

	$m = '';
	for ($i = 0, $il = count($menu); $i < $il; $i++) {

		$page = str_replace('.' . $root, '', '.' . $menu[$i]->Link);
		$page = str_replace('/', '_', $page);
		if ($page == '') $page = 'home';
		$t = filemtime("../../content/$page.php");

		$m .= XMLinfo($menu[$i]->Link, 1+(1-$menu[$i]->Level)*0.1, $t);
		$m .= SiteMapMenu($menu[$i]->Sub);
	}

	return $m;

}

// show page node
function XMLinfo($url = '', $priority = 1, $date = null, $change = 'weekly') {

	global $host, $root;
	if (is_null($date)) $date = time();

	return
		"<url>\n" .
		"<loc>https://$host$url</loc>\n" .
		"<lastmod>" . date('Y-m-d', $date) . "</lastmod>\n" .
		"<changefreq>$change</changefreq>\n" .
		"<priority>" . number_format($priority, 1, '.', '') ."</priority>\n" .
		"</url>\n";

}
?>]]
