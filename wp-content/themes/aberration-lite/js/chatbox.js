//Toggle chat and links
function toggleFab() {
    $('.prime').toggleClass('zmdi-comment-outline');
    $('.prime').toggleClass('zmdi-close');
    $('.prime').toggleClass('is-active');
    $('.prime').toggleClass('is-visible');
    $('#prime').toggleClass('is-float');
    $('.chat').toggleClass('is-visible');
    $('.fab').toggleClass('is-visible');
}

$(function () {
	
	setTimeout("toggleFab()", 9000);
	
	$('#prime').click(function() {
       toggleFab();
    });

    $('#chat_fullscreen_loader').click(function (e) {
        $('.fullscreen').toggleClass('zmdi-window-maximize');
        $('.fullscreen').toggleClass('zmdi-window-restore');
        $('.chat').toggleClass('chat_fullscreen');
        $('.fab').toggleClass('is-hide');
        $('.header_img').toggleClass('change_img');
        $('.img_container').toggleClass('change_img');
        $('.chat_header').toggleClass('chat_header2');
        $('.fab_field').toggleClass('fab_field2');
        $('.chat_converse').toggleClass('chat_converse2');
    });

    $('#chat_converse').on('click', '#guestEmailSave', function () {
        $(this).addClass('disabled');
        $.ajax({
            url: "/English/travchat/user/update_email.php",
            method: "POST",
            async: false,
            data: {
                email: $('#guestEmail').val(),
            },
            success: function (status) {
                if (status == 0)
                    alert('Saved failed. Try again!');
                else if (status == 2)
                    alert('The email address already has been used.');
                else
                    alert('Email Added! As soon Seller replied you will receive email');
				$('#guestEmail').val('');
                getChat();
            }
        });
    });

});