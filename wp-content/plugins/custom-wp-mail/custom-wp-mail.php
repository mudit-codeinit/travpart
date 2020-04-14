<?php

/**
 * Plugin Name: Custom WP mail function
 * Version:     1.0
 * Author:      Lix
 * Description: Rewrite WP mail function
 */


register_activation_hook(__FILE__, 'custom_wp_mail_activate');

function custom_wp_mail_activate()
{
}

/* Rewrite email function */
if ( !function_exists( 'wp_mail' ) ) :
function wp_mail( $to, $subject, $message, $headers = '', $attachments = array() )
{
	//var_dump($to, $subject, $message);
	$key="Tt3At58P6ZoYJ0qhLvqdYyx21";
	$postdata=array('to'=>$to,
					'subject'=>$subject,
					'message'=>$message);
	$url="https://www.tourfrombali.com/api.php?action=sendmail&key={$key}";
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 60);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
	$data=curl_exec($ch);
	if(curl_errno($ch) || $data==FALSE)
	{
		curl_close($ch);
		return FALSE;
	}
	else
	{
		curl_close($ch);
		return TRUE;
	}
}
endif;
/* end Rewrite email function */

?>