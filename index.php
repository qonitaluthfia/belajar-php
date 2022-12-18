<?php
//1. Buat koneksi dengan MySQL
$con= mysqli_connect("localhost","root","","fakultas");

// 2. Cek koneksi dengan MySQL
if(mysqli_connect_errno()){
     "Koneksi gagal". mysqli_connect_error();
}else{
     "Koneksi berhasil";
}

// 3. Membaca data dari table mysql
$query = "SELECT * FROM mahasiswa";

// 4. Tampilkan data, dengan menjalankan sql query
$result = mysqli_query($con,$query);
$mahasiswa = [];
if ($result){
    //tampilkan data satu per satu
    while($row = mysqli_fetch_assoc($result)){
        $mahasiswa [] = $row;
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="layout.css">
    <title>Data Mahasiswa Berprestasi</title>
</head>
<body>
<nav>
        <div class="wrapper">
        <div class="logo"><img src="university.png" width= "100" height= "100" ><font size="6"><b> Universitas Bunda Qonita </a></div></font></b>
        </div>
</nav>
    <br>
    <table border=1 style="width: 100%;">


    <div class="container">
    <h1>Data Mahasiswa Berprestasi</h1>
    <a href="insert.php" class="btn btn-outline-primary">Tambah Data</a>
    <table class="table table-striped table-hover mt-5 table-bordered center" style="width:100%;" border="1" style="width 100%">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($mahasiswa as $value): {}?>
        <tr>
            <td><?php echo $value["nim"]; ?></td>
            <td><?php echo $value["nama"]; ?> </td>
            <td><?php echo $value["tempat_lahir"]; ?></td>
            <td><?php echo $value["tanggal_lahir"]; ?> </td>
            <td><?php echo $value["alamat"]; ?> </td>
            <td>
                <a href="<?php echo "update.php?id=".$value["id"]; ?>" button type="button" class="btn btn-outline-success" >Edit</a>
                <a href="<?php echo "delete.php?id=".$value["id"]; ?>" button type="button" class="btn btn-outline-danger" >Delete</a>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>