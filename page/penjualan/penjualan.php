<?php 
 
 	$kode = $_GET['kodepj'];

    $kasir = $data['nama'];

?>

<div class="clearfix">
	
		
		<div class="body">

			<form method="post">

		
			<div class="col-md-2">
				<input type="text" name="kode" value="<?php echo $kode; ?> " class="form-control" readonly="" />
			</div>

			<div class="col-md-2">
				<input type="text" name="kode_barcode"  class="form-control" autofocus="" />
			</div>

			<div class="col-md-2">
				<input type="submit" name="simpan" value = "Tambahkan" class="btn btn-danger">

			
		</div>
                
                </form>

	<?php 

		if (isset($_POST['simpan'])) {

			$date = date("Y-m-d");
			
			$kd_pj = $_POST['kode'];

			$barcode = $_POST['kode_barcode'];

			$barang = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");

			$data_barang = $barang->fetch_assoc();

			$harga_jual = $data_barang['harga_jual'];

			$jumlah = 1;

			$total = $jumlah * $harga_jual;

			$barang2 = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode='$barcode'");

			while ($data_barang2 = $barang2->fetch_assoc()) {
				
				$sisa = $data_barang2['stok'];

				if ($sisa == 0) {
			
					?>
			
					<script type="text/javascript">
						
						alert("Stok Barang Habis,Tidak Bisa Melakukan Transaksi Penjualan");

						window.location.href="?page=penjualan&kodepj=<?php echo $kode; ?>"

					</script>

					<?php 
				}

				else {

			$koneksi->query("INSERT INTO tb_penjualan (kode_penjualan,kode_barcode,jumlah,total,tgl_penjualan) values ('$kd_pj','$barcode','$jumlah','$total','$date')");


				}
			}
		}

	?>

	<!-- Basic Examples -->
            
            <br><br><br><br>
            
            
            <form method="post">
            
            <div class="col-md-2">
                <label for="">Pelanggan :</label>
                
                <select name="pelanggan" class="form-control show-tick">
                <?php
                  
                    
                    $pelanggan = $koneksi->query("SELECT * FROM tb_pelanggan ORDER By kode_pelanggan");
                    while($d_pelanggan=$pelanggan->fetch_assoc()) {
                        echo "
                        
                        <option value='$d_pelanggan[kode_pelanggan]'>$d_pelanggan[nama]</option>
                        
                        ";
                    }
                    
                ?>
                </select>
                
            </div>
            
            <br><br><br><br><br>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Daftar Belanjaan
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table  table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                           
                                            <th>Kode Barcode</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                           
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                        $no = 1;

                                        $sql = $koneksi->query("SELECT * FROM tb_penjualan,tb_barang WHERE
                                        	   tb_penjualan.kode_barcode=tb_barang.kode_barcode
                                        	   AND kode_penjualan='$kode'");


                                        while ($data = $sql->fetch_assoc()) {
                                            # code...
                                        
                                    ?>
                        <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['kode_barcode'] ?></td>
                                <td><?php echo $data['nama_barang'] ?></td>
                                <td><?php echo $data['harga_jual'] ?></td>
                                <td><?php echo $data['jumlah'] ?></td>
                                <td><?php echo $data['total'] ?></td>

                       <td>


                        <a href="?page=penjualan&aksi=tambah&id=<?php echo $data ['id']?>&kode_pj=<?php echo $data ['kode_penjualan']?>&harga_jual=<?php echo $data ['harga_jual']?>&kode_b=<?php echo $data ['kode_barcode'] ?>" title="tambah" class="btn btn-success"><i class="material-icons">add</i></a>

                       <a href="?page=penjualan&aksi=kurang&id=<?php echo $data ['id']?>&kode_pj=<?php echo $data ['kode_penjualan']?>&harga_jual=<?php echo $data ['harga_jual']?>&kode_b=<?php echo $data ['kode_barcode'] ?>"  title="kurang" class="btn btn-success"><i class="material-icons">remove</i></a>

                        <a onclick="return confirm('Apakah Anda Yakin Ingin Membatalkan Data Ini...???')" href="?page=penjualan&aksi=cancel&id=<?php echo $data ['id']?>&kode_pj=<?php echo $data ['kode_penjualan']?>&harga_jual=<?php echo $data ['harga_jual']?>&kode_b=<?php echo $data ['kode_barcode'] ?>&jumlah= <?php echo $data['jumlah'] ; ?>" title="cancel" class="btn btn-danger"><i class="material-icons">clear</i></a>
                            
                                           
                        </td>


                                           
                        </tr>

                         <?php 

                                $total_bayar = $total_bayar+$data['total'];

                                } 
                                
                        ?>
                                   
                        
                        </tbody>

                <tr>
                                    
                <th colspan="5" style="text-align: right; ">Total</th>

				<td><input type="number" readonly="" style="text-align: right;" name="total_bayar"  id="total_bayar"  onkeyup="hitung();" value="<?php echo $total_bayar; ?>"></td>

                </tr>

                 <tr>
                                    
                            <th colspan="5" style="text-align: right; ">Diskon</th>

				<td><input type="number" style="text-align: right;" onkeyup="hitung();" name="diskon" id="diskon"></td>

                </tr>
                               
                
                <tr>
                                    
                            <th colspan="5" style="text-align: right; ">Potongan Diskon</th>

				<td><input type="number" style="text-align: right;" onkeyup="hitung();"  name="potongan" id="potongan"></td>

                </tr>
                               
                <tr>
                                    
                            <th colspan="5" style="text-align: right; ">Sub Total</th>

				<td><input type="number" style="text-align: right;" onkeyup="hitung();"  name="s_total" id="s_total"></td>

                </tr>
                               
                <tr>
                                    
                            <th colspan="5" style="text-align: right; ">Bayar</th>

				<td><input type="number" style="text-align: right;" onkeyup="hitung();" name="bayar" id="bayar"></td>

                </tr>
                
                <tr>
                                    
                            <th colspan="5" style="text-align: right; ">Kembali</th>

				<td><input type="number" style="text-align: right;" name="kembali" id="kembali">
				
				<input type="submit" name="simpan_pj" value="Simpan" class="btn btn-info">

                <input type="submit"  value="Cetak Struk" class="btn btn-success" onclick="window.open('page/penjualan/struk.php?kode_pjl=<?php echo $kode; ?>&kasir=<?php echo $kasir; ?>','mywindow','width=300px,height=500px,left=300px;')">


				</td>

                </tr>
                
                </table>  
                
                </div>

            </form>


            <?php

            if (isset($_POST['simpan_pj'])) {
                
                $pelanggan = $_POST['pelanggan'];
                $total_bayar = $_POST['total_bayar'];
                $diskon = $_POST['diskon'];
                $potongan = $_POST['potongan'];
                $s_total = $_POST['s_total'];
                $bayar = $_POST['bayar'];
                $kembali = $_POST['kembali'];

                $koneksi->query("INSERT INTO tb_penjualan_detail(kode_penjualan,bayar,kembali,diskon,potongan,total) VALUES('$kode','$bayar','$kembali','$diskon','$potongan','$s_total')");

                $koneksi->query("UPDATE tb_penjualan SET id_pelanggan='$pelanggan' WHERE kode_penjualan='$kode'");
            }

            ?>
                
                <script type="text/javascript">
                    
                function hitung() {
                    
                var total_bayar = document.getElementById('total_bayar').value;
                            
                var diskon = document.getElementById('diskon').value;
                    
                var diskon_pot = parseInt(total_bayar) * parseInt(diskon) / parseInt(100);
                
                if(!isNaN(diskon_pot)) {
                    
                  var potongan =   document.getElementById('potongan').value = diskon_pot;

                }
                    var sub_total = parseInt(total_bayar) - parseInt(potongan);

                    if(!isNaN(sub_total)) {

                            var s_total = document.getElementById('s_total').value = sub_total;
                    }

                            
                            var bayar = document.getElementById('bayar').value;
                            var bayar_b = parseInt(bayar) - parseInt(s_total);
                    
                    if(!isNaN(bayar_b)) {
                        
                        document.getElementById('kembali').value = bayar_b;
                   
                }

                }
                    
                </script>  