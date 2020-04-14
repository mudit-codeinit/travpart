<?php

/**
 * Plugin Name: Send blog email to all user
 * Version:     1.2
 * Author:      Lix
 * Description: Auto send blog email to all user
 */


register_activation_hook(__FILE__, 'auto_send_blog_email_activate');


function auto_send_blog_email_activate()
{
}

function autoSendBlogEmailToAllUser($ID, $post)
{
	global $wpdb;
	if(strtotime($post->post_date)<(time()-24*60*60))
		return;
	if(get_post_meta($ID, 'sendemail',true)!=1) {
		update_post_meta($ID, 'sendemail', 1);
		$autosendblog_recent_posts_count=intval(get_option('autosendblog_recent_posts_count'))+1;
		update_option('autosendblog_recent_posts_count', $autosendblog_recent_posts_count);
	}
	else
		return;
	if($autosendblog_recent_posts_count<4)
		return;
	$recent_posts=wp_get_recent_posts(array('numberposts'=>4, 'post_status'=>'publish'));
	include("template/suggest_email_template.php");
	$userList=$wpdb->get_results("SELECT username,email,access FROM tourfrom_balieng2.`user`,tourfrom_balieng2.wp_user_last_login
								  WHERE (`access`=1 OR `access`=2) AND activated=1 AND email IS NOT NULL
									AND wp_user_last_login.user_login=user.username
									AND DATE_SUB(CURDATE(), INTERVAL 7 DAY)<=DATE(login_date)");
	$email_title='Aspiration from Travpart';
    foreach($userList as $row) {
		if($row->access==1)
			wp_mail($row->email,$email_title,$sale_agent_mail_content);
		else
			wp_mail($row->email,$email_title,$customer_mail_content);
	}
	update_option('autosendblog_recent_posts_count', '0');
}
add_action('publish_post', 'autoSendBlogEmailToAllUser', 10, 2);

?>