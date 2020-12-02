<?php
include('header.php');
include('../setting/koneksi.php');

$join = mysqli_query($koneksi, "SELECT * FROM t_buku INNER JOIN t_penulis ON t_buku.id_penulis = t_penulis.id_penulis INNER JOIN t_penerbit ON t_buku.id_penerbit = t_penerbit.id_penerbit");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Buku</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Buku</li>
          </ol>
        </div>
      </div>
    </div>
    <?php
            if(isset($_GET['pesan'])){
	        	if($_GET['pesan'] == "berhasil"){
			    echo '<div class="alert alert-success" role="alert">
                        Data Berhasil Ditambahkan
                    </div>';
		        }
	        }
        ?>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="tambah_buku.php" class="btn btn-primary">Tambah Buku</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Kode Rak</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <?php if(mysqli_num_rows($join)>0){ ?>
                <?php
                    $no = 1;
                    while($data = mysqli_fetch_array($join)){
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data["judul"];?></td>
                    <td><img width="80px" src="../img/<?php echo $data["gambar"];?>"></td>
                    <td><?php echo $data["penulis"];?></td>
                    <td><?php echo $data["penerbit"];?></td>
                    <td><?php echo $data["tahun_terbit"];?></td>
                    <td><?php echo $data["harga"];?></td>
                    <td><?php echo $data["jumlah"];?></td>
                    <td><?php echo $data["kode_rak"];?></td>
                    <td>
                        <a href="#" class="btn btn-danger">Delete</a> 
                        <a href="ubah_buku.php?id_buku=<?= $data["id_buku"]; ?>" class="btn btn-warning">Update</a>
                    </td>
                </tr>
                <?php $no++; } ?>
                <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Harga</th>
                    <th>Kode Rak</th>
                    <th>Opsi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>

<?php
include('footer.php');
?>