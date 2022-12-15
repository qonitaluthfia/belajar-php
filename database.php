<?php

if (isset($_POST["submit"])){
    $Nama_Lengkap = $_POST['Nama_Lengkap'];
    $Id_Kos = $_POST['Id_Kos'];
    $Pekerjaan = $_POST['Pekerjaan'];
    $Nomor_HP = $_POST['Nomor_HP'];
    $Nomor_Darurat = $_POST['Nomor_Darurat'];


    //membuat koneksi// 
    $con = mysqli_connect("localhost","root","","kos"); 

    //cek koneksi dengan MySQL//
    if(mysqli_connect_errno()){
        echo "Koneksi gagal". mysqli_connect_error();
    }else{
        echo "Koneksi berhasil";
    }
    // buat sql query untuk insert ke database
    $sql = "insert into mahasiswa (id_jurusan, nim, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat) 
    values ($id_jurusan, '$nim', '$nama', '$gender', '$tpt_lahir', '$tgl_lahir', '$alamat')";
    
    //jalankan query
    if (mysqli_query($con, $sql)) {
    echo "Data berhasil ditambahkan";
    }else{
    echo "Ada error ". mysqli_error();
    }
}

?>