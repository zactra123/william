$(document).ready(function($) {
    $('.selectize-single').selectize({
        persist: true,
        preload: true,
        searchField: 'searchable',
        labelField: 'name',
        valueField: 'id',
        sortField: 'name',
        create: function(input) {
            return {
                value: input,
                email: input
            };
        },
        load: function(query, callback) {
            $.ajax({
                url: '/owner/bank/banks_json',
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
        }
    });

    $('.selectize-multiple').selectize({
        delimiter: ',',
        persist: true,
        preload: true,
        labelField: 'name',
        valueField: 'name',
        create: function(input) {
            return {
                value: input,
                name: input
            };
        }
    })

    $(document).on ('click', '.remove-equal-bank', function(){
        var  equal_bank_id = $(this).attr('data-equal-id'),
                self = this;
        console.log($("meta[name='csrf-token']").attr("content"))
        $.ajax({
            url: '/owner/bank/equal-bank',
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
