<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section>
<header>
	<div class="container">
		Summarecon Mall Serpong 082121
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
					<a class="nav-link" href="<?php echo base_url()?>"> Home </a>
				</li>
				<?php if(isset($title)) if($title == "Home") { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url("#rental")?>"> Rental </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url("#about")?>"> About </a>
					</li>
				<?php }?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url("index.php/Home/keranjang")?>"> Cart </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/Home/admin_barang')?>">A_barang</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url('index.php/Home/admin_order')?>">A_order</a>
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
