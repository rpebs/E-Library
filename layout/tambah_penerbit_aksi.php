<?php 
// koneksi database
include '../setting/koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['penerbit'];


// menginput data ke database
$query = mysqli_query($koneksi,"insert into t_penerbit values('','$nama')");

// mengalihkan halaman kembali ke index.php
if($query){
    header("location:data_penerbit.php?pesan=berhasil");
} else {
   header("location:tambah_data_penerbit.php?pesan=gagal");
}


?>