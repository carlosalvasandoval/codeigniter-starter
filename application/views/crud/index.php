<?php
$this->load->view('templates/datatable',
    [
    'createAction'    => 'crud/create',
    'buttonAddLabel'  => lang('button_add_label'),
    'buttonDelLabel'  => lang('button_delete_label'),
    'buttonEditLabel' => lang('button_edit_label'),
    'cardTitle'       => 'Listado crud',
    'colums'          => [
        'nombres',
        'email',
        'telefono',
        'acciones'
    ],
]);
