<?php

$kode_plg = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM tb_pelanggan WHERE kode_pelanggan = '$kode_plg'");
$tampil = $sql->fetch_assoc();



?>

         



            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Tambah Pelanggan
                                
                            </h2>

              <div class="body">
              	

              		<form method="POST">

              <label for="">Nama</label>

              <div class="form-group">
                   <div class="form-line">
          <input type="text" name="nama" value="<?php echo  $tampil['nama']; ?>"  class="form-control"  />
              </div>
               </div>

               <label for="">Alamat</label>

              <div class="form-group">
                   <div class="form-line">
           <input type="text" name="alamat" value="<?php echo $tampil['alamat']; ?>" class="form-control"  />
              </div>
               </div>


              

              <label for="">Telpon</label>

              <div class="form-group">
                   <div class="form-line">
           <input type="number" name="telepon" value="<?php  echo $tampil['telepon']; ?>"  class="form-control"  />
              </div>
               </div>

                <label for="">Email</label>

              <div class="form-group">
                   <div class="form-line">
           <input type="text" name="email" value="<?php echo $tampil['email']; ?>" class="form-control"  />
              </div>
               </div>

               
         <input type="submit" name="simpan" value="simpan" class="btn btn-danger">

         </form>
         
         <?php
           
                  if(isset($_POST['simpan'])) {
                      
                     
                      $nama = $_POST['nama'];
                      $alamat = $_POST['alamat'];
                      $telepon = $_POST['telepon'];
                      $email = $_POST['email'];
                      
                      
            $sql = $koneksi->query("UPDATE tb_pelanggan SET nama='$nama',alamat='$alamat',telepon='$telepon',email='$email' WHERE kode_pelanggan ='$kode_plg'");
                      
                      if($sql) {
                          ?>
                          
                 <script type="text/javascript">
                    alert("Data Berhasil Diubah");
                    window.location.href="?page=pelanggan";
                     
                  </script>
                     
                     <?php
                     
                      }
                      
                  }
         ?>