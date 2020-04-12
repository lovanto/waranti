<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card shadow-lg">
        <div class="card-header bg-gray-500">Data Tabel Kendaraan</div>
          <div class="card-body">
            <form method="POST" action="<?=base_url('page/kendaraan_edit');?>">
             <div class="modal-body">
              <div class="form-group">
                <input type="hidden" id="id" name="id" class="form-control" value="<?=$kendaraan['id'];?>">
                <label class="control-label">Nopol</label>
                <input type="text" class="form-control" id="nopol" name="nopol" placeholder="Masukan kendaraan" value="<?=$kendaraan['nopol'];?>" required>
                <label class="control-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" placeholder="Masukan model" value="<?=$kendaraan['model'];?>" required>
                <label class="control-label">Tipe Mesin</label>
                <input type="text" class="form-control" id="tipe_mesin" name="tipe_mesin" placeholder="Masukan tipe_mesin" value="<?=$kendaraan['tipe_mesin'];?>" required>
                <label class="control-label">Model Kendaraan</label>
                <input type="text" class="form-control" id="model_kendaraan" name="model_kendaraan" placeholder="Masukan model_kendaraan" value="<?=$kendaraan['model_kendaraan'];?>" required>
                <label class="control-label">Vin / No Rangka</label>
                <input type="text" class="form-control" id="vin_rangka" name="vin_rangka" placeholder="Masukan vin_rangka" value="<?=$kendaraan['vin_rangka'];?>" required>
                <label class="control-label">kilometer </label>
                <input type="text" class="form-control" id="kilometer" name="kilometer" placeholder="Masukan kilometer" value="<?=$kendaraan['kilometer'];?>" required>
                <input type="hidden" class="form-control" id="user_update" name="user_update"  value="<?=$this->session->userdata('nama_user'); ?>" required>             
                <input name="update_date" type="hidden" id="update_date" value=" <?php echo date('Y-m-d'); ?> "readonly>
              </div>
            </div>
              
            <div class="modal-footer">
              <a href="<?=base_url('page/kendaraan');?>" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-undo"></i>&nbsp;&nbsp;Batal&nbsp;</a>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>