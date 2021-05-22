<!DOCTYPE html>
<html>
<head>
	<title> GeekHouse | <?php echo $title ?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php echo $style; ?>
	<style>
		.rectangle{ width: 100%; background: rgb(34,34,34); opacity: 0.8; color: white; margin: 0; }
		a:hover,a:focus{ text-decoration: none; outline: none; }
		#accordion .panel{ border: none; border-radius: 5px; box-shadow: none; margin-bottom: 5px; }
		#accordion .panel-heading{ padding: 0; border: none; border-radius: 5px 5px 0 0; }
		#accordion .panel-title a{ display: block; padding: 20px 30px; background: #fff; font-size: 17px; font-weight: bold; color: #000; letter-spacing: 1px; text-transform: uppercase; border: 1px solid #ea526f; border-radius: 5px 5px 0 0; position: relative;}
		#accordion .panel-title a.collapsed{ border-color: #e0e0e0; border-radius: 5px; }
		#accordion .panel-title a:before, #accordion .panel-title a.collapsed:before, #accordion .panel-title a:after, #accordion .panel-title a.collapsed:after{content: "\f103"; font-family: "Font Awesome 5 Free"; font-weight: 900; width: 30px; height: 30px; line-height: 30px; border-radius: 5px; background: #FF66D8; font-size: 20px; color: #fff; text-align: center; position: absolute; top: 15px; right: 30px; opacity: 1; transform: scale(1); transition: all 0.3s ease 0s; }
		#accordion .panel-title a:after, #accordion .panel-title a.collapsed:after{ content: "\f101"; background: transparent; color: #000; opacity: 0; transform: scale(0); }
		#accordion .panel-title a.collapsed:before{ opacity: 0; transform: scale(0); }
		#accordion .panel-title a.collapsed:after{ opacity: 1; transform: scale(1); }
		#accordion .panel-body{ padding: 20px 30px; background: #FF66D8; border-top: none; font-size: 15px; color: #fff; line-height: 28px; letter-spacing: 1px; border-radius: 0 0 5px 5px;}

		.card-img-top { width: 100%; height: 15rem; object-fit: contain; }
		.card-body{ background: #F1F1F1; width: 100%; }

		.alert{ border-radius: 0; font-size: 0.8em; position: fixed; top: 0; right: 0; z-index:1;}

		@media screen and (max-width: 576px) {
			.alert{
				margin: 0 !important;
			}
		}
	</style>
</head>
<body
	style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover; margin-bottom:240px;" >
	
	<?php echo $navbar; ?>
	<section id="home">
		<div class="container-fluid text-center py-5 rectangle">
			<br/><br/><br/>
			<h1>Welcome To</h1><br>
			<img src="<?php echo base_url('assets/images/logo/light.png') ?>" alt="Geeks House" class="img-fluid" height="100rem"><br/>
			<p class="lead">
				Our product is all original and very cheap! In this website, you can rent some of our console games with a cheap price.
				<br> We currently have products like Nintendo, SEGA, Sony, and Xbox. feel free to explore!
			</p>
			<br/><br/><br/>
		</div>
	</section>
	<section class="py-5" id="rental" style="background-color: rgb(146,220,229);">
		<div class="container-fluid">
			<div class="container">
				<h5 class="text-center mb-3"><strong> RENTAL </strong></h5><hr>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
								<?php 
								$index = 1; 
								$kategori_now = ''; 
								foreach($barang as $b) {
								if($kategori_now != $b['kategori']) {
									$kategori_now = $b['kategori'];?>	
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="heading<?php echo $index; ?>">
												<h4 class="panel-title">
													<a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo "acc".$index; ?>" aria-expanded="true" aria-controls="<?php echo "acc".$index; ?>">
														<?php echo str_replace('_', ' ', $b['kategori']); ?>
													</a>
												</h4>
											</div>
											<div id="<?php echo "acc".$index; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $index; ?>">
												<div class="panel-body">
													<div class="container-fluid">
														<div class="row text-center justify-content-center">
														<?php foreach($barang as $b2) {
															if($b2['kategori'] == $b['kategori']) { ?>
																<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 card m-2 p-0 text-dark" style="width: 18rem; font-weight: 500;">
																	<img class="card-img-top img-fluid p-3" src="<?php echo base_url("assets/images/konsol/".$b2['gambar'])?>" alt="Gambar <?php echo $b2['nama']?>">
																	<div class="card-body align-middle p-2">
																		<p><strong><?php echo $b2['nama'] ?></strong></p>
																	</div>
																	<ul class="list-group list-group" style="width: 100%">
																		<li class="list-group-item">
																			<p>Rp <?php echo number_format($b2['harga'], 2);?>/day</p>
																			<p><small>Stock <?php echo $b2['stok'];?></small></p>
																		</li>
																		<li class="list-group-item mb-2">
																			<div class="row text-center">
																				<span class="col mb-1">
																					<a href="<?php echo base_url('index.php/home/detail/'.$b2['id_barang'])?>">
																						<button class="btn btn-outline-dark w-100" style="border-radius: 0;">Detail</button>
																					</a>
																				</span>
																				<span class="col">
																					<!-- Cek keranjang user -->
																					<?php 
																						$sudah_dipesan = FALSE;
																						if(isset($detail_keranjang))
																							foreach($detail_keranjang as $k) {
																								if($k['id_barang'] == $b2['id_barang']) $sudah_dipesan = TRUE;
																							}
																					?>
																					<!-- Barang sudah di keranjang -->
																					<?php if($sudah_dipesan) { ?>
																						<button class="btn btn-success w-100 disabled" style="border-radius: 0;">In Cart</button>
																					<?php } else if($b2['stok'] > 0) {?>
																						<!-- Ada stok barang -->
																						<a href="<?= base_url('index.php/user/addToCart/'.$b2['id_barang']);?>">
																							<button class="btn btn-outline-success w-100" style="border-radius: 0;">Add to cart</button>
																						</a>
																					<!-- No stok -->
																					<?php } else if($b2['stok'] <= 0) {?>
																						<button class="btn btn-danger w-100 disabled" style="border-radius: 0;">Out of stock</button>
																					<?php } ?>
																				</span>
																			</div>
																		</li>
																	</ul>
																</div>
															<?php }} ?>
														</div>
													</div>
												</div>
											</div>
										</div>
								<?php $index++; }} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section >
	<section class="py-5" id="about" style="background-color: #fff;">
		<div class="container-fluid">
			<div class="container">
				<h5 style="text-align:center"><strong> ABOUT US </strong></h5><hr>
				<div class="row justify-content-center text-center px-3 pb-4">
					<div class="col-12 mb-3">
						<h6 class="card-title mt-1">This website is made by</h6>
						<div class="row row-cols-4 row-cols-md-2 g-4">
							<div class="col">
								<div class="card">
									<img src="<?php echo base_url("assets/images/profile/koco.jpg") ?>" class="card-img-top" alt="...">
									<div class="card-body bg-light">
									<h5 class="card-title">Wahyu Koco</h5>
									<p class="card-text">00000040112</p>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card">
									<img src="<?php echo base_url("assets/images/profile/veren.png") ?>" class="card-img-top" alt="...">
									<div class="card-body bg-light">
									<h5 class="card-title">Veren Valensia</h5>
									<p class="card-text">00000040923</p>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card">
									<img src="<?php echo base_url("assets/images/profile/vincent.jpg") ?>" class="card-img-top" alt="...">
									<div class="card-body bg-light">
									<h5 class="card-title">Vincent Christopher</h5>
									<p class="card-text">00000040754</p>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="card">
									<img src="<?php echo base_url("assets/images/profile/feiza.png") ?>" class="card-img-top" alt="...">
									<div class="card-body bg-light">
									<h5 class="card-title">Feiza Joane</h5>
									<p class="card-text">00000040118</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="alert alert-dismissible fade  <?php if(isset($addToCart)) echo 'show'; ?> text-white col-lg-3 col-md-5 col-sm-6 col-xs-12 w-100 px-3 m-3" style="background-color: #4CAF50; border: 0;">
		<p class="mr-3"><i class="fa fa-check-square fa-2x align-middle mr-2"></i> <strong><?php if(isset($nama_barang)) echo $nama_barang; ?></strong> has been added to your cart.</p>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	
	<?php echo $footer; ?>
	<?php echo $script; ?>
	<!-- <script>
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove(); 
			});
		}, 3000);
	</script> -->
</body>
</html>
