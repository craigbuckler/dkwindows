<!-- article -->
<article>

<h1>[[PAGETITLE]]</h1>

<p>We pride ourselves on outstanding professionalism and quality double glazing. Here are a few examples of our window installations, repairs and glass projects:</p>

[[<?php
$lightbox = array(
	'door-fitting-1' => 'Exmouth windows and doors',
	'loft-skylight-1' => 'Double-glazed loft skylight conversion',
	'fascia-1' => 'Replacement fascia',
	'garden-cover-1' => 'Covered garden area',
	'replacement-door-1' => 'Replacement door',
	'glazed-porch-1' => 'A glazed porch',
	'roof-skylight-1' => 'Roof skylight installation',
	'window-door-installation-1' => 'Full house installation',
	'fascia-fitting' => 'Dave Kavanagh replacing a fascia'
);
?>]]
[['lightbox.php']]

</article>

<!-- aside -->
<aside>
<h2>Customer Case Studies</h2>

[[<?php
$cs = '';
foreach ($activeMenu->Sub as $m) {
	$cs .= '<li><a href="' . $m->Link . '">' . $m->Title . "</a></li>\n";
}

if ($cs != '') {
	echo
		"<p>The following customer case studies and projects are available:</p>\n",
		"<ul>\n$cs</ul>\n";
}
else {
	echo
		"<p>A selection of customer case studies and projects will be available shortly. Please return soon.</p>\n";
}
?>]]
</aside>

<aside>
<h2>About DK Glass &amp; Windows</h2>

<p><img src="[[root]]images/dave-kavanagh.jpg" width="105" height="79" alt="David Kavanagh" class="photo" />DK Glass &amp; Windows is an Exmouth window company founded [[<?php echo intval(date('Y')) - 2007; ?>]] years ago by David Kavanagh.</p>

<p>Dave has over 15 years experience in the double glazing industry. Unlike larger companies, we offer a more personal service and competitive prices. We pride ourselves on our expertise and quality workmanship.</p>

<p><a href="[[<?php echo $link['about']; ?>]]">More information about DK Glass &amp; Windows in Exmouth&hellip;</a></p>

</aside>