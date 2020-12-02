<?php
include('../setting/koneksi.php');
include('header.php');

$id = $_GET['id_peminjaman'];
$query = mysqli_query($koneksi,"SELECT * FROM t_peminjaman INNER JOIN t_anggota ON t_peminjaman.id_anggota=t_anggota.id_anggota INNER JOIN t_buku ON t_peminjaman.id_buku=t_buku.id_buku where id_peminjaman='$id'");
while($d = mysqli_fetch_array($query)){
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Penulis</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Tambah Penerbit</li>
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
              <h3 class="card-title">Pengembalian Buku</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="proses_kembali.php" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="penulis">Kode Pinjam</label>
                  <input
                    type="text" name="kode_pinjam" class="form-control" value="<?php echo $d['kode_pinjam'];?>";
                  />
                </div>
                 <div class="form-group">
                  <label for="penulis">Nama Peminjam</label>
                  <select class="form-control" name="anggota" readonly>
                                <?php
                                    
                                        echo "<option value='$d[id_anggota]'>$d[nama]</option>";
                                    
                                ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="penulis">Nama Peminjam</label>
                  <select class="form-control" name="id_buku" readonly>
                                <?php
                                    
                                        echo "<option value='$d[id_buku]'>$d[judul]</option>";
                                    
                                ?>
                    </select>
                </div>
                <div class="form-group">
                  <label for="penulis">Tanggal Pinjam</label>
                  <input
                    type="text" name="tgl_pinjam" class="form-control" value="<?php echo $d['tgl_pinjam'];?>" readonly
                  />
                </div>
                <div class="form-group">
                  <label for="penulis">Tanggal Kembali</label>
                  <input
                    type="text" name="tgl_pinjam" class="form-control" value="<?php echo $d['tgl_kembali'];?>" readonly
                  />
                </div>
                <div class="form-group">
                  <label for="penulis">Tanggal Sekarang</label>
                  <?php $datenow = date('Y-m-d'); ?>
                  <input
                    type="text" name="tgl_pinjam" class="form-control" value="<?php echo $datenow; ?>" readonly
                  />
                </div>
                <div class="form-group">
                  <label for="penulis">Denda</label>
                  <?php
                  $tgl_kembali = $d['tgl_kembali'];
// bisa di ganti untuk mengecek telat pengembalian, format tahun-bulan-tanggal.
                if(strtotime($datenow) > strtotime($tgl_kembali)){
                     $cari_hari = abs(strtotime($tgl_kembali) - strtotime($datenow));
                    $hitung_hari = floor($cari_hari/(60*60*24));
                    
                    
                        $telat = $hitung_hari;
                        $denda = 1000 * $telat;
                    
                    
                    $jumlah_denda = $denda;
                } else {
                    $denda = 0;
                }
                   
                    ?>
                  <input
                    type="text" name="denda" class="form-control" value="<?php echo $denda;?>" readonly
                  />
                </div>
              </div>
              
               
              
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Kembalikan Buku</button>
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
