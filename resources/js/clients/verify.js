$(document).ready(function(){
    if( $type == "affiliate" ) {
        $('.registration-stage[data-type="only_broker"]').addClass('up');
        setTimeout(function(){
            $('.registration-stage[data-type="only_broker"]').addClass('hidden');
            $('.registration-stages').addClass('center');
        }, 100)
    } else if($type == "client") {
        $('.registration-stage[data-type="only_broker"]').removeClass('hidden');
        setTimeout(function(){
            $('.registration-stage[data-type="only_broker"]').removeClass('up');
        },100)
        setTimeout(function(){
            $('.registration-stages').removeClass('center');
        },800)
    }
    let $old_id = 1;
    let $new_id = $old_id + 1;
    $(`.registration-stage[data-id="${$old_id}"]`).addClass('none').removeClass('active').hide();
    $(`.registration-stage[data-id="${$new_id}"]`).addClass('active').removeClass('none').show();
    $(`.registration-stage[data-id="${$old_id}"]`).addClass('active').removeClass('none').show();
    $(`.stage-img[data-id="${$new_id}"]`).removeClass('nonactive').show();
    $(`.stage-img[data-id="${$old_id}"]`).removeClass('nonactive').show();
    $(`.registration-stage[data-id="${$new_id}"]`).addClass('prepare');

})
