<!-- Basic Examples -->
            
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Barang
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barcode</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Stok</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Profit</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        $sql = $koneksi->query("SELECT * FROM tb_barang");
                                        while ($data = $sql->fetch_assoc()) {
                                            # code...
                                        
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['kode_barcode'] ?></td>
                                            <td><?php echo $data['nama_barang'] ?></td>
                                            <td><?php echo $data['satuan'] ?></td>
                                            <td><?php echo $data['stok'] ?></td>
                                            <td><?php echo $data['harga_beli'] ?></td>
                                            <td><?php echo $data['harga_jual'] ?></td>
                                            <td><?php echo $data['profit'] ?></td>
                                            <td>
                        <a href="?page=barang&aksi=ubah&id=<?php echo $data ['kode_barcode'] ?>" class="btn btn-warning">Ubah</a>
                        <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini...???')" href="?page=barang&aksi=hapus&id=<?php echo $data ['kode_barcode'] ?>" class="btn btn-danger">Hapus</a>
                                            </td>


                                           
                                        </tr>
                                    <?php } ?>
                                    </tbody>

                                </table>
                                <a href="?page=barang&aksi=tambah" class="btn btn-primary">Tambah</a>
                                <a href="page/barang/cetak.php" target="blank" class="btn btn-info">Cetak</a>
                            </div>
  