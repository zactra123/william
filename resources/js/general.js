$(document).ready(function(){
    $('body').css({'min-height': `calc(100vh - ${$('footer').outerHeight()}px`})
})

$(document).on('ready', function(){
    let $confirm = $('.register_password_confirm');
    $confirm.on('input', function(){
        let $pass = $('.register_password').val();
        if( $pass === $confirm.val() ){
            $confirm.removeClass('error');
            $confirm.addClass('not-error');
        } else {
            $confirm.removeClass('not-error');
            $confirm.addClass('error');
            $confirm.addClass('error');
        }
        console.log($pass === $confirm.val());
    })
})

$(document).on('ready', function(){
    let $reg_form = $('.register_form:visible');

    let $ein = $reg_form.find('input#ein_number');
    let $social = $reg_form.find('input#social_number');
    let $ein_label = $reg_form.find('.ein_number');
    let $social_label = $reg_form.find('.social_number');

    $($social_label).on('click', function(){
        $social.attr('disabled', false);
        $ein.attr('disabled', true);
    });
    $($ein_label).on('click', function(){
        $ein.attr('disabled', false);
        $social.attr('disabled', true);
    });
});

$(document).on('ready', function(){
    let $chat_height = $('#chat_body').height();
    let $chat = $('#chat_body');
    let $chat_header = $('#chat_header');
    let $mail = $chat.find('input[type="email"]');
    let $phone = $chat.find('input[type="tel"]');
    let $mail_label = $chat.find('.email-label');
    let $phone_label = $chat.find('.phone-label');
    let $contact_description = $('#contact_description');

    $('#chat_close').on('click', function(){
        $chat.removeClass('show');
        $chat_header.removeClass('hide');
        $contact_description.animate({'opacity':0});
    })

    $('#chat_header').on('click',function(){
        if( $chat.hasClass('show') ){
            $contact_description.removeClass('active');
        } else{
            $chat.css({'bottom': '0'});
            $contact_description.addClass('active');
            setTimeout(function() {
                $contact_description.animate({
                    'top': ($phone.offset().top - (($contact_description.height()*4) + 30)),
                    'left': ($phone.offset().left - $contact_description.width()),
                }, 300);
                setTimeout(function() {
                    $contact_description.animate({
                        'top': ($phone.offset().top - (($contact_description.height()*4))),
                        'opacity': 0.6,
                    });
                    setTimeout(function() {
                        $contact_description.animate({
                            'top': ($phone.offset().top - (($contact_description.height()*4) + 30)),
                            'opacity':0
                        }, 300);
                    }, 3200);
                },250);
            },500);
        }
        $chat.toggleClass('show');
        $chat_header.toggleClass('hide');
    });

    $($phone_label).on('click', function(){
        $phone.attr('disabled', false);
        $mail.attr('disabled', true);
    });
    $($mail_label).on('click', function(){
        $mail.attr('disabled', false);
        $phone.attr('disabled', true);
    });

    let $slider_next = $('#slider_next');
    let $slider_prev = $('#slider_prev');

    let $slider = $('.header-slider');
    let $sliderCount = $slider.find('.information').length;
    let $sliderStart = 1;

    $slider_next.on('click', function(){
        nextSlide();

    })
    $slider_prev.on('click', function(){
        prevSlide();
    })

    var imgSlideNow = 1;
    var imgSlideCount = $('#slidewrapper').children().length;
    var translateWidth = 0;
    var slideInterval = 5000;

    function nextSlide() {
        if (imgSlideNow == imgSlideCount || imgSlideNow <= 0 || imgSlideNow > imgSlideCount) {
            $('#slidewrapper').css('transform', 'translate(0, 0)');
            imgSlideNow = 1;
        } else {
            translateWidth = -$('#viewport').width() * (imgSlideNow);
            $('#slidewrapper').css({
                'transform': 'translate(' + translateWidth + 'px, 0)',
                '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
                '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
            });
            imgSlideNow++;
        }
    }

    function prevSlide() {
        if (imgSlideNow == 1 || imgSlideNow <= 0 || imgSlideNow > imgSlideCount) {
            translateWidth = -$('#viewport').width() * (imgSlideCount - 1);
            $('#slidewrapper').css({
                'transform': 'translate(' + translateWidth + 'px, 0)',
                '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
                '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
            });
            imgSlideNow = imgSlideCount;
        } else {
            translateWidth = -$('#viewport').width() * (imgSlideNow - 2);
            $('#slidewrapper').css({
                'transform': 'translate(' + translateWidth + 'px, 0)',
                '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
                '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
            });
            imgSlideNow--;
        }
    }

    var switchInterval = setInterval(nextSlide, slideInterval);

    $('#viewport').hover(function(){
        clearInterval(switchInterval);
    },function() {
        switchInterval = setInterval(nextSlide, slideInterval);
    });

});

