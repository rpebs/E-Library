<?php 
// koneksi database
include '../setting/koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['kategori'];


// menginput data ke database
$query = mysqli_query($koneksi,"insert into t_kategori values('','$nama')");

// mengalihkan halaman kembali ke index.php
if($query){
    header("location:data_kategori.php?pesan=berhasil");
} else {
   header("location:tambah_kategori_aksi.php?pesan=gagal");
}


?>