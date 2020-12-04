<?php
include('../setting/koneksi.php');
include('header.php');

// mengambil data barang dengan kode paling besar

$username=$_SESSION['username'];
    $query=mysqli_query($koneksi,"SELECT * FROM t_acount where username='$username'");
    while($d = mysqli_fetch_array($query)){
  
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ubah Anggota</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ubah Admin</li>
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
		        } else if($_GET['pesan'] == "berhasil"){
                    echo '<div class="alert alert-success" role="alert">
                    Data Berhasil Ditambahkan
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
              <h3 class="card-title">Data Admin</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="setting_admin_aksi.php" method="POST">
              <div class="card-body">
              <input type="hidden" name='id' value='<?= $d['id_account']; ?>'>
                  <div class="row">
                    <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Username">Username</label>
                        <input
                            type="text" name="username" class="form-control" value="<?= $d['username'] ?>"
                        />
                      </div>
                    </div>
                  </div>
                  
                
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                        <label for='Password'>Password</label>
                        <input type="password" class='form-control' name='password' value=<?= $d['password']?>>
                   </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" name='nama' class='form-control' value='<?= $d['nama']; ?>'>
                         </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="no_hp">No Handphone</label>
                            <input type="number" name='no_hp' class='form-control' value='<?= $d['no_hp']; ?>'>
                        </div>
                    </div>
                </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ubah</button>
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
