$(document).ready(function($) {



    $.validator.addMethod("password_requirements", function (value, element) {
        var valid_length = !!value.match(/^(.{8,20})$/gm)
        var upper_lower = !!value.match(/(?=.*[A-Z]{1,})(?=.*[a-z]{1})/gm)
        var digit = !!value.match(/\d/gm)
        var special = !!value.match(/\W|_/g)



        return valid_length && upper_lower && digit && special
            // && other_special && repeating && consecutive && spaces && !include_email
    }, "Please pay attention on password requirements");

    $('#password,#password-confirm').on('focus keyup', function(){
        var $this = this;
        $($this).popover({
            html: true,
            trigger: 'manual',
            content: function () {
                var default_class = 'fa-check-circle text-secondary',
                    success_class = 'fa-check-circle text-success',
                    failed_class = 'fa-minus-circle text-danger',
                    password_requirements_template = $('#password-requirements').html(),
                    password = $($this).val();

                if (!password.length) {
                    password_requirements = password_requirements_template
                        .replace('{length-class}', default_class)
                        .replace('{letters-class}', default_class)
                        .replace('{digit-class}', default_class)
                        .replace('{special-class}', default_class)

                } else {
                    valid_length = !!password.match(/^(.{8,20})$/gm)
                    upper_lower = !!password.match(/(?=.*[A-Z]{1,})(?=.*[a-z]{1})/gm)
                    digit = !!password.match(/\d/gm)
                    special = !!password.match(/\W|_/g)


                    password_requirements = password_requirements_template
                        .replace('{length-class}', valid_length ? success_class : failed_class)
                        .replace('{letters-class}', upper_lower ? success_class : failed_class)
                        .replace('{digit-class}', digit ? success_class : failed_class)
                        .replace('{special-class}', special ? success_class : failed_class)

                }

                // }
                return password_requirements
            },
            title: 'Password Requirements',
            placement: (window.innerWidth <1000 ? 'bottom' : 'right')
        })

        $($this).popover('show')
        $($this).popover('update')
    })

    $('#password,#password-confirm').on('focusout', function(){
        $(this).popover('hide')
    })

    $('#change-password').validate({
        rules: {

            "password": {
                required: true,
                password_requirements: true
            },
            "password_confirmation": {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            "password": 'Please use valid password format',
            "password_confirmation": {
                equalTo: "Password confirmation doesn't match Password"
            }
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "sex") {
                error.insertAfter($(element).closest("div"));
            } else {
                error.insertAfter(element);
            }
        }
    })


    $('#client-registration-form').submit(function () {
        if (!$(this).valid()){
            $('#client-registration-form .form-control.error')[0].focus()
        }
    })

    $('#secret_question').on('change', function(){
        if ($(this).val() == "other") {
            $("#custom-secret-question").removeClass('hidden')
        } else {
            $("#custom-secret-question").addClass('hidden')
        }
    })
});
