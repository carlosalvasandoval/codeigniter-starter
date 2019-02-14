<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title></title>
        <link href="<?php echo base_url('assets/vendor/chosen_v1.8.7/chosen.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/vendor/bootstrap-4.1.3-dist/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/vendor/fontawesome-free-5.7.1-web/css/all.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/vendor/datatables/buttons.dataTables.min.css') ?>" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url('assets/css/site.css?t=' . time()) ?>" rel="stylesheet" type="text/css"/>
    </head>
    <?php
    $rol        = $this->session->userdata('rol');
    ?>
    <body>
        <div class="wrapper">
            <!-- Sidebar  https://bootstrapious.com/tutorial/sidebar/index.html#-->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Awesome CO.</h3>
                </div>
                <ul class="list-unstyled components">

                    <?php
                    $isExpanded = is_active_nav('crud', 'create') ||
                        is_active_nav('crud') || is_active_nav('crud','edit');
                    ?>
                    <li>
                        <a href="#menu1" data-toggle="collapse" aria-expanded="<?=
                        $isExpanded ? 'true' : 'false'
                        ?>" class="dropdown-toggle <?= $isExpanded ? '' : 'collapse'
                        ?>">
                            <i class="fas fa-tint"></i> Ejemplos
                        </a>

                        <ul class="collapse list-unstyled <?= $isExpanded ? 'show' : '' ?>" id="menu1">
                            <li class="<?=
                            is_active_nav('crud') ? 'active' : ''
                            ?>">
                                <a href="<?= base_url('crud') ?>"><i class="fas fa-file-invoice"></i> Crud de ejemplo</a>
                            </li>

                        </ul>
                    </li>


                    <li class="">
                        <a href="#"><i class="fas fa-user"></i> Mi cuenta</a>
                    </li>
                </ul>
                <hr>
                <ul class="list-unstyled CTAs">
                    <li>
                        <a href="#" class="btn btn-outline-light">Cerrar sesión</a>
                    </li>
                </ul>
            </nav>

            <div id="content" class="bg-light">
                <nav class="navbar navbar-expand-lg navbar-light bg-white">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="navbar-btn bg-white">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <div class="float-right">
                            <i class="fas fa-user"></i> Jhon Doe

                        </div>


                    </div>
                </nav>
                <?= show_flash_messages() ?>
                <div class="container-fluid">
