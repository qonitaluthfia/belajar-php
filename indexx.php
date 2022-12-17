<?php
//1. Buat koneksi dengan MySQL
$con= mysqli_connect("localhost","root","","kos");

// 2. Cek koneksi dengan MySQL
if(mysqli_connect_errno()){
    echo "Koneksi gagal". mysqli_connect_error();
}else{
    echo "Koneksi berhasil";
}

// 3. Membaca data dari table mysql
$query = "SELECT * FROM kos";

// 4. Tampilkan data, dengan menjalankan sql query
$result = mysqli_query($con,$query);
$kos = [];
if ($result){
    //tampilkan data satu per satu
    while($row = mysqli_fetch_assoc($result)){
        $kos [] = $row;
    }
    mysqli_free_result($result);
}

// 5. tutup koneksi mysql
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="layout.css">
    <title>Data Kos Lancar Jaya</title>
</head>
<body>
<nav>
        <div class="wrapper">
        <div class="logo"><img src="logohome.png" width= "50" height= "50" ><font size="6"><b> Kos Jaya Abadi </a></div></font></b>
        </div>
</nav>
    <br>
    <a href="insert.php" class="btn btn-outline-primary" >Tambah Data</a>
    <table border=1 style="width: 100%;">


    <div class="container">
    <table class="table table-striped table-hover mt-5 table-bordered center" style="width:100%;">
    <tr>
        <th> Nama Lengkap </th>
        <th> Id Kos </th>
        <th> Pekerjaan </th>
        <th> Nomor HP </th>
        <th> Nomor Darurat </th>
        <th> Aksi </th>
    </tr>
    <?php foreach($kos as $row): {} ?>
    <tr>
            <td><?php echo $value["Nama_Lengkap"]; ?></td>
            <td><?php echo $value["Id_Kos"]; ?> </td>
            <td><?php echo $value["Pekerjaan"]; ?></td>
            <td><?php echo $value["Nomor_HP"]; ?> </td>
            <td><?php echo $value["Nomor_Darurat"]; ?> </td>
            <td>
                <a href="<?php echo "update.php?id=".$value["id"]; ?>">Edit</a>
                <a href="<?php echo "delete.php?id=".$value["id"]; ?>">Delete</a>
    </tr>
    <?php endforeach; ?>
        
    </table>
    </div>
</body>
</html>