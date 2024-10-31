<?php
/*
Plugin Name: One-Year-Info
Version: 4.0
Description: PLUGIN DESCRIPTION HERE
Author: Panzee
Author URI: http://panzee.biz
Plugin URI: http://panzee.biz
Text Domain: one-year-info
Domain Path: /languages
*/

add_filter( 'the_content', 'pn_the_content_filter' );
function pn_the_content_filter($content) {
	$now = new DateTime();
	$modified = new DateTime(get_the_date("Y-m-d"));
	$diff_time = (int)$modified->diff($now)->format('%R%a');
	
	$info = "";
	if ($diff_time > 365 && is_single()) {
		$info = "<p style='border: solid #CCCCCC 1px; padding: 10px; margin-bottom: 30px; text-align: center; font-size: 14px; background-color: #FCECAD;'>更新日から1年以上経過しています。情報が古い可能性がございます。</p>";
	}
	
	return $info . $content;
}