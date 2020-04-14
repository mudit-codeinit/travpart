<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, height=device-height, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="google-site-verification" content="1iWeaWe-v82j6clC7I1c7IR7eunDGfioLHrnq4fvVms" />
        <meta name="p:domain_verify" content="1833b56ba59979f642614c2a98313c4b"/>
                <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TQ4N2X6');</script>
<!-- End Google Tag Manager -->
        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
        <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
        
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <link rel="icon" href="http://www.travpart.com/wp-content/themes/aberration-lite/images/travpart_icon_lnA_icon.ico" />
        <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css">
		
		<?php if ( is_home() || is_front_page() ) { ?>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/chatbox.css?r1">
		<?php } ?>

        <?php
        if (function_exists('bp_is_user_profile')) :
            if (bp_is_user_profile() || bp_is_profile_edit()) :
                ?>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDG6aCrxwhxdbMCHZX8YrGYRfkMTrZfvks&libraries=places"></script>
                <script src="<?php bloginfo('template_url'); ?>/js/gmaps.js" type="text/javascript"></script>
                <?php
            endif;
        endif;
        ?> 

<!--<link rel="stylesheet" href="https://www.travpart.com/wp-content/themes/aberration-lite/style_1.css"/>-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                var width = $(document).width();

                if (width >= 992) {
                    width = 992;
                } else if (width >= 768 && width <= 992) {

                    width = 768;
                } else {
                    width = 300;
                }
                //$(".contact_us").colorbox({iframe:true, innerWidth:width, innerHeight:490});
            });
        </script>

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-65718700-3', 'auto');
            ga('send', 'pageview');

        </script>

        <script type="text/javascript">

            var pdfdoc = new jsPDF();
            var specialElementHandlers = {
                '#ignoreContent': function (element, renderer) {
                    return true;
                }
            };

            $(document).on('click', '#pdfweb', function () {
                console.log('hi');
                pdfdoc.fromHTML($('.marvelapp-1a').html(), 10, 10, {
                    'width': 110,
                    'elementHandlers': specialElementHandlers
                });
                pdfdoc.save('First.pdf');
            });

        </script>
        <?php wp_head(); ?>
		
		<!-- chatbox -->
		<?php if ( is_home() || is_front_page() ) { ?>
		<script src="<?php bloginfo('template_url'); ?>/js/chatbox.js?r1"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/hotel.js?v1"></script>
		<script src="<?php bloginfo('template_url'); ?>/js/vehicle.js?v2"></script>
		<?php } ?>
		
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-1580835878041190",
                enable_page_level_ads: true
            });
        </script>
        
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-65718700-6"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-65718700-6');
</script>
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA069EQK3M96DRcza2xuQb0DZxmYYkVVw8&amp;libraries=places"></script>
         
<script>
  google.maps.event.addDomListener(window, 'load', initialize);
    function initialize() {
      var input = document.getElementById('search_des_kw');
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.addListener('place_changed', function () {
      var place = autocomplete.getPlace();
      // place variable will have all the information you are looking for.
      $('#lat').val(place.geometry['location'].lat());
      $('#long').val(place.geometry['location'].lng());
    });
  }
</script>
<!--<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>-->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<script type="text/javascript">
jQuery(document).ready(function($){
				
			$(function() {
			  $('input[name="daterange"]').daterangepicker({
			    opens: 'right',
			    startDate: moment().startOf('hour'),
    			endDate: moment().startOf('hour').add(32, 'hour'),
			  }, function(start, end, label) {
			    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
			  });
			  $('input[name="date_range_vehicle"]').daterangepicker({
			    opens: 'right',
			    startDate: moment().startOf('hour').add(2, 'day'),
    			endDate: moment().startOf('hour').add(3, 'day'),
			  }, function(start, end, label) {
			    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
			  });
			});
				
				$('.hide_not,.hide_pro').hide();
				$('.lighten-3').click(function(){
					$('.custom_d').toggle();
				})
				$('.custom_menu_btn_mobile').click(function(){
					$(this).find('i').toggleClass('fa-bars fa-times-circle');
					$('.home_mytime_msg').slideToggle();
				})
			});
		</script>

