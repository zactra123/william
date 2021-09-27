$(document).ready(function() {

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
            url: "/admins/furnishers/types/" + id,
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

    $(document).on ('click', '.remove-equal-bank', function(){
        var  equal_bank_id = $(this).attr('data-equal-id'),
                self = this;
        $.ajax({
            url: '/admins/furnishers/equal-bank',
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
$('.selectize-multiple').selectize({
    plugins: ['remove_button'],
    delimiter: ',',
    searchField: 'key_word',
    labelField: 'key_word',
    valueField: 'key_word',
    create: function(input) {
        account_type = this.$input.parents('tr').attr('data-id');
        return {
            key_word: input
        };
    },
    load: function(query, callback) {
        $.ajax({
            url: '/admins/furnishers/keywords',
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
    // onOptionAdd: function(value, data){
    // },

    onChange: function(value) {
        var account_type = this.$input.parents('tr').attr('data-id'),
            key_words = this.items,
            token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: '/admins/furnishers/types/update_keywords',
            type: 'POST',
            data: {
                "_token": token,
                account_type: account_type,
                keywords : key_words
            },
            success: function (result) {
                console.log(result)
            },
            error: function (error) {
                console.log(error)
            }
        })
    }
});


$('.is_default_account_type').on('change', function() {
    var account_type = $(this).parents('tr').data('id'),
        is_default = $(this).is(':checked'),
         token = $("meta[name='csrf-token']").attr("content");

    $.ajax({
        url: '/admins/furnishers/types/update_default',
        type: 'POST',
        data: {
            "_token": token,
            account_type: account_type,
            type : is_default
        },
        success: function (result) {
            console.log(result)
        },
        error: function (error) {
            location.reload()
        }
    })
});
