$(document).ready(function($){
    $('#ein_number').mask('00-0000000')
    $('#social_number').mask('000-00-0000')
    $('#phone_number').mask('(000) 000-0000');
    $.validator.addMethod("valid_full_name", function(value, element) {
        return !!value.match(/^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$/ig);
    }, "Please write your full name in this pattern first name middle name last name!!");


    $('#clientDetailsForm').validate({
        validClass: "not-error",
        rules: {
            "full_name": {
                required: true,
                valid_full_name:true,
            },
            "phone_number": {
                required: true
            },

            "address": {
                required: true
            },


            "secret_question": {
                required: true
            },
            "secret_answer": {
                required: true
            },

        },
        messages: {
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
});
