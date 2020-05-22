<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('flash_sukses'); ?>"></div>
<div class="flash-data2" data-flashdata="<?= $this->session->flashdata('flash_gagal'); ?>"></div>
<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Overview</li>
</ol>
<!-- Icon Cards-->
<div class="container">
  <div class="row">
    <div class="col-xl-3 col-md-3 mb-2">
      <div class="card border-left-primary shadow h-100 py-2 bg-primary">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-3">
              <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Total Kendaraan</div>
              <div class="h5 mb-0 font-weight-bold text-white"><?php echo $this->UserModel->get_data2('kendaraan')->num_rows(); ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa fa-car fa-3x text-white "></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-3 mb-2">
      <div class="card border-left-danger shadow h-100 py-2 bg-danger">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 ">
              <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Total Karyawan</div>
              <div class="h5 mb-0 font-weight-bold text-white">
                <?php echo $this->UserModel->get_data2('karyawan')->num_rows(); ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa fa-child fa-3x text-white  "></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-3 mb-2">
      <div class="card border-left-danger shadow h-100 py-2 bg-danger">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 ">
              <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Total Backup detail Part </div>
              <div class="h5 mb-0 font-weight-bold text-white">
                <?php echo $this->UserModel->get_data2('detail')->num_rows(); ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa fa-taxi fa-3x text-white  "></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-3 mb-2">
      <div class="card border-left-warning shadow h-100 py-2 bg-warning">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-3">
              <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Total Pengguna APP</div>
              <div class="h5 mb-0 font-weight-bold text-white"> <?php echo $this->UserModel->get_data2('user')->num_rows(); ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-book-reader fa-3x text-white"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
   <div style="position:fixed; right:20px; bottom:20px; z-index: 1000;">
    <a href="https://wa.me/6285871186153?text=Hai, PT. ASTRA INTERNASIONAL TBKDAIHATSU ASTRA BIZ CENTER
BANDUNG , saya sedang mempunyai masalah , apakah anda bisa membantu ? (ini pesan otomatis)">
      <button style="background:#32C03C;vertical-align:center;height:36px;border-radius:5px">
        <img src="https://web.whatsapp.com/img/favicon/1x/favicon.png">&nbsp; Whatsapp Kami</button></a>
  </div>
  <!-- Area Chart Example-->
  <div class="card mb-3">
    <div class="card-header">
      <h1>Selamat datang <?= $this->session->userdata('nama_user'); ?></h1>
      <?php
        
    $save  = 'C:/xampp/htdocs/waranti/backup_data/'; // dir name backup output destination
    echo $save;
      ?>
      <h5>Anda masuk sebagai <i>
          <?php
          if ($this->session->userdata('id_level') == 1) {
            echo "Admin";
          } else if ($this->session->userdata('id_level') == 2) {
            echo "User";
          } else {
            echo "Who Are You?";
          }
          ?>
        </i></h5>
      <h4>Halaman ini hanya bisa diakses setelah login.</h4>
    </div>
  </div>