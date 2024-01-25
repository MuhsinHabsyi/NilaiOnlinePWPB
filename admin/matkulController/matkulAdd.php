<?php 
    include ("../koneksi/koneksi.php");
?>

<h3>TAMBAH MATA KULIAH</h3>
<br /> <hr /> <br />
<p>
    <?php 
        if(!isset($_POST['submit'])){

    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="100%" border=0>
            <tr>
                <td width="27%">KODE MATKUL</td>
                <td width="4%">:</td>
                <td width="69%"><input type="text" name="kode_mtkul" size="30" placeholder="KODE MATKUL" required></td>
            </tr>
            <tr>
                <td>NAMA MATKUL</td>
                <td>:</td>
                <td><input type="text" name="nama_mtkul" size="30" placeholder="NAMA MATKUL" required></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" id="submit" value="TAMBAH"></td>
            </tr>
        </table>
    </form>
    <?php 
        }else{
            $kode_mtkul = $_POST["kode_mtkul"];
            $nama_mtkul = $_POST["nama_mtkul"];

            //input data mata kuliah
            $insertMatkul = "INSERT INTO matakuliah VALUE ('$kode_mtkul', '$nama_mtkul')";
            $queryMatkul = mysqli_query($koneksi, $insertMatkul);

            if($queryMatkul){
                echo "<script>alert('Data Berhasil Disimpan !') </script>";
                echo "<script type='text/javascript'>window.location = './?adm=matkul'</script>";
            }else{
                echo "<script>alert('Data Gagal Disimpan !')</script>";
                echo "<script type='text/javascript'>window.location = './?adm=matkul'</script>";
            }

        }
    ?>
    <a href="./?adm=matkul">&raquo:KEMBALI</a>

</p>
