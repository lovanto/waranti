<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>

<html>

<head></head>

<body style="font-size: 10px;">
<h2 style="text-align: center">Laporan Semua Rak</h2>
        <table border="1" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <td style="padding: 10px;">No.</td>
                <td style="padding: 10px;">No. Rak</td>
                <td style="padding: 10px;">Nama Rak</td>
                <td style="padding: 10px;">QR QODE</td>
                <td style="padding: 10px;">Dibuat Oleh</td>
                <td style="padding: 10px;">Pada Tanggal</td>
                <td style="padding: 10px;">Diperbarui Oleh</td>
                <td style="padding: 10px;">Pada Tanggal</td>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0;
            foreach ($rak as $s) : $no++; ?>
                <tr>
                    <td style="padding: 10px;"><?= $no ?></td>
                    <td style="padding: 10px;"><?= $s['no_rak'] ?></td>
                    <td style="padding: 10px;"><?= $s['nama_rak'] ?></td>
                    <td style="padding: 10px;"><img style="width: 80px;" src="<?php echo FCPATH . 'assets/images/' . $s['qr_code']; ?>"></td>
                    <td style="padding: 10px;"><?= $s['user_create'] ?></td>
                    <td style="padding: 10px;"><?= $s['create_date'] ?></td>
                    <td style="padding: 10px;"><?= $s['user_update'] ?></td>
                    <td style="padding: 10px;"><?= $s['update_date'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br><br>
    <div align="right">
        Bandung, <?= date('d/m/Y') ?><br><br><br><br>
        <?= $this->session->userdata('nama_user'); ?>
    </div>
</body>

</html>