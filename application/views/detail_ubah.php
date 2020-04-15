<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card shadow-lg">
        <div class="card-header bg-gray-500">Data Tabel Detail Part</div>
        <div class="card-body">
          <form method="POST" action="<?= base_url('page/detail_edit'); ?>">
            <div class="modal-body">
              <div class="form-group">
              <input type="hidden" class="form-control form-control-user" id="id" name="id" value="<?=$detail['id']?>" required readonly>
                <label>Nama Karyawan</label>
                <?php
                $a = mysqli_connect("localhost", "root", "", "waranti_db");
                $result = mysqli_query($a, "select * from karyawan order by nama_karyawan asc");
                $jsArray = "var Nama_prd1 = new Array();";
                echo '<select name="nama_karyawan" id="nama_karyawan" onchange="changeValue(this.value)" class="form-control form-control-user">';
                echo '<option>---Pilih nama_karyawan----</option>';
                while ($row = mysqli_fetch_array($result)) {
                ?>
                  <option value="<?= $row['nama_karyawan'] ?>" <?php
                                                                if ($row["nama_karyawan"] == $detail["nama_karyawan"]) {
                                                                  echo "selected";
                                                                }
                                                                ?>>
                    <?= $row['nama_karyawan'] ?></option>
                <?php
                  $jsArray .= "Nama_prd1['" . $row['nama_karyawan'] . "'] = {name:'" . addslashes($row['tarif']) . "',desc:'" . addslashes($row['kategori']) . "'};";
                }
                echo '</select>';
                ?>
                <label>Nopol</label>
                <?php
                $a = mysqli_connect("localhost", "root", "", "waranti_db");
                $result = mysqli_query($a, "select * from kendaraan order by nopol asc");
                $jsArray = "var Nama_prd1 = new Array();";
                echo '<select name="nopol" onchange="changeValue(this.value)" class="form-control form-control-user" selected>';
                echo '<option>---Pilih nopol----</option>';
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?= $row['nopol'] ?>" <?php
                                                                if ($row["nopol"] == $detail["nopol"]) {
                                                                  echo "selected";
                                                                }
                                                                ?>>
                    <?= $row['nopol'] ?></option>
                <?php
                  $jsArray .= "Nama_prd1['" . $row['nopol'] . "'] = {name:'" . addslashes($row['model_kendaraan']) . "',desc:'" . addslashes($row['vin_rangka']) . "',des:'" . addslashes($row['kilometer']) . "'};";
                }
                echo '</select>';
                ?>
                <script type="text/javascript">
                  <?php echo $jsArray; ?>

                  function changeValue(id) {
                    document.getElementById('model_kendaraan').value = Nama_prd1[id].name;
                    document.getElementById('vin_rangka').value = Nama_prd1[id].desc;
                    document.getElementById('kilometer').value = Nama_prd1[id].des;
                  };
                </script>
                <label>Model Kendaraan</label>
                <input type="text" class="form-control form-control-user" id="model_kendaraan" name="model_kendaraan" placeholder="Masukan model_kendaraan" value="<?=$detail['model_kendaraan']?>" required readonly>
                <label>VIN/ NO RANGKA</label>
                <input type="text" class="form-control form-control-user" id="vin_rangka" name="vin_rangka" placeholder="Masukan vin_rangka" value="<?=$detail['vin_rangka']?>" required readonly>
                <label>Kilometer</label>
                <input type="text" class="form-control form-control-user" id="kilometer" name="kilometer" placeholder="Masukan kilometer detail" value="<?=$detail['kilometer']?>" required readonly>
                <label>Tanggal Perbaikan</label>
                <input type="date" class="form-control form-control-user" id="tgl_perbaikan" name="tgl_perbaikan" placeholder="Masukan Tanggal Perbaikan" value="<?=$detail['tgl_perbaikan']?>" required>
                <label>Tanggal Penyerahan</label>
                <input type="date" class="form-control form-control-user" id="tgl_penyerahan" name="tgl_penyerahan" placeholder="Masukan Tanggal Penyerahan" value="<?=$detail['tgl_penyerahan']?>" required>
                <label>No Part</label>
                <?php
                $a = mysqli_connect("localhost", "root", "", "waranti_db");
                $result = mysqli_query($a, "select * from sparepart order by no_part asc");
                $jsArray = "var Nama_prd1 = new Array();";
                echo '<select name="no_part" onchange="changeValue(this.value)" class="form-control form-control-user">';
                echo '<option>---Pilih no_part----</option>';
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?= $row['no_part'] ?>" <?php
                                                                if ($row["no_part"] == $detail["no_part"]) {
                                                                  echo "selected";
                                                                }
                                                                ?>>
                    <?= $row['no_part'] ?></option>
                <?php
                  $jsArray .= "Nama_prd1['" . $row['no_part'] . "'] = {name:'" . addslashes($row['tarif']) . "',desc:'" . addslashes($row['kategori']) . "'};";
                }
                echo '</select>';
                ?>
                <label>Barcode</label>
                <input type="text" class="form-control form-control-user" id="barcode" name="barcode" placeholder="Masukan Barcode" value="<?=$detail['barcode']?>" required>
                <label>LPD</label>
                <input type="text" class="form-control form-control-user" id="lpd" name="lpd" placeholder="Masukan LPD" value="<?=$detail['lpd']?>" required>
                <label>Nama Rak</label>
                <?php
                $a = mysqli_connect("localhost", "root", "", "waranti_db");
                $result = mysqli_query($a, "select * from rak order by no_rak asc");
                $jsArray = "var Nama_prd1 = new Array();";
                echo '<select name="nama_rak" onchange="changeValue(this.value)" class="form-control form-control-user">';
                echo '<option>---Pilih nama_rak----</option>';
                while ($row = mysqli_fetch_array($result)) {
                  ?>
                  <option value="<?= $row['nama_rak'] ?>" <?php
                                                                if ($row["nama_rak"] == $detail["nama_rak"]) {
                                                                  echo "selected";
                                                                }
                                                                ?>>
                    <?= $row['nama_rak'] ?></option>
                <?php
                  $jsArray .= "Nama_prd1['" . $row['nama_rak'] . "'] = {name:'" . addslashes($row['tarif']) . "',desc:'" . addslashes($row['kategori']) . "'};";
                }
                echo '</select>';
                ?>
                <input type="hidden" class="form-control" id="user_update" name="user_update" value="<?= $this->session->userdata('nama_user'); ?>" readonly>
                <input name="update_date" type="hidden" id="update_date" value=" <?php echo date('Y-m-d') ?> " readonly>
                
              </div>
              <div class="modal-footer">
                <a href="<?= base_url('page/detail'); ?>" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-undo"></i>&nbsp;&nbsp;Batal&nbsp;</a>
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Update</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>