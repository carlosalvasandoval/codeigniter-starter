</div>
</div>
</div>
<script src="<?=base_url('assets/vendor/jquery-2.1.4.min.js'); ?>" type="text/javascript"></script>
<script src="<?=base_url('assets/vendor/chosen_v1.8.7/chosen.jquery.min.js'); ?>" type="text/javascript"></script>
<script src="<?=base_url('assets/vendor/sweetalert.min.js'); ?>" type="text/javascript"></script>
<script src="<?=base_url('assets/vendor/bootstrap-4.1.3-dist/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?=base_url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); ?>" type="text/javascript"></script>
<script src="<?=base_url('assets/vendor/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js'); ?>" type="text/javascript"></script>
<script src="<?=base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>" type="text/javascript"></script>
<script src="<?=base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>" type="text/javascript"></script>
<script src="<?=base_url('assets/vendor/datatables/buttons.html5.min.js'); ?>" type="text/javascript"></script>
<script src="<?=base_url('assets/vendor/datatables/dataTables.buttons.min.js'); ?>" type="text/javascript"></script>
<script src="<?=base_url('assets/vendor/datatables/jszip.min.js'); ?>" type="text/javascript"></script>
<script src="<?=base_url('assets/vendor/datatables/pdfmake.min.js'); ?>" type="text/javascript"></script>
<script src="<?=base_url('assets/vendor/datatables/vfs_fonts.js'); ?>" type="text/javascript"></script>

<script type="text/javascript" src="<?= base_url('assets/'.DIST_PATH.'/js/site.js?t=' . time()) ?>"></script>
<script type="text/javascript">
    var BASE_URL = '<?=base_url() ?>';
</script>
<?php get_prepend_css() ?>
<?php include_default_css(); ?>
<?php get_append_css() ?>
<?php get_prepend_js() ?>
<?php include_default_js(); ?>
<?php get_append_js() ?>
</body>
</html>