<?php 
    include ("../koneksi/koneksi.php");
?>

<h3>TAMBAH DOSEN</h3>
<br /> <hr /> <br />
<p>
    <?php 
        if(!isset($_POST['submit'])){

    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="100%" border=0>
            <tr>
                <td width="27%">NIP</td>
                <td width="4%">:</td>
                <td width="69%"><input type="text" name="nip" size="30" placeholder="NIP" required></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>:</td>
                <td><input type="text" name="nama" size="30" placholder="NAMA" required></td>
            </tr>
            <tr>
                <td>KODE MATKUL</td>
                <td>:</td>
                <td><input type="text" name="kode_mtkul" size="30" placholder="KODE MATKUL" required></td>
            </tr>
            <tr>
                <td>PASSWORD</td>
                <td>:</td>
                <td><input type="text" name="password" id="password" size="30" placeholder="PASSWORD" required></td>
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
            $nip = $_POST["nip"];
            $nama = $_POST["nama"];
            $kode_mtkul = $_POST["kode_mtkul"];
            $password =md5($_POST["password"]);

            //input data dosen
            $insertDosen = "INSERT INTO dosen VALUE ('$nip', '$nama', '$kode_mtkul', '$password')";
            $queryDosen = mysqli_query($koneksi, $insertDosen);

            if($queryDosen){
                echo "<script>alert('Data Berhasil Disimpan !') </script>";
                echo "<script type='text/javascript'>window.location = './?adm=dosen'</script>";
            }else{
                echo "<script>alert('Data Gagal Disimpan !')</script>";
                echo "<script type='text/javascript'>window.location = './?adm=dosen'</script>";
            }

        }
    ?>
    <a href="./?adm=dosen">&raquo:KEMBALI</a>

</p>
