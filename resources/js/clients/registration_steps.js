var importantValidationOptions = {
        validClass: "not-error",
        rules: {
            "full_name": {
                required: true,
                valid_full_name:true,
            },
            "phone_number": {
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
        },
        errorPlacement: function(error, element) {
            element.removeClass('not-error')
        },
        submitHandler: function(form) {
            var data = $(form).serialize();
            $.ajax({
                url: '/client/important-information',
                type: "POST",
                data: data,
                success: function( data ) {
                    console.log('id:', $(form).attr('data-id'))
                    registrationStepsSwitch(Number($(form).attr('data-id')))
                }
            });
        }
    }

var documentValidationOptions = {
    validClass: "not-error",
    rules: {
        "social_security": {
            required:true,
            extension: "jpg|jpeg|png",
            filesize : 1073741824,
        },
        "driver_license": {
            required: true,
            extension: "jpg|jpeg|png",
            filesize : true,
        },
    },
    errorPlacement: function(error, element) {
        element.removeClass('not-error')
    },
    submitHandler: function(form) {
        var data = new FormData(form)
        $.ajax({
            url: '/client/add/driver-license-social-security',
            type: "POST",
            data: data,
            cache:false,
            contentType: false,
            processData: false,
            success: function( data ) {
                setupReviewData(data)
                registrationStepsSwitch(Number($(form).attr('data-id')))
            }
        });
    }
}
var reviewValidationOptions = {
    validClass: "not-error",
    rules: {
        "client[full_name]": {
            required:true,
        },
        "client[dob]": {
            required:true,
        },
        "client[ssn]": {
            required:true,
        },
        "client[address]": {
            required:true,
            valid_address: true
        },
        "client[zip]": {
            required:true,
        },
        "client[sex_uploaded]": {
            required:true
        }
    },
    errorPlacement: function(error, element) {
        element.removeClass('not-error')
    },
    submitHandler: function(form) {
        var data = $(form).serialize();
        console.log('asd')
        $.ajax({
            url: $(form).attr('action'),
            type: "PUT",
            data: data,
            success: function( data ) {
                registrationStepsSwitch(Number($(form).attr('data-id')))
            }
        });
    }
}

setupReviewData = function(data) {
    $form = $('#add_client_5')
    if (!!data.uploadedData.first_name || !!data.uploadedData.last_name) {
        $form.find('[name="client[full_name]"]').val(`${data.uploadedData.first_name} ${data.uploadedData.last_name}`)
    }
    if (!!data.uploadedData.dob) {
        $form.find('[name="client[dob]"]').val(data.uploadedData.dob)
    }
    if (!!data.uploadedData.ssn) {
        $form.find('[name="client[ssn]"]').val(data.uploadedData.ssn)
    }
    if (!!data.uploadedData.number || !!data.uploadedData.name || !!data.uploadedData.city || !!data.uploadedData.state || !!data.uploadedData.zip) {
        $form.find('[name="client[address]"]').val(`${data.uploadedData.number} ${data.uploadedData.name} ${data.uploadedData.city} ${data.uploadedData.state} ${data.uploadedData.zip}`)
    }
}
var credentials = function(form){
    data = $(form).serialize()
    $.ajax({
        url: '/client/credentials-store',
        type: "POST",
        data: data,
        success: function( data ) {
            registrationStepsSwitch(Number($(form).attr('data-id')))
        }
    });
}

$.validator.addMethod("valid_full_name", function (value, element) {
        return !!value.match(/^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$/ig);
    }, "Please write your full name in this pattern first name middle name last name!!");

$.validator.addMethod('filesize', function (value, element) {
    return this.optional(element) || (element.files[0].size <= 10485760)
}, 'File size must be less than 1mb');

$.validator.addMethod("extension", function(value, element, param) {
    param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g";
    return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
},"Please enter a value with a valid extension.");

$.validator.addMethod("valid_address", function(value, element) {
    // return !!value.match(/^\d+\s[A-z0-9\s.\,\/]+(\.)?/g);
    return !!value.match(/^\d+\s[A-z0-9\s.\,\/]+\s[0-9]+(\.)?/g);
}, "Not valid address format.");

registrationStepsSwitch = function($old_id) {
    let $forms_count = Number($('.additional-reg:last').attr('data-id'));
    let $new_id = $old_id + 1;
    console.log($new_id, $forms_count,$old_id == $forms_count)
    if( $old_id == $forms_count ){
        $('.finish').removeClass('none');
        $('.finish').addClass('active').show();
        $(`.additional-reg[data-id="${$old_id}"]`).addClass('none').removeClass('active').hide();
        $(`.registration-stage[data-id="${$old_id}"]`).addClass('active');
        $(`.stage-img[data-id="${$old_id}"]`).removeClass('nonactive');
        $(`.registration-stage[data-id="finish"]`).addClass('prepare');
    } else if($new_id <= $forms_count){
        $(`.additional-reg[data-id="${$old_id}"]`).addClass('none').removeClass('active').hide();
        $(`.additional-reg[data-id="${$new_id}"]`).addClass('active').removeClass('none').show();
        $(`.registration-stage[data-id="${$old_id}"]`).addClass('active');
        $(`.stage-img[data-id="${$old_id}"]`).removeClass('nonactive');
        $(`.registration-stage[data-id="${$new_id}"]`).addClass('prepare');
    }

        if( $new_id == 3 ){
            $('.register-form').removeClass('big').addClass('large');
        }
        if( $new_id > 3 ){
            $('.register-form').removeClass('large').addClass('big');
        }

    $('html, body').animate({
        scrollTop: ($('.register-form').offset().top - 50)
    }, 1000);
}

$(document).ready(function(){
    $(document).on('change', '#secret_question', function(){
        if ($(this).val() == "other") {
            $("#custom-secret-question").removeClass('none')
        } else {
            $("#custom-secret-question").addClass('none')
        }
    })
    $('.phone').mask('(000) 000-0000')
    $('.ssn').mask('000-00-0000')

    $('#register_form').validate(importantValidationOptions)
    $('#add_client_3').validate(documentValidationOptions)
    $('#add_client_4').submit(function(e){
        e.preventDefault();
        credentials(this)
    })
    $('#add_client_5').validate(reviewValidationOptions)
});
