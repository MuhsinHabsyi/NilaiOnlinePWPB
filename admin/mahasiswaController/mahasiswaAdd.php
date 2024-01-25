<?php 
    include "../koneksi/koneksi.php";
?>

<h3>TAMBAH MAHASISWA</h3>
<br /> <hr /> <br />
<p>
    <?php 
        if(!isset($_POST['submit'])){

    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="100%" border=0>
            <tr>
                <td width="27%">NIM</td>
                <td width="4%">:</td>
                <td width="69%"><input type="text" name="nim" size="30" placeholder="NIM" required></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>:</td>
                <td><input type="text" name="nama" size="30" placholder="NAMA" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <label>
                        <input type="radio" name="jk" value="Laki-Laki" id="RadioGroup1_0" required>
                        Laki-Laki
                    </label>
                    <label>
                        <input type="radio" name="jk" value="Perempuan" id="RadioGroup1_1" required>
                        Perempuan
                    </label>
                </td>
            </tr>
            <tr>
                <td height="50">Jurusan</td>
                <td>:</td>
                <td>
                    <label>
                        <select name="jurusan" required>
                            <option value="">--=PILIH=--</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Komputer">Teknik Komputer</option>
                        </select>
                    </label> <br />
                </td>
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
            $nim = $_POST["nim"];
            $nama = $_POST["nama"];
            $jk = $_POST["jk"];
            $jurusan = $_POST["jurusan"];
            $password =md5($_POST["password"]);

            //input data mahasiswa
            $insertMhs = "INSERT INTO mahasiswa VALUE ('$nim', '$nama', '$jk', '$jurusan', '$password')";
            $queryMhs = mysqli_query($koneksi, $insertMhs);

            if($queryMhs){
                echo "<script>alert('Daftar Berhasil Disimpan !') </script>";
                echo "<script type='text/javascript'>window.location = './?adm=mahasiswa'</script>";
            }else{
                echo "<script>alert('Data Gagal Disimpan !')</script>";
                echo "<script type='text/javascript'>window.location = './?mahasiswa'</script>";
            }

        }
    ?>
    <a href="./?adm=mahasiswa">&raquo:KEMBALI</a>

</p>
