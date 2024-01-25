<?php 
    include "../koneksi/koneksi.php";
?>

<h3>TAMBAH NILAI</h3>
<br /> <hr /> <br />
<p>
    <?php 
        if(!isset($_POST['submit'])){

    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table width="100%" border=0>
            <tr>
                <td height : "50" >NAMA MAHASISWA</td>
                <td>:</td>
                <td>
                    <label>
                        <select name="mhs" class="form-control">
                            <option value="">-=PILIH-=</option>
                            <?php 
                                $queryMhs = "select nim, nama from mahasiswa";
                                $resultMhs = mysqli_query($koneksi, $queryMhs);
                                while($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)){
                                    echo "<option value='$dataMhs[0]'>$dataMhs[1]</option>";
                                }
                            ?>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td height : "50" >NAMA DOSEN</td>
                <td>:</td>
                <td>
                    <label>
                        <select name="dosen" class="form-control">
                            <option value="">-=PILIH-=</option>
                            <?php 
                                $queryDosen = "select nip, nama from dosen";
                                $resultDosen = mysqli_query($koneksi, $queryDosen);
                                while($dataDosen = mysqli_fetch_array($resultDosen, MYSQLI_NUM)){
                                    echo "<option value='$dataDosen[0]'>$dataDosen[1]</option>";
                                }
                            ?>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td>NILAI TUGAS</td>
                <td>:</td>
                <td><input type="number" name="tugas" placeholder="Nilai Tugas" required></td>
            </tr>
            <tr>
                <td>NILAI UTS</td>
                <td>:</td>
                <td><input type="number" name="uts" placeholder="Nilai UTS" required></td>
            </tr>
            <tr>
                <td>NILAI UAS</td>
                <td>:</td>
                <td><input type="number" name="uas" placeholder="Nilai UAS" required></td>
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
            $mhs = $_POST["mhs"];
            $dosen = $_POST["dosen"];
            $tugas = $_POST["tugas"];
            $uts = $_POST["uts"];
            $uas = $_POST["uas"];
            
            //input data mahasiswa
            $insertNilai = "INSERT INTO nilai VALUE ('$tugas','$uts', '$uas', '$mhs', '$dosen')";
            $queryNilai = mysqli_query($koneksi, $insertNilai);

            if($queryNilai){
                echo "<script>alert('Daftar Berhasil Disimpan !') </script>";
                echo "<script type='text/javascript'>window.location = './?adm=nilai'</script>";
            }else{
                echo "<script>alert('Data Gagal Disimpan !')</script>";
                echo "<script type='text/javascript'>window.location = './?adm=nilai'</script>";
            }

        }
    ?>
    <a href="./?adm=nilai">&raquo:KEMBALI</a>

</p>
