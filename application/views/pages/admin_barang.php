<!DOCTYPE html>
<html>
<head>
	<title> <?php echo $title;?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php echo $style; ?>
	<?php echo $script; ?>
	<style>
		tbody{
			text-align: center;
		}
	</style>
</head>
<body
style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover; margin-bottom:240px;" >
	
	<?php echo $navbar; ?> 
	
	<div class="container pb-3 pt-5 my-3 align-middle" style="background-color: rgba(241,241,241,0.85);">
		<h1 class="text-center">LIST BARANG</h1>
		<div class="row" class="mt-5">
			<div class="col-md-12"> <?php echo $crud['output']; ?> </div>
		</div>
	</div>
	

</body>
</html>
