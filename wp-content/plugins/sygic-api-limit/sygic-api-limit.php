<?php
/**
 * Plugin Name: Sygic api limit
 * Version:     1.0
 * Author:      Lix
 * Text Domain: Sygic api limit
 * Description: Sygic api limit
 */

 
 
 register_activation_hook( __FILE__, 'sygicApiLimit_activate' );
 
 function sygicApiLimit_activate() {

}

 /***************************** show the subscribe in admin page  ******************************/
 
 add_action('admin_menu', 'add_sygic_api_limit_admin_menu');
 add_action('admin_init', 'add_sygic_api_limit_admin_menu_init');
 function add_sygic_api_limit_admin_menu(){
 
	add_options_page( 'sygic_api_limit', 'sygic api limit', 'manage_options', __FILE__, 'set_sygic_api_limit' );
	
 }
 
 function add_sygic_api_limit_admin_menu_init()
 { }

 function set_sygic_api_limit()
 {
	global $wpdb;
	if(!empty($_POST['save']) && !empty($_POST['sygic_api_limit']))
	{
		update_option('sygic_api_limit',intval($_POST['sygic_api_limit']));
	}
	if(empty(get_option('sygic_api_used')))
	{
		update_option('sygic_api_used', 0);
	}
	
	echo '<style>
			#usage { width:50%; border-collapse:collapse; }
			#usage td, #usage th { font-size:1em; border:1px solid #98bf21; padding:3px 7px 2px 7px; }
			#usage th { font-size:1.1em; text-align:left; padding-top:5px; padding-bottom:4px; background-color: #A7C942; color:#ffffff;
		  </style>';
	
	echo '<form action="'.str_replace( '%7E', '~', $_SERVER['REQUEST_URI']).'" method="POST" >
		  <br/><br/>
		  <table>
			<tr><td>Sygic API limit</td> <td><input name="sygic_api_limit" type="text" id="sygic_api_limit" value="'.esc_attr(get_option('sygic_api_limit')).'" class="regluar-text ltr" /></td></tr>
		  </table>
		  <p class="description" id="ration-description">The API calls limitation for sygic\'s recomended place</p>
		  <input type="submit" name="save" id="save" class="button button-primary button-large" value="Save">
		  </form>
		  <p>The API used times at '.date('M').': '.get_option('sygic_api_used');
	$usages=$wpdb->get_results("SELECT * FROM `sygic_used_log` ORDER BY `utime` DESC LIMIT 12");
	echo '<table id="usage">
			<tr><th>Date</th><th>Usage</th></tr>';
	foreach($usages as $row) {
		echo '<tr><td>'.date('Y-m-d', strtotime($row->utime)).'</td><td>'.$row->api_usage.'</td></tr>';
	}
	if(empty($usages)) {
		echo '<tr><td colspan="2">Empty</td></tr>';
	}
	echo '</table>';
 }

?>