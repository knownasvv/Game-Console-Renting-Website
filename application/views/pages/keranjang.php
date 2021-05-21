<!DOCTYPE html>
<html>
<head>
	<title> GeekHouse | <?php echo $title ?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php echo $style; ?>
</head>
<body
	style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover; margin-bottom:240px;" >
	
	<?php echo $navbar; ?>
	<section id="home">
		<div class="container-fluid text-center py-5">
			<div class="card mb-3" style="max-width: 540px;">
				<?php if(isset($isi_keranjang)) foreach($isi_keranjang as $k) {$k = $k[0]?>
					<div class="row no-gutters">
						<div class="col-md-4">
						<img src="<?= base_url('assets/images/konsol/'.$k['gambar'])?>" class="card-img" alt="Gambar <?= $k['nama']?>">
						</div>
						<div class="col-md-8">
						<div class="card-body">
							<h5 class="card-title"><?= $k['nama']?></h5>
							<p class="card-text"><?= $k['deskripsi']?></p>
							<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
						</div>
						</div>
					</div>
				<?php }?>
			</div>
		</div>
	</section>
	
	<?php echo $footer; ?>
	<?php echo $script; ?>
</body>
</html>