var $basicErrorText, $formErrorText, $formSuccessText, $mailErrorText, $telErrorText;
$(document).on('ready', function(){
    window.$basicErrorText = $('#contact_error_basic_text').val();
    window.$formErrorText = $('#contact_form_error_text').val();
    window.$formTechErrorText = 'Form have a some technical error';
    window.$formSuccessText = $('#contact_success_send_text').val();
    window.$mailErrorText = $('#contact_error_mail_text').val();
    window.$telErrorText = $('#contact_error_phone_text').val();
});

$(document).on('ready', function(){
    $('#chat_form input[type="text"], #chat_form input[type="tel"], #chat_form input[type="email"]').on('propertychange input', function(){
        $input = $(this);
        $val = $input.val();
        $type = $input.attr('type');
        Valid($input, $val, $type, 'input');
        console.log('input');
    });
    $('.register_form input[type="text"], .register_form input[type="tel"], .register_form input[type="email"], .register_form input.register_password').on('propertychange input', function(){
        console.log('asd');
        $input = $(this);
        $val = $input.val();
        $type = $input.attr('type');
        console.log('password')
        Valid($input, $val, $type, 'input');
    });
});
$('form#chat_form').on('submit', function(e){
    ValidOnSubmit($(this), e);
    let $chat = $('#chat');
    let $chat_height = $('#chat_body').css('height');
    $chat.css({'bottom': $chat_height});
});

$('form.register_form').on('submit', function(e){
    ValidOnSubmit($(this), e);
});
$('form#login_form').on('submit', function(e){
    ValidOnSubmit($(this), e);
});




var $correct_tel = /^([+_0-9()])+/;
// var $correct_name = /^(([a-zA-Zа-яА-Я]+[" "]?))+$/;
//es poxeci
var $correct_name = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
var $correct_mail = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;

//es em avelacrel
var $correct_full_name = /^[a-z]([-']?[a-z]+)*( [a-z]([-']?[a-z]+)*)+$/ig;

var $length = /^(.{8,20})$/gm;
var $upperCase = /(?=.*[A-Z]{1,})(?=.*[a-z]{1})/gm;
var $digit = /\d/gm;
var $symbol = /\W|_/g;


var $minLengthTel = 6;
var $minLengthInput = 2;
//es em avelacrel
var $minLengthTelSSNEIN = 10;


