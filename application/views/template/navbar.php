<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url('')?>"> Home </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"> About </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"> Rental </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/Home/admin_barang')?>">Admin_barang</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/Home/admin_order')?>">Admin_order</a>
				</li>
			</ul>
			<ul class="nav navbar-nav ml-auto w-100 justify-content-end">
				<li class="nav-item">
					<a class="nav-link" href="#">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Sign Up</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
</section>
