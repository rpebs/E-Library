<?php
include('../setting/koneksi.php');
include('header.php');

// mengambil data barang dengan kode paling besar
	$query = mysqli_query($koneksi, "SELECT max(no_anggota) as noTerbesar FROM t_anggota");
	$data = mysqli_fetch_array($query);
	$kodeAnggota = $data['noTerbesar'];
 
	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($kodeAnggota, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "AB";
  $kodeAnggota = $huruf . sprintf("%03s", $urutan);
  
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Anggota</h1>
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
              <h3 class="card-title">Masukkan Data Anggota</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="tambah_anggota_aksi.php" method="POST">
              <div class="card-body">
                  <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label for="Anggota">Nama Anggota</label>
                            <input
                                type="text" name="anggota" class="form-control" placeholder="Masukkan Nama Anggota"
                            />
                        </div>
                      </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                        <label for="Anggota">No Anggota</label>
                        <input
                            type="text" name="no_anggota" class="form-control" placeholder="Masukkan Nama Anggota" value="<?= $kodeAnggota ?>" readonly
                        />
                      </div>
                    </div>
                  </div>
                  
                
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="j_kelamin" class="form-control">
                          <option value="Laki - Laki">Laki - Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                   </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3" placeholder="Masukkan Alamat" name="alamat"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- Date -->
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir">
                    </div>
                   
                  </div>
                  <div class="col-sm-6">
                      <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="Aktif">Aktif</option>
                          <option value="tidak aktif">Tidak Aktif</option>
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
