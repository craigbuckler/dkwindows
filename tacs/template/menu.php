[[<?php
// define menu in XML
$menuXML = <<<XML
<?xml version='1.0' standalone='yes'?>
<menu>

	<item id="home" text="Home" link="" title="DK Glass &amp;amp; Windows, Exmouth" key="h" />

	<item id="services" text="Services" link="services" title="Exmouth window, door and glazing installation and repair" key="s">

		<item id="windows" text="Replacement Windows" link="services/replacement-windows-installation" title="Window fitting in Exmouth &amp;amp; East Devon" key="" />
		
		<item id="doors" text="Replacement Doors" link="services/replacement-doors-installation" title="Door fitting in Exmouth &amp;amp; East Devon" key="" />
		
		<item id="repair" text="Door &amp;amp; Window Repairs" link="services/window-door-repair" title="Door &amp;amp; window repairs in Exmouth &amp;amp; East Devon" key="" />
		
		<item id="conservatories" text="Conservatories" link="services/conservatory-installation" title="Conservatory installation in Exmouth &amp;amp; East Devon" key="" />
		
		<item id="glazing" text="Traditional Glazing Services" link="services/glass-work" title="Glass roofs, tables, shelves and panels in Exmouth &amp;amp; East Devon" key="" />
		
		<item id="facias" text="Fascias, Soffits &amp;amp; Guttering" link="services/facias-soffits-guttering" title="UPVC fascias, soffits &amp;amp; guttering in Exmouth &amp;amp; East Devon" key="" />

	</item>

	<item id="examples" text="Examples" link="case-studies" title="Customer testimonials and case studies" key="e">

		<item id="casestudy6" text="Window &amp; Door Installation" link="case-studies/window-door-testimonial-2" title="Replacement double glazed windows and doors installed in Sidmouth (2011)" key="" />
	
		<item id="casestudy3" text="Double Glazing Installation" link="case-studies/window-door-testimonial-1" title="Replacement double glazing installed in Exmouth (2010)" key="" />
		
		<item id="casestudy5" text="New Fascias &amp; Guttering 1" link="case-studies/fascia-guttering-testimonial-1" title="Replacement fascias, soffits, guttering and downpipes installed in Exmouth (2010)" key="" />
	
		<item id="casestudy4" text="New Fascias &amp; Guttering 2" link="case-studies/fascia-guttering-testimonial-2" title="Replacement fascias, soffits, guttering and downpipes installed in Exmouth (2011)" key="" />
	
		<item id="casestudy1" text="Replacement Door 1" link="case-studies/door-testimonial-1" title="New door and sidelight installation in Exmouth (2011)" key="" />
		
		<item id="casestudy2" text="Replacement Door 2" link="case-studies/door-testimonial-2" title="Replacement door installation in Exmouth (2011)" key="" />
		
		<item id="casestudy2" text="Replacement Door 3" link="case-studies/door-testimonial-3" title="Replacement internal door and window installation in Exmouth (2011)" key="" />

	</item>

	<item id="about" text="About" link="exmouth-window-company" title="About DK Glass &amp;amp; Windows, Exmouth &amp;amp; East Devon" key="a">
		
		<item id="promise" text="Our Promise" link="exmouth-window-company/promise-guarantee" title="DK Glass &amp;amp; Windows customer promise &amp;amp; guarantees" key="p" />

	</item>

	<item id="contact" text="Contact" link="contact-dk-windows" title="Contact DK Glass &amp;amp; Windows in Exmouth, East Devon" key="c" />

</menu>
XML;

// define menus and page links
global $menu, $link, $activeMenu;
$link = array();
$activeMenu = null;
$menu = MenuRecurse(new SimpleXMLElement($menuXML));

// create menu array
function MenuRecurse($menuItems, $level = 1) {

	global $root, $page, $link, $activeMenu;
	$m = array();

	foreach ($menuItems->item as $item) {
		
		// define links
		$id = (string) $item['id'];
		$link[$id] = $root . (string) $item['link'];
		
		// get sub-menu
		$s = MenuRecurse($item, $level+1);
		$active = (strpos($page, 'pc' . str_replace('/', '-', $root . $item['link']) . '.php') !== false);
		$open = false;
		foreach ($s as $i) $open = $open || $i->Active || $i->Open;

		// define menu
		$m[] = new Menu(
			$id, 
			$item['text'], 
			$link[$id],
			$item['title'], 
			$item['key'], 
			$level,
			$active,
			$open,
			$s
		);
		
		// active menu
		if ($active) $activeMenu = $m[count($m)-1];
	
	}
	
	return $m;

}


// display menu to level
// e.g. echo DisplayMenu($menu); echo DisplayMenu($menu, 'p', '', ' | ', 1);
function DisplayMenu($menu, $outer = 'ul', $inner = 'li', $sep = '', $level = 999) {

	$m = '';
	for ($i = 0, $il = count($menu); $i < $il; $i++) {
		if ($inner) $m .= "<$inner>";
		$m .= $menu[$i]->CreateLink();
		if ($menu[$i]->Level < $level) $m .= DisplayMenu($menu[$i]->Sub, $outer, $inner, $sep, $level);
		if ($inner) $m .= "</$inner>\n";
		if ($sep && $i+1 < $il) $m .= "$sep\n";
	}
	if ($m && $outer) $m = "<$outer>\n$m</$outer>\n";
	
	return $m;

}


// menu item
class Menu
{
	public $ID, $Text, $Link, $Title, $Key, $Level, $Active, $Open, $Sub;

	// define a menu
	public function __construct($id, $text, $link, $title = '', $key = '', $level = 1, $active = false, $open = false, $sub = array()) {
		$this->ID = (string) $id;
		$this->Text = (string) str_replace('|', '<br />', $text);
		$this->Link = (string) $link;
		$this->Title = (string) $title;
		$this->Key = (string) $key;
		$this->Level = (int) $level;
		$this->Active = (bool) $active;
		$this->Open = (bool) $open;
		$this->Sub = $sub;
	}

	// return an HTML link
	public function CreateLink() {
		$m = "<a href=\"$this->Link\"";
		if ($this->Title != '') $m .= " title=\"$this->Title\"";
		$class = trim(($this->Open ? 'open ' : '') . ($this->Active ? 'active ' : ''));
		if ($class) $m .= " class=\"$class\"";
		if ($this->Key != '') $m .= " accesskey=\"$this->Key\"";
		$m .= ">$this->Text</a>";
		return $m;
	}
}
?>]]