<?php 
// koneksi database
include '../setting/koneksi.php';

// menangkap data yang di kirim dari form
$judul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$penulis = $_POST['penulis'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$rak    = $_POST['kode_rak'];
$date = date('Y-m-d H:i:s');

 if (isset($_POST['simpan'])) {
   //buat folder bernama gambar
   $tempdir = "../img/"; 
            if (!file_exists($tempdir))
            mkdir($tempdir,0755); 

            $target_path = $tempdir . basename($_FILES['filegambar']['name']);

            //nama gambar
            $nama_gambar=$_FILES['filegambar']['name'];
            //ukuran gambar
            $ukuran_gambar = $_FILES['filegambar']['size']; 

            $fileinfo = @getimagesize($_FILES["filegambar"]["tmp_name"]);
            //lebar gambar
            $width = $fileinfo[0];
            //tinggi gambar
            $height = $fileinfo[1]; 
            if($ukuran_gambar > 8192000){ 
                echo 'Ukuran gambar melebihi 8mb';
            }else{
                if (move_uploaded_file($_FILES['filegambar']['tmp_name'], $target_path)) {
                    
                    $sql=mysqli_query($koneksi,"INSERT INTO t_buku VALUES('','$judul','$penerbit','$tahun','$kategori','$nama_gambar','$penulis','$harga','$jumlah','$rak','','')");
                    
                   header('location:data_buku.php?pesan=berhasil');
                } else {
                    header('location:data_buku.php?pesan=gagal');
                }
            } 
  }


?>