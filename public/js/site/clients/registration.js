$(document).ready(function($){
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

    $('#date').focus(function () {

        this.type='date';
    });
    $('#date').click(function () {
        this.type='date';
    })  ;
    $('#date').blur(function () {
        if(this.value==''){this.type='text'};
    });

    $(".ssn").mask("999-99-9999");
    $('#phone_number').mask('(000) 000-0000');

    $.validator.addMethod("valid_full_name", function(value, element) {
        return !!value.match(/^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$/ig);
    }, "Please write your full name in this pattern first name middle name last name!!");


    $('#client-registration-form').validate({
        rules: {
            "full_name": {
                required: true,
                valid_full_name:true,
            },
            "phone_number": {
                required: true
            },
            "ssn": {
                required: true
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
                minlength: 8
            },
            "password_confirmation": {
                required: true,
                equalTo: "#password"
            }
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
