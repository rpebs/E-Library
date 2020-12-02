<?php
include('../setting/koneksi.php');
include('header.php');

$penerbit = mysqli_query($koneksi,"SELECT * FROM t_penerbit");
$penulis = mysqli_query($koneksi,"SELECT * FROM t_penulis");
$kategori = mysqli_query($koneksi,"SELECT * FROM t_kategori");
$id=$_GET['id_buku'];
    $query=mysqli_query($koneksi,"SELECT * FROM t_buku INNER JOIN t_penulis ON t_buku.id_penulis = t_penulis.id_penulis INNER JOIN t_penerbit ON t_buku.id_penerbit = t_penerbit.id_penerbit INNER JOIN t_kategori ON t_buku.id_kategori = t_kategori.id_t_kategori where id_buku='$id'");
while($d = mysqli_fetch_array($query)){


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
            <form role="form" action="update_buku_aksi.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
              <input type="hidden" name="id_anggota" value=<?= $id;?>>
                <div class="form-group">
                  <label for="Kategori">Judul Buku</label>
                  <input
                    type="text" name="judul" class="form-control" value="<?= $d['judul']; ?>"
                  />
                </div>
                <div class="form-group">
                  <label for="penerbit">Penerbit</label>
                  <select class="form-control" name="penerbit">
                  <option value="<?php echo $d['id_penerbit'] ?>"><?= $d['penerbit']; ?></option>
                      <?php
                            while ($row = mysqli_fetch_array($penerbit)) {
                                echo "<option value='$row[id_penerbit]'>$row[penerbit]</option>";
                            }
                        ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun Terbit</label>
                    <input type="text" name="tahun" class="form-control" value="<?= $d['tahun_terbit'];?>">
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis</label>
                    <select class="form-control" name="penulis">
                    <option value="<?php echo $d['id_penulis'];?>"><?= $d['penulis']; ?></option>
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
                    <option value="<?php echo $d['id_kategori'];?>"><?= $d['kategori']; ?></option>
                        <?php
                            while ($row = mysqli_fetch_array($kategori)) {
                                echo "<option value='$row[id_t_kategori]'>$row[kategori]</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="form-control" value="<?= $d['harga'];?>">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Buku</label>
                    <input type="number" name="jumlah" class="form-control" value="<?= $d['jumlah'];?>">
                </div>
                 <div class="form-group">
                    <label for="rak">Kode Rak</label>
                    <input type="text" name="kode_rak" class="form-control" value="<?= $d['kode_rak'];?>">
                </div>
                <label for="">Gambar Saat Ini</label><br>
                <img src="../img/<?php echo $d['gambar']?>" height="120" width="150" />
                <input type="hidden" name="gambar_lama" value="<?php echo $d['gambar'];?>"/></td>
                <br>
                <div class="form-group">
                    <label for="gambar">Gambar Baru</label>
                    <input type="file" name="filegambar" class="form-control-file" value="<?= $d['gambar'];?>">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Tambah</button>
              </div>
            </form>
            <?php
                }
                ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
            include('footer.php');
            ?>
