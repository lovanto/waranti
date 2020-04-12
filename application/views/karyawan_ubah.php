<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card shadow-lg">
        <div class="card-header bg-gray-500">Data Tabel karyawan</div>
          <div class="card-body">
            <form method="POST" action="<?=base_url('page/karyawan_edit');?>">
             <div class="modal-body">
              <div class="form-group">
                <input type="hidden" id="id" name="id" class="form-control" value="<?=$karyawan['id'];?>">
                <label class="control-label">NPK</label>
                <input type="text" class="form-control" id="npk" name="npk" placeholder="Masukan Nomor identitas" value="<?=$karyawan['npk'];?>" required>
                <label class="control-label">Nomor identitas</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Masukan Nomor identitas" value="<?=$karyawan['no_ktp'];?>" required>
                <label class="control-label">Nomor Kontak</label>
                <input type="text" class="form-control" id="nama" name="no_telp" placeholder="Masukan Nomor Kontak" value="<?=$karyawan['no_telp'];?>" required>
                <label class="control-label">Nama karyawan</label>
                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder="Masukan Nama karyawan" value="<?=$karyawan['nama_karyawan'];?>" required>
                <label>Jenis kelamin</label>
                  <select name="jk" class="form-control form-control-user" readonly>
                    <option value="<?=$karyawan['jk'];?>">-pilihan-</option>
                    <option value="laki-laki" <?php
                                      if ($this->session->userdata('jk') == 'laki-laki') {
                                        echo "selected";
                                      }
                                      ?>>Laki-laki</option>
                    <option value="perempuan" <?php
                                      if ($this->session->userdata('jk') == 'perempuan') {
                                        echo "selected";
                                      }
                                      ?>>Perempuan</option>
                  </select>
                <label class="control-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukan Tanggal Lahir" value="<?=$karyawan['tgl_lahir'];?>" required>
                <label class="control-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" value="<?=$karyawan['alamat'];?>" required>
                <label class="control-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukan No Email" value="<?=$karyawan['email'];?>" required>
                <label class="control-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" placeholder="Masukan tgl registrasi" value="<?=$karyawan['tgl_masuk'];?>" required>
                <label>Status karyawan</label>
                    <select name="status_karyawan" class="form-control form-control-user" required>
                    <option value="<?=$karyawan['status_karyawan'];?>">-Pilihan-</option>
                     <option value= "Kontrak" >kontrak</option>
                    <option value= "Tetap">Tetap</option>
                    </select>
                <input type="hidden" class="form-control" id="user_update" name="user_update"  value="<?=$this->session->userdata('nama_user'); ?>" required>             
                <input name="update_date" type="hidden" id="update_date" value=" <?php echo date('Y-m-d'); ?> "readonly>
              </div>
            </div>
             
            <div class="modal-footer">
              <a href="<?=base_url('page/karyawan');?>" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-undo"></i>&nbsp;&nbsp;Batal&nbsp;</a>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>