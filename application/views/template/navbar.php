<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<section>
	<header>
		<div class="container">
			<div class="row" style="font-size:16px">
				<div class="col-sm-3">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					Summarecon Mall Serpong
				</div>
				<div class="col-sm-2">
					<i class="fa fa-phone" aria-hidden="true"></i>
					(021)6446-0008
				</div>
				<div class="col-sm-2">
					<i class="fa fa-instagram" aria-hidden="true"></i>
					@geekhouse!
				</div>
			</div>
		</div>
	</header>
	<nav class="navbar navbar-expand-md shift">
		<div class="container">
			<a href="#" class="navbar-brand d-flex mr-auto"><img src="<?php echo base_url('assets/images/logo/light.png') ?>" alt="Geeks House" height="50vh"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsing">
				X<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse w-100" id="collapsing">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url() ?>"> Home </a>
					</li>
					<?php if (isset($title)) if ($title == "Home") { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url("#rental") ?>"> Rental </a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url("#about") ?>"> About </a>
						</li>
					<?php } ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url("index.php/Home/keranjang") ?>"> Cart </a>
					</li>
					<?php if(isset($_SESSION['salt']) && $_SESSION['salt']== "admin"){ ?>

					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/admin/admin_barang') ?>">A_barang</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/admin/admin_order') ?>">A_order</a>
					</li>
					<?php } ?>
				</ul>
				<ul class="nav navbar-nav ml-auto w-100 justify-content-end">
					<?php if (isset($_SESSION['name'])) { ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['name'] ?></a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo base_url("index.php/Login/logout") ?>">Log Out</a>
							</div>
						</li>
					<?php } else { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url("index.php/login") ?>">Login</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Sign Up</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</nav>
</section>