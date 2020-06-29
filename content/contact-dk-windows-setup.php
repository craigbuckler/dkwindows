[[PAGETITLE = 'Contact DK Glass &amp; Windows for a Free Estimate']]

[[PAGEDESC = 'Please contact DK Glass &amp; Windows, Exmouth, for an informal, no-obligation discussion about your window, door, conservatory, guttering or fascia requirements. We serve customers throughout East Devon including Exmouth, Exeter, Sidmouth, Honiton, Budleigh Salterton, Woodbury, Ottery St Mary and Lympstone.']]

[[PAGEKEYS = 'contact, visit, call, map, location, directions, phone, discuss, chat']]

[[PAGETOPIC = 'contact Exmouth windows company']]

[[PAGEINTRO = 'contact']]

<?php
// save cookie
include('config.php');

// saved in cookie
$cdata = (isset($_COOKIE[$cookie['name']]) ? $_COOKIE[$cookie['name']] : '');
if (get_magic_quotes_gpc()) $cdata = stripslashes($cdata);
$cdata = array_merge(
	array('name' => '', 'telephone' => '', 'email' => '', 'query' => ''),
	unserialize($cdata)
);

// update cookie
$posted = isset($_POST['submit']);
if ($posted) {
	$name = $cdata['name'] = post('name', '', 80);
	$telephone = $cdata['telephone'] = post('telephone', '', 80);
	$email = $cdata['email'] = emailcheck(post('email', '', 80));
	$query = $cdata['query'] = post('query', '', 1000);
}
else {
	$name = $cdata['name'];
	$telephone = $cdata['telephone'];
	$email = emailcheck($cdata['email']);
	$query = $cdata['query'];
}

setcookie($cookie['name'], serialize($cdata), time() + $cookie['expire']);
?>