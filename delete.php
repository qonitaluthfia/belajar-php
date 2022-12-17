<?php
// tangkap data dari form submit
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Buat koneksi dengan MySQL
    $con = mysqli_connect("localhost","root","","fakultas");

    // Cek koneksi
    if (mysqli_connect_errno()) {
        echo "Koneksi  gagal " . mysqli_connect_error();
    }else{
        echo 'koneksi berhasil';
    }
    // buat sql quert untuk insert ke database
    // Buat query insert dan jalankan
    $sql = "DELETE FROM mahasiswa WHERE id='$id' ";

    if (mysqli_query($con, $sql)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Ada Error". mysqli_error($con);
    }
      
    mysqli_close($con);
}
?>