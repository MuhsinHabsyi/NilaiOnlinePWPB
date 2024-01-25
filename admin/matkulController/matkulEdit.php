<?php 
    include "../koneksi/koneksi.php";

    $getKode = $_GET["kode_mtkul"];
    $editMatkul = "SELECT * FROM matakuliah WHERE kode_mtkul = '$getKode'";
    $resultMatkul = mysqli_query($koneksi ,$editMatkul);
    $dataMatkul = mysqli_fetch_array($resultMatkul);
?>

<h3>EDIT DATA MATKUL</h3>

<br><hr><br>
<p>
<?php 
        if(!isset($_POST['submit'])){

    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="100%" border=0>
            <tr>
                <td width="27%">KODE MATKUL</td>
                <td width="4%">:</td>
                <td width="69%"><input type="text" name="kode_mtkul" size="30" value="<?php echo $dataMatkul[0]?>" readonly="readonly"></td>
            </tr>
            <tr>
                <td>NAMA MATKUL</td>
                <td>:</td>
                <td><input type="text" name="nama_mtkul" size="30" value="<?php echo $dataMatkul[1]?>"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" id="submit" value="EDIT"></td>
            </tr>
        </table>
    </form>
    <?php 
        }
        else{
            $kode_mtkul = $_POST["kode_mtkul"];
            $nama_mtkul = $_POST["nama_mtkul"];

            //EDIT data mahasiswa
            $updateMatkul = "UPDATE matakuliah SET nama_mtkul='$nama_mtkul' WHERE kode_mtkul='$kode_mtkul'";

            $queryMatkul = mysqli_query($koneksi, $updateMatkul);

            if($queryMatkul){
                echo "<script>alert('Daftar Berhasil Diubah !') </script>";
                echo "<script type='text/javascript'>window.location = './?adm=matkul'</script>";
            }else{
                echo "<script>alert('Data Gagal Diubah !')</script>";
                echo "<script type='text/javascript'>window.location = './?adm=matkul'</script>";
            }
        }
    ?>
    <a href="./?adm=matkul">&raquo:KEMBALI</a>
</p>