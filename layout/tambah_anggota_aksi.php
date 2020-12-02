<?php 
// koneksi database
include '../setting/koneksi.php';

// menangkap data yang di kirim dari form
$nama = $_POST['anggota'];
$no = $_POST['no_anggota'];
$jk = $_POST['j_kelamin'];
$alamat = $_POST['alamat'];
$tanggal =    $_POST['tgl_lahir'];
$tanggall = date('Y-m-d', strtotime($tanggal));
$status = $_POST['status'];
$timestamp = date("Y-m-d H:i:s");


// menginput data ke database
$query = mysqli_query($koneksi,"insert into t_anggota values('','$nama','$jk','$alamat','$tanggall','$no','$status','$timestamp','')");

// mengalihkan halaman kembali ke index.php
if($query){
    header("location:data_anggota.php?pesan=berhasil");
} else {
   header("location:tambah_anggota.php?pesan=gagal");
}


?>