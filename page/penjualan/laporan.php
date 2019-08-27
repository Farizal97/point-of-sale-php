<?php

  

   error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

   $koneksi = new mysqli ("localhost","root","","pos_bms");


?>

<style>

	@media print {
	
	input.noPrint {

		display: none;;
	}


	}
</style>

<table border="1" width="100%" style="border-collapse: collapse;">
	<caption>Laporan Penjualan</caption>
	<thead>
	<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>Kode Barcode</th>
		<th>Nama Barang</th>
		<th>Harga Jual</th>
		<th>Jumlah</th>
		<th>Total</th>
		<th>Profit</th>
	</tr>
	</thead>
	<tbody>

	<?php

		$tgl_awal = $_POST['tgl_awal'];
		$tgl_akhir = $_POST['tgl_akhir'];
        $no = 1;
        $sql = $koneksi->query("SELECT * FROM tb_penjualan,tb_barang WHERE tb_penjualan.kode_barcode=tb_barang.kode_barcode AND tgl_penjualan BETWEEN '$tgl_awal' AND '$tgl_akhir' ");

        while ($data = $sql->fetch_assoc()) {
            
            $profit = $data['profit'] * $data['jumlah'];
        
    ?>
        <tr>
            <td align="center"><?php echo $no++; ?></td>
            <td align="center"><?php echo date('d F Y',strtotime($data['tgl_penjualan'])) ?></td>
            <td align="center"><?php echo $data['kode_barcode'] ?></td>
            <td><?php echo $data['nama_barang'] ?></td>
            <td align="center"><?php echo number_format($data['harga_jual'])?></td>

            <td align="center"><?php echo $data['jumlah'] ?></td>
            <td align="center"><?php echo number_format($data['total'])?></td>
            <td align="center"><?php echo number_format($profit)?></td>
            <td>


				                                           
        </tr>
                                   
    <?php 

    $total_pj = $_total_pj+$data['total'];
    $total_profit = $total_profit + $profit;

	} 

	?>

	</tbody>
	<tr>
		<th colspan="6">Total Penjualan Dan Profit</th>
		<td><?php echo number_format($total_pj) ?></td>
		<td><?php echo number_format($total_profit) ?></td>
	</tr>
</table>

<br>
<input type="button" class="noPrint"  value="Cetak"  onclick="window.print()">