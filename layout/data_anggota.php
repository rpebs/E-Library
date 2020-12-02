<?php
include('header.php');
include('../setting/koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM t_anggota");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Anggota</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Anggota</li>
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
              <a href="tambah_anggota.php" class="btn btn-primary">Tambah Anggota</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No Anggota</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <?php if(mysqli_num_rows($query)>0){ ?>
                <?php
                    $no = 1;
                    while($data = mysqli_fetch_array($query)){
                ?>
                <tbody>
                  <tr>
                    <td><?php echo $data["no_anggota"] ?></td>
                    <td><?php echo $data["nama"];?></td>
                    <td><?php echo $data["tgl_lahir"];?></td>
                    <td><?php echo $data["alamat"];?></td>
                    <td><?php echo $data["status"];?></td>
                    <td>
                        <a href="#" class="btn btn-danger">Delete</a> 
                        <a href="ubah_anggota.php?id_anggota=<?php echo $data["id_anggota"]?>" class="btn btn-warning">Update</a>
                    </td>
                </tr>
                <?php $no++; } ?>
                <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                   <th>No Anggota</th>
                    <th>Nama</th>
                    <th>Tgl Lahir</th>
                    <th>Alamat</th>
                    <th>Status</th>
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