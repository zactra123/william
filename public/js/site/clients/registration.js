// $(document).ready(function($) {
//     // autocomplete = new google.maps.places.Autocomplete($("#address")[0], { types: ['address'], componentRestrictions: {country: "us"}});
//     // google.maps.event.addListener(autocomplete, 'place_changed', function() {
//     //     var place = autocomplete.getPlace();
//     //     for (var i = 0; i < place.address_components.length; i++) {
//     //         for (var j = 0; j < place.address_components[i].types.length; j++) {
//     //             if (place.address_components[i].types[j] == "postal_code") {
//     //                 $("#zip").val(place.address_components[i].long_name);
//     //
//     //             }
//     //         }
//     //     }
//     // });
//
//     $('.ssn').mask('000-00-0000')
//     $('.ein').mask('00-0000000')
//     $('.phone').mask('(000) 000-0000')
//     $('#phone_number').mask('(000) 000-0000');
//
//     $.validator.addMethod("valid_full_name", function (value, element) {
//         return !!value.match(/^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$/ig);
//     }, "Please write your full name in this pattern first name middle name last name!!");
//
//     $.validator.addMethod("password_requirements", function (value, element) {
//         var valid_length = !!value.match(/^(.{8,20})$/gm)
//         var upper_lower = !!value.match(/(?=.*[A-Z]{1,})(?=.*[a-z]{1})/gm)
//         var digit = !!value.match(/\d/gm)
//         var special = !!value.match(/\W|_/g)
//
//         return valid_length && upper_lower && digit && special
//             // && other_special && repeating && consecutive && spaces && !include_email
//     }, "Please pay attention on password requirements");
//
//     // $('#password,#password-confirm').on('focus keyup', function(){
//     $('#password').on('focus keyup', function(){
//         var $this = this;
//         $($this).popover({
//             html: true,
//             trigger: 'manual',
//             content: function () {
//                 var default_class = 'fa-check-circle text-secondary',
//                     success_class = 'fa-check-circle text-success',
//                     failed_class = 'fa-minus-circle text-danger',
//                     password_requirements_template = $('#password-requirements').html(),
//                     password = $($this).val();
//
//                 if (!password.length) {
//                     password_requirements = password_requirements_template
//                         .replace('{length-class}', default_class)
//                         .replace('{letters-class}', default_class)
//                         .replace('{digit-class}', default_class)
//                         .replace('{special-class}', default_class)
//                 } else {
//                     valid_length = !!password.match(/^(.{8,20})$/gm)
//                     upper_lower = !!password.match(/(?=.*[A-Z]{1,})(?=.*[a-z]{1})/gm)
//                     digit = !!password.match(/\d/gm)
//                     special = !!password.match(/\W|_/g)
//
//                     password_requirements = password_requirements_template
//                         .replace('{length-class}', valid_length ? success_class : failed_class)
//                         .replace('{letters-class}', upper_lower ? success_class : failed_class)
//                         .replace('{digit-class}', digit ? success_class : failed_class)
//                         .replace('{special-class}', special ? success_class : failed_class)
//                 }
//
//
//                 return password_requirements
//             },
//             title: 'Password Requirements',
//             placement: (window.innerWidth <1000 ? 'bottom' : 'right')
//         })
//
//         $($this).popover('show')
//         $($this).popover('update')
//     })
//
//     $('#password').on('focusout', function(){
//         $(this).popover('hide')
//     })
//
//     $('#password-confirm').bind("cut copy paste",function(e) {
//         e.preventDefault();
//     });
//
//
//
//     $('#registration-form').validate()
//
//
//     $('#client-registration-form').submit(function () {
//         if (!$(this).valid()){
//             $('#client-registration-form .form-control.error')[0].focus()
//         }
//     })
//
//     $('#secret_question').on('change', function(){
//         if ($(this).val() == "other") {
//             $("#custom-secret-question").removeClass('hidden')
//         } else {
//             $("#custom-secret-question").addClass('hidden')
//         }
//     })
// });

