<?php
/*
Plugin Name: Network Switch Button
Plugin URI: http://premium.wpmudev.org/project/network-switch-button
Description: Add a Network Admin / Site Admin button to your WordPress Multisite Dashboard
Version: 1.0
Author: Ve Bailovity (Incsub)
Author URI: http://premium.wpmudev.org
WDP ID: 235

Copyright 2009-2011 Incsub (http://incsub.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License (Version 2 - GPLv2) as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

function nsb_network_switch () {
	echo <<<EOS
<style type="text/css">
.nsb_switch {
	float: right;
	margin: 0 10px;
	height: 13px;
	margin-top: 4px;
	padding: 5px;
}

.nsb_switch a, .nsb_switch a:visited, .nsb_switch a:hover, .nsb_switch a:active {
	color: #444;
	text-decoration: none;
}
</style>
EOS;
	if (!WP_NETWORK_ADMIN) {
		$switch_text = __("Network Admin", 'nsb');
		$switch_url = admin_url('/network/index.php');
		echo <<<EOSTN
<script type="text/javascript">
(function ($) {
$(function () {
	$("#site-heading").after(
		'<div class="nsb_switch admin_area button"><a href="$switch_url">$switch_text</a></div>'
	);
});
})(jQuery);
</script>
EOSTN;
	} else {
		$switch_text = __("Site Admin", 'nsb');
		$switch_url = admin_url('/index.php');
		echo <<<EOSTS
<script type="text/javascript">
(function ($) {
$(function () {
	$("#site-heading").after(
		'<div class="nsb_switch admin_area button"><a href="$switch_url">$switch_text</a></div>'
	);
});
})(jQuery);
</script>
EOSTS;

	}
}

// Initialize
if (is_admin()) {
	add_action('admin_head', 'nsb_network_switch');
}