function Valid(input, val, type, validType ){

    this.input = input;
    this.val = val;
    this.type = type;
    this.name = input.attr("name");
    this.validType = validType;

    switch(this.type){
        case 'tel':
            this.recVal = $correct_tel;
            break;
        case 'text':
            this.recVal = $correct_name;
            break;
        case 'email':
            this.recVal = $correct_mail;
            break;
    }

    // Vision validation on input


//es poxel em
// else if ('password' == this.type){
// if(this.val != ''){
//     this.input.removeClass('error').addClass('not-error');
// } else {
//     this.input.removeClass('not-error').addClass('error');
// }


    if( this.validType == "input" ){
        // Remove Wordpress contact form error
        let $thisForm = this.input.parent('form');
        if( $thisForm.find('.wpcf7-response-output').length > 0 ){
            if( $thisForm.find('.error').length > 0 ){
                $('.wpcf7-response-output').slideUp();
            }
        }


        if( this.type == "text" && this.name == 'full_name'){
            if(this.val != '' && this.val.length > $minLengthTel && this.$correct_full_name.test(this.val)){
                this.input.siblings('.required').hide('fast', function(){$(this).remove();});
                this.input.removeClass('error').addClass('not-error');
                if( this.input.siblings('.wpcf7-not-valid-tip') ){this.input.siblings('.wpcf7-not-valid-tip').slideUp('fast');}
            } else {
                this.input.removeClass('not-error').addClass('error');
            }

        } else if ( this.type == "text" && (this.name == 'ssn' || this.name == 'ein')){
            if(this.val != '' && this.val.length >= $minLengthTelSSNEIN){
                this.input.siblings('.required').hide('fast', function(){$(this).remove();});
                this.input.removeClass('error').addClass('not-error');
                if( this.input.siblings('.wpcf7-not-valid-tip') ){this.input.siblings('.wpcf7-not-valid-tip').slideUp('fast');}
            } else {
                this.input.removeClass('not-error').addClass('error');
            }

        } else if (this.type == "text" && this.name == 'address' ){
            if(this.val != '' && this.val.length >= $minLengthTelSSNEIN){
                this.input.siblings('.required').hide('fast', function(){$(this).remove();});
                this.input.removeClass('error').addClass('not-error');
                if( this.input.siblings('.wpcf7-not-valid-tip') ){this.input.siblings('.wpcf7-not-valid-tip').slideUp('fast');}
            } else {
                this.input.removeClass('not-error').addClass('error');
            }
        }  else if(this.type =='tel' && this.name == 'phone_number'){
            if(this.val != '' && this.val.length > $minLengthTel && this.$correct_tel.test(this.val)){
                this.input.siblings('.required').hide('fast', function(){$(this).remove();});
                this.input.removeClass('error').addClass('not-error');
                if( this.input.siblings('.wpcf7-not-valid-tip') ){this.input.siblings('.wpcf7-not-valid-tip').slideUp('fast');}
            } else {
                this.input.removeClass('not-error').addClass('error');
            }
        } else if ('email' == this.type){
            if(this.val != '' && this.recVal.test(this.val)){
                this.input.siblings('.required').hide('fast', function(){$(this).remove();});
                this.input.removeClass('error').addClass('not-error');
                if( this.input.siblings('.wpcf7-not-valid-tip') ){this.input.siblings('.wpcf7-not-valid-tip').slideUp('fast');}
            } else {
                this.input.removeClass('not-error').addClass('error');
            }
        }  else if (this.type == 'password'){
            if(this.val != '' && (this.$length.test(this.val) && this.$upperCase.test(this.val)
                && this.$digit.test(this.val) && this.$symbol.test(this.val))){
                this.input.removeClass('error').addClass('not-error');
            } else {
                this.input.removeClass('not-error').addClass('error');
            }


        } else if('radio' != this.type && 'checkbox' != this.type && 'file' != this.type && 'name' != this.type) {
            if(this.val != '' && this.val.length > $minLengthInput && this.recVal.test(this.val)){
                this.input.siblings('.required').hide('fast', function(){$(this).remove();});
                this.input.removeClass('error').addClass('not-error');
                if( this.input.siblings('.wpcf7-not-valid-tip') ){this.input.siblings('.wpcf7-not-valid-tip').slideUp('fast');}
            } else {
                this.input.removeClass('not-error').addClass('error');
            }
        }

        //  Vision validation on submit

    } else if ( this.validType == "onSubmit" ){
        console.log('submit');
        if('tel' == this.type ){
            if(this.val != '' && this.val.length > $minLengthTel && this.recVal.test(this.val)){
                this.input.siblings('.required').hide('fast', function(){$(this).remove();});
                this.input.removeClass('error').addClass('not-error');
            } else {
                if( !this.input.siblings().is('.required') ){
                    this.input.after('<p class="required">'+ $telErrorText +'</p>');
                    this.input.siblings('.required').show('fast');
                }
                this.input.removeClass('not-error').addClass('error');
            }
        } else if ('email' == this.type){
            if(this.val != '' && this.recVal.test(this.val)){
                this.input.siblings('.required').hide('fast', function(){$(this).remove();});
                this.input.removeClass('error').addClass('not-error');
            } else {
                if( !this.input.siblings().is('.required') ){
                    this.input.after('<p class="required">'+ $mailErrorText +'</p>');
                    this.input.siblings('.required').show('fast');
                }
                this.input.removeClass('not-error').addClass('error');
            }
        } else if('password' == this.type){
            if( this.val != '' ){
                this.input.removeClass('error').addClass('not-error');
            } else {
                this.input.removeClass('not-error').addClass('error');
            }
        } else if(this.type != 'name' && this.type == 'text' ) {
            if(this.val != '' && this.val.length > $minLengthInput && this.recVal.test(this.val)){
                this.input.siblings('.required').hide('fast', function(){$(this).remove();});
                this.input.removeClass('error').addClass('not-error');
            } else {
                if( !this.input.siblings().is('.required') ){
                    this.input.after('<p class="required">'+ $basicErrorText +'</p>');
                    this.input.siblings('.required').show('fast');
                }
                this.input.removeClass('not-error').addClass('error');
            }
        }
    }

};

