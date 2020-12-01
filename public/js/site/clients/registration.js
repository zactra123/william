$(document).ready(function($) {
    // autocomplete = new google.maps.places.Autocomplete($("#address")[0], { types: ['address'], componentRestrictions: {country: "us"}});
    // google.maps.event.addListener(autocomplete, 'place_changed', function() {
    //     var place = autocomplete.getPlace();
    //     for (var i = 0; i < place.address_components.length; i++) {
    //         for (var j = 0; j < place.address_components[i].types.length; j++) {
    //             if (place.address_components[i].types[j] == "postal_code") {
    //                 $("#zip").val(place.address_components[i].long_name);
    //
    //             }
    //         }
    //     }
    // });

    $('.ssn').mask('000-00-0000')
    $('.ein').mask('00-0000000')
    $('.phone').mask('(000) 000-0000')
    $('#phone_number').mask('(000) 000-0000');

    $.validator.addMethod("valid_full_name", function (value, element) {
        return !!value.match(/^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$/ig);
    }, "Please write your full name in this pattern first name middle name last name!!");

    $.validator.addMethod("password_requirements", function (value, element) {
        var valid_length = !!value.match(/^(.{8,20})$/gm)
        var upper_lower = !!value.match(/(?=.*[A-Z]{1,})(?=.*[a-z]{1})/gm)
        var digit = !!value.match(/\d/gm)
        var special = !!value.match(/\W|_/g)
        // var special = !!value.match(/[!@$*+-]/gm)
        // var other_special = !!value.match(/^[a-zA-z\d!@$*+\-\s]{1,}$/gm)
        // var repeating = !value.match(/([A-Za-z\d!@$*+-])\1{2}/gm)
        // var consecutive = !value.match(/\d{9,}/mg)
        // var spaces = !value.match(/\s/gm)
        // var include_email = false
        // var email = $('#email').val()
        // if (email) {
        //     partsOfFourLetters = email.match(/.{4}/g).concat(
        //         email.substr(1).match(/.{4}/g),
        //         email.substr(2).match(/.{4}/g));
        //     include_email = new RegExp(partsOfFourLetters.join("|"), "i").test(value);
        // }

        return valid_length && upper_lower && digit && special
            // && other_special && repeating && consecutive && spaces && !include_email
    }, "Please pay attention on password requirements");

    // $('#password,#password-confirm').on('focus keyup', function(){
    $('#password').on('focus keyup', function(){
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
                        // .replace('{other-special-class}', default_class)
                        // .replace('{repeating-class}', default_class)
                        // .replace('{consecutive-class}', default_class)
                        // .replace('{spaces-class}', default_class)
                } else {
                    valid_length = !!password.match(/^(.{8,20})$/gm)
                    upper_lower = !!password.match(/(?=.*[A-Z]{1,})(?=.*[a-z]{1})/gm)
                    digit = !!password.match(/\d/gm)
                    special = !!password.match(/\W|_/g)
                    // special = !!password.match(/[!@$*+-]/gm)
                    // other_special = !!password.match(/^[a-zA-z\d!@$*+\-\s]{1,}$/gm)
                    // repeating = !password.match(/([A-Za-z\d!@$*+-])\1{2}/gm)
                    // consecutive = !password.match(/\d{9,}/mg)
                    // spaces = !password.match(/\s/gm)

                    password_requirements = password_requirements_template
                        .replace('{length-class}', valid_length ? success_class : failed_class)
                        .replace('{letters-class}', upper_lower ? success_class : failed_class)
                        .replace('{digit-class}', digit ? success_class : failed_class)
                        .replace('{special-class}', special ? success_class : failed_class)
                        // .replace('{other-special-class}', other_special ? success_class : failed_class)
                        // .replace('{repeating-class}', repeating ? success_class : failed_class)
                        // .replace('{consecutive-class}', consecutive ? success_class : failed_class)
                        // .replace('{spaces-class}', spaces ? success_class : failed_class)
                }


                // var email = $('#email').val()
                // if (email.length) {
                //     partsOfFourLetters = email.match(/.{4}/g).concat(
                //         email.substr(1).match(/.{4}/g),
                //         email.substr(2).match(/.{4}/g));
                //     include_email = new RegExp(partsOfFourLetters.join("|"), "i").test(password);
                //
                //     password_requirements = password_requirements.replace('{username-class}', !include_email ? success_class : failed_class)
                // } else {
                //     password_requirements = password_requirements.replace('{username-class}', default_class)
                // }
                return password_requirements
            },
            title: 'Password Requirements',
            placement: (window.innerWidth <1000 ? 'bottom' : 'right')
        })

        $($this).popover('show')
        $($this).popover('update')
    })

    $('#password').on('focusout', function(){
        $(this).popover('hide')
    })

    $('#password-confirm').bind("cut copy paste",function(e) {
        e.preventDefault();
    });



    $('#registration-form').validate({
        rules: {
            "full_name": {
                required: true,
                valid_full_name:true,
            },
            "phone_number": {
                required: true
            },
            'ssn': {

                required: '#ein_id:blank'

            },
            'ein': {
                required: '#ssn_id:blank'

            },
            //
            // "ssn": {
            //     required: true
            // },
            "dob": {
                required: true
            },
            "sex": {
                required: true
            },
            "secret_question": {
                required: true
            },
            "secret_answer": {
                required: true
            },
            "email": {
                required: true,
                email: true
            },
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
