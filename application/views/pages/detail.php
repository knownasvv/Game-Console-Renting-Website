<!DOCTYPE html>
<html>
<head>
	<title> GeekHouse | <?php echo $title ?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php echo $style; ?>
	<style>
		ul > li{margin-right:25px;font-weight:lighter;cursor:pointer}
		li.active{border-bottom:3px solid silver;}
		.item-photo{display:flex;justify-content:center;align-items:center;border-right:1px solid #f6f6f6;}
		.menu-items{list-style-type:none;font-size:11px;display:inline-flex;margin-bottom:0;margin-top:20px}
		.btn-success{width:100%;border-radius:0;}
		.section{width:100%;margin-left:-15px;padding:2px;padding-left:15px;padding-right:15px;background:#f8f9f9}
		.title-price{margin-top:30px;margin-bottom:0;color:black}
		.title-attr{margin-top:0;margin-bottom:0;color:black;}
		div.section > div {width:100%;display:inline-flex;}
		div.section > div > input {margin:0;padding-left:5px;font-size:10px;padding-right:5px;max-width:18%;text-align:center;}
		.attr,.attr2{cursor:pointer;margin-right:5px;font-size:0.9rem;padding:2px;}

	</style>
</head>
<body
	style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover;">
	
	<?php echo $navbar; ?>
	<section id="home" class="bg-white">
		<?php foreach($barang as $b) { ?>
		<div class="container-fluid p-5">
        	<div class="row justify-content-center">
               <div class="col-lg-4 item-photo">
                    <img style="max-width:100%;" src="<?php echo base_url('assets/images/konsol/'.$b['gambar'])?>" />
                </div>
                <div class="col-lg-6" style="border:0px solid gray">
					<!-- NAMA -->
                    <h3><strong><?php echo $b['nama']?></strong></h3>    

					<!-- KATEGORI -->
                    <subtitle> <?php echo ucwords($b['kategori'])?></subtitle>

					<!-- PRICE -->
                    <h6 class="title-price"><small>PRICE</small></h6>
                    <h3>Rp <?php echo number_format($b['harga'], 2);?>/day</h3>

					<!-- STOCK -->
					<div class="section" style="padding-bottom:20px;">
                        <h6 class="title-attr"><small>STOCK <?php echo $b['stok']?> </small></h6>              
                    </div> 
					
					<!-- DESCRIPTION -->
                    <div class="section">
                        <h6 class="title-attr" style="margin-top:15px;" ><small>DESCRIPTION</small></h6>                    
                        <div>
                            <div class="attr">
								<?php echo $b['deskripsi']?>
							</div>
                        </div>
                    </div>
                                  
        
                    <!-- ADD TO CART -->
                    <div class="section" style="padding-bottom:20px;">
						<!-- Cek keranjang user -->
						<?php 
							$sudah_dipesan = FALSE;
							if(isset($keranjang)) {
								foreach($keranjang as $k) {
									if($k['id_barang'] == $b['id_barang']) $sudah_dipesan = TRUE;
								} 
							}
						?>
						<!-- Barang sudah di keranjang -->
						<?php if($sudah_dipesan) { ?>
							<button class="btn btn-success fa fa-check-square disabled"><span style="margin-right:20px" aria-hidden="true"></span> In Cart</button>
						<?php } else if($b['stok'] > 0) {?>
							<!-- Ada stok barang -->
							<a href="<?= base_url('index.php/user/addToCart/'.$b['id_barang']);?>">
								<button class="btn btn-success fa fa-shopping-cart"><span style="margin-right:20px" aria-hidden="true"></span> Add to Cart</button>
							</a>
						<!-- No stok -->
						<?php } else if($b['stok'] <= 0) {?>
							<button class="btn btn-danger fa fa-times-circle disabled"><span style="margin-right:20px" aria-hidden="true"></span> Out of Stock</button>
						<?php } ?>
                    </div>                                        
                </div>          
            </div>
        </div> 
		<?php } ?>
	</section>
	<?php echo $footer; ?>
	<?php echo $script; ?>
</body>
</html>
