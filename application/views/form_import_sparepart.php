 <div class="container">
   <div class="card">
     <!-- <div class="card-header">Header</div> -->
     <div class="card-body">
       <label>Import Data</label>
       <hr>

       <a href="<?php echo base_url("excel/format-sparepart.xlsx"); ?>">Download Format</a>
       <br>
       <br>

       <!-- Buat sebuah tag form dan arahkan action nya ke controller ini lagi -->
       <form method="post" action="<?php echo base_url("page/form?id=sparepart"); ?>" enctype="multipart/form-data">
         <!--
                      -- Buat sebuah input type file
                      -- class pull-left berfungsi agar file input berada di sebelah kiri
                      -->
         <input type="file" name="file">

         <!--
                      -- BUat sebuah tombol submit untuk melakukan preview terlebih dahulu data yang akan di import
                      -->
         <input type="submit" name="preview" value="Preview">
       </form>

       <?php
        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
          if (isset($upload_error)) { // Jika proses upload gagal
            echo "<div style='color: red;'>" . $upload_error . "</div>"; // Muncul pesan error upload
            die; // stop skrip
          }

          // Buat sebuah tag form untuk proses import data ke database
          echo "<form method='post' action='" . base_url("page/import?id=sparepart") . "'>";

          // Buat sebuah div untuk alert validasi kosong
          echo "<div style='color: red;' id='kosong'>
                      Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                      </div>";

          echo "<table border='1' cellpadding='8'>
                      <tr>
                        <th colspan='2'>Preview Data</th>
                      </tr>
                      <tr>
                        <th>No. Part</th>
                        <th>Deskripsi Part</th>
                      </tr>";

          $numrow = 1;
          $kosong = 0;

          // Lakukan perulangan dari data yang ada di excel
          // $sheet adalah variabel yang dikirim dari controller
          foreach ($sheet as $row) {
            // Ambil data pada excel sesuai Kolom
            $no_part = $row['A']; // Ambil data NIS
            $deskripsi = $row['B']; // Ambil data nama
            // Cek jika semua data tidak diisi
            if ($no_part == "" && $deskripsi == "")
              continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if ($numrow > 1) {
              // Validasi apakah semua data telah diisi
              $no_part_td = (!empty($no_part)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah

              $deskripsi_td = (!empty($deskripsi)) ? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merahnpl
              
              if ($no_part == "" or $deskripsi == "") {
                $kosong++; // Tambah 1 variabel $kosong
              }

              echo "<tr>";
              echo "<td" . $no_part_td . ">" . $no_part . "</td>";
              echo "<td" . $deskripsi_td . ">" . $deskripsi . "</td>";
              echo "</tr>";
            }

            $numrow++; // Tambah 1 setiap kali looping
          }

          echo "</table>";

          // Cek apakah variabel kosong lebih dari 0
          // Jika lebih dari 0, berarti ada data yang masih kosong
          if ($kosong > 0) {
        ?>
           <script>
             $(document).ready(function() {
               // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
               $("#jumlah_kosong").html('<?php echo $kosong; ?>');

               $("#kosong").show(); // Munculkan alert validasi kosong
             });
           </script>
       <?php
          } else { // Jika semua data sudah diisi
            echo "<hr>";

            // Buat sebuah tombol untuk mengimport data ke database
            echo "<button type='submit' name='import'>Import</button>";
            echo "<a href='" . base_url("page/part") . "'>Cancel</a>";
          }

          echo "</form>";
        }
        ?>
     </div>
     <!-- Load File jquery.min.js yang ada difolder js -->
     <script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>

     <script>
       $(document).ready(function() {
         // Sembunyikan alert validasi kosong
         $("#kosong").hide();
       });
     </script>