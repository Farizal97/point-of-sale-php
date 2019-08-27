<script>

    function sum() {
        var harga_beli = document.getElementById('harga_beli').value;
        var harga_jual = document.getElementById('harga_jual').value;
        var result =parseInt(harga_jual) - parseInt(harga_beli);
        if(!isNaN(result)) {
            document.getElementById('profit').value = result;
        }
    }

</script>

<?php

$kode_bcd = $_GET['id'];

$sql = $koneksi->query("SELECT * FROM tb_barang WHERE kode_barcode = '$kode_bcd'");
$tampil = $sql->fetch_assoc();

$satuan = $tampil['satuan'];

?>


<!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Ubah Barang
                                
                            </h2>

              <div class="body">
              	

              		<form method="POST">

              <label for="">Kode Barcode</label>

              <div class="form-group">
                   <div class="form-line">
          <input type="text" name="kode" value="<?php echo $tampil ['kode_barcode']; ?>" class="form-control"  />
              </div>
               </div>

               <label for="">Nama Barang</label>

              <div class="form-group">
                   <div class="form-line">
           <input type="text" name="nama" value="<?php echo $tampil ['nama_barang']; ?>"  class="form-control"  />
              </div>
               </div>


               <label for="">Satuan</label>
               <div class="form-group">
                   <div class="form-line">
             <select name = "satuan" class="form-control show-tick">
              	
            <option value="LUSIN" <?php if($satuan=='LUSIN') { echo "selected"; } ?>>LUSIN</option>
            <option value="PACK"<?php if($satuan=='PACK') { echo "selected"; } ?>>PACK</option>
           <option value="PCS" <?php if($satuan=='PCS') { echo "selected"; } ?>> PCS</option>
                 
             </select>
             	</div>
             </div>

              <label for="">Stok</label>

              <div class="form-group">
                   <div class="form-line">
           <input type="number" name="stok" value="<?php echo $tampil ['stok']; ?>"   class="form-control"  />
              </div>
               </div>

                <label for="">Harga Beli</label>

              <div class="form-group">
                   <div class="form-line">
           <input type="number" name="hbeli" id="harga_beli" onkeyup="sum()" value="<?php echo $tampil ['harga_beli']; ?>"  class="form-control"  />
              </div>
               </div>

                <label for="">Harga Jual</label>

              <div class="form-group">
                   <div class="form-line">
           <input type="number" name="hjual" id="harga_jual" onkeyup="sum()" value="<?php echo $tampil ['harga_jual']; ?>"  class="form-control"  />
              </div>
               </div>

                <label for="">Profit</label>

              <div class="form-group">
                   <div class="form-line">
           <input type="number" name="profit" id="profit" value="<?php echo $tampil ['profit']; ?>"  readonly = "" style = "background-color: #e7e3e9;" value = "0" class="form-control"  />
              </div>
               </div>

         <input type="submit" name="simpan" value="simpan" class="btn btn-danger">

         </form>
         
         <?php
           
                  if(isset($_POST['simpan'])) {
                      
                      $kode = $_POST['kode'];
                      $nama = $_POST['nama'];
                      $satuan = $_POST['satuan'];
                      $stok = $_POST['stok'];
                      $hbeli = $_POST['hbeli'];
                      $hjual = $_POST['hjual'];
                      $profit = $_POST['profit'];
                      $sql = $koneksi->query("UPDATE tb_barang set kode_barcode='$kode',nama_barang='$nama',satuan='$satuan',harga_beli='$hbeli',stok='$stok',harga_jual='$hjual',profit='$profit' WHERE kode_barcode='$kode_bcd'");
                      
                      if($sql) {
                          ?>
                          
                 <script type="text/javascript">
                    alert("Data Berhasil Diubah");
                    window.location.href="?page=barang";
                     
                  </script>
                     
                     <?php
                     
                      }
                      
                  }
         ?>