    <!-- Start Greeting Cards -->
    <div class="container">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400"
            style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1">
                    <h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down"
                        data-aos-duration="1400">Penutup.
                    </h1>
                    <p>Hello 
                    <?php
                        $data['user'] = $this->db->get_where('el_siswa', ['email' =>
                            $this->session->userdata('email')])->row_array();
                        echo $data['user']['nama'];
                        ?>!
                    Ini merupakan halaman Penutup. Pada halaman ini terdapat beberapa bagian sebagai berikut:
                    </p>
                    <ol>
                        <li>Pencapaian Hasil Belajar Anda</li>
                        <li>Daftar Pustaka</li>
                    </ol>
                    <hr>
                    <h4 data-aos="fade-down" data-aos-duration="1700"><?php
                    $data['user'] = $this->db->get_where('el_siswa', ['email' =>
                    $this->session->userdata('email')])->row_array();
                    echo $data['user']['nama'];
                    ?> - Students</h4>
                </div>
            </div>
        </div>
    </div>
    <!-- End Greeting Cards -->
<div class="container">
    <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400"
        style="width: 100%; border-radius:10px;">  
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true"><i class="fa fa-bar-chart"></i> Hasil Pencapaian Anda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false"><i class="fa fa-certificate "></i> Daftar Pustaka</a>
          </li>
        </ul>
        <hr>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Tugas</th>
                  <th scope="col">Status</th>
                  <th scope="col">Catatan</th>
                  <th scope="col">Nilai</th>
                  <th scope="col">Kunci Jawaban</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i = 1;
                  foreach ($tugas as $t) {
                  $tugas_id = $t->id;
                  $jawaban = $this->db->get_where('el_nilai_tugas', ['tugas_id' => $tugas_id, 'siswa_id' => $data['user']['id']])->row_array();
                ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $t->judul; ?> </td>
                  <td>
                    <?php
                      if ($jawaban) {
                        echo $jawaban['status'];
                      } else {
                        echo 'Belum Mengerjakan';
                      }
                    ?>
                  </td>
                  <td>
                    <?php
                      if ($jawaban) {
                        echo $jawaban['catatan'];
                      } else {
                        echo '-';
                      }
                    ?>
                  </td>
                  <td>
                    <?php
                      if ($jawaban) {
                        echo $jawaban['nilai'];
                        ${'nilai'.$i}=$jawaban['nilai'];
                      } else {
                        ${'nilai'.$i} = 0 ;
                        echo '-';
                      }
                    ?>
                  </td>
                    <?php
                      if (${'nilai'.$i} > 0) {
                    ?>
                    <td><a type="button" class="btn btn-info btn-sm" target="_blank" href="<?= base_url("assets/img/").$t->kunci; ?>">Pembahasan</a></td>
                    <?php
                      } else {
                    ?>
                    <td>-</td>
                  <?php } ?>
                </tr>

                <?php $i++;} ?>
                
                <?php
                  $no = 1;
                  $sudah = 0;
                  foreach ($angket as $a):
                    $jawabanAngket = $this->db->get_where('el_jawaban_angket', ['angket_id' => $a->id, 'siswa_id' => $data['user']['id']])->row_array();
                    if ($jawabanAngket) {
                      $status = 'Sudah Mengisi Angket';
                      $aksi = 0;
                      $sudah++;
                    } else {
                      $status = 'Belum Mengisi Angket';
                      $aksi = 1;
                    }
                ?>
                

                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $a->judul; ?></td>
                  <td><?= $status; ?></td>
                  <td>-</td>
                  <td>-</td>
                  <td>-</td>
                </tr>

                <?php $i++; ?>
                <?php endforeach ?>

                <tr>
                  <th scope="row"></th>
                  <td colspan="3">Nilai Akhir</td>
                  <td><?php $nilai = ($nilai1*0.1)+($nilai2*0.2)+($nilai3*0.2)+($nilai4*0.2)+($nilai5*0.3);
                  if ($nilai == 0) {
                     echo "";
                   } else { echo $nilai; } ?></td>
                </tr>
                <tr>
                  <th scope="row"></th>
                  <td colspan="2"><span style="font-style: italic; font-weight: bold;">Level Statistical Reasoning</span></td>
                  <td colspan="2"><span style="font-style: italic; font-weight: bold;">
                    <?php
                      if ($nilai5 == 0) {
                        echo "-";
                      }
                      elseif ($nilai5<=16) {
                         echo "Level 1 (Idiosyncratic reasoning)";
                       }
                      elseif ($nilai5<=45) {
                         echo "Level 2 (Verbal reasoning)";
                       }
                      elseif ($nilai5<=71) {
                        echo "Level 3 (Transitional reasoning)";
                      }
                      elseif ($nilai5<=84) {
                        echo "Level 4 (Procedural reasoning)";
                      }
                      else {
                        echo "Level 5 (Integrated reasoning)";
                      }
                    ?>
                  </span></td>
                  <?php
                      if ($nilai5 != 0) {
                    ?>
                    <td><a type="button" class="btn btn-info btn-sm" target="_blank" href="<?= base_url("assets/img/keterangan level.pdf"); ?>">Keterangan</a></td>
                    <?php
                      } else {
                    ?>
                    <td>-</td>
                  <?php } ?>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
            <p>Hadjar, I. (2019). Statistik untuk Ilmu Pendidikan, Sosial dan Humaniora (Nita (ed.); Pertama). PT. Remaja Rosdakarya.</p>
            <p>Mustafa, Z. (1992). Pengantar Statistik Deskriptif (2nd ed.). Ghalia Indonesia.</p>
            <p>Riduwan. (2014). Pengantar Statistika Sosial (Priswanto (ed.); Cetakan ke). Alfabeta.</p>
          </div>
        </div>
    </div>
</div>


   <br>


    <!-- Start Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <!-- End Animate On Scroll -->

