<?php
include "../koneksi/koneksi.php";
$queryNilai = "select m.nim, m.nama, n.nl_tugas, n.nl_uts, n.nl_uas, 
            (0.2 * n.nl_tugas) + (0.4 * n.nl_uts) + (0.4* n.nl_uas), 
            d.nip, d.nama from nilai n
            left join mahasiswa m on n.nim = m.nim
            left join dosen d on d.nip = n.nip";
$resultNilai = mysqli_query ($koneksi, $queryNilai);
$countNilai = mysqli_num_rows ($resultNilai);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>.: Sistem Informasi Nilai Online - Universitas Komputer Indonesia :.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logoicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Kreon:light,regular' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="../css/style-sheet.css" />
    <!-- <link rel="stylesheet" type="text/css" href="css/style-sheet2.css" />-->
    <link rel="stylesheet" type="text/css" href="../css/nivo-slider.css" />
</head>
<body>
    <h3>DATA NILAI</h3>
    <hr /> <br />
    <a href="./?adm=nilaiAdd"><input type="submit" name="add" class="buttonadm" value="TAMBAH DATA NILAI"></a>
    <br> <br> 
    <table border="1" id="boxtable">  
    <tr>
        <th><b>NIM</b></th>
        <th><b>NAMA</b></th>
        <th><b>TUGAS</b></th>
        <th><b>UTS</b></th>
        <th><b>UAS</b></th>
        <th><b>NILAI AKHIR</b></th>
        <th><b>MATAKULIAH</b></th>
        <th><b>DOSEN</b></th>
        <th><b>AKSI</b></th>
    </tr>

    <?php 
    if($countNilai > 0){
        while($dataNilai = mysqli_fetch_array($resultNilai, MYSQLI_NUM)){
            ?>
            <tr class = "add">
                <td class = "value"><?php echo "$dataNilai[0]";?></td>
                <td class = "value"><?php echo "$dataNilai[1]";?></td>
                <td class = "value"><?php echo "$dataNilai[2]";?></td>
                <td class = "value"><?php echo "$dataNilai[3]";?></td>
                <td class = "value"><?php echo "$dataNilai[4]";?></td>
                <td class = "value"><?php echo "$dataNilai[5]";?></td>
                <td class = "value"><?php echo "$dataNilai[6]";?></td>
                <td class = "value"><?php echo "$dataNilai[7]";?></td>
                <td class = "value"> 
                    <a href="./?adm=nilaiEdit.php?nip=<?php echo"$dataNilai[0]"?>">EDIT</a> |
                    <a href="nilaiController/nilaiDelete.php?nim=<?php echo"$dataNilai[0]"?>">DELETE</a>
                </td>
            <tr>
            </tr>

    <?php 
        }
    }else{
        echo "<tr>
            <td colspan='9' align='center' height='20'>
                <div>belum Ada Data Nilai</div>
            </td>
        </tr>";
    }
    echo "</table>";
?>
</body>
</html>

