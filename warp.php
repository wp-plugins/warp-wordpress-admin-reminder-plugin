<?php
/*
Plugin Name: PlanetMike WARP
Plugin URI: http://www.planetmike.com/plugins/warp/
Description: Get automatic reminders in the upper right of your admin pages of different tasks you should do regularly to keep your WordPress system running smoothly. WARP = Wordpress Admin Reminder Plugin
Author: Michael Boyd Clark
Version: 1.01
Author URI: http://www.planetmike.com/
*/

$dayofweek = date(D);
$datemd = date("n-j-Y");
$url = get_bloginfo('wpurl');
$updatenow="Update <a href='http://www.planetmike.com/plugins/warp/'>WARP (Wordpress Admin Reminder Plugin)</a> for 2009 from PlanetMike.com";

if (date(Y) < 2009) {
	if ($dayofweek == "Fri") {
		$warp = "<a href='$url/wp-admin/edit.php?page=wp-db-backup.php'>Backup your database.</a>";
	} elseif ($dayofweek == "Wed") { 
		$warp="<a href='$url/wp-admin/edit-comments.php?page=akismet-admin'>Check the messages that Akismet has tagged as spam. Any real messages in there?</a>";
	} elseif ($datemd == "1-7-2008") {
		$warp = "<a href='$url/wp-admin/link-manager.php'>Spread some love. Update your blogroll.</a>";
	} elseif ($datemd == "1-28-2008") {
		$warp = "<a href='$url/wp-admin/post-new.php'>Go through your drafts (if any). Can any of them be completed, or deleted?</a>";
	} elseif ($datemd == "2-18-2008") {
		$warp = "<a href='$url/wp-admin/categories.php'>Do you have too many categories? Or should one category have some subcategories?</a>";
	} elseif ($datemd == "3-10-2008") {
		$warp = "<a href='$url/wp-admin/options-general.php'>Check your time zone setting, Daylight Savings Time may have shifted recently.</a>";
	} elseif ($datemd == "3-31-2008") {
		$warp = "<a href='$url/wp-admin/profile.php'>Check your profile, make sure it is up-to-date.</a>";
	} elseif ($datemd == "4-21-2008") {
		$warp = "<a href='$url/wp-admin/plugins.php'>Check your Plugins. Are there any that are active that you don't use anymore?</a>";
	} elseif ($datemd == "5-12-2008") {
		$warp = "<a href='$url/wp-admin/link-manager.php'>Spread some love. Update your blogroll.</a>";
	} elseif ($datemd == "6-2-2008") {
		$warp = "<a href='$url/wp-admin/post-new.php'>Go through your drafts (if any). Can any of them be completed, or deleted?</a>";
	} elseif ($datemd == "6-23-2008") {
		$warp = "<a href='$url/wp-admin/profile.php'>Check your profile, make sure it is up-to-date.</a>";
	} elseif ($datemd == "7-14-2008") {
		$warp = "<a href='$url/wp-admin/plugins.php'>Check your Plugins. Do any of them have newer versions available?</a>";
	} elseif ($datemd == "8-4-2008") {
		$warp = "<a href='$url/wp-admin/categories.php'>Do you have too many categories? Or should one category have some subcategories?</a>";
	} elseif ($datemd == "8-25-2008") {
		$warp = "<a href='$url/wp-admin/link-manager.php'>Spread some love. Update your blogroll.</a>";
	} elseif ($datemd == "9-15-2008") {
		$warp = "<a href='$url/wp-admin/profile.php'>Check your profile, make sure it is up-to-date.</a>";
	} elseif ($datemd == "10-6-2008") {
		$warp = "<a href='$url/wp-admin/plugins.php'>Check your Plugins. Are there any that are active that you don't use anymore?</a>";
	} elseif ($datemd == "11-3-2008") {
		$warp = "<a href='$url/wp-admin/options-general.php'>Check your time zone setting, Daylight savings time may have shifted recently.</a>";
	} elseif ($datemd == "12-1-2008") {
		$warp = $updatenow;
	} elseif ($datemd == "12-8-2008") {
		$warp = $updatenow;
	} elseif ($datemd == "12-15-2008") {
		$warp = "<a href='$url/wp-admin/plugins.php'>Check your Plugins. Do any of them have newer versions available?</a>";
	} elseif ($datemd == "12-22-2008") {
		$warp = $updatenow;
	} elseif ($datemd == "12-29-2008") {
		$warp = $updatenow;
	} else {
		$warp = "";
	}
} else {
	$warp = $updatenow;
}

// This just echoes the chosen line, we'll position it later
function showwarp() {
	global $warp;
	echo "<p id='warpwrap'>$warp</p>";
}

// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'showwarp');

// We need some CSS to position the paragraph
function warp_css() {
	echo "
	<style type='text/css'>
	#warpwrap {
		position: absolute;
		top: 2.3em;
		margin: 0; padding: 0;
		right: 1em;
		font-size: 16px;
		color: #ff0000;
	}
	#warpwrap a {
		font-size: 16px;
		color: #ff0000;
	}
	</style>
";
}

add_action('admin_head', 'warp_css');
