<?php prepend_css(base_url('assets/vendor/bootstrap4-toggle-3.4.0/css/bootstrap4-toggle.min.css')) ?>
<?php prepend_css(base_url('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')) ?>
<div class="card" >
    <div class="card-body">
        <div class="text-center"> <h2 class="card-title"><?= $title ?></h2></div>
        <hr>
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <form id="formulario" method="post" novalidate="" >
            <div class="row">

                <div class="col-8">
                    <div class="row">
                        <div class="form-group col-6">
                            <label>Nombres</label>
                            <input type="text" name="name" class="form-control" placeholder="Escribe nombre" value="<?= set_value('name', $name) ?>">
                        </div>
                        <div class="form-group col-3">
                            <label>Situación marital</label><br>
                            <input id="is_married" type="checkbox" name="is_married" value="1" 
                            <?= set_checkbox('is_married', 1, $is_married == 1); ?>
                                   data-toggle="toggle" data-on="Casado" data-off="Soltero" 
                                   data-onstyle="success" data-offstyle="danger">
                        </div>
                        <div class="form-group col-3">
                            <label>Fecha de Nacimiento</label>
                            <input type="text" name="birth_date" class="form-control datepicker" placeholder="fecha nacimiento"  value="<?= set_value('birth_date', $birth_date) ?>" readonly="readonly">
                        </div>
                        <div class="form-group col-6">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Escribe email"  value="<?= set_value('email', $email) ?>">
                        </div>
                        <div class="form-group col-6">
                            <label>¿Deportes que te gustan?</label>
                            <?=
                            form_dropdown('preferences[]', $preference_options, set_value('preferences[]', $preference_selected), 'class="form-control chosen" multiple data-placeholder="Elige tus preferencias..."');
                            ?>
                        </div>
                        <div class="form-group col-6">
                            <label>Teléfono</label>
                            <input type="text" name="telephone" class="form-control" placeholder="Escribe teléfono"  value="<?= set_value('telephone', $telephone) ?>">
                        </div>
                        <div class="form-group col-6">
                            <label>Sexo</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="sex"  value="H" <?= set_radio('sex', 'H', $sex == 'H'); ?> >
                                    Hombre
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="sex"  value="M" <?= set_radio('sex', 'M', $sex == 'M'); ?>>
                                    Mujer
                                </label>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-4">
                    <div class="form-group text-center">
                        <div id="img_container" class="text-center">
                            <i class="fas fa-user-circle fa-10x"></i><br><br>
                        </div>
                        <button class="btn btn-info btn-sm filemanagerButton" type="button" 
                                data-iframe="<?= base_url('responsive_filemanager/filemanager/dialog.php?type=1&multiple=0&field_id=img_profile&callback=filemanager_callback') ?>">
                            <i class="fas fa-search"></i> Abrir gestor
                        </button>
                        <input type="text" class="form-control d-none" id="img_profile" name="img_profile" placeholder="URL de la imagen" value="<?= set_value('img_profile', $img_profile); ?>">
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control tinymce" name="description" rows="10"><?= set_value('description', $description) ?></textarea>
                    </div>
                </div>

            </div>
            <a href="<?= base_url('/crud') ?>" class="btn btn-secondary">Cancelar</a> <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<?php $this->load->view('templates/filemanager_modal') ?>
<?php append_js(base_url('assets/vendor/bootstrap4-toggle-3.4.0/js/bootstrap4-toggle.min.js')) ?>
<?php append_js(base_url('assets/'.DIST_PATH.'/js/crud/create_edit.js')) ?>
<?php prepend_js(base_url('assets/vendor/tinymce/js/tinymce/tinymce.min.js')) ?>
<?php prepend_js(base_url('assets/'.DIST_PATH.'/js/common/common_create_edit_form.js')) ?>
