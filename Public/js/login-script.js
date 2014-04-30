jQuery(document).ready(function($) {
    $remember_checkbox = $('input[name="remember"]');
    if ($remember_checkbox.is(':checked')) $remember_checkbox.parent().addClass('checked');
    $remember_checkbox.live('change', function() {
        if ($(this).is(':checked')) $(this).parent().addClass('checked');
        else $(this).parent().removeClass('checked');
    });
    jQuery.fn.shake = function(intShakes, intDistance, intDuration) {
        this.each(function() {
            $(this).css({
                position: "relative"
            });
            for (var x = 1; x <= intShakes; x++) {
                $(this).animate({
                    left: (intDistance * -1)
                }, (((intDuration / intShakes) / 4))).animate({
                    left: intDistance
                }, ((intDuration / intShakes) / 2)).animate({
                    left: 0
                }, (((intDuration / intShakes) / 4)));
            }
        });
        return this;
    };
    if (!Modernizr.input.placeholder) {
        $('[placeholder]').focus(function() {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('').parent().addClass('focus');;
                input.removeClass('placeholder');
            }
        }).blur(function() {
            var input = $(this);
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.addClass('placeholder').parent().removeClass('focus');;
                input.val(input.attr('placeholder'));
            }
        }).mouseenter(function() {
            var input = $(this);
            input.parent().addClass('hover');
        }).mouseout(function() {
            var input = $(this);
            if (input.val() == '') input.parent().removeClass('hover');
        }).blur();
        $('[placeholder]').parents('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                    input.val('');
                }
            })
        });
    } else {
        $('[placeholder]').live({
            mouseenter: function() {
                $(this).parent().addClass('hover');
            },
            mouseout: function() {
                if ($(this).val() == '') $(this).parent().removeClass('hover');
            },
            focus: function() {
                $(this).parent().addClass('focus');
            },
            blur: function() {
                if ($(this).val() == '') $(this).parent().removeClass('focus keydown');
            },
            keydown: function() {
                $(this).parent().addClass('keydown');
            }
        });
    }
    var Form = function() {
        var reset_status = function($obj) {
            $obj.find('.status-img').attr('class', 'status-img icon');
        };
        var show_status = function($obj, msg, type, url, url_text, text_class, title) {
            if (text_class) $('h1.text').removeClass('text-sign text-active text-login').addClass(text_class);
            if (title) document.title = title + ' | 风云博客';
            reset_status($obj);
            $obj.find('.status-img').addClass(type);
            if (type == 'sending' || type == 'done' || type == 'actived-login') $obj.find('a.status-button').attr('href', 'http://' + url);
            $obj.find('.status-message').html(msg);
            $obj.find('.status-button').html(url_text);
            $obj.find('form').slideUp();
            $obj.find('.status').slideDown();
            $('.box-uc').addClass('form-status');
        };
        var clear_status = function() {
            $('.box-uc').removeClass('form-a form-r error-a error-r');
        };
        var show_form = function($obj) {
            $('h1.text').removeClass('text-forgot').addClass('text-login');
            document.title = '用户登录 | 风云博客';
            $obj.find('form').slideDown();
            $obj.find('.status').slideUp();
            $('.box-uc').removeClass('form-status');
        };
        var reset_form = function($obj) {
            $('input:not(:submit):gt(0)').removeAttr("disabled");
            $('.captcha-box').slideDown();
            $('input:not(:submit):gt(0)').val('');
            hide_loading($('input:not(:submit):gt(0)').val(''));
            input_disable($('input:not(:submit):gt(0)'));
            switch_login($obj, 'for-register', '注 册', 'text-sign');
        };
        var lock_submit = function($obj) {
            $(":submit").addClass('submit-btn-disabled').attr("disabled", "disabled");
        };
        var unlock_submit = function($obj) {
            $(":submit").removeClass('submit-btn-disabled').removeAttr("disabled");
        };
        var input_disable = function($obj) {
            $obj = $obj.filter(':not(input[type=hidden])');
            if (Modernizr.input.placeholder) {
                $obj.val('').attr("readonly", "readonly").parent().addClass('disabled');
            } else {
                $obj.val($obj.attr('placeholder'))
            }
            if (get_type() != 'for-resend')
                $('.warning').hide();
        };
        var input_enable = function($obj) {
            $obj.removeAttr("readonly").parent().removeClass('disabled');
        };
        var show_loading = function($obj) {
            setTimeout(function() {
                $obj.siblings().removeClass('pass').show();
            }, 1000);
        }
        var show_pass = function($obj) {
            setTimeout(function() {
                $obj.siblings().addClass('pass').show();
            }, 1000);
        }
        var hide_loading = function($obj) {
            setTimeout(function() {
                $obj.siblings().addClass('pass').hide();
            }, 1000);
        }
        var get_type = function() {
            return $(":submit").attr('id');
        };
        var shake_form = function($obj) {
            $obj.shake(2, 13, 250);
        }
        var switch_form = function($obj, type, tip, text) {
            $('.warning').hide();
            $(":submit").attr('id', type);
            $obj.parent().siblings('.remember-box,.shadow-box').hide();
            show_warning_msg(tip, 'tips')
            $('.submit-btn').val(text);
            if (type == 'for-resend') $('.box-bottom span').hide();
        };
        var switch_login = function($obj, type, text, text_class) {
            if (type != $(":submit").attr('id')) {
                $('h1.text').removeClass('text-sign text-active').addClass(text_class);
                $(":submit").attr('id', type);
                $obj.parent().siblings('.remember-box,.shadow-box').slideDown();
                $('.login-message').hide();
                reset_warning_msg();
                $('.submit-btn').val(text);
            }
        };
        var blink = function() {
            setTimeout(function() {
                $('.warning').css("background-color", "#bde4f3").animate({
                    backgroundColor: "#e1f4fb"
                }, 200);
            }, 800);
        }
        var reset_warning_msg = function() {
            $('.warning').removeAttr('style');
            $('.warning').removeClass('error tips').hide();
        };
        var show_warning_msg = function(msg, type) {
            reset_warning_msg();
            if (type == 'tips') {
                $('.warning').addClass(type).html(msg).slideDown();
                blink();
            } else {
                setTimeout(function() {
                    $('.warning').removeAttr('style');
                    $('.warning').addClass(type).html(msg).slideDown();
                }, 700);
                shake_form($(".box-uc"));
            }
        };
        var countdown_jump = function($obj, scd, url) {
            var timeout = scd;
            if (timeout != 0) {
                show();
                $obj.parent().bind('click', function(event) {
                    show_form($obj.parents());
                    return;
                });
            } else {
                $obj.bind('click', function(event) {
                    show_form($obj.parents());
                    return;
                });
            }

            function show() {
                $obj.html(timeout);
                timeout--;
                if (timeout == 0) {
                    show_form($obj.parents());
                } else {
                    setTimeout(show, 1000);
                }
            }
        };

        // 加载验证码
        // var load_captcha = function($obj) {
        // $($obj).load(_URL_ + "/verify");
        // };
        
        // 邮箱验证
        var check_loginname = function($obj) {
            lock_submit();
            // 更改注册邮箱
            if (get_type() == 'for-change-email') {
                unlock_submit();
                if ($('.box-uc').hasClass('form-a')) {
                    show_status($obj.parents(), '', 'email-changed', _URL_ + '/do_login', '<i>5</i>秒后跳转到登录页', 'text-change-email', '邮箱变更');
                    clear_status();
                    countdown_jump($('.status-button i'), 5, _URL_ + '/do_login');
                } else if ($('.box-uc').hasClass('error-a')) {
                    show_status($obj.parents(), '', 'error', '/', '返回首页', 'text-change-email', '邮箱变更');
                    $('.status-button').hide();
                    clear_status();
                }
                $obj.bind('blur', function() {
                    var email = $(this),
                        val = email.val();
                    if ($.trim(val) == '') {
                        hide_loading($obj)
                        return;
                    }
                    if (!/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test($.trim(val))) {
                        hide_loading($obj)
                        show_warning_msg('邮箱格式不正确', 'error');
                    } else {
                        show_loading($obj);
                        reset_warning_msg();
                        jQuery.post(_URL_ + '/check_email', {
                            email: val
                        }, function(data, textStatus, xhr) {
                            $obj.attr('data-status', data.state);
                            if (data.state == '1') {
                                $('input[name=password]').val('');
                                switch_form($obj, 'for-resend', '帐号未激活，请激活帐号。', '重新发送激活邮件')
                                $('#for-resend').addClass('for-reset');
                                $obj.bind('keydown', function() {
                                    switch_login($obj, 'for-login', '登 录', 'text-login');
                                    $obj.unbind('keydown');
                                    hide_loading($obj)
                                });
                                show_pass($obj);
                            } else if (data.state == '3') {
                                show_warning_msg('登录邮箱不存在', 'error');
                                hide_loading($obj);
                            } else {
                                switch_login($obj, 'for-login', '登 录', 'text-login');
                                show_pass($obj);
                            }
                            unlock_submit();
                        }, "json")
                    }
                });
            // 邮箱激活验证
            } else if (get_type() == 'for-active') {
                unlock_submit();
                show_status($obj.parents(), '', 'error', _URL_ + '/do_register', '重新激活');
                clear_status();
                countdown_jump($('.status-button'), 0, _URL_ + '/do_register');
                switch_form($obj, 'for-resend', '帐号未激活，请激活帐号。', '重新发送激活邮件')
                $obj.bind('blur', function() {
                    var email = $(this),
                        val = email.val();
                    if ($.trim(val) == '') {
                        hide_loading($obj)
                        return;
                    }
                    if (!/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test($.trim(val))) {
                        hide_loading($obj)
                        show_warning_msg('邮箱格式不正确', 'error');
                    } else {
                        show_loading($obj);
                        jQuery.post(_URL_ + '/check_email', {
                            email: val
                        }, function(data, textStatus, xhr) {
                            $obj.attr('data-status', data.state);
                            if (data.state == '1') {
                                $('input[name=password]').val('');
                                switch_form($obj, 'for-resend', '帐号未激活，请激活帐号。', '重新发送激活邮件')
                                $('#for-resend').addClass('for-reset');
                                $obj.bind('keydown', function() {
                                    switch_login($obj, 'for-login', '登 录', 'text-login');
                                    $obj.unbind('keydown');
                                    hide_loading($obj)
                                });
                                show_pass($obj);
                            } else if (data.state == '3') {
                                show_warning_msg('登录邮箱不存在', 'error');
                                hide_loading($obj);
                            } else {
                                switch_login($obj, 'for-login', '登 录', 'text-login');
                                show_pass($obj);
                            }
                            unlock_submit();
                        }, "json")
                    }
                });
            // 邮箱登录验证
            } else if (get_type() == 'for-login') {
                unlock_submit();
                if ($('.box-uc').hasClass('form-a')) {
                    show_status($obj.parents(), '', 'actived', _URL_ + '/do_login', '<i>5</i>秒后跳转到登录页', 'text-active', '帐号激活');
                    clear_status();
                    countdown_jump($('.status-button i'), 5, _URL_ + '/do_login');
                } else if ($('.box-uc').hasClass('error-a')) {
                    show_status($obj.parents(), '', 'error', _URL_ + '/do_register', '重新激活');
                    clear_status();
                    countdown_jump($('.status-button'), 0, _URL_ + '/do_register');
                } else if ($('.box-uc').hasClass('error-q')) {
                    show_status($obj.parents(), '该链接已经成过注册过，请直接登录。', 'success-reg', _URL_ + '/do_register', '登 录');
                    clear_status();
                    countdown_jump($('.status-button'), 0, _URL_ + '/do_register');
                } else if ($('.box-uc').hasClass('form-r')) {
                    show_status($obj.parents(), '', 'success', _URL_ + '/do_login', '<i>5</i>秒后跳转到登录页', 'text-forgot', '找回密码');
                    clear_status();
                    countdown_jump($('.status-button i'), 5, _URL_ + '/do_login');
                }

                $obj.bind('blur', function() {
                    var email = $(this),
                        val = email.val();
                    if ($.trim(val) == '') {
                        hide_loading($obj)
                        return;
                    }
                    if (!/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test($.trim(val))) {
                        hide_loading($obj)
                        show_warning_msg('邮箱格式不正确', 'error');
                    } else {
                        show_loading($obj);
                        reset_warning_msg();
                        jQuery.post(_URL_ + '/check_email', {
                            email: val
                        }, function(data, textStatus, xhr) {
                            $obj.attr('data-status', data.state);
                            if (data.state == '1') {
                                $('input[name=password]').val('');
                                switch_form($obj, 'for-resend', '帐号未激活，请激活帐号。', '重新发送激活邮件')
                                $('#for-resend').addClass('for-reset');
                                $obj.bind('keydown', function() {
                                    switch_login($obj, 'for-login', '登 录', 'text-login');
                                    $obj.unbind('keydown');
                                    hide_loading($obj);
                                });
                                show_pass($obj);
                            } else if (data.state == '2') {
                                switch_login($obj, 'for-login', '登 录', 'text-login');
                                show_pass($obj);
                            } else if (data.state == '3'){
                                show_warning_msg('该邮箱用户被禁用', 'error');
                                hide_loading($obj);
                            } else {
                                show_warning_msg('该邮箱尚未注册，马上<a href="' + _URL_ + '/register">注册</a>', 'error');
                                hide_loading($obj);
                            }
                            unlock_submit();
                        }, "json")
                    }
                });
            // 邮箱快速注册验证
            } else if (get_type() == 'for-quick-reg') {
                lock_submit();
                if ($('.box-uc').hasClass('error-a')) {
                    show_status($obj.parents(), '', 'error', _URL_ + '/do_register', '注 册');
                    clear_status();
                    countdown_jump($('.status-button'), 0, _URL_ + '/do_register');
                } else if ($('.box-uc').hasClass('error-r')) {
                    show_status($obj.parents(), '', 'invalid', _URL_ + '/do_getpwd', '重新找回密码');
                    clear_status();
                    countdown_jump($('.status-button'), 0, _URL_ + '/do_register');
                }
                $obj.bind('blur', function() {
                    var email = $(this),
                        val = email.val();
                    if ($.trim(val) == '') {
                        hide_loading($obj)
                        reset_form($obj);
                        return;
                    }
                    if (!/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test($.trim(val))) {
                        hide_loading($obj)
                        show_warning_msg('邮箱格式不正确', 'error');
                    } else {
                        show_loading($obj)
                        jQuery.post(_URL_ + '/check_email', {
                            email: val
                        }, function(data, textStatus, xhr) {
                            $obj.attr('data-status', data.state);
                            temp = $obj.val();
                            name_input = $obj.parents().find('input[name=user_name]')
                            password_input = $('input[name=password]');
                            input_disable($obj);
                            $obj.val(temp);
                            input_enable(name_input);
                            name_input.focus();
                            show_warning_msg('选择昵称和密码，快速成为网站用户', 'tips');
                            $('.captcha-box').hide();
                            show_pass($obj);
                            unlock_submit();
                        }, "json");
                    }
                }).blur();
            // 密码找回邮箱验证
            } else if (get_type() == 'for-forgot-password') {
                unlock_submit();
                if ($('.box-uc').hasClass('error-a')) {
                    show_status($obj.parents(), '', 'error', _URL_ + '/do_register', '注 册');
                    clear_status();
                    countdown_jump($('.status-button'), 0, _URL_ + '/do_register');
                } else if ($('.box-uc').hasClass('error-r')) {
                    show_status($obj.parents(), '', 'invalid', _URL_ + '/do_getpwd', '重新找回密码');
                    clear_status();
                    countdown_jump($('.status-button'), 0, _URL_ + '/do_getpwd');
                }
            // 注册邮箱验证
            } else if (get_type() == 'for-register') {
                lock_submit();
                if ($('.box-uc').hasClass('error-a')) {
                    show_status($obj.parents(), '', 'error', _URL_ + '/do_register', '注 册');
                    clear_status();
                    countdown_jump($('.status-button'), 0, _URL_ + '/do_register');
                } else if ($('.box-uc').hasClass('error-r')) {
                    show_status($obj.parents(), '', 'invalid', _URL_ + '/do_getpwd', '重新找回密码');
                    clear_status();
                    countdown_jump($('.status-button'), 0, _URL_ + '/do_register');
                }
                $obj.bind('blur', function() {
                    var email = $(this),
                        val = email.val();
                    if ($.trim(val) == '') {
                        hide_loading($obj)
                        reset_form($obj);
                        return;
                    }
                    if (!/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test($.trim(val))) {
                        hide_loading($obj)
                        show_warning_msg('邮箱格式不正确', 'error');
                    } else {
                        show_loading($obj)
                        jQuery.post(_URL_ + '/check_email', {
                            email: val
                        }, function(data, textStatus, xhr) {
                            $obj.attr('data-status', data.state);
                            if (data.state == '1') {
                                name_input = $obj.parents().find('input[name=user_name]')
                                password_input = $('input[name=password]');
                                password_input.focus();
                                switch_login($obj, 'for-resend', '重置密码并激活帐户', 'text-active');
                                show_warning_msg('该邮箱已注册，但帐户尚未激活。请重新输入密码，点击激活该帐户。', 'tips');
                                $('.captcha-box').hide();
                                show_pass($obj);
                                input_disable(name_input);
                                name_input.val(data.name);
                                unlock_submit();
                                input_enable(password_input);
                            } else if (data.state == '2') {
                                reset_form($obj);
                                show_warning_msg('该邮箱已注册，您可以直接 <a href="' + _URL_ + '/login/loginname/' + val + '">登录</a>，或者换一个邮箱继续注册。', 'tips');
                                hide_loading($obj);
                            } else if (data.state == '3') {
                                reset_form($obj);
                                show_warning_msg('该邮箱注册用户已被禁用！请换一个邮箱继续注册。', 'tips');
                                hide_loading($obj);
                            } else {
                                reset_form($obj);
                                name_input = $obj.parent().next().find('input')
                                input_enable(name_input);
                                name_input.focus();
                                show_pass($obj);
                            }
                        }, "json");
                    }
                }).bind('focus', function() {
                    reset_form($obj);
                    lock_submit();
                });
            }
        };

        // 用户名验证
        var check_username = function($obj) {
            // 重置用户名
            if (get_type() != 'for-resend')
                $obj.bind('blur', function() {
                    if (get_type() != 'for-resend') {
                        var me = $(this),
                            val = me.val();
                        if ($.trim(val) == '') {
                            if ($('input[name=user_name]').attr('readonly') != 'readonly')
                                input_disable($obj.parent().nextAll().find('input:not(:submit)'));
                            hide_loading($obj);
                            return;
                        }
                        if (val.length < 2) {
                            show_warning_msg('昵称不能少于2个字符', 'error');
                            input_disable($obj.parent().nextAll().find('input:not(:submit)'));
                            hide_loading($obj);
                        } else if (val.length > 16) {
                            show_warning_msg('昵称不能多于16个字符', 'error');
                            input_disable($obj.parent().nextAll().find('input:not(:submit)'));
                            hide_loading($obj);
                        } else {
                            show_loading($obj);
                            jQuery.post(_URL_ + '/check_register', {
                                username: val
                            }, function(data, textStatus, xhr) {
                                if (data.error) {
                                    if ($('input[name=user_name]').attr('readonly') != 'readonly') show_warning_msg(data.message, 'error');
                                    input_disable($obj.parent().nextAll().find('input:not(:submit)'));
                                    hide_loading($obj);
                                } else {
                                    password_input = $('input[name=password]')
                                    input_enable(password_input);
                                    show_pass($obj);
                                    reset_warning_msg();
                                    password_input.focus();
                                }
                            }, "json");
                        }
                    }
                });
        };

        // 密码验证
        var check_password = function($obj) {
            $obj.bind('blur', function() {
                var me = $(this),
                    val = me.val();
                if ($.trim(val) == '') {
                    hide_loading($obj);
                    return
                }
                if ($.trim(val).length < 4) {
                    show_warning_msg('密码不能少于4个字符', 'error');
                    input_disable($obj.parent().nextAll().find('input:not(:submit)'));
                    hide_loading($obj);
                } else if ($.trim(val).length > 16) {
                    show_warning_msg('密码不能多于16个字符', 'error');
                    input_disable($obj.parent().nextAll().find('input:not(:submit)'));
                    hide_loading($obj);
                } else if (/\s/g.test($.trim(val))) {
                    show_warning_msg('密码中只能包含字母、数字或符号', 'error');
                    input_disable($obj.parent().nextAll().find('input:not(:submit)'));
                    hide_loading($obj);
                } else {
                    show_pass($obj);
                    input_enable($obj.parents().find('input[name=captcha]'));
                    if ($('input[name=user_name]').attr('readonly') != 'readonly') {
                        reset_warning_msg();
                        unlock_submit();
                    }
                }
            }).bind('focus', function() {
                $obj.val('');
            });
        };

        // 验证码检测
        var check_captcha = function($obj) {
            $obj.bind('blur', function() {
                var me = $(this),
                    val = me.val();
                if ($.trim(val) == '') {
                    return
                }
                if (val.length != 4) {
                    show_warning_msg('请输入完整的验证码', 'error');
                    blink();
                } else {
                    unlock_submit();
                    show_loading($obj)
                    jQuery.post(_URL_ + '/check_register', {
                        verification: val
                    }, function(data, textStatus, xhr) {
                        if (data.error) {
                            show_warning_msg(data.message, 'error');
                            hide_loading($obj);
                        } else {
                            show_pass($obj);
                            reset_warning_msg();
                        }
                    }, "json");
                }
            }).bind('focus', function() {
                $obj.val('');
                hide_loading($obj);
            });
        };

        // 表单提交验证
        var form_submit = function($obj) {
            $obj.bind('submit', function() {
                var loginname = email = $obj.find('input[name="loginname"]').val(),
                    password = $obj.find('input[name="password"]').val(),
                    remember = $obj.find('input[name="remember"]').is(':checked'),
                    status = $obj.find('input[name="loginname"]').attr('data-status'),
                    passwordconfirm = $obj.find('input[name="password"]').val(),
                    verification = $obj.find('input[name="captcha"]').val(),
                    unique_id = $obj.find('input[name="unique_id"]').val(),
                    activation_key = $obj.find('input[name="activation_key"]').val(),
                    username = $obj.find('input[name="user_name"]').val();
                // 登录
                if (get_type() == 'for-login') {
                    if ($.trim(loginname) == '') {
                        show_warning_msg('请输入登录邮箱', 'error');
                        $obj.find('input[name="loginname"]').focus();
                    } else if ($.trim(password) == '') {
                        show_warning_msg('请输入登录密码', 'error');
                        $obj.find('input[name="password"]').focus();
                    } else {
                        jQuery.post(_URL_ + '/do_login', {
                            loginname: loginname,
                            password: $obj.find('input[name="password"]').val(),
                            remember: remember,
                            submit: true
                        }, function(data, textStatus, xhr) {
                            if (data.is_login) {
                                var link = ($('.status-button').attr('data-url') != '') ? $('.status-button').attr('data-url') : $('.home').attr('href');
                                location.href = link;
                            } else {
                                $obj.find('input[name="password"]').val('').focus();
                                show_warning_msg('登录密码错误，请重新输入', 'error');
                            }
                        }, "json");
                    }
                // 忘记密码
                } else if (get_type() == 'for-forgot-password') {
                    if (!/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test($.trim(loginname))) {
                        show_warning_msg('邮箱格式不正确', 'error');
                    } else {
                        jQuery.post(_URL_ + '/sending_email', {
                            email: loginname,
                            action: 'reset'
                        }, function(data, textStatus, xhr) {
                            if (data.sent) {
                                show_status($obj.parent(), '我们刚刚给您发送了一封电子邮件，请根据邮件提示重置密码。', 'sending', data.url, '查看邮件');
                            } else {
                                $obj.find('input[name="loginname"]').focus();
                                show_warning_msg(data.message, 'error');
                            }
                        }, "json");
                    }
                } else if (get_type() == 'for-forgot-password') {
                    if (!/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))$/i.test($.trim(loginname))) {
                        show_warning_msg('邮箱格式不正确', 'error');
                    } else {
                        jQuery.post(_URL_ + '/sending_email', {
                            email: loginname,
                            action: 'reset'
                        }, function(data, textStatus, xhr) {
                            if (data.sent) {
                                show_status($obj.parent(), '我们刚刚给您发送了一封电子邮件，请根据邮件提示重置密码。', 'sending', data.url, '查看邮件');
                            } else {
                                $obj.find('input[name="loginname"]').focus();
                                show_warning_msg(data.message, 'error');
                            }
                        }, "json");
                    }

                // 发送邮件
                } else if (get_type() == 'for-resend') {
                    lock_submit();
                    // 重新发送
                    if ($('.submit-btn').hasClass('for-reset')) {
                        jQuery.post(_URL_ + '/sending_email', {
                            email: email,
                            action: 'activate',
                            status: status
                        }, function(data, textStatus, xhr) {
                            unlock_submit();
                            if (data.sent) {
                                show_status($obj.parent(), '我们刚刚给您发送了一封电子邮件，请根据邮件提示激活帐号。', 'sending', data.url, '查看邮件');
                            } else {
                                $obj.find('input[name="loginname"]').focus();
                                show_warning_msg(data.message, 'error');
                            }
                        }, "json");
                    // 激活发送
                    } else {
                        jQuery.post(_URL_ + '/sending_email', {
                            email: email,
                            password: password,
                            action: 'activate',
                            status: status
                        }, function(data, textStatus, xhr) {
                            unlock_submit();
                            if (data.sent) {
                                show_status($obj.parent(), '我们刚刚给您发送了一封电子邮件，请根据邮件提示激活帐号。', 'sending', data.url, '查看邮件');
                            } else {
                                $obj.find('input[name=password]').focus();
                                show_warning_msg(data.message, 'error');
                            }
                        }, "json");
                    }
                // 快速注册
                } else if (get_type() == 'for-quick-reg') {
                    jQuery.post(_URL_ + '/quick_reg', {
                        agree: 'checked',
                        email: email,
                        username: username,
                        password: password,
                        passwordconfirm: passwordconfirm,
                        status: status,
                        submit: true,
                        verification: verification,
                        action: 'activate',
                        activation_key: activation_key,
                        unique_id: unique_id
                    }, function(data, textStatus, xhr) {
                        if (!data.error) {
                            show_status($obj.parent(), '', 'actived-login', data.url, '登 录');
                        } else {
                            show_warning_msg(data.message, 'error')
                        }
                    }, "json");
                // 注册
                } else if (get_type() == 'for-register') {
                    jQuery.post(_URL_ + '/do_register', {
                        agree: 'checked', // 是否同意协议……
                        email: email,
                        username: username,
                        password: password,
                        passwordconfirm: passwordconfirm,
                        status: status,
                        submit: true,
                        verification: verification,
                        action: 'activate'
                    }, function(data, textStatus, xhr) {
                        if (data.sent) {
                            show_status($obj.parent(), '您即将完成用户注册。我们刚刚给您发送了一封电子邮件，请根据邮件提示激活帐号。', 'done', data.url, '查看邮件');
                        } else {
                            show_warning_msg(data.message, 'error')
                        }
                    }, "json");
                }
                return false;
            });
        }
        var login = function($form) {
            email_input = $form.find('input[name="loginname"]');
            password_input = $form.find('input[name="password"]');
            check_loginname(email_input);
            form_submit($form);
        };
        var register = function($form) {
            input_disable($('input:not(:submit):gt(0)'))
            // load_captcha($form.find('.captcha-img'));
            email_input = $form.find('input[name="loginname"]');
            user_name_input = $form.find('input[name="user_name"]');
            password_input = $form.find('input[name="password"]');
            captcha_input = $form.find('input[name="captcha"]');
            check_loginname(email_input);
            check_username(user_name_input);
            check_password(password_input);
            check_captcha(captcha_input)
            form_submit($form);
            // $('.captcha-img, .refresh-captcha').live('click', function() {
            //     load_captcha($('.captcha-img'));
            // });
        };
        var valid = function($form) {};
        return {
            login: login,
            register: register,
            valid: valid
        }
    }();
    $('.login form').bind('do-login', function() {
        Form.login($(this));
    });
    $('.register form').bind('do-register', function() {
        Form.register($(this));
    });
    $('.login form').trigger('do-login');
    $('.register form').trigger('do-register');
});