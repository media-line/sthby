	function requestcall(empty_phone, incorrect_phone, error_sending, successful_sending, disable_btn, module_id) {
		event.preventDefault();
		var form = jQuery(this); 
		var error = false; 
		var phone = jQuery("#phone-"+module_id).val();
	//	var email = jQuery("#email-"+module_id).val();
		var errortext = '';
		var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
/*
		if ( !pattern.test(email) ) {
			error = true; 
			jQuery("#email-"+module_id).css({'border-color': '#ff3333'});
			jQuery("#messages-"+module_id).text('');
			jQuery("#messages-"+module_id).append('<p style="color: #ff3333;">Неверный формат email</p>');
		}
		if (email == '') { 
			error = true; 
			jQuery("#email-"+module_id).css({'border-color': '#ff3333'});
			jQuery("#messages-"+module_id).text('');
			jQuery("#messages-"+module_id).append('<p style="color: #ff3333;">Введите Ваш email</p>');
		}*/		if (phone == '') { 			error = true; 			jQuery("#phone-"+module_id).css({'border-color': '#ff3333'});			jQuery("#messages-"+module_id).text('');			jQuery("#messages-"+module_id).append('<p class="uk-text-danger">'+empty_phone+'</p>');		}
		if (!error) { 
			var data = jQuery("#requestform-"+module_id).serialize();
			jQuery.ajax({ 
				type: 'POST', 
			    url: '/modules/mod_requestcall/send.php', 
			    data: data, 
		        beforeSend: function() { 
		            jQuery('#sendform-'+module_id).attr('disabled', 'disabled'); 
		        },
				success: function(data){ 
		       		if (data != 'success') { 						
						if (data == 'error_captcha') { 
							jQuery("#messages-"+module_id).text('');
							jQuery("#messages-"+module_id).append('<p class="uk-text-danger">Введите капчу</p>');
						} else {
							jQuery("#messages-"+module_id).text('');
							jQuery("#messages-"+module_id).append('<p class="uk-text-danger">'+error_sending+'</p>');
						}
		       		} else { 
						jQuery('#requestform-'+module_id)[0].reset();
						jQuery("#messages-"+module_id).text('');
						jQuery("#messages-"+module_id).append('<p class="uk-text-success">'+successful_sending+'</p>');
						jQuery("#phone-"+module_id).css({'border-color': '#ddd'});
		       		}
		        },
		        error:function(xhr, ajaxOptions, thrownError){					alert(xhr.status+'!!'+thrownError);
					jQuery('form')[0].reset(); 
					jQuery("#messages-"+module_id).text('');
					jQuery("#messages-"+module_id).append('<p style="color: #ff3333;">'+error_sending+'</p>');
				},
				complete:function(){
					jQuery('#sendform-'+module_id).prop('disabled', false); 
				}
			});
		}
		return false; 
	};	
