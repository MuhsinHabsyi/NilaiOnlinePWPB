<?php 
    include "../koneksi/koneksi.php";

    $queryDosen = "SELECT * FROM dosen";
    $resultDosen = mysqli_query($koneksi, $queryDosen);
    $countDosen = mysqli_num_rows($resultDosen);
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
<h3>DATA DOSEN</h3>
<hr /> <br />
<a href="./?adm=dosenAdd"><input type="submit" name="add" class="buttonadm" value="TAMBAH DATA DOSEN"></a>
<br> <br> 
<table border="1" id="boxtable">  
<tr>
    <th><b>NIP</b></th>
    <th><b>NAMA</b></th>
    <th><b>KODE MATKUL</b></th>
    <th><b>PASSWORD</b></th>
    <th><b>AKSI</b></th>
</tr>

<?php 
    if($countDosen > 0){
        while($dataDosen = mysqli_fetch_array($resultDosen, MYSQLI_NUM)){
            ?>
            <tr class = "add">
                <td class = "value"><?php echo "$dataDosen[0]";?></td>
                <td class = "value"><?php echo "$dataDosen[1]";?></td>
                <td class = "value"><?php echo "$dataDosen[2]";?></td>
                <td class = "value"><?php echo "$dataDosen[3]";?></td>
                <td class = "value"> 
                    <a href="./?adm=dosenEdit&nip=<?php echo"$dataDosen[0]"?>">EDIT</a> |
                    <a href="dosenController/dosenDelete.php?nip=<?php echo"$dataDosen[0]"?>">DELETE</a>
                </td>
            <tr>
            </tr>

    <?php 
        }
    }else{
        echo "<tr>
            <td colspan='9' align='center' height='20'>
                <div>belum Ada Data Dosen</div>
            </td>
        </tr>";
    }
    echo "</table>";
    ?>
    

</body>
</html>

