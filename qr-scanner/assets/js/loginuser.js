$(document).ready(function() {
	
    
	jQuery.validator.addMethod("lettersonly", function(value, element) 
	{
		return this.optional(element) || /^[A-Za-z ]+$/i.test(value);
	}, "Letters and spaces only please"); 
	jQuery.validator.addMethod("letters_num_only", function(value, element) 
	{
		return this.optional(element) || /^[A-Za-z0-9 ]+$/i.test(value);
	}, "Letters and spaces only please"); 
	jQuery.validator.addMethod("html_tag_validation", function(value, element) 
	{ 
		if(/<(br|basefont|hr|input|source|frame|param|area|meta|!--|col|link|option|base|img|wbr|!DOCTYPE|a|abbr|acronym|address|applet|article|aside|audio|b|bdi|bdo|big|blockquote|body|button|canvas|caption|center|cite|code|colgroup|command|datalist|dd|del|details|dfn|dialog|dir|div|dl|dt|em|embed|fieldset|figcaption|figure|font|footer|form|frameset|head|header|hgroup|h1|h2|h3|h4|h5|h6|html|i|iframe|ins|kbd|keygen|label|legend|li|map|mark|menu|meter|nav|noframes|noscript|object|ol|optgroup|output|p|pre|progress|q|rp|rt|ruby|s|samp|script|section|select|small|span|strike|strong|style|sub|summary|sup|table|tbody|td|textarea|tfoot|th|thead|time|title|tr|track|tt|u|ul|var|video).*?>|<(video).*?<\/\2>/i.test(value) == true) {
		   return false;
		}else{
			return true;
		}
	}, "HTML Tag are not allowed"); 
	/* strong password */
	jQuery.validator.addMethod("strong_password", function(value, element) 
	{ 
			var strength = 0;
            /*length 5 characters or more
            if(value.length >= 5) {
                strength++;
            }*/
            /*contains lowercase characters*/
            if(value.match(/[a-z]+/)) {
                strength++;
            }
            /*contains digits*/
            if(value.match(/[0-9]+/)) {
                strength++;
            }
            /*contains uppercase characters*/
            if(value.match(/[A-Z]+/)) {
                strength++;
            }
			if(strength==3){
				return true;
			}else{
				return false;
			}

	}, "Password must contain digit & lowercase character & uppercase character"); 
	//blank space validator
	$.validator.addMethod("regx", function(value, element, regexpr) {
		return !regexpr.test(value);
	}, "Enter valid input");
	$.validator.addMethod("laxEmail", function(value, element) {
		if(value)
		{	
			if(value.indexOf("@")>0){
				var res = value.split("@");
				if(res[1].indexOf(".")>0){
					var res1=res[1].split(".");
					if(res1.length<=2){
						if(res1[1].length==3)	
						{	
							return this.optional( element ) ||  /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/.test( value );
						}
						else
						{
							return false;
						}							
					}
					else if(res1.length==3){
						if(res1[1].length==2 && res1[2].length==2)
						{	
							return this.optional( element ) ||  /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test( value );
						}	
						else
						{
							return false;
						}
					}
					else{
						return false;
					}
					}else{
					return false;
				}
				}else{
				return false;
			}
		}
		else
		{
			return true;
		}				
	}, 'Please enter a valid email address.');
    
    $('#userLogin').validate({
        rules: {
            username: {
                required: !0
            },
            password: {
                required: !0
            },
        },
        submitHandler: function(form) {
            var formData = new FormData($('#userLogin')[0]);
            $.ajax({
                url: "../includes/user_login.php",
                data: formData,
                type: 'post',
                async: !1,
                dataType: 'json',
                success: function(response) {
                    // console.log(response);
                    if (response == '10') {
                        $('#warningAlert').hide();
                        $('#statusinactiveAlert').delay(4000).fadeOut('slow').css('display', 'block');
                        $('#userLogin').trigger('reset')
                    } else if (response == 1) {
						
                        $('#warningAlert').hide();
                        $('#successAlert').delay(3000).fadeOut('slow').css('display', 'block');
                         window.location.href = '../index.php';
                    }
					else if (response == 2) {
						
                        $('#warningAlert').hide();
                        $('#successAlert').delay(3000).fadeOut('slow').css('display', 'block');
                         window.location.href = '../login/otplogin.php';
                    } else {
                        $('#warningAlert').hide();
                        $('#failedAlert').delay(3000).fadeOut('slow').css('display', 'block');
                        $('#userLogin').trigger('reset')
                    }
                },
                error: function(response) {
                    console.log(response)
                },
                cache: !1,
                contentType: !1,
                processData: !1
            })
        },
    })
});



