var pdfjsLib = window['pdfjs-dist/build/pdf'];
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

    expand = function(target, selector){
    if ($(target).hasClass('hidden')) {
        $(target).removeClass('hidden')
        $(selector).find('i').removeClass('fa-plus-circle')
        $(selector).find('i').addClass('fa-minus-circle')
    } else {
        $(target).addClass('hidden')
        $(selector).find('i').removeClass('fa-minus-circle')
        $(selector).find('i').addClass('fa-plus-circle')
    }
}

$( document ).on( "click keyup", ".us-phone", function() {
    $('.us-phone').mask('(000) 000-0000 | (000) 000-0000');
    // $('.us-zip').mask('00000');
});

$(document).ready(function($) {

    $('.us-phone').mask('(000) 000-0000 | (000) 000-0000');
    // $('.us-zip').mask('00000');
    $('.selectize').selectize({
        closeAfterSelect: true,
        render: {
            item: function(item, escape) {
                $('#account-'+item['value']).removeClass('hidden');
                return '<span></span>'
            }
        },
    })
    $('.selectize-single').selectize({
        selectOnTab: true,
    })
    $( document ).on( "load", "#addresses_container", function() {
        $('.cpf').mask('999.999.999-99');
    });

    $(document).on('click', '.remove-account-type', function(){

        var option = $(this).attr('data-value'),
            target = $(this).attr('data-account')
            self = $('#select-account')[0].selectize


        self.removeItem(option)
        $(target).addClass('hidden')
        $(target).find('i').removeClass('fa-plus-circle')
        $(target).find('i').removeClass('fa-minus-circle')
        $(target).find('i').addClass('fa-plus-circle')
        $(target).find('.addresses :not(.first-bar)').addClass('hidden')
    })
    $(document).on('click', '.remove-equal-bank', function(){

        $("#account-equal-bank").remove()

    })


    $(document).on('click', '.expand-address', function(){
        var target = $(this).attr('data-address')
        expand(target, this)
    })


    $(".file-box").on("change", function(e){
        var file = e.target.files[0]
        var _this = this
        if(file.type == "application/pdf"){
            var fileReader = new FileReader();
            fileReader.onload = function() {
                var pdfData = new Uint8Array(this.result);
                var loadingTask = pdfjsLib.getDocument({data: pdfData});
                loadingTask.promise.then(function(pdf) {
                    // Fetch the first page
                    var pageNumber = 1;
                    pdf.getPage(pageNumber).then(function(page) {
                        var scale = 1.5;
                        var viewport = page.getViewport({scale: scale});

                        // Prepare canvas using PDF page dimensions
                        var canvas = $("#pdfViewer")[0];
                        var context = canvas.getContext('2d');
                        canvas.height = viewport.height;
                        canvas.width = viewport.width;
                        // Render PDF page into canvas context
                        var renderContext = {
                            canvasContext: context,
                            viewport: viewport
                        };
                        var renderTask = page.render(renderContext);
                        renderTask.promise.then(function () {
                            // console.log(canvas.toDataURL("image/png", 0.8))
                            $(_this).css('background-image', 'url("'+ $('#pdfViewer').get(0).toDataURL("image/jpeg", 0.8) +'")');
                            $(_this).css('background-size', '200px');

                        });
                    });
                }, function (reason) {
                    console.error(reason);
                });
            };
            fileReader.readAsArrayBuffer(file);
        }
    });

    $("#bank_logo").change(function(e) {
        $(this).removeClass('driver_license')

        $(this).removeClass('bank_logo_dropp')
        var file = e.target.files[0]
        if(file.type == "application/pdf"){
            $(this).addClass('bank_logo_dropp')
            // $(".driver_dropp").css('background-image', 'url("/images/pdf_icon.png")');
        }else{
            var reader = new FileReader();

            reader.onload = function(event) {
                $(".bank_logo_dropp").css('background-image','url('+ event.target.result +')');
                $(".bank_logo_dropp").css('background-size','cover');
            }
            reader.readAsDataURL(file);
        }

        $(this).removeClass('bank_logo_class')
        $(this).addClass('bank_logo_dropp')
        // $(".driver_dropp").css('background-image',file)
    });

    $('.selectize-multiple').selectize({
        plugins: ['remove_button'],
        selectOnTab: true,
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
    });


    $("#bank_logo").val(null)
    $(".changeLogo").click(function (e) {
        e.preventDefault();
        $(".changeLogo").addClass("hide")
        $(".updateLogo").removeClass("hide")

    });


    $(document).on('change', '.bank_name, .bank-type' ,function(){
        $form = $(this).parents('form')
        var bankName = $form.find('.bank_name').val(),
            bankType = $form.find('.bank-type').val(),
            token = $("meta[name='csrf-token']").attr("content");

        $form.find('.collection_types .col-md-6').addClass("hidden")
        $form.find('.mortgage_lender_type .col-md-6').addClass("hidden")

        $form.find('.trustee_address .trustee').addClass("hidden")
        $(".trustee").attr("disabled", "disabled");
        $(".trustee input,.trustee select").attr("disabled", "disabled");


        console.log(types, bankType, types[bankType])

        if(types[bankType] !== undefined){
            $("#bank_type_append").remove()
            $(".remove_sub_type").remove()
            $.each( types[bankType], function(index, item) {

                $.each( item, function(key,value) {
                    var sub_types =  $("#sub_types_append").html()
                    sub_types = sub_types.replace(/{value}/g, value)
                        .replace(/{index}/g, index)

                    $("#sub_bank_type_append").append(sub_types);
                });

            });
        }

        if (bankType == 4 || bankType ==44) {
            $form.find('.collection-'+bankType).removeClass("hidden")
        }

        if (bankType == 29) {
            $form.find('.mortgage-lender-'+bankType).removeClass("hidden")
        }

        if(bankType == 29){
            $form.find('.trustee').removeClass("hidden")
            $(".trustee input,.trustee select").removeAttr("disabled", "disabled");

        }

        $form.find( ".fraud_address" ).toggleClass( 'hidden', bankType != 3 );


        if(bankType == 3) {
            $form.find('.dispute_address').find('.expand-address label').text("REGULAR DISPUTE ADDRESS")
        } else {
            $form.find('.dispute_address').find('.expand-address label').text("DISPUTE ADDRESS")
        }


        if([14, 18, 19,20, 21, 23, 24, 26, 27, 31,32, 43, 33, 30, 28].includes(parseInt(bankType))){
            $form.find('.parent').removeClass("hidden")
        }else {
            $form.find('.parent').addClass("hidden")
            $(".autocomplete-bank").val("")
            $(".autocomplete-bank").trigger('keydown')
        }

        $.ajax({
            url: "/admins/furnishers/bank-name",
            method:"POST",
            data:{
                bank_name:bankName,
                type: bankType,
                _token: token
            },
            success: function (result) {

                html ='<div class="row" id="account_types_append">'
                for( let val in result){

                    html = html +'<div class="col-md-2">'+result[val]+'<input name="account_type[]" data-type="'+result[val]

                    html = html +'" type="checkbox" id="name-'+val+'" value ="'+val+'" class="customcheck ex_name"></div>'
                }
                html = html+ '</div>'

                $form.find('.account_types_append').remove()

                $form.find(".account_types").html(html);


            },

            error:function (err,state) {
                console.log(err)
            }
        });

    });

    $(document).on('click', '.customcheck' ,function(){
        var id  = $(this).attr('id').replace('name-', '')
        var accountType = $(this).attr('data-type')
        console.log(id, accountType)
        if(this.checked) {
            var address_template =  $("#address-template").html()
            address_template = address_template.replace(/{type}/g,"dispute_address")
                .replace(/{id}/g, id)
                .replace(/{account_type_id}/g, id)
                .replace(/{name}/g, accountType+' DISPUTE');
            $("#addresses_container").append(address_template);
            $('#dispute-address-'+ id).find('.selectize-single').selectize({
                selectOnTab: true,
            })

        }else{
            $('#addresses_container').find('#dispute-address-'+ id).remove()
        }
    })
    if ($( ".autocomplete-name" ).length > 0) {
        $( ".autocomplete-name" ).autocomplete({
            autoFocus: true,
            source: function( request, response ) {
                $.ajax({
                    url: '/admins/furnishers/address-autocomplete',
                    dataType: "json",
                    data: {
                        search_key: request.term,
                        type: this.element.attr('data-type')
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function( event, ui ) {
                ui.item.value = ui.item.name
                var $street = $(event.target).parents('.addresses').find('.street'),
                    $city = $(event.target).parents('.addresses').find('.city'),
                    $state = $(event.target).parents('.addresses').find('.state'),
                    $zip = $(event.target).parents('.addresses').find('.us-zip'),
                    $phone = $(event.target).parents('.addresses').find('.phone'),
                    $fax = $(event.target).parents('.addresses').find('.fax'),
                    $email = $(event.target).parents('.addresses').find('.email');
                if (!!ui.item.street) {
                    $street.val(ui.item.street)
                }
                if (!!ui.item.city) {
                    $city.val(ui.item.city)
                }
                if (!!ui.item.state) {
                    selectize = $state.eq(0).data('selectize')
                    selectize.setValue(selectize.search(ui.item.state).items[0].id)
                }
                if (!!ui.item.zip) {
                    $zip.val(ui.item.zip)
                }
                if (!!ui.item.phone_number) {
                    $phone.val(ui.item.phone_number)
                    $phone.trigger('input');
                }
                if (!!ui.item.fax_number) {
                    $fax.val(ui.item.fax_number)
                    $fax.trigger('input');
                }
                if (!!ui.item.email) {
                    $email.val(ui.item.email)
                }
            }
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .attr( "data-value", item.name )
                .append( item.name )
                .appendTo( ul );
        };
    }

    if($( ".autocomplete-trust" ).length > 0) {
        $( ".autocomplete-trust" ).autocomplete({
            autoFocus: true,
            source: function( request, response ) {
                $.ajax({
                    url: '/admins/furnishers/address-autocomplete',
                    dataType: "json",
                    data: {
                        search_key: request.term,
                        type: this.element.attr('data-type')
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function( event, ui ) {
                ui.item.value = ui.item.name
                var $street = $(event.target).parents('.addresses').find('.street'),
                    $city = $(event.target).parents('.addresses').find('.city'),
                    $state = $(event.target).parents('.addresses').find('.state'),
                    $zip = $(event.target).parents('.addresses').find('.us-zip'),
                    $phone = $(event.target).parents('.addresses').find('.phone'),
                    $fax = $(event.target).parents('.addresses').find('.fax'),
                    $email = $(event.target).parents('.addresses').find('.email');

                if (!!ui.item.street) {
                    $street.val(ui.item.street)
                }
                if (!!ui.item.city) {
                    $city.val(ui.item.city)
                }
                if (!!ui.item.state) {
                    selectize = $state.eq(0).data('selectize')
                    selectize.setValue(selectize.search(ui.item.state).items[0].id)
                }
                if (!!ui.item.zip) {
                    $zip.val(ui.item.zip)
                }
                if (!!ui.item.phone_number) {
                    $phone.val(ui.item.phone_number)
                    $phone.trigger('input');
                }
                if (!!ui.item.fax_number) {
                    $fax.val(ui.item.fax_number)
                    $fax.trigger('input');
                }
                if (!!ui.item.email) {
                    $email.val(ui.item.email)
                }
            }
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .attr( "data-value", item.name )
                .append( item.name )
                .appendTo( ul );
        };
    }


    if ($( ".autocomplete-bank" ).length >0 ){
        $( ".autocomplete-bank" ).autocomplete({
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
                console.log(event, ui)
                ui.item.value = ui.item.name
                var $id = $(event.target).parents('.banks').find('.parent_id')

                if (!!ui.item.id) {
                    console.log(ui.item.id, 'dasdasd')
                    $id.val(ui.item.id)
                }

            }
        }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .attr( "data-value", item.name )
                .append( item.name )
                .appendTo( ul );
        };
    }


    $('.autocomplete-bank').on('keydown', function(){
        $('input[name="bank[parent_id]"]').val("")
    })

    $('#bankInformation').validate({
        ignore: [],
        rules: {
             "bank[name]": {
                 required: true
             },
            "bank[parent_id]": {
                required: function(){
                     return !!$(".autocomplete-bank").val()
                }
            }
        },
        messages:{
            "bank[parent_id]": {
                required: "Parent bank doesn't exist"
            }
        }


    })
    $('#parentBankInformation').validate({
        ignore: [],
        rules: {
            "bank[name]": {
                required: true
            },
        },
        submitHandler: function(form) {
            var data = $(form).serialize();
            $.ajax({
                url: '/admins/furnishers/add',
                type: "POST",
                data: data,
                success: function( data ) {
                    $('#exampleModal').modal('toggle'); //or  $('#IDModal').modal('hide');
                    $(".autocomplete-bank").val(data['parent_name'])
                    $(".parent_id").val(data['parent_id'])
                    $('#parentBankInformation')[0].reset()
                }
            });
        }

    })






});
