<?php 
// koneksi database
include '../setting/koneksi.php';

// menangkap data yang di kirim dari form
$anggota = $_POST['anggota'];
$kode   =   $_POST['kode_pinjam'];
$buku = $_POST['buku'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali =  $_POST['tgl_kembali'];
$denda = $_POST['denda'];



// menginput data ke database
$query = mysqli_query($koneksi,"update t_peminjaman set denda='$denda', status_pinjam='Kembali' where id_anggota='$anggota'");

// mengalihkan halaman kembali ke index.php
if($query){
    header("location:data_peminjaman.php?pesan=berhasil");
}


?>