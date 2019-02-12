<div class="card" >
   <div class="card-body">
      <h5 class="card-title"><?= $title ?></h5>
      <?php echo validation_errors('<p class="error">','</p>'); ?>
      <form id="formulario" method="post" novalidate="" >
         <div class="row">
            <div class="col-4">
               <div class="form-group">
                   <label>Nombres</label>
                  <input type="text" name="name" class="form-control" placeholder="Escribe nombre" value="<?=set_value('name', $name)?>">
               </div>
            </div>
             <div class="col-4">
               <div class="form-group">
                   <label>email</label>
                  <input type="text" name="email" class="form-control" placeholder="Escribe email"  value="<?=set_value('email', $email)?>">
               </div>
            </div>
             <div class="col-4">
               <div class="form-group">
                   <label>Teléfono</label>
                  <input type="text" name="telephone" class="form-control" placeholder="Escribe teléfono"  value="<?=set_value('telephone', $telephone)?>">
               </div>
            </div>
         </div>
         <a href="<?= base_url('/crud')?>" class="btn btn-secondary">Cancelar</a> <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
   </div>
</div>
<?php prepend_js(base_url('assets/js/crud/create_edit.js')) ?>