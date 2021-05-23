<!DOCTYPE html>
<html>
<head>
	<title> GeekHouse | <?php echo $title ?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php echo $style; ?>
	<style>
		.alert{ border-radius: 0; font-size: 0.8em; position: fixed; top: 0; right: 0; z-index:1;}

		.card-img-top { width: 100%; height: 15rem; object-fit: contain; }
		.card-body{ background: #F1F1F1; width: 100%;}

		#navbar{
			position: relative;
			top: 0;
			left: 0;
			width: 100%;
		}

		html {
			position: relative;
			min-height: calc(100vw- 768px);
			height: 100%;
			overflow:hidden;
		}
		
.header, .footer { overflow: hidden; position: fixed; }
.page-content { overflow: auto; }
		.right-side {
			height: 50%;
		}
		.left-side{
			overflow: auto;
			max-height: 39vw; 
		}
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
		background-size: cover; 
	" >
	
	<?php echo $navbar; ?>
	<section id="cart" style="max-height: 500px;">
		<div class="container text-center">
			<div class="row my-2">
				<h1 class="bg-white w-100">Cart</h1>
			</div>
			<div class="row">
				<?php $id_k = $keranjang['id_keranjang']; ?>
				<!-- RIGHT SIDE -->
				<div class="col-md-4 col-sm-12 px-3 order-last right-side">
					<div class="bg-white p-3">
					<div class='col-12' style="text-align:center">
						<div class="form-group row" style="text-align:center">
							<label class="col-sm-6 col-form-label" style="text-align:right">Lama Peminjaman :</label>
							<div class="col-sm-2">
								<input type="number" class="form-control" value="<?= $keranjang['lama_peminjaman'] ?>" id="lama" name="lama" oninput="calculate()"></input>
							</div>
						</div>
					</div>
					
					<div class='col-12' style="text-align:center">
						<a href="<?php echo base_url()."index.php/User/tambah12?keranjang=$id_k&lama=1";?>" style="margin-right:10px;color:rgb(0,200,255);" id="konfirmasi">
						<button class='btn btn-success'>
						<span class='glyphicon glyphicon-remove'>Order</span>
						</button>
						</a>
					</div>
					</div>
				</div>

				<!-- LEFT SIDE -->
				<div class="col-md-8 col-sm-12 order-first p-0 left-side">
						<?php if(isset($detail_keranjang)) {?>
							<div class="row no-gutters" style="background-color:rgba(255,255,255, 0.9);padding:10px;">
								<?php foreach($detail_keranjang as $dk) { 
									$dk = $dk[0]?>
									<div class="col-md-3 justify-content-center">
										<img src="<?= base_url('assets/images/konsol/'.$dk['gambar'])?>" class="card-img" alt="Gambar <?= $dk['nama']?>">
									</div>
									
									<div class="col-md-9">
										<div class="card-body">
											<?php
											$id_dk = $dk['id_barang'];
											
											?>
											<div class="row">
												<div class="col-lg-8 col-md-12">
													<h5 class="card-title"><?= $dk['nama']?></h5>
													<p class="card-text">Rp.<?= $dk['harga']?>/day</p>
												</div>
												<div class="col-lg-4 col-md-12">
													<a href="<?=base_url("index.php/User/DeleteK?id=$id_k&keranjang=$id_dk")?>" style="margin-right:10px;color:rgb(0,200,255);">
														<button class='btn btn-outline-danger'> <i class='fa fa-trash mr-1'></i> Delete</button>
													</a>
												</div>
											</div>
										</div>
									</div>
								<?php } ?>
							</div>
						<?php } else echo "<h2 class='bg-white'> Your cart is empty. </h2>";?>
				</div>
			</div>
		</div>
	</section>
	<div class="alert alert-dismissible fade  <?php if(isset($addToCart)) echo 'show'; ?> text-white col-lg-3 col-md-5 col-sm-6 col-xs-12 w-100 px-3 m-3" style="background-color: #4CAF50; border: 0;">
		<p class="mr-3"><i class="fa fa-check-square fa-2x align-middle mr-2"></i> Your cart has been submitted as order. </p>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php echo $script; ?>
	
		<script>
		function calculate(){
			var lama = document.getElementById("lama").value;
			
			document.getElementById("konfirmasi").href="<?php echo base_url()."index.php/User/tambah12?keranjang=$id_simpan2&lama=" ;?>" + lama			
		}
		</script>
</body>
</html>
