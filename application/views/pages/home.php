<!DOCTYPE html>
<html>
<head>
	<title> GeekHouse | <?php echo $title ?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php echo $style; ?>
	<style>
		.rectangle{
			width: 100%;
			background: #222222 0% 0% no-repeat padding-box;
			opacity: 0.8;
			color: white;
			margin: 0;
		}
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
	</style>
</head>
<body
	style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover;">
	
	<?php echo $navbar; ?>
	<section id="home">
		<div class="container-fluid text-center p-5 rectangle">
			Welcome To<br>
			<img src="<?php echo base_url('assets/images/logo/light.png') ?>" alt="Geeks House" height="100rem"><br/>
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur impedit similique, aut cum voluptatum molestiae expedita vel repellendus blanditiis hic sit commodi tenetur nihil id illum, cumque maiores ad repellat.
		</div>
	</section>
	<section class="py-3" id="rental" style="background-color: rgb(146,220,229);">
		<div class="container-fluid">
			<div class="container">
				<h5 class="text-center mb-3"> RENTAL </h5>
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
																		<p><strong> <?php echo $b2['nama'] ?> </strong></p>
																	</div>
																	<ul class="list-group list-group" style="width: 100%">
																		<li class="list-group-item">
																			<p>Rp <?php echo number_format($b2['harga'], 2);?>/day</p>
																		</li>
																		<li class="list-group-item mb-2">
																			<div class="row text-center">
																				<span class="col mb-1">
																					<a href="<?php echo base_url('index.php/home/detail/'.$b2['id_barang'])?>">
																						<button class="btn btn-outline-dark w-100" style="border-radius: 0;">Detail</button>
																					</a>
																				</span>
																				<span class="col">
																					<a href="">
																						<button class="btn btn-outline-dark w-100" style="border-radius: 0;">Add to cart</button>
																					</a>
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
	<section class="py-3" id="about" style="background-color: #fff;">
		<div class="container-fluid">
			<div class="container">
				<h5> ABOUT US </h5>
			</div>

		</div>
	</section>
	<?php echo $footer; ?>

	<?php echo $script; ?>
</body>
</html>
