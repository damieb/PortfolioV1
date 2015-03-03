/*
Validation infos contact
*/
$(document).ready(function(){
	//Variables
	var form = $("#contact");
	var name = $("#name-contact");
	var nameGroup = $("#nameGroup");
	var email = $("#email");
	var emailGroup = $("#emailGroup");
	var message = $("#msg");
	var messageGroup = $("#messageGroup");
	var captcha = $('#result');

	//Blur
	name.blur(validateName);
	email.blur(validateEmail);
	message.blur(validateMessage);
	captcha.blur(validateCaptcha);

	//Submit
	$('#contact').submit(function(){
	if(validateName() & validateEmail() & validateMessage() & validateCaptcha())
		return true
		else
		return false;
	});
	//validation functions
	function validateEmail(){

		var a = $("#email").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		
		//Test regEX mail
		if(filter.test(a)){
			$('#errorMail').remove();
			email.removeClass('error');
			email.addClass('success');
			return true;
		}

		//Test existence valeur
		else if(email.val() === ''){
			$('#errorMail').remove();
			var errorMail = $('<small id="errorMail" class="error">Vous devez entrer une adresse-mail</small>');
			email.addClass('error');
			emailGroup.append(errorMail);
			return false;
		}
		
		else{
			$('#errorMail').remove();
			var errorMail = $('<small id="errorMail" class="error">Veuillez entrez une adresse-mail valide</small>');
			email.addClass('error');
			emailGroup.append(errorMail);
			return false;
		}
	}

	function validateName(){

		//Test existence valeur
		if(name.val() === ''){
			$('#errorName').remove();
			var errorName = $('<small id="errorName" class="error">Vous devez entrer un nom</small>');
			name.addClass('error');
			nameGroup.append(errorName);
			return false;
		}
		
		else{
			$('#errorName').remove();
			name.removeClass('error');
			name.addClass('success');
			return true;
		}
	}

	function validateMessage(){

		//Test existence valeur
		if(message.val() === ''){
			$('#errorMessage').remove();
			var errorMessage = $('<small id="errorMessage" class="error">Vous devez entrer un message</small>');
			message.addClass('error');
			messageGroup.append(errorMessage);
			return false;
		}
		
		else{
			$('#errorMessage').remove();
			message.removeClass('error');
			message.addClass('success');
			return true;
		}
	}

	function validateCaptcha(){
		$.ajax({
			type: "POST",
			url: "../portfolio/contact/checkCaptcha",
			async:false,
			data: {res: $('#result').val()},
			dataType: "json",
			success: function(content){
				if(content == 'good'){
					$('#result').removeClass('error');
					$('#result').addClass('success');
					var check = true;
				}
				if(content == 'fail'){
					$('#result').removeClass('success');
					$('#result').addClass('error');
					var check = false;
				}
			}
		});
		return check;
	}

	function showCaptcha(){
        $.ajax({
            url: "../portfolio/contact/captcha",
            ifModified:true,
            success: function(content){
            document.getElementById("captchaGroup").innerHTML = "";
                var nb1 = $('<li class="small-circle blue-circle"><div class="grey-circle internal-small-circle">'+content[0]+'</div></div></li>');
                var operator = $('<li class="operator">'+content[2]+'</li>');
                var nb2 = $('<li class="small-circle blue-circle"><div class="grey-circle internal-small-circle">'+content[4]+'</div></div></li>');
                var operator2 = $('<li class="operator">=</li>');
                var inputRes = $('<li><input class="internal-small-circle" type="text" id="result" name="result" /></div></li>')
                $('#captchaGroup').append(nb1);
                $('#captchaGroup').append(operator);
                $('#captchaGroup').append(nb2); 
                $('#captchaGroup').append(operator2);  
                $('#captchaGroup').append(inputRes);
            }
        });
	}
	showCaptcha();
});