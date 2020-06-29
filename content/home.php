<!-- article -->
<article class="full">

<h1>uPVC Double Glazing, Window Installation and Repair in Exmouth &amp; East Devon</h1>

<ul id="services">
[[<?php
$i = 0;
foreach ($menu[1]->Sub as $m) {

	$img = preg_replace
('/\s+/', '-', trim(strtolower(str_replace(array(',', '&amp;'), '', $m->Text))));

	echo
		'<li', ($i % 3 == 0 ? ' class="row"' : ''), '>', 
		'<a href="', $m->Link, '">',
		'<img src="', $root, 'images/services/', $img, '.jpg" width="280" height="160" alt="', $m->Text, '" />',
		'<strong>', $m->Text, '</strong>',
		"</a></li>\n";
		
	$i++;
}
?>]]
</ul>

</article>

<!-- aside -->
[["content/boxes/about.php"]]
[["content/boxes/organisations.php"]]