<style type="text/css">
@media only screen and (max-width: 1024px){
	.wpspw-post-grid-content{
		height: auto !important;
	}
}
	
    li#mega-menu-item-14883 {
    display: none !important;
}
li#mega-menu-item-14884 {
    display: none !important;
}

.table-condensed tr:nth-child(odd){
    background-color: #fff;
}
.table-condensed .prev,.table-condensed .next{
	position: inherit !important;
}
.daterangepicker td.active, .daterangepicker td.active:hover{
	    background-color: #2b8084 !important;
}
.space_bottom{
	text-align: center;
}
</style>

	<?php //if($_GET['debug']==3){?>
			<style>
			
			
			@media only screen and (max-width: 1024px){
					#h-t{
						display: none;
					}		
				.mobile_header_balouch_show{
					display: block !important;
				}
				.mobile_header_balouch_hide{
					display: none !important;
				}
			}
			.min_height{
				height: 105px;
				overflow: scroll;
			}

			#content{
				margin-top: 0px !important;
			}
			.row_c{
				border-bottom:1px solid #ccc;
			}
			.notification_div{
				background: #fff;
			}
			.for_border{
				border-left: 4px solid #22b14c;
			    border-right: 4px solid #22b14c;
			    border-bottom: 4px solid #22b14c;
			}
			.profile_s{
				background:#22b14c;
				padding-bottom: 0px !important;
			}
			
			
			.input-group-prepend{
				background: #fff;
			}
			.home_mytime_msg{
				//padding: 10px;
				background: #368a8c;
			}
			.col-mmd-4 img{
				width: auto;height: 30px;border-radius: 100%;border: 1px solid #fff;
			}
			p{
				font-family: 'Heebo', sans-serif;
			}
			.col-mmd-4 a,.col-mmd-3 a,.col-mmd-6 a{
				color: #fff;
				font-family: 'Heebo', sans-serif;
				font-size: 12px;
				text-transform: uppercase;
			}
			.space_top{
				margin-top: 10px;
			}
			.col-mmd-4{
				text-align: center;
				width: 32%;
				display: inline-block;
			}
			
			.col-mmd-3{
				text-align: center;
				width: 18%;
				display: inline-block;
			}
			.col-mmd-6{
				text-align: center;
				width: 60%;
				display: inline-block;
			}
			.remove_pad{
				padding: 0px !important;
			}
			.custom_menu_btn_mobile i{
				color: #1a6d84;position: absolute;font-size: 22px;margin-left: 5px;
			}
				.custom_menu_btn_mobile{
					padding: 0px 15px !important;
					background: none !important;
				    border:0px !important;
				    outline: 0px !important;
				    position: relative;
				    box-shadow: none !important;
				    font-size: 16px !important;
				    color: #1a6d84 !important;	
				}				
					@media only screen and (max-width: 1024px){
					.for_logo_mobile{
						float: left;
						padding: 10px;
						width: 60%;
					}
					.space_top_row{
						padding-top: 30px;
					}
					.custom_image_mobile img{
						width: 85%;
					}
					.clearfix{
						clear: both;
					}
					.for_menu_mobile{
						width: 40%;
    					padding: 24px;
						float: right;
					}
						.mobile_header_balouch_show{
							display: block !important;
						}
						.remove_mar{
							margin: 0px !important;
						}
						.custom_remove_pd{
							padding: 0px !important;
							max-width: 100% !important;
						}
						.mobile_header_balouch_hide{
							display: none !important;
						}
					}
					
					@media only screen and (max-width: 900px) and (min-width: 768px){
						.custom_menu_btn_mobile{
							font-size: 22px !important;
						}
						.custom_menu_btn_mobile i{
							font-size: 30px;
						}
						.for_menu_mobile{
							padding: 53px !important;
						}
						#main-discover{
							width: 40% !important;
							padding: 10px;
						}
						.elementor-element-224a120 {
						    width: 60% !important;
						}
						.custom_mar .elementor-col-33{
							margin: 0px;
						}
						.slaes_agent{
							margin: 0px !important;
							margin-bottom: 10px !important;
							width: 100% !important;
						}
						.card{
							width: 50% !important;
						}						
						p{
							margin: 2px;
						}
						form.wpcf7-form {
						    width: 100%;
						}
					}
					
					@media (max-width: 767px){
						.custom_menu_btn_mobile{
							font-size: 40px !important;
						}
						.custom_mar .elementor-col-33{
							margin: 0px;
						}
						p{
							margin: 2px;
						} 
						.slaes_agent{
							margin: 0px !important;
							margin-bottom: 10px;
							width: 100% !important;
						}
						.custom_menu_btn_mobile i{
							font-size: 53px;
						}
						.card{
							width: 50% !important;
						}
						#main-discover{ 	
							margin-top: 0px !important;
							width: 40% !important;
							padding: 10px;
						}
						form.wpcf7-form {
						    width: 100%;
						}
						.elementor-element-224a120 {
						    width: 60% !important;
						}
						.for_menu_mobile{
							padding: 53px !important;
						}
					}
					
					@media only screen and (max-width: 640px) and (min-width: 200px){
						.card{
							width: 100% !important; 
						}
						.elementor-element-224a120 {
						    width: 100% !important;
						}
						.slaes_agent{
							margin: 0px !important;
							width: 100%;
							margin-bottom: 30px !important;
						}
						/*.elementor-60 .elementor-element.elementor-element-103f45e > .elementor-element-populated{
							padding: 0px !important;
						}*/
						#main-discover{ 	
							margin-top: 0px !important;
							width: 100% !important;
							padding: 10px;
						}
						.for_menu_mobile {
						    padding: 27px !important;
						}
						.custom_menu_btn_mobile {
						    font-size: 15px !important;
						}
						.custom_menu_btn_mobile i {
						    font-size: 21px;
						}
					}
					@media only screen and (max-width: 1024px) and (min-width: 900px){
						.custom_menu_btn_mobile{
							font-size: 40px !important;
						}
						
						p{
							margin: 2px;
						} 
						.slaes_agent{
							margin: 0px !important;
							margin-bottom: 10px;
							width: 100% !important;
						}
						.custom_menu_btn_mobile i{
							font-size: 53px;
						}
						.card{
							width: 50% !important;
						}
						#main-discover{
							width: 40% !important;
							padding: 10px;
						}
						form.wpcf7-form {
						    width: 100%;
						}
						.elementor-element-224a120 {
						    width: 60% !important;
						}
						.for_menu_mobile{
							padding: 53px !important;
						}
					}
					
					@media (max-width: 240px){
						.for_menu_mobile {
						    padding: 17px 15px 0px 0px !important;
						}
						.custom_menu_btn_mobile{
						    line-height: 10px !important;							
						}
						.col-xs-6{
							width: 100%;
						}
						.elementor-column-gap-default>.elementor-row>.elementor-column>.elementor-element-populated {
						    padding: 0px;
						}
						.homebannertitle p.elementor-heading-title.elementor-size-default {
						    font-size: 13px !important;
						    line-height: 18px;
						}
						h1,h2,h3,h5,p,button,input,text,i,span{
							font-size: 12px !important;
						}
					}
			</style>
		<?php //} ?>
    </head>
    <body id="<?php
    if (is_home() || is_front_page()) {
        echo 'hp';
    }
    ?>">
              <?php $url = site_url();
              ?>

			<style>
				#mega-menu-wrap-primary #mega-menu-primary{
					padding-top: 20px !important;
				}
			</style>
        <div id="header" style="background: white; <?php echo ($_GET['device']=='app')?'display:none;':''; ?>">
            <div class="container-fluid custom_remove_pd mobilemenucolor mobilemenuborder" style="margin-bottom:20px;background:white;border-bottom:5px solid #368a8c;padding:1.5vh">
                <div class="container custom_remove_pd ">
                    <div class="row remove_mar">
                    	
                    	<!-- header_new-->
                    	<div class="mobile_header_balouch_show" style="display: none;">
						  <div class="row remove_mar">
						  	<div class="for_logo_mobile text-center">
							  <a href="https://www.travpart.com/English/">
	                			<img class="custom_image_mobile" src="https://www.travpart.com/English/wp-content/uploads/2019/12/travpart-main.png" alt="travpart">
	                		  </a>
							</div> 
							<div class="for_menu_mobile text-center">
								<button class="btn custom_menu_btn_mobile">
									MENU
									<i class="fas fa-bars"></i>
								</button>
							</div>
							<div class="clearfix"></div>	
						  </div>
						  
						  
						  <div class="home_mytime_msg" style="display: none;">
							
						  	<div class="rows space_top_row">
						  		<div class="col-mmd-4">
						  		  <a href="https://www.travpart.com/English/timeline/">
							  		<i class="fas fa-sign-in-alt" style="font-size: 30px;margin-left:9px"></i>
							  		<p>Login</p>
							  	  </a>	
							  	</div>
							  	<div class="col-mmd-4">
							  	  <a href="#">	
							  		<i class="fas fa-user-plus" style="font-size: 30px;"></i>
							  		
							  		<p>Register</p>
							  	  </a>	
							  	</div>
							  	<div class="col-mmd-4">
							  	  <a href="/English/contact/">
							  	 	<i class="fas fa-phone" style="font-size: 30px;margin-right:9px"></i>
							  		<p>Contact Us</p>
							  	  </a>	
							  	</div>
						  	</div>
						  	 
						  <div class="rows " style="padding: 10px 0px 0px 0px">
						  		<div class="col-mmd-4">
						  		  <a href="/English/about-us/">
							  		<i class="fas fa-briefcase" style="font-size: 30px;"></i>
							  		<p>About</p>
							  	  </a>	
							  	</div>
							  	<div class="col-mmd-4">
							  	  <a href="https://www.travpart.com/Chinese">
							  		<i class="fas fa-language" style="font-size: 30px;"></i>
							  		<p>中文</p>
							  	  </a>
							  	</div>
							  	<div class="col-mmd-4" style="position: absolute;">
							  	  <select class="header_curreny form-control search_select" style="    margin: 5px 0px;border-radius: 0px;min-height: 35px;">
                                    <option full_name="IDR"      syml="Rp"   value="IDR"> IDR </option>
                                    <option full_name="RMB"  syml="元"    value="CNY"> RMB </option>
                                    <option full_name="USD"        syml="USD"     value="USD"> USD </option>
                                    <option full_name="AUD"  syml="AUD"    value="AUD"> AUD </option>
                                </select>
							  	</div>
						  	</div>
						  
						  </div>
						  
						</div>
                    	
                    	<!-- header_new-->
                    	
                    	
                    	
                    	
                    
                        <div id="h-t" class="col-md-12 mobilemenucolor" style="background:white;width:100%;background-size:100%; color:#368a8c">
                            <div style="display: inline-block;float:left">
	                            <a href="https://www.travpart.com/">
	                            	<img src="https://www.travpart.com/English/wp-content/uploads/2019/12/travpart-main.png" alt="travpart" width="250">
	                            </a>
                            </div>
                            <div class="main-menu pull-right" style="margin-right:-30px; float:right !important;">
                                <?php
	                                ob_start();
	                                wp_nav_menu(array('theme_location' => 'primary'));
	                                $main_menu = ob_get_contents();
	                                ob_end_clean();
                                ?>
                                <?php ob_start(); ?>                 
                                <li class="mega-menu-item mega-menu-item-type-post_type mega-menu-item-object-page mega-align-bottom-left mega-menu-flyout">
                                    <a  class="mega-menu-link" href="/English/login/" class="buttype">LOGIN</a>
                                </li> 
                                <li class="mega-menu-item mega-menu-item-type-post_type mega-menu-item-object-page mega-align-bottom-left mega-menu-flyout">
                                    <a  class="mega-menu-link" href="/English/register2/" class="buttype">REGISTER</a>
                                </li> 
                                <!--<?php if (is_user_logged_in()) { ?>
                                    <li class="mega-menu-item mega-menu-item-type-post_type mega-menu-item-object-page mega-align-bottom-left mega-menu-flyout"><a class="mega-menu-link" href="#"><img src="https://www.travpart.com/wp-content/uploads/2019/10/notification_black.png" alt="notification" width="25"></a></li>
                                <?php } else { ?>
                                <?php } ?>-->
                                <li class="mega-menu-link">
                                    <a href="https://www.travpart.com/English/contact/"><span style="padding:5px;background: #37a000 !important;">Contact us</span></a>
                                </li>                
                                <li  class="mega-menu-item mega-menu-item-type-post_type mega-menu-item-object-page mega-align-bottom-left mega-menu-flyout"><a class="mega-menu-link" href="https://www.travpart.com/Chinese"><img src="/English/wp-content/themes/bali//images/flg-cn.png" alt="中文" class="mobilenotshow"> 中文</a></li>
                                <li class="mega-menu-item mega-menu-item-type-post_type mega-menu-item-object-page mega-align-bottom-left mega-menu-flyout">
                                    <!--<a href="#"><span class="badge">￥</span> RMB</a>-->
                                    <!--  style="border-radius: 19px;text-align: center;padding: 0px 0px 0px 17px;" -->
                                    <select class="header_curreny search_select" style="padding:0px;height:20px;">

                                        <option full_name="IDR"      syml="Rp"   value="IDR"> IDR </option>
                                        <option full_name="RMB"  syml="元"    value="CNY"> RMB </option>
                                        <option full_name="USD"        syml="USD"     value="USD"> USD </option>
                                        <option full_name="AUD"  syml="AUD"    value="AUD"> AUD </option>
                                    </select>
                                </li>
                                <!--<li  class="mega-menu-item mega-menu-item-type-post_type mega-menu-item-object-page mega-align-bottom-left mega-menu-flyout"><a class="mega-menu-link" href="http://www.travpart.com/tutorial/Partner_s_Guidance.pdf" target="_blank"><img src="http://www.travpart.com/tutorial/tutorial-downloadpdf.png" alt="Download Tutorial"></a></li>-->
								<!--<li class="mega-menu-item mega-menu-item-type-post_type mega-menu-item-object-page mega-align-bottom-left mega-menu-flyout">
                                    <a  class="mega-menu-link" href="http://www.travpart.com/tutorial/Partner_s_Guidance.pdf" target="_blank">HOW IT WORKS</a>
                                </li>-->
                                
                                <!-- <div class="mobileonly">
                                        <table style="width:90%" class="mobilemenutable">
                                            <tr style="background:#3b898a!important">
                                                <td><a class="mega-menu-link" href="https://www.travpart.com/English/" style="margin-left:9px"><i class="fas fa-home" style="font-size: 30px;margin-left:9px"></i><div style="margin-left:9px">Home
                                                </a></div></td>
                                                <td><a class="mega-menu-link" href="https://www.travpart.com/English/about-us/" style="margin-left:22px"><i class="fas fa-briefcase" style="font-size: 30px;margin-left:9px"></i><div style="margin-left:9px">About Us
                                                </a></div></td>
                                                <td><a class="mega-menu-link" href="https://www.travpart.com/English/travchat" style="margin-left:9px"><i class="fas fa-envelope" style="font-size: 30px;margin-right:9px"></i><div style="margin-right:9px">Message
                                                </a></div></td>
                                            </tr>
                                        </table>
                                        </div> -->
                                <?php
                                $append_menu_items = ob_get_contents();
                                ob_end_clean();

                                $main_menu = substr(trim($main_menu), 0, strlen($main_menu) - 11);
                                echo $main_menu . $append_menu_items . '</ul></div></div>';
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div> 

                    <!-- <div id="h-r" class="col-md-9">
                        <div id="menu">
                          <div class="navbar navbar-default" role="navigation">                        
                    <!--                        --><?php //wp_nav_menu( array( 'theme_location' => 'main-menu' ) );   ?>

        </div>
    </div>
</div>
</div>
</div>

<?php

if (is_page('user')) {
    echo ('<script type="text/javascript" src="' . get_stylesheet_directory_uri() . '/js/my-great-script.js"> </script>');
}

?>

<?php
// echo do_shortcode('[shubhshort]'); //for display
/*
  if(is_home() || is_front_page()) {
  putRevSlider( 'homepage' );
  } */
?>
<div id="content" style="background:#f5f5f5">
    <div class="container" style="border:1px solid #ccc;margin-top:-7px;background:white">
        

                <?php if (!is_home() && !is_front_page()) { ?>
                    <div class="row">
                        <div class="col-md-8">
                            <?php /* getBcrumbs(); */ ?>
                        </div>

                    </div>
                <?php } ?>