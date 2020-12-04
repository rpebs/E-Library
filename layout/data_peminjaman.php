<?php
include('header.php');
include('../setting/koneksi.php');
$join = mysqli_query($koneksi, "SELECT * FROM t_peminjaman INNER JOIN t_anggota ON t_peminjaman.id_anggota = t_anggota.id_anggota INNER JOIN t_buku ON t_peminjaman.id_buku = t_buku.id_buku");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Peminjaman</h1>
        </div>
        
        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Peminjaman</li>
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
              <a href="tambah_peminjaman.php" class="btn btn-primary">Pinjam Buku</a>
              <a href="cetak.php" class="btn btn-primary">Cetak Laporan</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Anggota</th>
                    <th>Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
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
                    <td><?php echo $data["kode_pinjam"];?></td>
                    <td><?php echo $data["nama"];?></td>
                    <td><?php echo $data["judul"];?></td>
                    <td><?php echo $data["tgl_pinjam"];?></td>
                    <td><?php echo $data["tgl_kembali"];?></td>
                    <td><?php echo $data["status_pinjam"];?></td>
                    <td>
                        <a href="pengembalian.php?id_peminjaman=<?php echo $data["id_peminjaman"]?>" class="btn btn-success">Kembali</a> 
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php $no++; } ?>
                <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                     
                    <th>Kode</th>
                    <th>Anggota</th>
                    <th>Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
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