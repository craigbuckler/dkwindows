</div></div>
<!-- /page -->


<!-- introduction -->
[["pageintro.php"]]


<!-- footer -->
<footer><div>

	<nav>[[<?php
		echo DisplayMenu($menu, 'ul', 'li', '', 1);
	?>]]</nav>
	
	<nav class="services">[[<?php
		echo DisplayMenu($menu[1]->Sub, 'ul', 'li', '');
	?>]]</nav>

	<section>
		<p>&copy;<?php echo date('Y'); ?> <a href="[[root]]">[[COMPANY]]</a></p>
		<p>Exmouth, Exeter &amp; East Devon UPVC Window Installation</p>
		<p>07926 168 852 | <a href="[[<?php echo $link['contact']; ?>]]" class="email">info {at} dkglassandwindows dot com</a></p>
		<p><a href="http://www.fensa.org.uk/" title="Fenestration Self-Assessment Scheme">FENSA</a> and <a href="http://www.ggf.co.uk/" title="Glass and Glazing Federation Protection Guarantee">GGF</a> approved</p>
		<p id="optimalworks"><a href="http://optimalworks.net/" title="Exmouth Web Design">website by OptimalWorks.net</a></p>
	</section>
	
</div></footer>


<!-- header -->
<header><div>

	<p id="logo"><a href="[[root]]"><img src="[[root]]images/dk-glass-and-windows.png" width="290" height="97" alt="[[COMPANY]]" title="[[COMPANY]], Exmouth and East Devon" /></a></p>
	
	<p class="tel">07926 168 852</p>
	<p><a href="[[<?php echo $link['contact']; ?>]]" class="email">info {at} dkglassandwindows dot com</a></p>
	
	<nav>[[<?php
		echo DisplayMenu($menu);
	?>]]</nav>
	
</div></header>

<!-- JavaScript -->
[[<?php
if ($local) {
	$script = array('owl', 'owl_css', 'owl_dom', 'owl_xml', 'owl_innerhtml', 'owl_event', 'owl_timer', 'owl_image', 'owl_screen', 'owl_effect', 'owl_overlay', 'owl_menu', 'owl_tabs', 'owl_emailparse', 'owl_fader', 'owl_lightbox', 'main');
}
else {
	$script = array('script');
}
foreach ($script as $js) echo "<script src=\"${root}script/$js.js\"></script>\n";
?>]]

</body>
</html>