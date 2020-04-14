<?php
/**
 * Template Name: Full Width
 * @package Aberration Lite
*/

get_header(); ?>


<script>
	jQuery(document).ready(function($){
		 
		  var dtToday = new Date();
		  var month = dtToday.getMonth() + 1;
		  var day = dtToday.getDate();
		  var year = dtToday.getFullYear();
		  if(month < 10)
		      month = '0' + month.toString();
		  if(day < 10)
		      day = '0' + day.toString();
		  var maxDate = year + '-' + month + '-' + day;
		  $('#date_range').attr('min', maxDate);   	
	});
</script>

<style>
	.elementor-element-4b8869b,.elementor-element-6beff7d,.elementor-element-35674f7 {
    display: none;
}
</style>
    
<div id="primary" class="content-area container">
    <main id="main" class="site-main row">
                <div class="col-md-12" itemprop="mainContentOfPage">     
					<?php
                    // Start the loop.
                    while ( have_posts() ) : the_post();
                    
                    // Include the page content template.
                    get_template_part( 'template-parts/content', 'page' );
                    
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                    comments_template();
                    endif;
                    
                    // End the loop.
                    endwhile;
                    ?>  
                </div>       
                                                  
    </main>
	<?php if ( false && ( is_home() || is_front_page() )) { ?>
	<?php
	$agentIDSQL=<<<'EOD'
	SELECT (SELECT wp_users.ID FROM tourfrom_balieng2.wp_users,tourfrom_balieng2.user WHERE access = '1' AND activated='1' AND wp_users.user_login=user.username AND wp_users.ID=meta_value) as ID,
		MAX(score)
	FROM tourfrom_balieng2.`wp_tour`,tourfrom_balieng2.`wp_tourmeta`
	WHERE
		meta_key='userid' AND wp_tour.id=wp_tourmeta.tour_id
		AND wp_tour.id IN(
			SELECT meta_value FROM tourfrom_balieng2.`wp_posts`,tourfrom_balieng2.`wp_postmeta` WHERE `meta_key`='tour_id' AND wp_posts.ID=wp_postmeta.post_id AND wp_posts.post_status='publish'
		)
	GROUP BY meta_value
	ORDER BY `MAX(score)` DESC LIMIT 1
EOD;
	$agentID=$wpdb->get_row($agentIDSQL)->ID;
	$agentUser=$wpdb->get_row("SELECT `userid`,`username`,`photo`,`country`,`region`,`timezone` FROM tourfrom_balieng2.`user`,tourfrom_balieng2.wp_users WHERE wp_users.user_login=user.username AND wp_users.ID='{$agentID}'");
	if(empty($agentUser->photo)){
		$agent_avatar=get_english_user_avatar($agentID);
	}
	else{
		$agent_avatar = home_url() . '/English/travchat/' . $agentUser->photo;
	}
	$chatInitMsgRow=$wpdb->get_row("SELECT id,msg FROM tourfrom_balieng2.`wp_chat_messages` WHERE type=1 ORDER BY RAND() LIMIT 1");
	$chatInitMsg=$chatInitMsgRow->msg;
	if(empty($chatInitMsg)) {
		$chatInitMsg='Hi, can I help you?<br/>We have a limited discount for you. Would you like to know more?';
	}
	?>
	<script>
        $(function() {
			var messageSendCount=0;
			
			function getChat() {
				if (!!$('textarea[name="chat_message"]').val() || !!$('#guestEmail').val())
					return;
				$.ajax({
					url: '/English/travchat/user/chatbox_fetch_chat.php',
					type: 'POST',
					async: false,
					data: {
						fetch: 1,
						agent: <?php echo $agentUser->userid; ?>,
					},
					success: function(response) {
						if(!response.length) {
							response = '<span class="chat_msg_item chat_msg_item_admin">\
							<div class="chat_avatar"><img src="<?php echo $agent_avatar; ?>" /></div>\
							<?php echo $chatInitMsg;  ?> </span>' + response;
						}
						else
							messageSendCount++;
						$('#chat_converse').html(response);
						$("#chat_converse").scrollTop($("#chat_converse")[0].scrollHeight)
					}
				});
			}
		
			window.getChat=function(){ getChat(); }
			
            getChat();
            setTimeout("document.getElementById('chatbox_alert_sound').play();", 9000);
            var chatInit = false;
			
            $(document).ready(function() {
                if (!chatInit) {
                    $.ajax({
                        url: '/English/travchat/user/chatbox_init.php',
                        type: 'POST',
                        async: false,
                        data: {
                            agent: <?php echo $agentUser->userid; ?>,
                        },
                        success: function(response) {}
                    });
                    setInterval("getChat();", 30000);
                }
                chatInit = true;
            });
			
            // added on enter
            var sending = false;
            var input = document.getElementById("chatSend");
            input.addEventListener("keyup", function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();

                    if (sending) {
                        sending = true;
                        return;
                    }
					
					if(messageSendCount==0) {
						var MsgObj={
							agent: <?php echo $agentUser->userid; ?>,
							msg: $('textarea[name="chat_message"]').val(),
							InitMsgId: <?php echo $chatInitMsgRow->id; ?>,
							InitMsg: '<?php echo $chatInitMsg; ?>'
						};
					}
					else {
						var MsgObj={
							agent: <?php echo $agentUser->userid; ?>,
							msg: $('textarea[name="chat_message"]').val(),
						};
					}

                    if (!!$('textarea[name="chat_message"]').val()) {
                        $.ajax({
                            url: '/English/travchat/user/send_message.php',
                            type: 'POST',
                            data: MsgObj,
                            success: function(response) {
                                sending = false;
                                $('textarea[name="chat_message"]').val('');
                                getChat();
                            }
                        });
                    } else
                        alert('Please write message first');


                }
            });

            // added on click
            var sending = false;
            $('#fab_send').click(function() {
                if (sending) {
                    sending = true;
                    return;
                }
				
				if(messageSendCount==0) {
					var MsgObj={
						agent: <?php echo $agentUser->userid; ?>,
						msg: $('textarea[name="chat_message"]').val(),
						InitMsgId: <?php echo $chatInitMsgRow->id; ?>,
						InitMsg: '<?php echo $chatInitMsg; ?>'
					};
				}
				else {
					var MsgObj={
						agent: <?php echo $agentUser->userid; ?>,
						msg: $('textarea[name="chat_message"]').val(),
					};
				}
				
                if (!!$('textarea[name="chat_message"]').val()) {
                    $.ajax({
                        url: '/English/travchat/user/send_message.php',
                        type: 'POST',
                        data: MsgObj,
                        success: function(response) {
                            sending = false;
                            $('textarea[name="chat_message"]').val('');
                            getChat();
                        }
                    });
                } else
                    alert('Please write message first');
            });
        });
    </script>
	<div class="fabs">
        <div class="chat">
            <div class="chat_header">
                <div class="chat_option">
                    <div class="header_img">
                        <img src="<?php echo $agent_avatar; ?>" style="height: 55px;" />
                    </div>
                    <span id="chat_head"><?php echo $agentUser->username; ?></span> <br>
                    <span class="agent">Agent</span>
                    <span id="chat_fullscreen_loader" class="chat_fullscreen_loader">
                        <i class="fullscreen zmdi zmdi-window-maximize"></i></span>
                </div>
            </div>

            <div id="chat_converse" class="chat_conversion chat_converse">
            </div>

            <div class="fab_field">
                <a id="fab_send" class="fab"><i class="zmdi zmdi-mail-send"></i></a>
                <textarea id="chatSend" name="chat_message" placeholder="Send a message" class="chat_field chat_message"></textarea>
            </div>
            <audio id="chatbox_alert_sound" src="<?php bloginfo('template_url'); ?>/messagealert.mp3"></audio>
        </div>
        <a id="prime" class="fab"><i class="prime zmdi zmdi-comment-outline"></i></a>
    </div>
	<?php } ?>
</div>


    
<?php get_footer(); ?>    