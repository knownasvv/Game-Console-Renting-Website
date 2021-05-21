<!DOCTYPE html>
<html>
<head>
    <title> Admin-order </title>
	<?php echo $style; ?>
	<?php echo $script; ?>
</head>
<body
style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover; margin-bottom:240px;" >
    <?php echo $navbar; ?>
	
	<?php
		$cek=false;
        foreach($user as $row){ //user
			$nama = $row['nama'];
			if($nama==$_SESSION['name']){
				$id_u=$row['id_user'];
				echo '<div class="container">';
				echo '<div class="row" style="background-color:rgba(255,255,255, 0.9);padding-top:10px;padding-bottom:10px;border-radius:10px;">';
				foreach($keranjang as $row1){ // keranjang
					if($id_u == $row1['id_user'] && $row1['status_barang']=='Dipesan'){
						$cek=true;
						$id_k=$row1['id_keranjang'];
						$lama_peminjaman = $row1['lama_peminjaman'];
						$count=0;
						foreach($detail as $row2){ //detail
							if($id_k == $row2['id_keranjang']){
								$id_b = $row2['id_barang'];
								$count++;
								foreach($barang as $row3){ //barang
									if($id_b==$row3['id_barang']){
										$nama_b=$row3['nama'];
										$desk=$row3['deskripsi'];
										$gambar=$row3['gambar'];
										$harga=$row3['harga'];
									}
								}
								$base=base_url("/assets/images/konsol/$gambar");
								
								echo "<div class='col-1'>$count</div>";
								echo '<div class="col-2" style="padding:0">';
									echo "<img src='$base' width='200px' height='200px'>";
								echo "</div>";
								echo '<div class="col-9 align-middle">';
									echo "<h5 style='font-weight:bold'>$nama_b</h5>";
									echo "<p>$desk</p>";
									echo "<p>Harga Rental : Rp.$harga</p>";
								echo "</div>";
								echo "<div class='col-12'><br></div>";
							}
						}
						foreach($order as $row4){ //order
							if($id_k==$row4['id_keranjang']){
								$id_o=$row4['id_order'];
								$status=$row4['status_pemesanan'];
							}
						}
					}
				}
				if($cek==true){
					echo "<div class='col-12'><hr></div>";
					echo "<b class='col-12' style='text-align:center'>ID Order : $id_o</b>";
					echo "<b class='col-12' style='text-align:center'>Lama Peminjaman : $lama_peminjaman hari</b>";
					echo "<div class='col-12' style='text-align:center'>Status : </div>";
					if($status==2){
						echo "<div class='col-12' style='text-align:center'>";
						echo "<a href='".base_url("index.php/user/change?id=$id_o")."'style='margin-right:10px;color:rgb(0,200,255);'>";
						echo "<button class='btn btn-success'>";
						echo "<span>Siap di Pick-up</span>";
						echo "</button>";
						echo "</a>";
						echo "</div>";
					}else if($status==1){
						echo "<div class='col-12' style='text-align:center'>";
						echo "<p> Barang belum dikirim </p>";
						echo "</div>";
					}else if($status==3){
						echo "<div class='col-12' style='text-align:center'>";
						echo "<p style='color:blue'> Barang telah siap diambil </p>";
						echo "</div>";
					}else if($status==4){
						echo "<div class='col-12' style='text-align:center'>";
						echo "<p style='color:green'> Transaksi telah selesai </p>";
						echo "</div>";
					}
				}else{
					echo "<div class='col-12' style='text-align:center'> ~ User Belum Memesan Barang ~ </div>";
				}
			}
			echo "</div>";
			echo "</div>";
		}

		//pembuatan tabel
		
			
		
	?>

</body>
</html>