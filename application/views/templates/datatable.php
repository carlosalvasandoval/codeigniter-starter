<div class="card">
    <div class="card-body">
        <a href="<?= base_url($createAction) ?>" class="btn btn-outline-success float-right">
            <i class="fas fa-plus-circle"></i> <?= $buttonAddLabel ?></a>
        <div class="clearfix"></div>
        <hr>
        <h5 class="card-title"><?= $cardTitle ?></h5>

        <table id="tbl" class="table table-striped table-bordered table-hover table-light" style="width:100%">
            <thead>
                <tr>
                  <?php foreach ($colums as $colName): ?>
                        <th><?= $colName ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

    </div>
</div>
<div class="d-none" id="buttons_crud">
    <center>
        <a href="" class="btn btn-sm btn-warning edit">
            <i class="fas fa-edit"></i> <?= $buttonEditLabel ?>
        </a>
        <a href="" class="btn btn-sm btn-danger delete">
            <i class="far fa-times-circle"></i> <?= $buttonDelLabel ?>
        </a>
    </center>
</div>
<?php prepend_js(base_url('assets/js/common/common_datatable_config.js')) ?>