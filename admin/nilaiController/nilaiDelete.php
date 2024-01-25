<?php 
    include "../../koneksi/koneksi.php";

    $nim = $_GET["nim"];
    $delNilai = "DELETE FROM nilai WHERE nim='$nim'";
    $resultNilai = mysqli_query($koneksi, $delNilai);

    if($resultNilai){
        echo "<script>alert('Data Berhasil Dihapus !') </script>";
        echo "<script type='text/javascript'>window.location = '.././?adm=nilai'</script>";
    }else{
        echo "<script>alert('Data Gagal Dihapus !')</script>";
        echo "<script type='text/javascript'>window.location = '.././?adm=nilai'</script>";
    }
?>
