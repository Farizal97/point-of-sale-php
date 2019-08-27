<?php 

$kode_png = $_GET['id'];

$sql = $koneksi->query("DELETE  FROM tb_user WHERE id = '$kode_png'");

if($sql) {

?>



<script type="text/javascript">
    alert("Data Berhasil Dihapus");
     window.location.href="?page=user";
                     
    
</script>

<?php 

    
}

?>