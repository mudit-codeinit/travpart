<?php
require_once('../../wp-config.php');
global $wpdb;

if(empty($_GET['action']))
	exit();
else if($_GET['action']=='get_vendor_mail_list')
	get_vendor_mail_list();
else
	exit();

function get_vendor_mail_list()
{
	global $wpdb;
	$vendor_email_list=array();
	$TravpartVendor = unserialize(get_option('_cs_travpart_vendorlist'));
	foreach($TravpartVendor as $t)
	{
		array_push($vendor_email_list, $t['email']);
	}

	if(!empty($vendor_email_list))
		echo json_encode($vendor_email_list);
	else
		echo FALSE;
}

?>