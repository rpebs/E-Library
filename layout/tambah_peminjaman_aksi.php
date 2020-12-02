<?php 
// koneksi database
include '../setting/koneksi.php';

// menangkap data yang di kirim dari form
$anggota = $_POST['anggota'];
$kode   =   $_POST['kode_pinjam'];
$buku = $_POST['buku'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali =    $_POST['tgl_kembali'];
$tanggall = date('Y-m-d', strtotime($tgl_kembali));


// menginput data ke database
$query = mysqli_query($koneksi,"insert into t_peminjaman values('','$kode','$anggota','$buku','$tgl_pinjam','$tgl_kembali','0','Pinjam','','')");

// mengalihkan halaman kembali ke index.php
if($query){
    header("location:data_peminjaman.php?pesan=berhasil");
} else {
   header("location:tambah_peminjaman_aksi.php?pesan=gagal");
}


?>