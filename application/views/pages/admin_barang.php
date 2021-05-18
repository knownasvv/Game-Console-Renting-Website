<!DOCTYPE html>
<html>
<head>
	<title> Rental </title>
	<?php echo $style; ?>
	<?php echo $script; ?>
</head>
<body
	style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover;">
	
	<?php echo $navbar; ?>
	<div class="row" style="margin-top: 100px;">
        <div class="col-md-12"> <?php echo $crud['output']; ?> </div>
    </div>
	<div class="container">
	</div>

</body>
</html>