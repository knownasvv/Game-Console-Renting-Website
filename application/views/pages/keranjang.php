<!DOCTYPE html>
<html>
<head>
	<title> GeekHouse | <?php echo $title ?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php echo $style; ?>
	<style>
		.alert{ border-radius: 0; font-size: 0.8em; position: fixed; top: 0; right: 0; z-index:1;}

		.card-img-top { width: 100%; height: 10rem; object-fit: contain; }
		.card-body{ background: #F1F1F1; width: 100%;}
		
		.right-side { height: 50%; }

		.order-first{-webkit-box-ordinal-group:0;-ms-flex-order:-1;order:-1}
		.order-last{-webkit-box-ordinal-group:14;-ms-flex-order:13;order:13}

		@media only screen and (max-width: 767px) {
			.order-first{-webkit-box-ordinal-group:14;-ms-flex-order:13;order:13}
			.order-last{-webkit-box-ordinal-group:0;-ms-flex-order:-1;order:-1}
		}
		
	</style>
</head>
<body
	style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover;  margin-bottom: 240px;
	" >
	
	<?php echo $navbar; ?>
	<section id="cart" class="py-4 px-5 container text-center align-middle mt-5" style="background: rgba(255,255,255, 0.7);">
		<div class="row">
			<h1 class="w-100 mb-5 mt-4">Cart</h1>
		</div>
		<?php if(isset($detail_keranjang)) { ?>
			<div class="row align-middle">
				<?php if(isset($keranjang)) $id_k = $keranjang['id_keranjang']; ?>
				<!-- LEFT SIDE -->
				<div class="col-md-8 col-sm-12 order-first left-side px-0">
					<?php $count = 1;
					foreach($detail_keranjang as $dk) { 
						$dk = $dk[0]?>
						<div class="card col-12 text-dark mb-1 p-2">
							<div class="row no-gutters">
								<div class="col-md-4 col-sm-12 text-center align-middle py-0 my-0">
									<img class="card-img-top img-fluid px-2" src="<?php echo base_url("assets/images/konsol/".$dk['gambar'])?>" alt="Gambar <?= $dk['nama']?>">
								</div>
								<div class="col-md-8 col-sm-12">
									<div class="card-body align-middle p-1 bg-white">
										<h5 class="card-title mt-1"><strong><?= $count; ?>. <?= $dk['nama'] ?></strong></h5>
										<hr>
										<p class="card-text p-1">
											<b>Price</b> : Rp <?= number_format($dk['harga'], 2);?></b>
										</p>
									</div>
									<div class="card-footer bg-white align-self-end">
										<?php $id_dk = $dk['id_barang']; ?>
										<a class="card-link"href="<?= base_url("index.php/User/DeleteK?id=$id_dk&keranjang=$id_k")?>">
											<button class="btn btn-outline-danger w-100" style="border-radius: 0;"><i class='fa fa-trash mr-1'></i> Delete</button>
										</a>
									</div>
								</div>
							</div>
						</div>
						<?php $count++;
					} ?>
				</div>

				<!-- RIGHT SIDE -->
				<div class="col-md-4 col-sm-12 order-last right-side pr-0">
					<div class="bg-white py-3">
						<div class='col-12 text-center'>
							<div class="form-group row">
								<label class="col-lg-8 col-md-12 col-sm-8 col-form-label text-left">Lama Peminjaman</label>
								<div class="col-lg-4 col-md-12 col-sm-4">
									<input type="number" class="form-control" value="<?= $keranjang['lama_peminjaman'] ?>" id="lama" name="lama" oninput="calculate()"></input>
								</div>
							</div>
						</div>
						<div class='col-12 text-center'>
							<a href="<?php echo base_url()."index.php/User/tambah12?keranjang=$id_k&lama=1";?>" id="konfirmasi">
							<button class='btn btn-outline-success'><i class='fa fa-check mr-1'></i> Order</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		<?php } else { ?> 
			<div class="bg-white"><a href='<?php if(isset($deleteItem)) echo base_url(); else echo 'javascript:history.go(-1)';?>'><button class='btn btn-outline-danger w-100'><h5><b>Cart is empty. </b></h5>Press this button to go back.</button></a></div>
		<?php } ?>
	</section>
	<div class="alert alert-dismissible fade  <?php if(isset($addToCart)) echo 'show'; ?> text-white col-lg-3 col-md-5 col-sm-6 col-xs-12 w-100 px-3 m-3" style="background-color: #4CAF50; border: 0;">
		<p class="mr-3"><i class="fa fa-check-square fa-2x align-middle mr-2"></i> Your cart has been submitted as order. </p>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="alert alert-dismissible fade  <?php if(isset($deleteItem)) echo 'show'; ?> text-white col-lg-3 col-md-5 col-sm-6 col-xs-12 w-100 px-3 m-3" style="background-color: #DC3545; border: 0;">
		<p class="mr-3"><i class="fa fa-remove fa-2x align-middle mr-2"></i> You've deleted<?php if(isset($deletedItem)) echo ' <b>'.$deletedItem.'</b>'; else echo ' an';?>. </p>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?= $footer?>
	<?php echo $script; ?>
	
		<script>
		function calculate(){
			var lama = document.getElementById("lama").value;
			
			document.getElementById("konfirmasi").href="<?php echo base_url()."index.php/User/tambah12?keranjang=$id_simpan2&lama=" ;?>" + lama			
		}
		</script>
</body>
</html>
