tinymce.init({
  selector: '.tinymce',
  relative_urls: false,
  remove_script_host: false,
  document_BASE_URL: BASE_URL + "responsive_filemanager/filemanager/",
  convert_urls: true,
  plugins: ["filemanager"],
  plugins: [
    "advlist autolink link image lists charmap print preview hr anchor pagebreak",
    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
    "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
  ],
  toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
  toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
  image_advtab: true,

  external_filemanager_path: BASE_URL + "responsive_filemanager/filemanager/",
  filemanager_title: "Responsive Filemanager",
  external_plugins: {"filemanager": BASE_URL + "responsive_filemanager/filemanager/plugin.min.js"}
});
//common functions for handle filemanager
$('.filemanagerButton').on('click', function () {
  var src = $(this).data('iframe');
  $('#fileManagerModal').modal('show');
  $('#fileManagerModal').find('iframe').attr('src', src);
});

function bindImagenes(valor, containerId, input) {
  var container = $('#' + containerId);
  container.html('');
  var jsonArray = JSON.parse(valor);
  $.each(jsonArray, function (index, value) {
    var src = value.replace("source", "thumbs");
    container.append('<div class="card" style="width: 12rem;margin:auto">' +
      '<img class="card-img-top" src="' + src + '" alt="error de cargado de imagen">' +
      ' <div class="card-body">' +
      '<a class="btn btn-link btn-xs borrar remover" data-input="' + input + '">Borrar</a>' +
      ' </div>' +
      '</div>');
  });
}
$(document).on('click', '.remover', function () {
  var card = $(this).closest('.card');
  var input = $(this).data('input');
  var current_src = card.find('img').attr('src');
  var src = current_src.replace("thumbs", "source");
  var jsonArray = JSON.parse($('#' + input).val());
  var index = jsonArray.indexOf(src);
  if (index !== -1)
    jsonArray.splice(index, 1);
  var new_value = JSON.stringify(jsonArray);

  if (new_value == '[]') {
    $('#' + input).val('');
  } else {
    $('#' + input).val(new_value);
  }
  card.remove();
});

function main_filemanager_callback(field_id, img_container, input_img) {
  var dom = $("#" + field_id);
  var url = dom.val();

  if (/^[\],:{}\s]*$/.test(url.replace(/\\["\\\/bfnrtu]/g, '@').
    replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').
    replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
    bindImagenes(url, img_container, input_img);
  } else {
    var new_url = '["' + url + '"]';
    dom.val(new_url);
    bindImagenes(new_url, img_container, input_img);
  }

}

$('.chosen').chosen({
  // Chosen options here
});