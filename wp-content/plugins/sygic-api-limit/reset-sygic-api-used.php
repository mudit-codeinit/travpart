<?php
require_once(__DIR__.'/../../../wp-config.php');
global $wpdb;
if(php_sapi_name()=='cli' || php_sapi_name()=='cli-server') {
	$sygic_api_used=get_option('sygic_api_used');
	update_option('sygic_api_used', 0);
	$wpdb->insert('sygic_used_log', array('utime'=>date('Y-m-d',mktime(0,0,0, date('n')-1, 1)) , 'api_usage'=>$sygic_api_used));
	echo 1;
}
?>