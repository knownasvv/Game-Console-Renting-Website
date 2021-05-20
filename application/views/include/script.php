<script src="<?php echo base_url('assets/js/jquery-3.2.1.slim.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

<!-- datatables -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>

<?php if(isset($crud)) foreach ($crud['js_files'] as $file): ?>
	<script src="<?php echo $file; ?>" > </script>
<?php endforeach; ?>
