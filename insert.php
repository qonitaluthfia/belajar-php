<?php
    if (isset($_POST['submit'])){
        //var_dump($_POST);
        $Nama_Lengkap = $_POST['Nama_Lengkap'];
        $Id_Kos = $_POST['Id_Kos'];
        $Pekerjaan = $_POST['Pekerjaan'];
        $Nomor_HP = $_POST['Nomor_HP'];
        $Nomor_Darurat = $_POST['Nomor_Darurat'];

        // Buat koneksi dengan MySQL
        $con = mysqli_connect("localhost","root","","kos");

        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }else{
            echo 'koneksi berhasil';
        }

        $sql = "insert into kos (Id_Kos, Nama_Lengkap, Pekerjaan, Nomor_HP, Nomor_Darurat)
        values ($Id_Kos,'$Nama_Lengkap', '$Pekerjaan', '$Nomor_HP', '$Nomor_Darurat')";

        if (mysqli_query($con, $sql)) {
            echo "New Record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
          
        mysqli_close($con);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kos</title>
</head>
<body>

    <h1>Tambah Data</h1>

    <form action="" method="post">
        Nama Lengkap: <input type="text" name="Nama_Lengkap"><br>
        Id Kos: <input type="number" name="Id_Kos"><br>
        Pekerjaan: <input type="text" name="Pekerjaan"><br>
        Nomor HP: <input type="number" name="Nomor_HP"><br>
        Nomor Darurat: <input type="number" name="Nomor_Darurat"><br>
        
        <button type="submit" name="submit">Tambah Data</button>
    </form>
</body>
</html>