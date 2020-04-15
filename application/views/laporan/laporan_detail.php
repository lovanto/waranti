<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>

<html>

<head></head>

<body style="font-size: 5.5px;">
    <br>
    <table border="1">
        <?php foreach ($detail as $s) : ?>
            <tr>
                <td style="padding: 5px;">Teknisi: <?= $s['nama_karyawan'] ?></td>
                <td style="padding: 5px;">Part No: <?= $s['no_part'] ?></td>
            </tr>
            <tr>
                <td style="padding: 5px;">Nopol: <?= $s['nopol'] ?></td>
                <td style="padding: 5px;">Model Kendaraan: <?= $s['model_kendaraan'] ?></td>
            </tr>
            <tr>
                <td style="padding: 5px;">VIN: <?= $s['vin_rangka'] ?></td>
                <td style="padding: 5px;">KM: <?= $s['kilometer'] ?></td>
            </tr>
            <tr>
                <td style="padding: 5px;">Barcode: <?= $s['barcode'] ?></td>
                <td style="padding: 5px;">LPD: <?= $s['lpd'] ?></td>
            </tr>
            <tr>
                <td style="padding: 5px;" align="center"><img style="width: 50px;" src="<?php echo FCPATH . 'assets/images/' . $s['qr_code']; ?>"></td>
                <td style="padding: 5px; width: 100px; padding-right: -3px;">
                    Nama Rak: <?= $s['nama_rak'] ?><br><br>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "waranti_db";
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT * FROM sparepart";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if($s['no_part'] == $row['no_part']){
                                echo "Nama Part: ".$row['deskripsi'];
                            }
                        }
                    }
                    $conn->close();
                    ?>
                    <br><br>OVERHAUL (FOR M/T)
                    <br><br>Tanggal Perbaikan: <?= $s['tgl_perbaikan'] ?>
                    <br><br>Tanggal Penyerahan: <?= $s['tgl_penyerahan'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br><br><br><br><br>
    <div style="margin-block: 30px;" align="right"><?= $this->session->userdata('nama_user'); ?></div>
</body>

</html>