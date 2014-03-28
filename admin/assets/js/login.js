var Login = function () {
    var b = function () {
        if ($.fn.uniform) {
            $(":radio.uniform, :checkbox.uniform").uniform()
        }
    };
    var c = function () {
        $(".sign-up").click(function (h) {
            h.preventDefault();
            $(".login-form").slideUp(350, function () {
                $(".register-form").slideDown(350);
                $(".sign-up").hide()
            })
        });
        $(".back").click(function (h) {
            h.preventDefault();
            $(".register-form").slideUp(350, function () {
                $(".login-form").slideDown(350);
                $(".sign-up").show()
            })
        })
    };
    var g = function () {
        $(".forgot-password-link").click(function (h) {
            h.preventDefault();
            $(".forgot-password-form").slideToggle(200);
            $(".inner-box .close").fadeToggle(200)
        });
        $(".inner-box .close").click(function () {
            $(".forgot-password-link").click()
        })
    };
    var e = function () {
        if ($.validator) {
            $.extend($.validator.defaults, {
                errorClass: "has-error",
                validClass: "has-success",
                highlight: function (k, i, j) {
                    if (k.type === "radio") {
                        this.findByName(k.name).addClass(i).removeClass(j)
                    } else {
                        $(k).addClass(i).removeClass(j)
                    }
                    $(k).closest(".form-group").addClass(i).removeClass(j)
                },
                unhighlight: function (k, i, j) {
                    if (k.type === "radio") {
                        this.findByName(k.name).removeClass(i).addClass(j)
                    } else {
                        $(k).removeClass(i).addClass(j)
                    }
                    $(k).closest(".form-group").removeClass(i).addClass(j);
                    $(k).closest(".form-group").find('label[generated="true"]').html("")
                }
            });
            var h = $.validator.prototype.resetForm;
            $.extend($.validator.prototype, {
                resetForm: function () {
                    h.call(this);
                    this.elements().closest(".form-group").removeClass(this.settings.errorClass + " " + this.settings.validClass)
                },
                showLabel: function (j, k) {
                    var i = this.errorsFor(j);
                    if (i.length) {
                        i.removeClass(this.settings.validClass).addClass(this.settings.errorClass);
                        if (i.attr("generated")) {
                            i.html(k)
                        }
                    } else {
                        i = $("<" + this.settings.errorElement + "/>").attr({
                            "for": this.idOrName(j),
                            generated: true
                        }).addClass(this.settings.errorClass).addClass("help-block").html(k || "");
                        if (this.settings.wrapper) {
                            i = i.hide().show().wrap("<" + this.settings.wrapper + "/>").parent()
                        }
                        if (!this.labelContainer.append(i).length) {
                            if (this.settings.errorPlacement) {
                                this.settings.errorPlacement(i, $(j))
                            } else {
                                i.insertAfter(j)
                            }
                        }
                    } if (!k && this.settings.success) {
                        i.text("");
                        if (typeof this.settings.success === "string") {
                            i.addClass(this.settings.success)
                        } else {
                            this.settings.success(i, j)
                        }
                    }
                    this.toShow = this.toShow.add(i)
                }
            })

        }
    };
    var d = function () {
        if ($.validator) {
            $(".login-form").validate({
                invalidHandler: function (i, h) {
                    NProgress.start();
                    $(".login-form .alert-danger").show();
                    NProgress.done()
                },
                submitHandler: function (h) {
					h.submit();
					
                   // window.location.href = "login.php"
                }
            })
        }
    };
    var f = function () {
        if ($.validator) {
            $(".forgot-password-form").validate({
                submitHandler: function (h) {
				var is_set = false;
				var email = $("#email").val();
				$.post("ajax_func.php", {'email':email,'type':'admin','mod':'forgot'}, function(data){
				 if (data==1)
				 	 
				 {
				  $(".inner-box").slideUp(350, function () {
					
					
					
                        $(".forgot-password-form").hide();
                        $(".forgot-password-link").hide();
                        $(".inner-box .close").hide();
                        $("#forgot-done").show();
                        $(".inner-box").slideDown(350)
                    });
				 }else 
				 {
				   $(".inner-box").slideUp(350, function () {
					
					
					
                        $(".forgot-password-form").hide();
                        $(".forgot-password-link").hide();
                        $(".inner-box .close").hide();
                        $("#forgot-undone").show();
                        $(".inner-box").slideDown(350)
                    });
				 }
				 
				});
               
				
                   
					
                    return false;
                }
				
            })
        }
    };
    var a = function () {
        if ($.validator) {
            $(".register-form").validate({
                invalidHandler: function (i, h) {},
                submitHandler: function (h) {
					//					$(this).submit();
                  //  window.location.href = "index.html"
                }
            })
        }
    };
    return {
        init: function () {
            b();
            c();
            g();
            e();
            d();
            f();
            a()
        },
    }
}();