<?php

// 1. Buat koneksi dengan MySQL
$con = mysqli_connect("localhost","root","","kos");

// 2. Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}else{
    echo 'koneksi berhasil';
}

// 3 buat query baca semua data dari table
$sql = "SELECT * FROM kos";

// 4. tampilkan data, cek apakah query bisa dijalankan
$kos = [];
if ($result = mysqli_query($con, $sql)) {
    // tampilkan satu per satu
    while ($row = mysqli_fetch_assoc($result)) {
        $kos[] = $row;
    }
    mysqli_free_result($result);
  }

// 5. tutup koneksi
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

    <?php var_dump($kos); ?>

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
        <?php foreach($kos as $row): ?>
        <tr>
            <td><?= $row["Nama_Lengkap"]; ?></th>
            <td><?= $row["Id_Kos"]; ?></th>
            <td><?= $row["Pekerjaan"]; ?></th>
            <td><?= $row["Nomor_HP"]; ?></th>
            <td><?= $row["Nomor_Darurat"]; ?></th>
            <td>  <a href="update.php" class="btn btn-outline-success" >Edit</a> | <a href="delete.php" class="btn btn-outline-danger" >Delete</a> </th>
        </tr>
        <?php endforeach; ?>
    </thead>
        
    </table>
    </div>
</body>
</html>