<div style="margin: 2rem">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">
               PT. ASTRA INTERNASIONAL TBK- DAIHATSU ASTRA BIZ CENTER BANDUNG &nbsp;<small>Laporan Data Detail Part D254</small>
            </h3>
        </div>
    </div>
    <!-- /. ROW  -->
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

            </div>
            <div class="panel-body" id="diprint">
                <h3>Print Record</h3>
                <?php echo form_open('page/laporan_detail_part', array('class' => 'form-inline')); ?>
                <div class="form-group">
                    <label for="exampleInputName2">Tanggal</label>&nbsp;&nbsp;
                    <input type="date" name="tanggal3" class="form-control" placeholder="Tanggal Mulai">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2"> - </label>
                    <input type="date" name="tanggal4" class="form-control" placeholder="Tanggal Selesai">
                </div>
                &nbsp;&nbsp;
                <button class="btn btn-primary btn-sm" type="submit" name="submit2">Cetak Data</button>&nbsp;

                </form>
            </div>
        </div>
        <!-- /. PANEL  -->
    </div>
    <br>
    <br>

    <div class="col-md-12" style="margin-top: -20px;">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <!-- <form action="<?php echo site_url('page/cari_detail'); ?>" method="get">
                        <input type="text" name="cari" class="form-control" id="diprint" placeholder="Cari Data" value="<?php echo (isset($_GET['cari'])) ? $_GET['cari'] : ''; ?>">
                        <br>
                        <button type="submit" id="diprint" class="btn btn-warning">Cari Data</button> <a href="<?php echo site_url('page/cari_detail'); ?>" id="diprint" class="btn btn-danger" style="text-decoration:none; color: black;">Reset</a>
                        <button href="#" onclick="myFunction()" target="_blank" type="submit" id="diprint" class="btn btn-info diprint">Cetak data</button>
                    </form> -->
                    <center>
                        <br>
                        <table class="table table-striped table-bordered">
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
                                    <!-- <th>QR CODE</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($detailpart) > 0) {
                                    $no = 1;
                                    foreach ($detailpart as $k) { ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $k->nama_karyawan; ?></td>
                                            <td><?php echo $k->nopol; ?></td>
                                            <td><?php echo $k->model_kendaraan; ?></td>
                                            <td><?php echo $k->vin_rangka; ?></td>
                                            <td><?php echo $k->kilometer; ?></td>
                                            <td><?php echo $k->tgl_perbaikan; ?></td>
                                            <td><?php echo $k->tgl_penyerahan; ?></td>
                                            <td><?php echo $k->no_part; ?></td>
                                            <td><?php echo $k->deskripsi; ?></td>
                                            <td><?php echo $k->barcode; ?></td>
                                            <td><?php echo $k->lpd; ?></td>
                                            <td><?php echo $k->nama_rak; ?></td>
                                       </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="5" align="center">Tidak Ada Data.</td>
                                    </tr>
                                <?php } ?>
                        </table>
                </div>
                <!-- /. TABLE  -->
                <?php
                echo $this->pagination->create_links();
                ?>

            </div>
        </div>
    </div>
</div>
<!-- /. ROW  -->