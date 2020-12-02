<?php 
// koneksi database
include '../setting/koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['id_anggota'];
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$penulis = $_POST['penulis'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$rak    = $_POST['kode_rak'];
$date = date('Y-m-d H:i:s');
$gambar_lama = $_POST['gambar_lama'];
$file=$_FILES['filegambar']['tmp_name'];    //temporary foto
$nama_file=$_FILES ['filegambar']['name']; //ambil nama file
$ukuran=$_FILES['filegambar']['size'];    //ukuran file
$extensi= strtolower(substr(strrchr($nama_file,"."),1));  //extensi setelah .(titik)

 if (isset($_POST['simpan'])) {
   //buat folder bernama gambar
   
    if(empty($file)){
        $save=mysqli_query($koneksi, "UPDATE t_buku set judul='$judul', id_penerbit='$penerbit', tahun_terbit='$tahun',id_kategori='$kategori',id_penulis='$penulis',harga='$harga',jumlah='$jumlah',kode_rak='$rak' WHERE id_buku='$id' ");
        if($save){ //jika update berhasil maka muncul pesan dan menuju ke halaman produk
            header("location:data_buku.php?pesan=berhasil");
        }else{  //jika update gagal maka muncul pesan
            header("location:data_buku.php?pesan=gagal");
         }

    }else
    if($ukuran > 2000000){
        $error="<p style='color:#F00;'>* Ukuran File Maksimal 2MB</p>";
    }
    elseif(strlen($nama_file) > 100){
        $error="<p style='color:#F00;'>* Nama File Maksimal 100 Karakter</p>";
    }
    elseif($extensi !="jpg" && $extensi !="png"){
        $error="<p style='color:#F00;'>* Format File yang diizinkan hanya .jpg/.png</p>";
    }
    else{  //jika semua sudah terpenuhi maka simpan ke tb_produk

    unlink('../img/'.$gambar_lama); //hapus foto lama
    move_uploaded_file($file,"../img/$nama_file");    //upload foto baru

    $save=mysqli_query($koneksi, "UPDATE t_buku set judul='$judul', id_penerbit='$penerbit', tahun_terbit='$tahun',id_kategori='$kategori',gambar='$nama_file',id_penulis='$penulis',harga='$harga',jumlah='$jumlah',kode_rak='$rak' WHERE id_buku='$id'");
    if($save){ //jika update berhasil maka muncul pesan dan menuju ke halaman produk
        header("location:data_buku.php?pesan=berhasil");
    }else{  //jika update gagal maka muncul pesan
        header("location:data_buku.php?pesan=gagal");
    }          
           
  }
}


?>