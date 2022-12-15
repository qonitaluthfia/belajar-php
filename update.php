<?php

if(isset($_GET['id'])){
    // ambil id dari url atau method get
    $id = $_GET['id'];

    // Buat koneksi dengan MySQL
    $con = mysqli_connect("localhost","root","","kos");

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }else{
        echo '<br>koneksi berhasil';
    }

    $sql = "SELECT * FROM kos WHERE id='$id'";

    if ($result = mysqli_query($con, $sql)) {
        echo "<br>data tersedia";
        while($user_data = mysqli_fetch_assoc($result)) {
            $Nama_Lengkap = $user_data['Nama_Lengkap'];
            $Id_Kos = $user_data['Id_Kos'];
            $Pekerjaan = $user_data['Pekerjaan'];
            $Nomor_HP = $user_data['Nomor_HP'];
            $Nomor_Darurat = $user_data['Nomor_Darurat'];
            
        }
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}

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
        echo '<br>koneksi berhasil';
    }

    $sql = "UPDATE kos SET Nama_Lengkap='$Nama_Lengkap',Id_Kos='$Id_Kos',Pekerjaan='$Pekerjaan',Nomor_HP='$Nomor_HP',
    Nomor_Darurat='$Nomor_Darurat' WHERE id='$id' ";

    if (mysqli_query($con, $sql)) {
        echo "<br>Data berhasil diupdate";
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
    <title>Update</title>
</head>
<body>
    <?php if(isset($_GET['id'])): ?>
    <form action="" method="post">
        
        Nama Lengkap: <input type="text" name="Nama_Lengkap" value="<?php echo $Nama_Lengkap; ?>"><br>
        Id Kos: <input type="number" name="Id_Kos" value="<?php echo $Id_Kos; ?>"><br>
        Pekerjaan: <input type="text" name="Pekerjaan" value="<?php echo $Pekerjaan; ?>"><br>
        Nomor HP: <input type="number" name="Nomor_HP" value="<?php echo $Nomor_HP; ?>"><br>
        Nomor Darurat: <input type="number" name="Nomor_Darurat" value="<?php echo $Nomor_Darurat; ?>"><br>
        
        <button type="submit" name="submit">Update Data</button>
    </form>
    <?php endif; ?>
</body>
</html>