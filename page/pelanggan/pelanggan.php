<!-- Basic Examples -->
            
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Data Pelanggan
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                           
                                            <th>Nama </th>
                                            <th>Alamat</th>
                                            <th>Telpon</th>
                                            <th>Email</th>
                                           
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                        $no = 1;
                                        $sql = $koneksi->query("SELECT * FROM tb_pelanggan");
                                        while ($data = $sql->fetch_assoc()) {
                                            # code...
                                        
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data['nama'] ?></td>
                                            <td><?php echo $data['alamat'] ?></td>
                                            <td><?php echo $data['telepon'] ?></td>
                                            <td><?php echo $data['email'] ?></td>
                                            <td>
                        <a href="?page=pelanggan&aksi=ubah&id=<?php echo $data ['kode_pelanggan'] ?>" class="btn btn-warning">Ubah</a>
                        <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini...???')" href="?page=pelanggan&aksi=hapus&id=<?php echo $data ['kode_pelanggan'] ?>" class="btn btn-danger">Hapus</a>
                                            </td>


                                           
                                        </tr>
                                    <?php } ?>
                                    </tbody>

                                </table>
                                <a href="?page=pelanggan&aksi=tambah" class="btn btn-primary">Tambah</a>
                            </div>
  