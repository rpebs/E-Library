<?php
include('../setting/koneksi.php');
include('header.php');
$penerbit = mysqli_query($koneksi,"SELECT * FROM t_penerbit");
$penulis = mysqli_query($koneksi,"SELECT * FROM t_penulis");
$kategori = mysqli_query($koneksi,"SELECT * FROM t_kategori");
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Buku</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Buku</li>
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
              <h3 class="card-title">Masukkan Data Buku</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="tambah_buku_aksi.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="Kategori">Judul Buku</label>
                  <input
                    type="text" name="judul" class="form-control" placeholder="Masukkan Judul Buku"
                  />
                </div>
                <div class="form-group">
                  <label for="penerbit">Penerbit</label>
                  <select class="form-control" name="penerbit">
                      <?php
                            while ($row = mysqli_fetch_array($penerbit)) {
                                echo "<option value='$row[id_penerbit]'>$row[penerbit]</option>";
                            }
                        ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun Terbit</label>
                    <input type="text" name="tahun" class="form-control" placeholder="Tahun Terbit">
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <select class="form-control" name="penulis">
                        <?php
                            while ($row = mysqli_fetch_array($penulis)) {
                                echo "<option value='$row[id_penulis]'>$row[penulis]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" name="kategori">
                        <?php
                            while ($row = mysqli_fetch_array($kategori)) {
                                echo "<option value='$row[id_t_kategori]'>$row[kategori]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" placeholder="Masukkan Harga Buku">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Buku</label>
                    <input type="number" name="jumlah" class="form-control" placeholder="Masukkan Jumlah Buku">
                </div>
                 <div class="form-group">
                    <label for="rak">Kode Rak</label>
                    <input type="text" name="kode_rak" class="form-control" placeholder="Masukkan Kode Rak">
                </div>
                
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="filegambar" class="form-control-file">
                </div>
                
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Tambah</button>
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
