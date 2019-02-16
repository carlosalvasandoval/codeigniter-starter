$('.datepicker').datepicker({
  format: 'yyyy-mm-dd',
  language: 'es-ES',
  showOnFocus: true,
  todayHighlight: true,
  todayBtn: true,
  toggleActive: true,
  startView:2,
  endDate:'-10y'
});

function filemanager_callback(field_id) {
  main_filemanager_callback(field_id, 'img_container', 'img_profile');
}

$('document').ready(function () {
  if ($('#img_profile').val()) {
    bindImagenes($('#img_profile').val(), 'img_container', 'img_profile');
  }

});
