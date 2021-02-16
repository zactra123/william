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


    $(document).on('change', '.bank-type' ,function(){
        $form = $(this).parents('form')
        var bankType = $form.find('.bank-type').val(),
            token = $("meta[name='csrf-token']").attr("content");

        $form.find(".bank_sub_type_append").html('')
        $.each( types[bankType], function(index, item) {
            var sub_types =  $("#sub_types_append").html()
            sub_types = sub_types.replace(/{value}/g, item)

            $form.find(".bank_sub_type_append").append(sub_types);
        });

        $form.find( ".fraud_address" ).toggleClass( 'hidden', bankType != 3 );


        if(bankType == 3) {
            $form.find('.dispute_address').find('.expand-address label').text("REGULAR DISPUTE ADDRESS")
        } else {
            $form.find('.dispute_address').find('.expand-address label').text("DISPUTE ADDRESS")
        }


        if([14, 18, 19,20, 21, 23, 24, 26, 27, 28, 29, 31,32, 43, 33, 30].includes(parseInt(bankType))){
            $form.find('.parent').removeClass("hidden")
        }else {
            $form.find('.parent').addClass("hidden")
            $(".autocomplete-bank").val("")
            $(".autocomplete-bank").trigger('keydown')
        }

    });

    $(document).on('change', '.bank_sub_type_append input', function(){
        var $form = $(this).parents('form'),
            bankType = $form.find('.bank-type').val()

        condition =  ((bankType == 2 || bankType == 55) && ($form.find('input[name="bank[additional_information][sub_type][]"][value="MORTGAGE"]:checked').length > 0))
        $form.find( ".qwr_address" ).toggleClass( 'hidden',!condition );

    });

    $(document).on('click', '.customcheck' ,function(){
        var id  = $(this).attr('id').replace('name-', '')
        var accountType = $(this).attr('data-type')
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
                ui.item.value = ui.item.name
                var $id = $(event.target).parents('.banks').find('.parent_id')

                if (!!ui.item.id) {
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
                 required: true,
                 remote: {
                     url: "/admins/furnishers/check/name",
                     type: "POST",
                     cache: false,
                     dataType: "json",
                     data: {
                         id: function() { return $("#bankInformation .bank_id").val();
                         },

                         name: function() { return $("#bankInformation .bank_name").val();
                         },
                         _token: function (){return  $("meta[name='csrf-token']").attr("content");}
                     },
                     dataFilter: function(response) {
                         if(jQuery.parseJSON(response).status == true) {
                             return true;
                         }else{
                            return false;
                         }
                     }
                 }
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
            },
            "bank[name]": {
                remote: "This name already exist"
            }

        },



    })
    $('#parentBankInformation').validate({
        ignore: [],
        rules: {
            "bank[name]": {
                required: true,
                remote: {
                    url: "/admins/furnishers/check/name",
                    type: "POST",
                    cache: false,
                    dataType: "json",
                    data: {
                        name: function() { return $("#parentBankInformation .bank_name").val();},
                        _token: function (){return  $("meta[name='csrf-token']").attr("content");}
                    },
                    dataFilter: function(response) {
                        if(jQuery.parseJSON(response).status == true) {
                            return true;
                        }else{
                            return false;
                        }
                    }
                }
            },
        },
        messages:{
            "bank[name]": {
                remote: "This name already exist"
            }

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
