jQuery(document).ready(function ($) {
    // Perform AJAX login/register on form submit
    var loginicon = document.querySelector('#trizen-login-submit');
    var registericon = document.querySelector('#trizen-register-submit');
    jQuery('form#trizen-login-form, form#trizen-register-form').on('submit', function (e) {
        var curElement="#"+jQuery(this).attr('id');
        jQuery(curElement+' p.status', this).show().text(ajax_auth_object.loadingmessage);
        if (jQuery(this).attr('id') === 'trizen-register-form') {
            action    = 'trizen_ajaxregister';
            username  = jQuery('#reg-username').val();
            password  = jQuery('#reg-password').val();
            password2 = jQuery('#reg-password2').val()
            email     = jQuery('#reg-email').val();
            security  = jQuery('#signonsecurity').val();
            ctrl      = jQuery(this);
            registericon.innerHTML = '<i class="la la-refresh rotating"></i> Please Wait...';
            registericon.setAttribute('disabled', 'disabled');
            setTimeout(function() {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: ajax_auth_object.ajaxurl,
                    data: {
                        'action': action,
                        'username': username,
                        'password': password,
                        'password2': password2,
                        'email': email,
                        'security': security,
                    },
                    success: function (data) {
                        jQuery(curElement+' p.trizen-msg-status').text(data.message);
                        if (data.loggedin == true) {
                            jQuery('.trizen-msg-status').removeClass('loginerror');
                            jQuery('.trizen-msg-status').addClass('loginsucess');
                            document.location.href = jQuery(ctrl).attr ('id') == 'register' ? ajax_auth_object.register_redirect : ajax_auth_object.redirecturl;
                        } else {
                            jQuery('.trizen-msg-status').addClass('loginerror');
                            registericon.innerHTML = 'Register Account';
                            registericon.removeAttribute('disabled');
                        }
                    }
                })},2000)
        }
        else {
            action   = 'trizen_ajaxlogin';
            username = jQuery('form#trizen-login-form #username').val();
            password = jQuery('form#trizen-login-form #password').val();
            security = jQuery('form#trizen-login-form #security').val();
            ctrl     = jQuery(this);
            loginicon.innerHTML = '<i class="la la-refresh rotating"></i> Please Wait...';
            loginicon.setAttribute('disabled', 'disabled');
            setTimeout(function() {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: ajax_auth_object.ajaxurl,
                    data: {
                        'action': action,
                        'username': username,
                        'password': password,
                        'security': security,
                    },
                    success: function (data) {
                        jQuery(curElement+' p.trizen-msg-status').text(data.message);
                        if (data.loggedin === true) {
                            jQuery('.trizen-msg-status').removeClass('loginerror');
                            jQuery('.trizen-msg-status').addClass('loginsucess');
                            document.location.href = jQuery(ctrl).attr ('id') == 'register' ? ajax_auth_object.register_redirect : ajax_auth_object.redirecturl;
                        } else {
                            jQuery('.trizen-msg-status').addClass('loginerror');
                            loginicon.innerHTML = 'Login Account';
                            loginicon.removeAttribute('disabled');
                        }

                    }
                })},2000)
        }
        e.preventDefault();
    });
});