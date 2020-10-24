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
    $(".delete").on('click', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var token = $("meta[name='csrf-token']").attr("content");
        console.log("test");
        bootbox.confirm({
            title: "Destroy To Do?",
            message: "Do you really want to delete record?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel',
                    className: 'btn-success'

                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Confirm',
                    className: 'btn-danger'

                }
            },
            callback: function (result) {
                console.log('This was logged in the callback: ' + result);
                if (result) {

                    $.ajax(
                        {
                            url: "/receptionist/todo/" + id,
                            type: 'DELETE',
                            data: {
                                "id": id,
                                "_token": token,
                            },
                            success: function () {
                                console.log("it Works");
                            }
                        });
                }
            }
        });




    })



});


