$(document).ready(function() {
  tinyMCE.init({
    init_instance_callback: function (editor) {
      $(editor.targetElm).trigger('regroup:tinymce-loaded')
    },
    selector: '.tinymce',
    height: 300,
    theme: 'modern',
    plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code',
      'insertdatetime media nonbreaking save table contextmenu directionality',
      'template paste textcolor colorpicker textpattern'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | codesample forecolor backcolor',
    image_advtab: true,
    templates: [
      { title: 'Test template 1', content: 'Test 1' },
      { title: 'Test template 2', content: 'Test 2' }
    ],
  });
});
