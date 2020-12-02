<?php
include('header.php');
include('../setting/koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM t_kategori");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Kategori</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Kategori</li>
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
              <a href="tambah_kategori.php" class="btn btn-primary">Tambah Kategori</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th width="75%">Nama Kategori</th>
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
                    <td><?php echo $no ?></td>
                    <td><?php echo $data["kategori"];?></td>
                    <td>
                        <a href="#" class="btn btn-danger">Delete</a> 
                        <a href="#" class="btn btn-warning">Update</a>
                    </td>
                </tr>
                <?php $no++; } ?>
                <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
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