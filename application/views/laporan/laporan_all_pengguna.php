<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>

<html>

<head></head>

<body style="font-size: 10px;">
<h2 style="text-align: center">Laporan Semua Pengguna</h2>
        <table border="1" style="width: 100%; margin-left: 80px; margin-top: 20px;">
        <thead>
            <tr>
                <td style="padding: 10px;">No.</td>
                <td style="padding: 10px;">Username</td>
                <td style="padding: 10px;">Nama Lengkap</td>
                <td style="padding: 10px;">Hak Akses</td>
                <td style="padding: 10px;">Dibuat Oleh</td>
                <td style="padding: 10px;">Pada Tanggal</td>
                <td style="padding: 10px;">Diperbarui Oleh</td>
                <td style="padding: 10px;">Pada Tanggal</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            foreach ($user as $s) : $no++; ?>
                <tr>
                    <td style="padding: 10px;"><?= $no ?></td>
                    <td style="padding: 10px;"><?= $s['username'] ?></td>
                    <td style="padding: 10px;"><?= $s['nama_user'] ?></td>
                    <td style="padding: 10px;">
                        <?php
                        if ($s['id_level'] == 1) {
                            echo "Admin";
                        } else if ($s['id_level'] == 2) {
                            echo "Checker";
                        } else if ($s['id_level'] == 3) {
                            echo "Owner";
                        } else if ($s['id_level'] == 4) {
                            echo "Pelanggan";
                        } else {
                            echo "Who Are You?";
                        }
                        ?>
                    </td>
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