var validationOptions = {
        validClass: "not-error",
        rules: {
            "full_name": {
                required: true,
                valid_full_name:true,
            },
            "phone_number": {
                required: true
            },
            'ssn': {
                required: {
                    depends: function(){
                        return $('input[name="ein"]').val() == undefined || $('input[name="ein"]').val() == ''
                    }
                },
                valid_length: {
                    param: 11,
                    depends: function(element) {
                        return $('input[name="ssn"]').val() != ''
                    }
                }

            },
            'ein': {
                required: {
                    depends: function(){
                        return $('input[name="ssn"]').val() == undefined || !$('input[name="ssn"]').valid()
                    }
                },
                valid_length: {
                    param: 10,
                    depends: function(element) {
                        return  $('input[name="ein"]').val() != undefined && $('input[name="ein"]').val() != ''
                    }
                }

            },
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
                equalTo: "#register_password_confirm"
            }
        },
        messages: {
            "password": 'Please use valid password format',
            "password_confirmation": {
                equalTo: "Password confirmation doesn't match Password"
            }
        },
        errorPlacement: function(error, element) {
            element.removeClass('not-error')
        },
    }

$.validator.addMethod("password_requirements", function (value, element) {
        var valid_length = !!value.match(/^(.{8,20})$/gm)
        var upper_lower = !!value.match(/(?=.*[A-Z]{1,})(?=.*[a-z]{1})/gm)
        var digit = !!value.match(/\d/gm)
        var special = !!value.match(/\W|_/g)

        return valid_length && upper_lower && digit && special
            // && other_special && repeating && consecutive && spaces && !include_email
    }, "Please pay attention on password requirements");

$.validator.addMethod("valid_full_name", function (value, element) {
        return !!value.match(/^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$/ig);
    }, "Please write your full name in this pattern first name middle name last name!!");

$.validator.addMethod("valid_length", function (value, element, require_length) {
    return value.length == require_length
}, "This field is not valid!");

$(document).ready(function(){

    let $type = 'client';
    $('form.additional-reg').submit(function(e){
        e.preventDefault();
        $type = $("input[type='radio']:checked").val()
        $form = $(`[id="${$type}-registration-form"]`).html()
        $(`.register_form`).html($form)


        //Validation Start
        $('#register_form').validate(validationOptions)
        //Validation End

        let $old_id = Number($(this).attr('data-id'));
        let $new_id = $old_id + 1;
        $(`.additional-reg[data-id="${$old_id}"]`).addClass('none').removeClass('active').hide();
        $(`.additional-reg[data-id="${$new_id}"]`).addClass('active').removeClass('none').show();
        $(`.registration-stage[data-id="${$old_id}"]`).addClass('active');
        $(`.registration-stage[data-id="${$new_id}"]`).addClass('prepare');

        $('html, body').animate({
            scrollTop: ($('.register-form').offset().top - 50)
        }, 1000);
    });

    $('.ssn').mask('000-00-0000')
    $('.ein').mask('00-0000000')
    $('.phone').mask('(000) 000-0000')

    $(document).on('change', '#secret_question', function(){
        if ($(this).val() == "other") {
            $("#custom-secret-question").removeClass('none')
        } else {
            $("#custom-secret-question").addClass('none')
        }
    })

    $(document).bind("cut copy paste", '#register_password',function(e) {
        e.preventDefault();
    });

    let $register_type = $('input[name="register_type"]');
    $register_type.on('change', function(){
        $(this).parents('.register-type').addClass('active');
        $(this).parents('.register-type').siblings('.active').removeClass('active');
        if( $(this).val() == "broker" ) {
            $('.registration-stage[data-type="only_broker"]').addClass('up');
            setTimeout(function(){
                $('.registration-stage[data-type="only_broker"]').addClass('hidden');
                $('.registration-stages').addClass('center');
            }, 100)
        } else {
            $('.registration-stage[data-type="only_broker"]').removeClass('hidden');
            setTimeout(function(){
                $('.registration-stage[data-type="only_broker"]').removeClass('up');
            },100)
            setTimeout(function(){
                $('.registration-stages').removeClass('center');
            },800)
        }
    });


    $(document).on('focus keyup','#register_password', function(){
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


                return password_requirements
            },
            title: 'Password Requirements',
            placement: (window.innerWidth <1000 ? 'bottom' : 'right')
        })

        $($this).popover('show')
        $($this).popover('update')
    })

    $(document).on('focusout','#register_password', function(){
        $(this).popover('hide')
    })
});
