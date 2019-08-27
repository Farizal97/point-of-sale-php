<?php 

$kode_bcd = $_GET['id'];

$sql = $koneksi->query("DELETE  FROM tb_barang WHERE kode_barcode = '$kode_bcd'");

if($sql) {

?>



<script type="text/javascript">
    alert("Data Berhasil Dihapus");
     window.location.href="?page=barang";
                     
    
</script>

<?php 

    
}

?>