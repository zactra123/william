$(document).ready(function () {
    var i=0;

    $(".add-ip-address").on('click', function(){
        i++
        var newDiv = "<div class='form-group row font justify-content-center' id='delete-"+i+"'>"
        var newDiv = newDiv + "<div class='col-sm-12 col-md-11 form-group'>"
        var addIp = "<input type='text' name='receptionist[ip_address][][ip_address]' class = 'form-control ip-address' placeholder = 'IP Address'> </div>"
        addIp +=  '<div class="col-sm-12 col-md-1 form-group pl-0"> <input class="delete-ip-address btn btn-danger" type="button" data-target="'+i+'" value="Delete"/></div>'
        newDiv += addIp + "</div>";
        $("#newIp").append(newDiv);

        $('.ip-address').mask('0ZZ.0ZZ.0ZZ.0ZZ', { translation: { 'Z': { pattern: /[0-9]/, optional: true } } });

    })

    $(document).delegate('.delete-ip-address', 'click', function(){
        var  deleteId = $(this).attr("data-target")
        $( "div" ).remove( '#delete-'+deleteId );

    });

    $('.ip-address').mask('0ZZ.0ZZ.0ZZ.0ZZ', { translation: { 'Z': { pattern: /[0-9]/, optional: true } } });

    $('.admin-form').validate({
        roles: {
            "receptionist[first_name]": {
                required: true
            },
            "receptionist[last_name]": {
                required: true
            },
            "receptionist[email]": {
                required: true,
                email: true
            }
        }
    })

    $('.remove-ip-address').click( function(){
        var  deleteId = $(this).attr("data-target");
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax(
            {
                url: "delete/ip-address/" + deleteId,
                type: 'DELETE',
                data: {
                    "id": deleteId,
                    "_token": token,
                },
                success: function () {
                    $(this).parents(".form-group").remove();
                }.bind(this)
            });

    });

})
