<?php
$this->load->view('templates/datatable', [
    'createAction'    => 'crud/create',
    'buttonAddLabel'  => 'Nuevo registro',
    'buttonDelLabel'  => 'Eliminar',
    'buttonEditLabel' => 'Editar',
    'cardTitle'       => 'Listado crud',
    'colums'          => [
        'nombres',
        'email',
        'telefono',
        'acciones'
    ],
]);
