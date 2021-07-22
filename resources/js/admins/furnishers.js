$(document).ready(function () {
    $(".go-to").click(function () {
        var page =  $(this).parents('.page-navigation-container').find(".go-to-page").val();
        let url = new URL(window.location.href);
        let params = new URLSearchParams(url.search.slice(1));

        params.append('page', page);
        url.search = params
        location.href = url.toString()
    })

    $('.go-to-page').keypress(function (e) {
        var key = e.which;
        if(key == 13){
            var page =  $(this).parents('.page-navigation-container').find(".go-to-page").val();
            let url = new URL(window.location.href);
            let params = new URLSearchParams(url.search.slice(1));
            params.append('page', page);
            url.search = params
            location.href = url.toString()
        }
    });


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
            url: "/admins/furnishers/logo/" + id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function () {
                location.reload();
            }
        });
    })
    // $(".selectize-type").selectize({});
    $('.selectize-multiple').selectize({
        plugins: ['remove_button'],
        placeholder: "FILTER BY TYPE"
    });

    // var $mSelect = $('#multi-select').selectize({ placeholder: "Select a value" });
    $('.selectize-single').selectize({
        selectOnTab: true,
    });
    $(document).on('change', '#bank-type' ,function() {
        var bankType = $('#bank-type').val();
        console.log(bankType)
        if(bankType.includes("2") || bankType.includes("55")){
            $('.state-filter').removeClass('hide');
        }else{
            $('.state-filter').addClass('hide');

        }
    })

    if ($( ".autocomplete-search" ).length >0 ){

        $( ".autocomplete-search" ).autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: '/admins/furnishers/parent-bank',
                    dataType: "json",
                    data: {
                        search_key: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function( event, ui ) {
                ui.item.value = ui.item.name
            }
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .attr( "data-value", item.name )
                .append( item.name )
                .appendTo( ul );
        };
    }
});
