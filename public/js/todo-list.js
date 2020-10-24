$(document).ready(function(){
    $('.selectize-owner').selectize({
        onChange: function(value) {
            var todo_id = this.$input.parents('tr').attr('data-id'),
                token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: '/receptionist/todo/change-assignment',
                type: 'POST',
                data: {
                    "_token": token,
                    id: todo_id,
                    user_id : value
                },
                success: function (result) {
                    console.log(result)
                },
                error: function (error) {
                    console.log(error)
                }
            })
        }

    })
});
