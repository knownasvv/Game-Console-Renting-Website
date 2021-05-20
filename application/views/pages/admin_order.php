<!DOCTYPE html>
<html>
<head>
    <title> Rental </title>
	<?php echo $style; ?>
	<?php echo $script; ?>
</head>
<body
style="
		background: url(<?php echo base_url('assets/images/background/home.jpg')?>) no-repeat fixed center; 
		background-size: cover; margin-bottom:240px;" >
    <?php echo $navbar; ?>
    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
	</script>

	<div class=" container" style="box-shadow: 0px 10px 20px 0 rgba(255, 255, 255, 1);background-color:rgba(255,255,255, 0.9);padding-top:10px">
	<table id="example" class="table table-bordered table-hover table-striped" style="background-color:white">
		<thead>
			<tr>
				<th style='text-align: center; vertical-align: middle;'> ID Order </th>
				<th style='text-align: center; vertical-align: middle;'> Nama Barang </th>
                <th style='text-align: center; vertical-align: middle;'> Nama Pemesan </th>
				<th style='text-align: center; vertical-align: middle;'> Lama Peminjaman </th>
				<th style='text-align: center; vertical-align: middle;'> Status Pemesanan </th>
                <th style='text-align: center; vertical-align: middle;'> Action </th>
			</tr>
		</thead>
		<tbody>
        <?php
            foreach($order as $row){            //order
                $id_o = $row['id_order'];
                $id_k = $row['id_keranjang'];
                $status = $row['status_pemesanan'];
                foreach($keranjang as $row1){   // keranjang
                    $idk = $row1['id_keranjang'];
                    $id_u = $row1['id_user'];
                        if($id_k==$idk){
                            $lama_peminjaman = $row1['lama_peminjaman'];
                            foreach($detail as $row2){  //detail_keranjang
                                $idk2 = $row2['id_keranjang'];
                                if($id_k==$idk2){
                                    $id_b = $row2['id_barang'];
                                    foreach($barang as $row3){  //barang
                                        $idb = $row3['id_barang'];
                                        if($id_b==$idb){
                                            $nama_b = $row3['nama'];
                                            foreach($user as $row4){    //user
                                                $idu = $row4['id_user'];
                                                if($id_u==$idu){
                                                    $nama_u = $row4['nama'];
                                                }
                                            }
                                        }
                                    }
                                    //pembuatan tabel
                                    if($status == 1){
                                        $status1 = "Sedang Dikirim";
                                    }else if($status == 2){
                                        $status1 = "Sudah Dikirim";
                                    }else if($status == 3){
                                        $status1 = "Siap di Pick-up";
                                    }else if($status == 4){
                                        $status1 = "Selesai";
                                    }
                                    echo "<tr>";
                                    echo "<td style='text-align: center; vertical-align: middle;'>".$id_o."</td>";
                                    echo "<td style='text-align: center; vertical-align: middle;'>".$nama_b."</td>";
                                    echo "<td style='text-align: center; vertical-align: middle;'>".$nama_u."</td>";
                                    echo "<td style='text-align: center; vertical-align: middle;'>".$lama_peminjaman."</td>";
                                    echo "<td style='text-align: center; vertical-align: middle;'>".$status1."</td>";

                                    echo "<td style='text-align: center; vertical-align: middle;'>";
                                    echo "<a href='".base_url("index.php/Home/change1?id=$id_o")."'style='margin-right:10px;color:rgb(0,200,255);'>";
                                    echo "<button class='btn btn-danger'>";
                                    echo "<span>Sedang dikirim</span>";
                                    echo "</button>";
                                    echo "</a>";
                                    echo "<a href='".base_url("index.php/Home/change2?id=$id_o")."'style='margin-right:10px;color:rgb(0,200,255);'>";
                                    echo "<button class='btn btn-success'>";
                                    echo "<span>Sudah Dikirim</span>";
                                    echo "</button>";
                                    echo "</a>";
                                    echo "<a href='".base_url("index.php/Home/change3?id=$id_o")."'style='margin-right:10px;color:rgb(0,200,255);'>";
                                    echo "<button class='btn btn-secondary'>";
                                    echo "<span>Selesai</span>";
                                    echo "</button>";
                                    echo "</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                }
            }
        ?>
		</tbody>
		<tfoot>
			<tr>
                <th style='text-align: center; vertical-align: middle;'> ID Order </th>
				<th style='text-align: center; vertical-align: middle;'> Nama Barang </th>
                <th style='text-align: center; vertical-align: middle;'> Nama Pemesan </th>
				<th style='text-align: center; vertical-align: middle;'> Lama Peminjaman </th>
				<th style='text-align: center; vertical-align: middle;'> Status Pemesanan </th>
                <th style='text-align: center; vertical-align: middle;'> Action </th>
			</tr>
		</tfoot>
	</table>
    </br>
    </br>
	</div>

</body>
</html>