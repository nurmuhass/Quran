//SHOW PASSWORD BOX
	$('.show_password').after('<input style="margin-top:8px" class="sp_checkbox" type="checkbox" /> Show Password');
		$('.sp_checkbox').change(function(){
				var prev = $(this).prev();
				var value = prev.val();
				var type = prev.attr('type');
				var id = prev.attr('id');
				var clas = prev.attr('class');
				var new_type = (type == 'password') ? 'text' : 'password';
				prev.remove();
		$(this).before('<input type="'+ new_type +'" value="'+ value +'" class="'+ clas +'" id="'+ id +'">');
	});
	
//END OF SHOW PASSWORD BOX

//LOGIN AUTHENTICATION
	$('#password_login').keypress(function(e){
		if(e.keyCode == 13){
			$('#submit_login').trigger('click');	
		}
	});
	
	$('#submit_login').click(function(){
		$('#feedback_login').css('display', 'block').html('<p style="color:#36ef6a;">Authenticating Credentials...</p>');
		var email_address_login = $('#email_address_login').val();
		var password_login = $('#password_login').val();
			if(email_address_login != ''){
				if(password_login != ''){
					$.post('./includes/logging.inc.php', {email_address_login:email_address_login, password_login:password_login},
						function(data){
							$('#feedback_login').css('display', 'block').html('<p>' +data +'</p>');
						});
				}else{
					$('#feedback_login').css('display', 'block').html('<p>Password field empty...</p>');
				}
			}else{
				$('#feedback_login').css('display', 'block').html('<p>Email address field empty...</p>');
			}
});//END OF LOGIN AUTHENTICATION

//SELECT SURAH
	$(document).on('change', '#surah_start', function(){
		var surah_name = $(this).val();
			$.post('./includes/select_surah_start.inc.php', {surah_name:surah_name},
				function(data){
					$('#surah_start_no').html(data);
				});
	});
//END OF SELECT SURAH

//SELECT SURAH END
	$(document).on('change', '#surah_end', function(){
		var surah_name = $(this).val();
			$.post('./includes/select_surah_start.inc.php', {surah_name:surah_name},
				function(data){
					$('#surah_end_no').html(data);
				});
	});
//END OF SELECT SURAH END

//SHOW VERSE
	$(document).on('click', '#verse_display', function(){
		var surah_start = $('#surah_start').val();
		var surah_start_no = $('#surah_start_no').val();
		var surah_end = $('#surah_end').val();
		var surah_end_no = $('#surah_end_no').val();
		var no_of_verse_to_display = $('#no_of_verse_to_display').val();
			$.post('./includes/verse_display.inc.php', {surah_start:surah_start, surah_start_no:surah_start_no, surah_end:surah_end, surah_end_no:surah_end_no, no_of_verse_to_display:no_of_verse_to_display},
				function(data){
					$('#feed_back').html('<b><center><h2>'+data+'</h2></center></b>');
				});
	});
//END OF SHOW VERSE