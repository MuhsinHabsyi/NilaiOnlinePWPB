<?php 
    include "../../koneksi/koneksi.php";

    $kode = $_GET["kode_mtkul"];
    $delMatkul = "DELETE FROM matakuliah WHERE kode_mtkul='$kode'";
    $resultMatkul = mysqli_query($koneksi, $delMatkul);

    if($resultMatkul){
        echo "<script>alert('Data Berhasil Dihapus !') </script>";
        echo "<script type='text/javascript'>window.location = '.././?adm=matkul'</script>";
    }else{
        echo "<script>alert('Data Gagal Dihapus !')</script>";
        echo "<script type='text/javascript'>window.location = '.././?adm=matkul'</script>";
    }
?>
