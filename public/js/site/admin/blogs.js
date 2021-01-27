function upload_images(blobInfo, success, failure) {
    var xhr, formData;
    xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', '/admins/blogs/upload_tinymce_images');

    xhr.onload = function() {
        var json;

        if (xhr.status != 200) {
            failure('HTTP Error: ' + xhr.status);
            return;
        }

        json = JSON.parse(xhr.responseText);

        if (!json || typeof json.location != 'string') {
            failure('Invalid JSON: ' + xhr.responseText);
            return;
        }

        success(json.location);
    };

    formData = new FormData();
    formData.append('_token', $("meta[name='csrf-token']").attr("content"));
    formData.append('file', blobInfo.blob(), blobInfo.filename());

    xhr.send(formData);
}


$(document).ready(function($) {
    $('#date').focus(function () {

        this.type='date';
    });
    $('#date').click(function () {
        this.type='date';
    })  ;
    $('#date').blur(function () {
        if(this.value==''){this.type='text'};
    });

    tinymce.init({
        selector: 'textarea.tinymce-editor',
        height: 250,
        nonbreaking_wrap: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste image imagetools wordcount'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image| fullscreen',
        imagetools_toolbar: 'rotateleft rotateright | flipv fliph | editimage imageoptions',
        content_css: '//www.tiny.cloud/css/codepen.min.css',
        images_upload_handler: function(blobInfo, success, failure){
            upload_images(blobInfo, success, failure)
        }
    });
})
