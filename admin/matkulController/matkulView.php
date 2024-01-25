<?php 
    include "../koneksi/koneksi.php";

    $queryMatkul = "SELECT * FROM matakuliah";
    $resultMatkul = mysqli_query($koneksi, $queryMatkul);
    $countMatkul = mysqli_num_rows($resultMatkul);
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
<h3>DATA MATAKULIAH</h3>
<hr /> <br />
<a href="./?adm=matkulAdd"><input type="submit" name="add" class="buttonadm" value="TAMBAH DATA MATA KULIAH"></a>
<br> <br> 
<table border="1" id="boxtable">  
<tr>
    <th><b>KODE MATA KULIAH</b></th>
    <th><b>NAMA MATA KULIAH</b></th>
    <th><b>AKSI</b></th>
</tr>

<?php 
    if($countMatkul > 0){
        while($dataMatkul = mysqli_fetch_array($resultMatkul, MYSQLI_NUM)){
            ?>
            <tr class = "add">
                <td class = "value"><?php echo "$dataMatkul[0]";?></td>
                <td class = "value"><?php echo "$dataMatkul[1]";?></td>
                <td class = "value"> 
                    <a href="./?adm=matkulEdit?kode_mtkul=<?php echo"$dataMatkul[0]"?>">EDIT</a> |
                    <a href="matkulController/matkulDelete.php?kode_mtkul=<?php echo"$dataMatkul[0]"?>">DELETE</a>
                </td>
            <tr>
            </tr>

    <?php 
        }
    }else{
        echo "<tr>
            <td colspan='9' align='center' height='20'>
                <div>belum Ada Data Matkul</div>
            </td>
        </tr>";
    }
    echo "</table>";
    ?>


</body>
</html>