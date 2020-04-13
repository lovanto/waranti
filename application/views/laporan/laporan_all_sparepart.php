<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>

<html>

<head></head>

<body style="font-size: 10px;">
<h2 style="text-align: center">Laporan Semua Sparepart</h2>
        <table border="1" style="width: 100%; margin-top: 20px;">
        <thead>
            <tr>
                <td style="padding: 10px;">No.</td>
                <td style="padding: 10px;">No. Part</td>
                <td style="padding: 10px;">Deskripsi</td>
                <td style="padding: 10px;">QR QODE</td>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0;
            foreach ($sparepart as $s) : $no++; ?>
                <tr>
                    <td style="padding: 10px;"><?= $no ?></td>
                    <td style="padding: 10px;"><?= $s['no_part'] ?></td>
                    <td style="padding: 10px;"><?= $s['deskripsi'] ?></td>
                    <td style="padding: 10px;"><img style="width: 80px;" src="<?php echo FCPATH . 'assets/images/' . $s['qr_code']; ?>"></td>
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