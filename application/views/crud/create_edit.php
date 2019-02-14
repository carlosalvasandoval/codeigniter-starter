<div class="card" >
    <div class="card-body">
        <div class="text-center"> <h2 class="card-title"><?= $title ?></h2></div>
        <hr>
        <?php echo validation_errors('<p class="error">', '</p>'); ?>
        <form id="formulario" method="post" novalidate="" >
            <div class="row">

                <div class="col-8">
                    <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" name="name" class="form-control" placeholder="Escribe nombre" value="<?= set_value('name', $name) ?>">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Escribe email"  value="<?= set_value('email', $email) ?>">
                    </div>

                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="text" name="telephone" class="form-control" placeholder="Escribe teléfono"  value="<?= set_value('telephone', $telephone) ?>">
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

<?php prepend_js(base_url('assets/js/crud/create_edit.js')) ?>
<?php prepend_js(base_url('assets/vendor/tinymce/js/tinymce/tinymce.min.js')) ?>
<?php prepend_js(base_url('assets/js/common/common_create_edit_form.js')) ?>