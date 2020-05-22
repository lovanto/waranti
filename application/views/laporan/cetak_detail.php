<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo base_url() ?>">
	<title>Cetak Data Detail Part</title>
		<script>
 
      function Cetak() {
       
          window.print();
       
      }
       Cetak();
      </script>
	<link rel="stylesheet" type="text/css" href="assets/bootflat-admin/css/bootstrap.min.css">
</head>
<body >
	<div class="container">
		<a class="navbar-brand" href="#"><img class="logo" src="<?=base_url('assets/images/logo.png');?>" alt="Logo" width="50" height="50"></a>
	<center>
		<p><h4>PT. ASTRA INTERNASIONAL TBK- DAIHATSU ASTRA BIZ CENTER BANDUNG</h4></p>
		<p>Jl. Soekarno-Hatta No.438D, Pasirluyu, Kec. Regol, Kota Bandung, Jawa Barat 40254</p>
		<p>Telp. (022)- /0821-2666-6011</p>
	</center>
		<h4>Laporan Detail Part D254</h4>
		<br>
	<?php 
	$key = $detailpart->row();
	 ?>
	 <br>	
	 <br>
	 <center>
	 <h4> Laporan Detail Part D254</h4>		
	 </center>
	
	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered" style="margin-bottom: 10px" >
				<thead>
					<tr>
 					  <th>No.</th>
                      <th>Nama Teknisi</th>
	                  <th>Nopol </th>
	                  <th>Model Kendaraan </th>
	                  <th>VIN/ No Rangka</th>
	                  <th>Kilometer</th>
	                  <th>Tgl Perbaikan</th>
	                  <th>Tgl Penyerahan</th>
	                  <th>No Part</th>
	                  <th>Nama Part</th>
	                  <th>Barcode</th>
	                  <th>LPD</th>
	                  <th>Nama Rak</th>
	                  <th>QR CODE</th>								
					</tr>
				</thead>
				<tbody>
						<?php 
					      $no = 0;
					      foreach($detailpart->result_array() as $key):$no++;?>
                   <tr class="gradeU">
                      <td><?=$no;?></td>
                      <td><?php echo $key['nama_karyawan'] ?></td>
                      <td><?php echo $key['nopol'] ?></td>
                      <td><?php echo $key['model_kendaraan'] ?></td>
                      <td><?php echo $key['vin_rangka'] ?></td>
                      <td><?php echo $key['kilometer'] ?></td>
                      <td><?php echo $key['tgl_perbaikan'] ?></td>
                      <td><?php echo $key['tgl_penyerahan'] ?></td>
                      <td><?php echo $key['no_part'] ?></td>
                      <td><?php echo $key['deskripsi'] ?></td>
                      <td><?php echo $key['barcode'] ?></td>
                      <td><?php echo $key['lpd'] ?></td>
                      <td><?php echo $key['nama_rak'] ?></td>
                      <td><img style="width: 100px;" src="<?php echo base_url() . 'assets/images/' . $key['qr_code']; ?>">
                   </tr>
                        <?php endforeach;?>				
                    </tbody>
			</table>

			<div style="text-align: right;">
				<p>Bandung, <?php echo date('d/m/Y') ?></p>
				<br><br><br><br><br>
				<p><?=$this->session->userdata('nama_user'); ?></p>
			</div>
		</div>
	</div>
</div>
</body>
</html>