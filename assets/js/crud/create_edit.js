$('.datepicker').datepicker({
    format: 'yyyy-mm',
    language: 'es-ES',
    showOnFocus: true,
   viewMode: 1,
    minViewMode:1
});

function filemanager_callback(field_id) {
  main_filemanager_callback(field_id,'img_container', 'img_profile');
}

$('document').ready(function () {
  if ($('#img_profile').val()) {
    bindImagenes($('#img_profile').val(), 'img_container', 'img_profile');
  }

});





