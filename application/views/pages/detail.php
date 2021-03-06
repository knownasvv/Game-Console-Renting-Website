<!DOCTYPE html>
<html>
<head>
	<title> GeekHouse | <?php echo $title ?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php echo $style; ?>
	<style>
		.btn-success{width:100%;border-radius:0;}
		.attr,.attr2{cursor:pointer;;font-size:0.9rem;}
		
	</style>
</head>
<body
	style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover;">
	
	<?php echo $navbar; ?>
	<section id="home">
		<?php foreach($barang as $b) { ?>
		<div class="container p-5" style="background: rgba(255,255,255,0.9);">
		<a href="javascript:history.go(-1)"><button class="btn btn-warning"><i class="fa fa-chevron-left mr-1"></i> Back</button></a>
        	<div class="row justify-content-center py-5">
               <div class="col-lg-4 item-photo">
                    <img style="max-width:100%;" src="<?php echo base_url('assets/images/konsol/'.$b['gambar'])?>" />
                </div>
                <div class="col-lg-6" style="border:0px solid gray">
					<!-- NAMA -->
                    <h3><strong><?php echo $b['nama']?></strong></h3>    

					<!-- KATEGORI -->
                    <subtitle> <?php echo ucwords($b['kategori'])?></subtitle>

					<!-- PRICE -->
                    <h6 class="title-price mt-3"><small>PRICE</small></h6>
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
