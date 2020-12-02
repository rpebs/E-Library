<?php 
// koneksi database
include '../setting/koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['penulis'];


// menginput data ke database
$query = mysqli_query($koneksi,"insert into t_penulis values('','$nama')");

// mengalihkan halaman kembali ke index.php
if($query){
    header("location:data_penulis.php?pesan=berhasil");
} else {
   header("location:tambah_penulis_aksi.php?pesan=gagal");
}


?>