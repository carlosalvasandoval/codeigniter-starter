
config_datatable.ajax = {
    "url": BASE_URL + "crud/grid",
    "type": "GET",
    "dataSrc": function (json) {
        data = json.data;
        buttons_crud = $("#buttons_crud");
        for (i = 0; i < data.length; i++)
        {
            buttons_crud.find(".edit").attr("href", BASE_URL + "crud/edit/" + data[i].DT_RowId);
            buttons_crud.find(".delete").attr("href", BASE_URL + "crud/delete/" + data[i].DT_RowId);
            data[i][3] = buttons_crud.html();
        }
        return data;
    }
};
$("#tbl").DataTable(config_datatable);

$(document).on('click', '.delete', function (e) {
    e.preventDefault();
    var redirect = $(this).attr('href');
    swal({
        title: "Estas seguro de borrar este registro?",
        text: "Una vez ejecutada esta acción no es posible recuperarla!",
        icon: "warning",
        buttons: true,
        dangerMode: true
    })
            .then((willDelete) => {
                if (willDelete) {
                    location.href = redirect;
                }
            });
});
