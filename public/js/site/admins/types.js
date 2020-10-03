$(document).ready(function($) {

    $('[data-toggle="popover"]').popover({
        html:true,
        title: "ARE YOU SURE?",
        content: function() {
            var $this = $(this);
            return $("#confirmation").html().replace('{bank_id}', $($this).attr('data-id'))
        }
    }).click(function (e) {
        $('[data-toggle=popover]').not(this).popover('hide');
    });

    $(document).click(function (e) {
        if ($('[data-toggle=popover]').has(e.target).length == 0 && (($('.popover').has(e.target).length == 0) || $(e.target).is('.cancel'))) {
            $('[data-toggle=popover]').popover('hide');
        }
    });

    $(document).on('click',".delete-bank", function (e) {
        var id = $(this).attr('data-id'),
            token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: "/owner/furnishers/types/" + id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function () {
                $('*[data-id="'+id+'"]').remove();
            }
        });
    })

    $('.selectize-multiple').selectize({
        plugins: ['remove_button'],
        delimiter: ',',
        searchField: 'key_word',
        labelField: 'key_word',
        valueField: 'key_word',
        create: function(input) {
            account_type = this.$input.parents('tr').attr('data-id');
            console.log(account_type, this)
            return {
                key_word: input
            };
        },
        load: function(query, callback) {
            $.ajax({
                url: '/owner/furnishers/keywords',
                type: 'GET',
                dataType: 'json',
                data: {
                    search_key: query
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res);
                }
            });
        },
        onOptionAdd: function(value, data){
            account_type = this.$input.parents('tr').attr('data-id');
            account_type = this.$input.parents('tr').attr('data-id');
            console.log(account_type, this)
        }
    });


    $(document).on ('click', '.remove-equal-bank', function(){
        var  equal_bank_id = $(this).attr('data-equal-id'),
                self = this;
        console.log($("meta[name='csrf-token']").attr("content"))
        $.ajax({
            url: '/owner/furnishers/equal-bank',
            type: 'DELETE',
            data: {
                "_token": $("meta[name='csrf-token']").attr("content"),
                equal_bank_id: equal_bank_id
            },
            error: function(err) {
                console.log(err)
            },
            success: function(res) {
                $(self).parents('li').remove()
            }
        });
    })
});
