<?php
include('../setting/koneksi.php');
include('header.php');

$anggota = mysqli_query($koneksi,"SELECT * FROM t_anggota");
$buku = mysqli_query($koneksi,"SELECT * FROM t_buku");
// mengambil data barang dengan kode paling besar
	$query = mysqli_query($koneksi, "SELECT max(kode_pinjam) as kodeTerbesar FROM t_peminjaman");
	$data = mysqli_fetch_array($query);
	$kodePinjam = $data['kodeTerbesar'];
 
	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($kodePinjam, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "PJM";
  $kodePinjam = $huruf . sprintf("%03s", $urutan);
  
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pinjam Buku</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Anggota</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          
        <?php
            if(isset($_GET['pesan'])){
	        	if($_GET['pesan'] == "gagal"){
			    echo '<div class="alert alert-danger" role="alert">
                        Data Gagal Ditambahkan
                    </div>';
		        }
	        }
        ?>
        
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Masukkan Data Peminjaman</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="tambah_peminjaman_aksi.php" method="POST">
              <div class="card-body">
                  <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Anggota">Nama Anggota</label>
                            <select name="anggota" class="form-control">
                               <?php
                                    while ($row = mysqli_fetch_array($anggota)) {
                                        echo "<option value='$row[id_anggota]'>$row[nama]</option>";
                                    }
                                ?>
                            </select>
                        </div>
                      </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Anggota">Kode Pinjam</label>
                        <input
                            type="text" name="kode_pinjam" class="form-control" placeholder="Masukkan Nama Anggota" value="<?= $kodePinjam ?>" readonly
                        />
                      </div>
                    </div>
                  </div>
                  
                <?php 
                    $tgl1 = date('Y-m-d');
                  
                    
                    $tgl2 = date('Y-m-d', strtotime('+7 days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
                    
                  
                    ?>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label for="tgl_pinjam">Tanggal Pinjam</label>
                        <input type="text" name="tgl_pinjam" class="form-control" value="<?php echo"$tgl1"; ?>" readonly>
                   </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label for="tgl_pinjam">Tanggal Kembali</label>
                        <input type="text" name="tgl_kembali" class="form-control" value="<?php echo"$tgl2";?>" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <!-- Date -->
                    <div class="form-group">
                      <label>Buku</label>
                        <select name="buku" class="form-control">
                               <?php
                                    while ($row = mysqli_fetch_array($buku)) {
                                        echo "<option value='$row[id_buku]'>$row[judul]</option>";
                                    }
                                ?>
                            </select>
                    </div>
                   
                  </div>
                  
                </div>

              

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
            include('footer.php');
            ?>
