// Tinymce
function upload_images(blobInfo, success, failure) {
    var xhr, formData;
    xhr = new XMLHttpRequest();
    xhr.withCredentials = false;
    xhr.open('POST', '/uploader/upload_tinymce_images');

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
    formData.append('file', blobInfo.blob(), blobInfo.filename());

    xhr.send(formData);
}

$(function() {

  if($('.tinymce').length > 0){
    tinymce.init({
      selector: '.tinymce',
      resize: false,
      height: 204,
      menubar: false,
      statusbar: false,
      plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen", "image code",
        "insertdatetime media table contextmenu paste imagetools wordcount textcolor paste fullpage textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile styleselect bold italic underline forecolor backcolor alignleft aligncenter alignright alignjustify bullist numlist link image",
      content_css: [
        'https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i'
      ],
      convert_urls: false,
      images_upload_handler: function(blobInfo, success, failure){
          upload_images(blobInfo, success, failure)
      }
    });
  }

});
