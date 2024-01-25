<?php 
    include "../koneksi/koneksi.php";

    $getNip = $_GET["nip"];
    $editDosen = "SELECT * FROM dosen WHERE nip = '$getNip'";
    $resultDosen = mysqli_query($koneksi ,$editDosen);
    $dataDosen = mysqli_fetch_array($resultDosen);
?>

<h3>EDIT DATA DOSEN</h3>

<br><hr><br>
<p>
<?php 
        if(!isset($_POST['submit'])){

    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="100%" border=0>
        <tr>
                <td width="27%">NIP</td>
                <td width="4%">:</td>
                <td width="69%"><input type="text" name="nip" size="30" value="<?php echo $dataDosen[0]?>" readonly="readonly"></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>:</td>
                <td><input type="text" name="nama" size="30" value="<?php echo $dataDosen[1]?>"></td>
            </tr>
            <tr>
                <td>KODE MATKUL</td>
                <td>:</td>
                <td><input type="text" name="kode_mtkul" size="30" value="<?php echo $dataDosen[2]?>"></td>
            </tr>
            <tr>
                <td>PASSWORD</td>
                <td>:</td>
                <td><input type="text" name="password" id="password" size="30" value="<?php echo $dataDosen[3]?>"></td>
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
            $nip = $_POST["nip"];
            $nama = $_POST["nama"];
            $kode_mtkul = $_POST["kode_mtkul"];
            $password =md5($_POST["password"]);

            //EDIT data mahasiswa
            $updateDosen = "UPDATE dosen SET nama='$nama', kode_mtkul='$kode_mtkul', password='$password' WHERE nip='$nip'";

            $queryDosen = mysqli_query($koneksi, $updateDosen);

            if($queryDosen){
                echo "<script>alert('Daftar Berhasil Diubah !') </script>";
                echo "<script type='text/javascript'>window.location = './?adm=dosen'</script>";
            }else{
                echo "<script>alert('Data Gagal Diubah !')</script>";
                echo "<script type='text/javascript'>window.location = './?adm=dosen'</script>";
            }
        }
    ?>
    <a href="./?adm=dosen">&raquo:KEMBALI</a>
</p>