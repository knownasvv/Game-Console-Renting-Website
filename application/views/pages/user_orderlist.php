<!DOCTYPE html>
<html>
<head>
    <title> <?php echo $title;?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php echo $style; ?>
	<style>
		a:hover,a:focus{ text-decoration: none; outline: none; }
		#accordion .panel{ border: none; border-radius: 5px; box-shadow: none; margin-bottom: 5px; }
		#accordion .panel-heading{ padding: 0; border: none; border-radius: 5px 5px 0 0; }
		#accordion .panel-title a{ display: block; padding: 20px 30px; background: #fff; font-size: 17px; font-weight: bold; color: #000; letter-spacing: 1px; text-transform: uppercase; border: 1px solid #92DCE5; border-radius: 5px 5px 0 0; position: relative;}
		#accordion .panel-title a.collapsed{ border-color: #e0e0e0; border-radius: 5px; }
		#accordion .panel-title a:before, #accordion .panel-title a.collapsed:before, #accordion .panel-title a:after, #accordion .panel-title a.collapsed:after{content: "\f103"; font-family: "Font Awesome 5 Free"; font-weight: 900; width: 30px; height: 30px; line-height: 30px; border-radius: 5px; background: #2B2D42; font-size: 20px; color: #fff; text-align: center; position: absolute; top: 15px; right: 30px; opacity: 1; transform: scale(1); transition: all 0.3s ease 0s; }
		#accordion .panel-title a:after, #accordion .panel-title a.collapsed:after{ content: "\f101"; background: transparent; color: #000; opacity: 0; transform: scale(0); }
		#accordion .panel-title a.collapsed:before{ opacity: 0; transform: scale(0); }
		#accordion .panel-title a.collapsed:after{ opacity: 1; transform: scale(1); }
		#accordion .panel-body{ padding: 20px 30px; background: #2B2D42; border-top: none; font-size: 15px; color: #fff; line-height: 28px; letter-spacing: 1px; border-radius: 0 0 5px 5px;}

		.card-img-top { width: 100%; height: 12rem; object-fit: contain; }
		.card { border-radius : 0;}

		#order-list { background: rgba(255,255,255, 0.7); }
	</style>
</head>
<body
style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover; margin-bottom:240px;" >
    <?php echo $navbar; ?>
	<section class="py-4 container mt-5" id="order-list">
		<h1 class="text-center align-middle mb-5 mt-4">Order List</h1>
		<?php
			if(isset($_SESSION['salt']) && $_SESSION['salt'] == "user") {
				if(count($order) > 0) { ?>
					<div class="panel-group container" id="accordion" role="tablist" aria-multiselectable="true">
						<?php $index = 1;
						foreach($order as $o) { 
							$id_o = $o['id_order'];?>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading<?php echo $index; ?>">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo "acc".$index; ?>" aria-expanded="true" aria-controls="<?php echo "acc".$index; ?>">
											<span style="text-transform: capitalize;">Order</span> ID <strong><?= $id_o?></strong> <?php
												$status = $o['status_pemesanan'];
												if($status == 1) echo "<span class='badge badge-danger' style='text-transform: capitalize'> Sedang Dikirim </span>";
												else if($status == 2) echo "<span class='badge badge-warning' style='text-transform: capitalize'> Sudah Dikirim </span>";
												else if($status == 3) echo "<span class='badge badge-success' style='text-transform: capitalize'> Siap di Pick-up </span>";
												else if($status == 4) echo "<span class='badge badge-primary' style='text-transform: capitalize'> Selesai </span>";
											?>
										</a>
									</h4>
								</div>
								<div id="<?php echo "acc".$index; ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading<?php echo $index; ?>">
									<div class="panel-body">
										<div class="row text-center justify-content-center">
											<?php foreach($keranjang as $k) {
												$id_k = $k['id_keranjang'];
												if($id_k == $o['id_keranjang']){ ?>
													<div class="row mb-2">
														<h6 class="col-12">Lama peminjaman : <b><?= $k['lama_peminjaman']?> hari</b></h6>
														<hr/>
													</div>
													<?php $count = 1; $total = 0;
													foreach($detail_keranjang as $dk) {
														$id_dk = $dk['id_keranjang'];
														if($id_k == $id_dk) {
															foreach($barang as $b) { 
																$id_b = $b['id_barang'];
																if($dk['id_barang'] == $id_b) { ?>
																<div class="card col-12 text-dark mb-1 p-2" style="width: 18rem; font-weight: 500;">
																	<div class="row no-gutters">
																		<div class="col-md-3 col-sm-12">
																			<img class="card-img-top img-fluid p-2" src="<?php echo base_url("assets/images/konsol/".$b['gambar'])?>" alt="Gambar <?php echo $b['nama']?>">
																		</div>
																		<div class="col-md-9 col-sm-12">
																			<div class="card-body align-middle p-1">
																				<h5 class="card-title mt-1"><strong><?= $count; ?>. <?php echo $b['nama'] ?></strong></h5>
																				<hr>
																				<p class="card-text p-1">
																					<?php 
																						$harga = $b['harga'] * $k['lama_peminjaman'];
																						$total += $harga; 
																					?>
																					<b>Price</b> : Rp <?= number_format($b['harga'], 2);?> x <?= $k['lama_peminjaman'] ?> hari = <b>Rp <?= number_format($harga, 2) ?></b>
																				</p>
																			</div>
																			<div class="card-footer bg-white">
																				<a class="card-link mb-2 "href="<?= base_url('index.php/home/detail/'.$id_b)?>">
																					<button class="btn btn-outline-dark w-100" style="border-radius: 0;">Detail</button>
																				</a>
																			</div>
																		</div>
																	</div>
																</div>
															<?php $count++;
																}
															} 
														}
													
													}?>
													<div class="row mt-3">
														<h6 class="col-12">Total Price : <b>Rp <?= number_format($total, 2)?></b></h6>
													</div>
												<?php }
											}?>
										</div>
									</div>
								</div>
							</div>
							<?php $index++; 
						}?>
					</div>
				<?php } else echo "<div class='col-12' style='text-align:center'> ~ User Belum Memesan Barang ~ </div>";
			} 
		?>
	</section>

	<?php echo $footer; ?>
	<?php echo $script; ?>
				</body>
</html>
