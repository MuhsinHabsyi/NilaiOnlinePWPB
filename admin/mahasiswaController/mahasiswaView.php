<?php 
    include "../koneksi/koneksi.php";

    $queryMhs = "SELECT * FROM mahasiswa";
    $resultMhs = mysqli_query($koneksi, $queryMhs);
    $countMhs = mysqli_num_rows($resultMhs);
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
<h3>DATA MAHASISWA</h3>
<hr /> <br />
<a href="./?adm=mahasiswaAdd"><input type="submit" name="add" class="buttonadm" value="TAMBAH DATA MAHASISWA"></a>
<br> <br> 
<table border="1" id="boxtable">  
<tr class="odd">
    <th><b>NIM</b></th>
    <th><b>NAMA</b></th>
    <th><b>JENIS KELAMIN</b></th>
    <th><b>JURUSAN</b></th>
    <th><b>PASSWORD</b></th>
    <th><b>AKSI</b></th>
</tr>

<?php 
    if($countMhs > 0){
        while($dataMhs = mysqli_fetch_array($resultMhs, MYSQLI_NUM)){
            ?>
            <tr class = "add">
                <td class = "value"><?php echo "$dataMhs[0]";?></td>
                <td class = "value"><?php echo "$dataMhs[1]";?></td>
                <td class = "value"><?php echo "$dataMhs[2]";?></td>
                <td class = "value"><?php echo "$dataMhs[3]";?></td>
                <td class = "value"><?php echo "$dataMhs[4]";?></td>
                <td class = "value"> 
                    <!-- <a href="mahasiswaController/mahasiswaEdit.php?nim=<?php echo"$dataMhs[0]"?>">EDIT</a> | -->
                    <a href="./?adm=mahasiswaEdit&nim=<?php echo"$dataMhs[0]"?>">EDIT</a> |
                    <a href="mahasiswaController/mahasiswaDelete.php?nim=<?php echo"$dataMhs[0]"?>">DELETE</a>
                </td>
            <tr>
            </tr>

    <?php 
        }
    }else{
        echo "<tr>
            <td colspan='9' align='center' height='20'>
                <div>Belum Ada Data Mahasiswa</div>
            </td>
        </tr>";
    }
    echo "</table>";
    ?>
</body>
</html>