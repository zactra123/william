$(document).ready(function(){
    $('.finish-reg').click(function(){
        $.ajax({
            url: '/affiliate/check-as-finished',
            type: 'GET',
            success: function(data){
                $('.register-form').addClass('d-none')
                $('.affiliate-dashboard').removeClass('d-none').hide().show('slow')
            },
            error: function(error) {
                location.reload()
            }
        })
    })
})