function ValidOnSubmit ( $form, e ){
    this.e = e;
    $currentForm = $($form)

    this.e.preventDefault();

    var $radio = $currentForm.find('input[type=radio]');
    var $inputs = $currentForm.find('input:not(:disabled)');
    var $privacy = $currentForm.find('input[type=checkbox]');
    var $formHasError = false;

    $inputs.each(function($key, $value){
        var $input = $(this);
        var $type = $input.attr('type');
        var $val = $input.val();

        Valid($input, $val, $type, 'onSubmit');

        switch($type){
            case 'tel':
                if($val = '' || $val.length <= $minLengthTel || !$correct_tel.test($val)){
                    $formHasError = true;
                    console.log('error_tel');
                }
                break;
            case 'email':
                if($val = '' || $val.length <= $minLengthInput || !$correct_mail.test($val)){
                    $formHasError = true;
                    console.log('error_mail');
                }
                break;
            case 'text':
                if($val = '' || !$correct_name.test($val)){
                    $formHasError = true;
                    console.log('error_name');
                }
                break;
        }
    });

    if($formHasError){
        if( !$currentForm.find('ipnut[type="submit"]').hasClass('error') ){
            $currentForm.find('ipnut[type="submit"]').after('<p class="submit-required">'+ $formErrorText +'</p>');
            $currentForm.find('ipnut[type="submit"]').siblings('.submit-required').show('fast');
        }
        $currentForm.find('ipnut[type="submit"]').addClass('error');
        console.log('Ошибка');
    }else{
        $('.submit-required').hide('fast', function(){ $(this).remove(); });
        $currentForm.find('.modal-submit-btn').removeClass('error');

        let $data = $currentForm.serializeArray();
    }

}
$(document).on('ready', function(){
    let $link = $('a.name-point');
    $link.hover(function(){
        let $block_id = $(this).attr("data-id");
        let $old_block = $('.help-description.active');
        let $block = $(`.help-description[data-id="${$block_id}"]`);
        $('.help-inner').find('.first').removeClass('first');
        if( !$(this).hasClass('active') ){
            $old_block.animate({'opacity': 0});
            $old_block.hide().removeClass('active');
            $block.show();
            $block.addClass('active');
            $block.animate({'opacity': 1});
        }
        $(this).parents('.name').find('.active').not(this).removeClass('active');
        $(this).addClass('active');
    });
    let $button = $('button.close')
    $button.on('click', function(){
        let $active_block = $(this).parents('.help-description');
        let $active_link = $active_block.attr('data-id');
        let $active_button = $(`a.name-point[data-id="${$active_link}"]`);
        $active_button.removeClass('active');
        $active_block.removeClass('active');
        $active_block.animate({'opacity': 0});
        setTimeout(function(){
            $active_block.css({'display': 'none'});
        }, 300)
    });
});

// Toggle menu

$(document).on('ready', function(){
    $('#close_toggle').on('click', function(){
        $('.navigation').removeClass('show');
    });
    $('#toggle_menu').on('click', function(){
        $('.navigation').toggleClass('show');
        $(this).toggleClass('active');
        if( $('.navigation').hasClass('show') ){
            $("html,body").css("overflow","hidden");
        } else{
            $("html,body").css("overflow","unset");
        }
    })
});

// home page slider

