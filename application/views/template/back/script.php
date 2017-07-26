<script type="text/javascript">
		var csrf_value = '<?php echo $this->security->get_csrf_hash(); ?>';
		$('#createform').on('submit', function(e)
	    {    	
	    	$.post( csrf_value, $('#createform').serialize(), function( response ) {		    
			}, 'json' );       
	    });	   
</script>
<script src="<?= base_url(); ?>asset/js/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>asset/js/plugins.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>asset/js/bootstrap-select/bootstrap-select.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>asset/js/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>asset/js/moment/moment.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>asset/js/date-range-picker/daterangepicker.js"></script>