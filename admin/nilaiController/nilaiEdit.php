<?php 
    include "../koneksi/koneksi.php";

    $getNama = $_GET["mhs"];
    $editNilai = "SELECT * FROM nilai WHERE nim = '$getNama'";
    $resultNilai = mysqli_query($koneksi ,$editNilai);
    $dataNilai = mysqli_fetch_array($resultNilai);
?>

<h3>EDIT DATA NILAI</h3>

<br><hr><br>
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
                                    echo "<option value='$dataMhs[1]'>$dataMhs[1]</option>";
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
                                    echo "<option value='$dataDosen[1]'>$dataDosen[1]</option>";
                                }
                            ?>
                        </select>
                    </label>
                </td>
            </tr>
            <tr>
                <td>NILAI TUGAS</td>
                <td>:</td>
                <td><input type="number" name="tugas" placeholder="Nilai Tugas"  value="<?php echo $dataMatkul[2]?> required></td>
            </tr>
            <tr>
                <td>NILAI UTS</td>
                <td>:</td>
                <td><input type="number" name="uts" placeholder="Nilai UTS"  value="<?php echo $dataMatkul[3]?> required></td>
            </tr>
            <tr>
                <td>NILAI UAS</td>
                <td>:</td>
                <td><input type="number" name="uas" placeholder="Nilai UAS"  value="<?php echo $dataMatkul[4]?> required></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><input type="submit" name="submit" id="submit" value="TAMBAH"></td>
            </tr>
        </table>
    </form>
    <?php 
        }
        else{
            $mhs = $_POST["mhs"];
            $dosen = $_POST["dosen"];
            $tugas = $_POST["tugas"];
            $uts = $_POST["uts"];
            $uas = $_POST["uas"];

            //EDIT data mahasiswa
            $updateNilai = "UPDATE nilai SET mhs='$mhs' , dosen='$dosen', tugas='$tugas', uts='$uts', uas='$uas' WHERE dosen='$dosen'";

            $queryNilai = mysqli_query($koneksi, $updateNilai);

            if($queryNilai){
                echo "<script>alert('Daftar Berhasil Diubah !') </script>";
                echo "<script type='text/javascript'>window.location = 'nilaiView.php'</script>";
            }else{
                echo "<script>alert('Data Gagal Diubah !')</script>";
                echo "<script type='text/javascript'>window.location = 'nilaiView.php'</script>";
            }
        }
    ?>
    <a href="nilaiView.php">&raquo:KEMBALI</a>
</p>