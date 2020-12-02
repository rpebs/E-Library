<?php 
// koneksi database
include '../setting/koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_anggota'];
$nama = $_POST['anggota'];
$no = $_POST['no_anggota'];
$jk = $_POST['j_kelamin'];
$alamat = $_POST['alamat'];
$tanggal =    $_POST['tgl_lahir'];
$tanggall = date('Y-m-d', strtotime($tanggal));
$status = $_POST['status'];
$timestamp = date("Y-m-d H:i:s");


// menginput data ke database
$query = mysqli_query($koneksi,"UPDATE t_anggota set nama='$nama',jenis_kelamin='$jk',alamat='$alamat',tgl_lahir='$tanggall',no_anggota='$no', status='$status' WHERE id_anggota='$id' ");

// mengalihkan halaman kembali ke index.php
if($query){
    header("location:data_anggota.php?pesan=berhasil");
} else {
   header("location:tambah_anggota.php?pesan=gagal");
}


?>