$(document).on('ready', function() {

    $('#home_report_slider').owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 2000,
        autoplayTimeout: 5000,
        margin: 20,
        responsiveClass: true,
        dots: false,
        nav: true,
        items: 3,
        navText: [
            '<svg class="owl-slider_prev" viewBox="0 0 52 25" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M13.1852 0.13633C13.4021 0.226334 13.5991 0.358244 13.765 0.524505C13.9312 0.690347 14.0632 0.887359 14.1532 1.10426C14.2432 1.32116 14.2895 1.55368 14.2895 1.78852C14.2895 2.02335 14.2432 2.25587 14.1532 2.47277C14.0632 2.68967 13.9312 2.88669 13.765 3.05253L6.09949 10.7151H49.9444C50.4179 10.7151 50.872 10.9032 51.2068 11.238C51.5416 11.5728 51.7297 12.0269 51.7297 12.5004C51.7297 12.9739 51.5416 13.4281 51.2068 13.7629C50.872 14.0977 50.4179 14.2858 49.9444 14.2858H6.09945L13.765 21.9484C14.1002 22.2836 14.2886 22.7383 14.2886 23.2124C14.2886 23.6865 14.1002 24.1412 13.765 24.4764C13.4297 24.8117 12.9751 25 12.501 25C12.0269 25 11.5722 24.8117 11.237 24.4764L0.525009 13.7645C0.358749 13.5986 0.226841 13.4016 0.136837 13.1847C0.046833 12.9678 0.00050354 12.7353 0.00050354 12.5005C0.00050354 12.2656 0.046833 12.0331 0.136837 11.8162C0.226841 11.5993 0.358749 11.4023 0.525009 11.2365L11.237 0.524505C11.4028 0.358244 11.5998 0.226334 11.8167 0.13633C12.0336 0.046327 12.2661 0 12.501 0C12.7358 0 12.9683 0.046327 13.1852 0.13633Z"/></svg>',
            '<svg class="owl-slider_next" viewBox="0 0 52 25" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M38.545 0.13633C38.3281 0.226334 38.1311 0.358244 37.9652 0.524505C37.799 0.690347 37.6671 0.887359 37.5771 1.10426C37.4871 1.32116 37.4407 1.55368 37.4407 1.78852C37.4407 2.02335 37.4871 2.25587 37.5771 2.47277C37.6671 2.68967 37.799 2.88669 37.9652 3.05253L45.6307 10.7151H1.78581C1.31232 10.7151 0.858212 10.9032 0.523398 11.238C0.188585 11.5728 0.000488281 12.0269 0.000488281 12.5004C0.000488281 12.9739 0.188585 13.4281 0.523398 13.7629C0.858212 14.0977 1.31232 14.2858 1.78581 14.2858H45.6308L37.9652 21.9484C37.63 22.2836 37.4417 22.7383 37.4417 23.2124C37.4417 23.6865 37.63 24.1412 37.9652 24.4764C38.3005 24.8117 38.7552 25 39.2293 25C39.7033 25 40.158 24.8117 40.4933 24.4764L51.2052 13.7645C51.3715 13.5986 51.5034 13.4016 51.5934 13.1847C51.6834 12.9678 51.7297 12.7353 51.7297 12.5005C51.7297 12.2656 51.6834 12.0331 51.5934 11.8162C51.5034 11.5993 51.3715 11.4023 51.2052 11.2365L40.4933 0.524505C40.3274 0.358244 40.1304 0.226334 39.9135 0.13633C39.6966 0.046327 39.4641 0 39.2293 0C38.9944 0 38.7619 0.046327 38.545 0.13633Z" /></svg>'],
        responsive:{
            0:{
                items: 1,
                nav: false,
            },
            450:{
                items: 2,
                margin: 10,
                nav: false,
            },
            768:{
                items: 2,
                nav: true,
            },
            991:{
                items: 3,
                margin: 20,
            },
        }

    });

    $('#header_slider').owlCarousel({
        loop: true,
        autoplay: true,
        smartSpeed: 2000,
        autoplayTimeout: 5000,
        margin: 20,
        responsiveClass: true,
        dots: false,
        nav: false,
        items: 1,
        navText: [
            '<svg class="owl-slider_prev" viewBox="0 0 52 25" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M13.1852 0.13633C13.4021 0.226334 13.5991 0.358244 13.765 0.524505C13.9312 0.690347 14.0632 0.887359 14.1532 1.10426C14.2432 1.32116 14.2895 1.55368 14.2895 1.78852C14.2895 2.02335 14.2432 2.25587 14.1532 2.47277C14.0632 2.68967 13.9312 2.88669 13.765 3.05253L6.09949 10.7151H49.9444C50.4179 10.7151 50.872 10.9032 51.2068 11.238C51.5416 11.5728 51.7297 12.0269 51.7297 12.5004C51.7297 12.9739 51.5416 13.4281 51.2068 13.7629C50.872 14.0977 50.4179 14.2858 49.9444 14.2858H6.09945L13.765 21.9484C14.1002 22.2836 14.2886 22.7383 14.2886 23.2124C14.2886 23.6865 14.1002 24.1412 13.765 24.4764C13.4297 24.8117 12.9751 25 12.501 25C12.0269 25 11.5722 24.8117 11.237 24.4764L0.525009 13.7645C0.358749 13.5986 0.226841 13.4016 0.136837 13.1847C0.046833 12.9678 0.00050354 12.7353 0.00050354 12.5005C0.00050354 12.2656 0.046833 12.0331 0.136837 11.8162C0.226841 11.5993 0.358749 11.4023 0.525009 11.2365L11.237 0.524505C11.4028 0.358244 11.5998 0.226334 11.8167 0.13633C12.0336 0.046327 12.2661 0 12.501 0C12.7358 0 12.9683 0.046327 13.1852 0.13633Z"/></svg>',
            '<svg class="owl-slider_next" viewBox="0 0 52 25" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M38.545 0.13633C38.3281 0.226334 38.1311 0.358244 37.9652 0.524505C37.799 0.690347 37.6671 0.887359 37.5771 1.10426C37.4871 1.32116 37.4407 1.55368 37.4407 1.78852C37.4407 2.02335 37.4871 2.25587 37.5771 2.47277C37.6671 2.68967 37.799 2.88669 37.9652 3.05253L45.6307 10.7151H1.78581C1.31232 10.7151 0.858212 10.9032 0.523398 11.238C0.188585 11.5728 0.000488281 12.0269 0.000488281 12.5004C0.000488281 12.9739 0.188585 13.4281 0.523398 13.7629C0.858212 14.0977 1.31232 14.2858 1.78581 14.2858H45.6308L37.9652 21.9484C37.63 22.2836 37.4417 22.7383 37.4417 23.2124C37.4417 23.6865 37.63 24.1412 37.9652 24.4764C38.3005 24.8117 38.7552 25 39.2293 25C39.7033 25 40.158 24.8117 40.4933 24.4764L51.2052 13.7645C51.3715 13.5986 51.5034 13.4016 51.5934 13.1847C51.6834 12.9678 51.7297 12.7353 51.7297 12.5005C51.7297 12.2656 51.6834 12.0331 51.5934 11.8162C51.5034 11.5993 51.3715 11.4023 51.2052 11.2365L40.4933 0.524505C40.3274 0.358244 40.1304 0.226334 39.9135 0.13633C39.6966 0.046327 39.4641 0 39.2293 0C38.9944 0 38.7619 0.046327 38.545 0.13633Z" /></svg>'],
        responsive:{
            0:{
                items: 1,
                nav: false,
            },
            991:{
                nav: true,
            },
        }

    })
})

