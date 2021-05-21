<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section>
	<header>
		<div class="container">
			<div class="row" style="font-size:1rem">
				<div class="col-4 text-left m-0">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					Summarecon Mall Serpong
				</div>
				<div class="col-4 text-center m-0">
					<i class="fa fa-phone" aria-hidden="true"></i>
					(021)6446-0008
				</div>
				<div class="col-4 text-right m-0">
					<i class="fa fa-instagram" aria-hidden="true"></i>
					@geekhouse!
				</div>
			</div>
		</div>
	</header>
	<nav class="navbar navbar-expand-md shift" 
		style="background: <?php 
		if (isset($title)) if ($title == "Home") echo 'rgba(34,34,34, 0.8); ';
		else if($title != "Home" || !isset($title))echo 'linear-gradient(180deg, rgba(52,58,64,0.7822479333530288) 14%, rgba(0,0,0,0.46011908181241246) 56%, rgba(255,255,255,0) 100%); ';
	?> ">
		<div class="container">
			<a href="<?php echo base_url();?>" class="navbar-brand d-flex mr-auto"><img src="<?php echo base_url('assets/images/logo/light.png') ?>" alt="Geeks House" height="55rem"></a>
			<button class="navbar-toggler text-white" data-toggle="collapse" data-target="#collapsing">
				 ≡ 
				<!-- <span class="navbar-toggler-icon"></span> -->
			</button>
			<div class="navbar-collapse collapse w-100" id="collapsing">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link a-effect" href="<?php echo base_url() ?>"> Home </a>
					</li>

					<?php if (isset($title)) if ($title == "Home") { ?>
						<li class="nav-item">
							<a class="nav-link a-effect" href="<?php echo base_url("#rental") ?>"> Rental </a>
						</li>
						<li class="nav-item">
							<a class="nav-link a-effect" href="<?php echo base_url("#about") ?>"> About </a>
						</li>
					<?php } ?>
					<?php if(isset($_SESSION['salt']) && $_SESSION['salt']== "user") {?>
						<li class="nav-item">
							<a class="nav-link a-effect" href="<?php echo base_url("index.php/user/cart") ?>"> Cart </a>
						</li>
						<li class="nav-item">
							<a class="nav-link a-effect" href="<?php echo base_url("index.php/user/orderlist") ?>"> Order </a>
						</li>
					<?php } ?>

					<?php if(isset($_SESSION['salt']) && $_SESSION['salt']== "admin"){ ?>
					<li class="nav-item">
						<a class="nav-link a-effect" href="<?php echo base_url('index.php/admin/admin_barang') ?>">A_barang</a>
					</li>
					<li class="nav-item">
						<a class="nav-link a-effect" href="<?php echo base_url('index.php/admin/admin_order') ?>">A_order</a>
					</li>
					<?php } ?>
				</ul>
				</ul>
				<ul class="nav navbar-nav ml-auto w-100 justify-content-end">
					<?php if (isset($_SESSION['name'])) { ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle  a-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
								<ul class="list-inline">
									<li class="list-inline-item" style="text-transform: none;"><small>Welcome,</small></li>
									<li class="list-inline-item"><?= ucwords($_SESSION['name']) ?></li>
								</ul>
							</a>
							<div class="dropdown-menu p-0">
								<a class="dropdown-item a-effect text-dark px-0 py-2" href="<?php echo base_url("index.php/Login/logout") ?>">Log Out</a>
							</div>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="nav-link a-effect" href="<?php echo base_url("index.php/login") ?>">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link a-effect" href="<?php echo base_url("index.php/signup") ?>">Sign Up</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
</section>
