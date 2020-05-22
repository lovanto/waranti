<html>

<head>
    <title>Laporan Data Detail Sparepart</title>
    <style type="text/css">
        #diprint2 {
            opacity: 0;
        }

        .minus {
            margin-top: -70px;
        }

        @media print {
            #diprint {
                display: none;
            }

            #diprint2 {
                opacity: 1;
            }

            @page {
                size: landscape;
            }

            .minus {
                margin-top: 20px;
            }

            .minus2 {
                margin-bottom: -20px;
            }

            body {
                font-size: 10.5px;
            }
        }
    </style>
</head>

<body style="overflow-y: auto;">
    <div class="row" id="diprint2">
        <div class="col-md-3" style="margin-left: 150px;">
            <img src="<?= base_url('assets/images/logo.png'); ?>" width="100px">
        </div>
        <div class="col-md-5" style="margin-left: 10px; float: right">
            <div style="font-size: 30px;">Laporan Detail Sparepart</div>
            <div style="font-size: 20px; margin-left: 60px;">PT. ASTRA INTERNASIONAL TBK- DAIHATSU ASTRA BIZ CENTER BANDUNG</div>
            <!-- <div style="font-size: 20px;">Telp. (022)-7326134</div> -->
        </div>
    </div>
    <div class="minus" style="margin-left: 20px; margin-right: 20px; overflow: auto;">
        <br><br>
        <form action="<?php echo site_url('page/laporan_all_detail'); ?>" method="get">
            <input type="text" name="cari" class="form-control" id="diprint" placeholder="Nama Teknisi atau Nopol" value="<?php echo (isset($_GET['cari'])) ? $_GET['cari'] : ''; ?>">
            <select name="metode" class="form-control" id="diprint" style="width: 300px; margin-top: 10px; margin-bottom: 10px;" required>
                <option value="1">Pilih metode print</option>
                <option value="Harian">Harian</option>
                <option value="Mingguan">Mingguan</option>
                <option value="Bulanan">Bulanan</option>
            </select>
            <input type="date" name="tanggal" id="diprint" class="form-control" style="width: 300px; margin-bottom: 10px;" value="<?php echo (isset($_GET['tanggal'])) ? $_GET['tanggal'] : ''; ?>">
            <button type="submit" class="btn btn-primary " id="diprint">Cari Data</button>
            <a href="<?php echo site_url('page/laporan_all_detail?metode=1'); ?>" class="btn btn-danger" id="diprint" style="text-decoration:none; color: black;">Reset</a>
            <button href="#" onclick="myFunction()" target="_blank" type="submit" id="diprint" class="btn btn-info diprint">Cetak data</button>
        </form>
        <center>
            <br>
            <table border="1" class="table table-striped table-bordered minus" id="dataTable" width="100%">
                <tr>
                    <th>No</th>
                    <th>Nama Teknisi</th>
                    <th>Nopol </th>
                    <th>Model Kendaraan </th>
                    <th>VIN/ No Rangka</th>
                    <th>Kilometer</th>
                    <th>Tgl Perbaikan</th>
                    <th>Tgl Penyerahan</th>
                    <th>No Part</th>
                    <th>Barcode</th>
                    <th>LPD</th>
                    <th>Nama Rak</th>
                    <th>QR CODE</th>
                </tr>
                <?php
                if (count($detail) > 0) {
                    $no = 0;
                    foreach ($detail as $s) : $no++; ?>
                        <tr>
                            <td class="text-center text-middle"><?= $no; ?></td>
                            <td class="text-middle"><?= $s['nama_karyawan']; ?></td>
                            <td class="text-middle"><?= $s['nopol']; ?></td>
                            <td class="text-middle"><?= $s['model_kendaraan']; ?></td>
                            <td class="text-middle"><?= $s['vin_rangka']; ?></td>
                            <td class="text-middle"><?= $s['kilometer']; ?></td>
                            <td class="text-middle"><?= $s['tgl_perbaikan']; ?></td>
                            <td class="text-middle"><?= $s['tgl_penyerahan']; ?></td>
                            <td class="text-middle"><?= $s['no_part']; ?></td>
                            <td class="text-middle"><?= $s['barcode']; ?></td>
                            <td class="text-middle"><?= $s['lpd']; ?></td>
                            <td class="text-middle"><?= $s['nama_rak']; ?></td>
                            <td><img style="width: 100px;" src="<?php echo base_url() . 'assets/images/' . $s['qr_code']; ?>">
                            </td>
                        </tr>
                    <?php endforeach;
                } else { ?>
                    <tr>
                        <td colspan="5" align="center">Tidak Ada Data.</td>
                    </tr>
                <?php } ?>
            </table>
        </center>
        <br />
        <?php
        echo $this->pagination->create_links();
        ?>
    </div>
    <div id="diprint2">
        <div class="col-md-11">
            <div style="font-size: 16px; float: right;">Bandung, <?= date('d-m-Y'); ?></div>
            <br><br><br><br><br>
            <div style="font-size: 16px; float: right;"><?= $this->session->userdata('nama_user') ?></div>
            <br><br>
        </div>
    </div>
</body>

</html>