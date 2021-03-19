tinymce.init({
  selector: 'textarea.tinymce',
  height: 500,
  menubar: false,
  plugins: [
    'bbcode',
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  bbcode_dialect: 'punbb',
  toolbar: 'undo redo | underline | bold italic | link',
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css']
});