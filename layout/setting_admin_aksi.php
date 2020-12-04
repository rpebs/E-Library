<?php 
// koneksi database
include '../setting/koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$no = $_POST['no_hp'];
$username = $_POST['username'];
$password = $_POST['password'];
$timestamp = date("Y-m-d H:i:s");


// menginput data ke database
$query = mysqli_query($koneksi,"UPDATE t_acount set username='$username',password='$password',nama='$nama',no_hp='$no' WHERE id_account='$id' ");

// mengalihkan halaman kembali ke index.php
if($query){
    header("location:setting_admin.php?pesan=berhasil");
} else {
   header("location:setting_admin.php?pesan=gagal");
}


?>