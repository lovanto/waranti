<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card shadow-lg">
        <div class="card-header bg-gray-500">Data Tabel Rak</div>
          <div class="card-body">
            <form method="POST" action="<?=base_url('page/rak_edit');?>">
             <div class="modal-body">
              <div class="form-group">
                <input type="hidden" id="id" name="id" class="form-control" value="<?=$rak['id'];?>">
                <label class="control-label">Nomor Rak</label>
                <input type="text" class="form-control" id="no_rak" name="no_rak" placeholder="Masukan rak" value="<?=$rak['no_rak'];?>" required>
                <label class="control-label">Nama Rak</label>
                <input type="text" class="form-control" id="nama_rak" name="nama_rak" placeholder="Masukan nama_rak" value="<?=$rak['nama_rak'];?>" required>
                <input type="hidden" class="form-control" id="user_update" name="user_update"  value="<?=$this->session->userdata('nama_user'); ?>" required>             
                <input name="update_date" type="hidden" id="update_date" value=" <?php echo date('Y-m-d'); ?> "readonly>
              </div>
            </div>
              
            <div class="modal-footer">
              <a href="<?=base_url('page/rak');?>" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-undo"></i>&nbsp;&nbsp;Batal&nbsp;</a>
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>