$(document).on('ready', function(){
    if( $(document).innerWidth() < 991 ){
        let $text = $('section.education .text-block p');
        if( $text.text().length > 326 ){
            $text.text($text.text().substr(0, 326) + "...");
            $text.append('<a href="#" class="read_more">Read more</a>');
        };
        let $text_2 = $('.about-us .information-block p');
        if( $text_2.text().length > 326 ){
            $text_2.text($text_2.text().substr(0, 326) + "...");
            $text_2.append('<a href="#" class="read_more">Read more</a>');
        };
    }
});
$(document).on('ready', function(){
    // let $pass = $('#register_password');
    // let $hide = $('#eye_close');
    // let $show = $('#eye_open');
    $(document).on('click', '#eye_close', ()=>{
        $('#eye_open').removeClass('disabled');
        $('#eye_close').addClass('disabled');
        $('#register_password').attr('type', 'password');
    });
    $(document).on('click', '#eye_open', ()=>{
        $('#eye_close').removeClass('disabled');
        $('#eye_open').addClass('disabled');
        $('#register_password').attr('type', 'text');
    });
});

$(document).on('ready', function(){

    let $id_card = $("#upload_id");
    let $id_img = $('#id_card');
    let $id_social = $("#upload_social");
    let $social_img = $('#social_card');

    $id_card.change(function(){
        readURL(this,$id_img);
    });
    $id_social.change(function(){
        readURL(this,$social_img);
    });

    let fileTypes = ['jpg', 'jpeg', 'png'];

    function readURL(input, image) {
        var extension = input.files[0].name.split('.').pop().toLowerCase(),
            isSuccess = fileTypes.indexOf(extension) > -1;
        if(!isSuccess) {
            return false
        }

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                image.attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
});

$(document).delegate('#home_video', 'click', function(){
    $('#play_button').toggleClass('show');
});



$(document).ready(function(){
    let $block = $('.faq-block');
    let $siblings = $('.faq-block');
    $block.click(function(){
        let $id = $(this).attr('data-id');
        let $desc = $(`.faq-body[data-id="${$id}"]`);
        $desc.siblings('.faq-body.active').slideUp().removeClass('active');
        $(this).toggleClass('active');
        $desc.toggleClass('active').slideToggle();
    });

})

