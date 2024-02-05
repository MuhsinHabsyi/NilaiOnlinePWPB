<?php 
    include "../koneksi/koneksi.php";

    if(isset($_GET["nim"]) && isset($_GET["nip"])){
        $getNip = $_GET["nip"];
        $getNim = $_GET["nim"];

        $queryMhs = "SELECT nim, nama FROM mahasiswa";
        $resultMhs = mysqli_query($koneksi, $queryMhs);

        $queryDosen = "SELECT nip, nama FROM dosen";
        $resultDosen = mysqli_query($koneksi, $queryDosen);

        $queryNilai = "SELECT * FROM nilai WHERE nim='$getNim' AND nip='$getNip'";
        $resultNilai = mysqli_query($koneksi, $queryNilai);
        $dataNilai = mysqli_fetch_array($resultNilai);
    }
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
                            <option value="">-=PILIH=-</option>
                            <?php 
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
                            <option value="">-=PILIH=-</option>
                            <?php
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
                <td><input type="number" name="tugas" placeholder="Nilai Tugas"  value="<?php echo $dataNilai[0]?>" required></td>
            </tr>
            <tr>
                <td>NILAI UTS</td>
                <td>:</td>
                <td><input type="number" name="uts" placeholder="Nilai UTS"  value="<?php echo $dataNilai[1]?>" required></td>
            </tr>
            <tr>
                <td>NILAI UAS</td>
                <td>:</td>
                <td><input type="number" name="uas" placeholder="Nilai UAS"  value="<?php echo $dataNilai[2]?>" required></td>
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
            $tugas = $_POST["tugas"];
            $uts = $_POST["uts"];
            $uas = $_POST["uas"];

            //EDIT data mahasiswa
            $updateNilai = "UPDATE nilai SET nl_tugas='$tugas', nl_uts='$uts', nl_uas='$uas' WHERE nim='$getNim' AND nip='$getNip'";

            $queryNilai = mysqli_query($koneksi, $updateNilai);

            if($queryNilai){
                echo "<script>alert('Daftar Berhasil Diubah !') </script>";
                echo "<script type='text/javascript'>window.location = './?adm=nilai'</script>";
            }else{
                echo "<script>alert('Data Gagal Diubah !')</script>";
                echo "<script type='text/javascript'>window.location = './?adm=nilai'</script>";
            }
        }
    ?>
    <a href="./?adm=nilai">&raquo:KEMBALI</a>
</p>