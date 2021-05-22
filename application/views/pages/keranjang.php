<!DOCTYPE html>
<html>
<head>
	<title> GeekHouse | <?php echo $title ?> </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php echo $style; ?>
	
</head>
<body
	style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover; margin-bottom:240px;" >
	
	<?php echo $navbar; ?>
	<section id="home">
		<div class="container text-center py-5">

			<?php if(isset($isi_keranjang)) {?>
				
				<div class="row no-gutters" style="background-color:rgba(255,255,255, 0.9);padding:10px">
				<?php foreach($isi_keranjang as $k) {$k = $k[0]?>
					
					<div class="col-md-3">
						<img src="<?= base_url('assets/images/konsol/'.$k['gambar'])?>" width='200px' height='230px' class="card-img" alt="Gambar <?= $k['nama']?>">
					</div>
					
					<div class="col-md-9">
						<div class="card-body">
							<?php
							$id_simpan1=$k['id_barang'];
							$id_simpan2=$keranjang['id_keranjang'];
							?>
							<h5 class="card-title"><?= $k['nama']?></h5>
							<p class="card-text"><?= $k['deskripsi']?></p>
							<p class="card-text">Rp.<?= $k['harga']?>/day</p>
							<a href="<?=base_url("index.php/User/DeleteK?id=$id_simpan1&keranjang=$id_simpan2")?>" style="margin-right:10px;color:rgb(0,200,255);">
							<button class='btn'>
							<span class='glyphicon glyphicon-remove text-danger'>Delete</span>
							</button>
							</a>
						</div>
					</div>
					<div class='col-12'><br></div>
				<?php }?>
				<div class='col-12' style="text-align:center">
					<div class="form-group row" style="text-align:center">
                        <label class="col-sm-6 col-form-label" style="text-align:right">Lama Peminjaman :</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" value="<?= $keranjang['lama_peminjaman'] ?>" id="lama" name="lama" oninput="calculate()"></input>
                        </div>
                    </div>
				</div>
				
				<div class='col-12' style="text-align:center">
					<a href="<?php echo base_url()."index.php/User/tambah12?keranjang=$id_simpan2&lama=1";?>" style="margin-right:10px;color:rgb(0,200,255);" id="konfirmasi">
					<button class='btn btn-success'>
					<span class='glyphicon glyphicon-remove'>Konfirmasi</span>
					</button>
					</a>
				</div>
				</div>
			
			<?php } else { ?>
				<h2 class="bg-white"> Your cart is empty. </h2>
			<?php } ?>
		</div>
	</section>
	<div class="alert alert-dismissible fade  <?php if(isset($addToOrder)) echo 'show'; ?> text-white col-lg-3 col-md-5 col-sm-6 col-xs-12 w-100 px-3 m-3" style="background-color: #4CAF50; border: 0;">
		<p class="mr-3"><i class="fa fa-check-square fa-2x align-middle mr-2"></i> Your cart has been added to order. </p>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php echo $footer; ?>
	<?php echo $script; ?>
	
		<script>
		function calculate(){
			var lama = document.getElementById("lama").value;
			
			document.getElementById("konfirmasi").href="<?php echo base_url()."index.php/User/tambah12?keranjang=$id_simpan2&lama=" ;?>" + lama			
		}
		</script>
</body>
</html>
