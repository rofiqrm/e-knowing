<!-- Start Greeting Cards -->
<div class="container">
    <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400"
        style="width: 100%; border-radius:10px;">
        <div class="row" style="color: black; font-family: 'poppins';">
            <div class="col-md-12 mt-1">
                <h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down"
                    data-aos-duration="1400">Bagian Akhir.
                </h1>
                <p>Hello 
                    <?php
                        $data['user'] = $this->db->get_where('el_siswa', ['email' =>
                            $this->session->userdata('email')])->row_array();
                        echo $data['user']['nama'];
                        ?>!
                Ini adalah bagian terakhir dalam rangkaian pembelajaran ini.</p>
                <p>Pada bagian akhir ini kalian diminta untuk mengisi angket dan juga Tes Akhir <em>Statistical Reasoning</em>. Kalian dapat mengerjakan Tes Akhir setelah mengisi angket. Silakan klik link di bawah ini untuk mulai mengerjakan!</p>
                <hr>
            </div>
        </div>

<?php
  $tugas_id = $tugas->id;
  $user_id = $data['user']['id'];
  $jawaban = $this->db->get_where('el_nilai_tugas', ['tugas_id' => $tugas_id, 'siswa_id' => $user_id])->row_array();
  $nilai = $jawaban['nilai'];
  if ($jawaban) { 
    $nama_file = $jawaban['jawaban'];
    ?>
    <div class="container">
      <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;"> 
        <h3>Anda telah mengisi angket dan mengerjakan Tes Akhir Statistical Reasoning.</h3>
        <a type="button" class='btn btn-primary' href="<?= base_url('assets/jawaban/').$nama_file; ?>" target="blank">Lihat File Jawaban</a>
        <?php if($nilai >0) {
          echo "";
        } else { ?>
          <button class='btn btn-primary' data-toggle='modal' data-target='#show'>Edit Jawaban</button>
        <?php }  ?>
      </div>
    </div>
<?php 
  } else { ?>
      <div class="container">
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Judul Tugas</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>

              <?php
                $no = 1;
                $sudah = 0;
                foreach ($angket as $a):
                  $jawabanAngket = $this->db->get_where('el_jawaban_angket', ['angket_id' => $a->id, 'siswa_id' => $user_id])->row_array();
                  if ($jawabanAngket) {
                    $status = 'Sudah Diisi';
                    $aksi = 0;
                    $sudah++;
                  } else {
                    $status = 'Belum Diisi';
                    $aksi = 1;
                  }
              ?>
              
                <tr>
                  <th scope="row"><?php echo $no; ?></th>
                  <td><?= $a->judul; ?></td>
                  <td><?= $status; ?></td>
                  <td>
                    <?php if ($aksi == 1): ?>
                      <button class='btn btn-secondary btn-sm' data-toggle='modal' data-target='#show<?= $a->id; ?>'>Isi Angket</button>
                    <?php else: ?>
                      -
                    <?php endif ?>
                  </td>
                </tr>
              <?php $no++; ?>
              <?php endforeach ?>
            </tbody>
            <thead class="thead-light">
              <tr>
                <th scope="col"><?= $no; ?></th>
                <th scope="col">Tes Statistical Reasoning</th>
                <th scope="col">Belum Dikerjakan</th>
                <th scope="col">
                  <?php
                    if ($sudah+1 < $no) {
                      echo "Isi Angket Terlebih Dahulu!";
                    } else {
                  ?>
                  <button class='btn btn-primary btn-sm' data-toggle='modal' data-target='#show'>Mulai Tes.</button>
                <?php } ?>
                </th>
              </tr>
            </thead>
          </table>
      </div>
<?php     
  }
?>
  </div>
</div>
<!-- End Greeting Cards -->

<!-- Start Modal Evaluasi -->
<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-dark font-weight-bold" style="color:#212529 !important;"
                    id="exampleModalCenterTitle">
                      Tes Akhir Statistical Reasoning
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" style="font-size: 16px; color: black;">
                  <br>
                  <?php
                    echo $tugas->info;
                  ?>
                </div>
                <div class="container-fluid">
                  <p>Silakan tuliskan jawaban anda di kertas kemudian upload jawaban tersebut dengan menekan tombol di bawah ini!</p>
                </div>
                <form method="post" enctype="multipart/form-data" action="<?=base_url('materi/upload')?>">
                  <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                  <input type="hidden" name="tugas_id" value="<?php echo $tugas_id; ?>">
                  <div class="form-group">
                      <div class="input-group">
                          <div class="custom-file">
                              <input required type="file" name="jawaban" required
                                  class="custom-file-input" id="inputGroupFile01"
                                  aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01">Upload Jawaban Disini</label>
                          </div>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-block btn-success">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Evaluasi -->

<!-- Start Modal Angket -->
<?php foreach ($angket as $angket): ?>
<?php
  $id = $angket->id;
  $isi = $this->m_angket->ambil_data($id);  
?>
<div class="modal fade" id="show<?= $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-dark font-weight-bold" style="color:#212529 !important;"
                    id="exampleModalCenterTitle"><?= $angket->judul; ?>
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" style="font-size: 16px; color: black;">
                  <br>
                  <h2>Petunjuk Pengisian Angket</h2>
                  <?php
                    $key = array_search(0, array_column($isi, 'nomor_id'));
                    $desk = $isi[$key]->pertanyaan;
                    echo $desk;
                  ?> 
                </div>
                <form class="form-horizontal" action="<?php echo base_url()?>materi/form_validation" method="post">
                  <input type="hidden" name="user_id" value="<?php echo $data['user']['id'] ?>">
                  <input type="hidden" name="angket_id" value="<?php echo $id ?>">
                    <table style="width:100%; border: 1px; border-color: black;">
                          <tr>
                            <th style="border: 1px solid black;text-align: center; padding: 2px;">No.</th>
                            <th style="border: 1px solid black; padding: 2px;">Pernyataan</th>
                            <th style="border: 1px solid black;text-align: center;width: 125px;">Sangat Setuju</th>
                            <th style="border: 1px solid black;text-align: center;width: 125px;">Setuju</th>
                            <th style="border: 1px solid black;text-align: center;width: 125px;">Tidak Setuju</th>
                            <th style="border: 1px solid black;text-align: center;width: 125px;">Sangat Tidak Setuju</th>
                          </tr>
                      <?php  
                      foreach($isi as $row)
                        {
                          if ($row->nomor_id == 0) {
                            continue;
                          }
                      ?>  
                          <tr>
                            <td style="border: 1px solid black;text-align: center; padding: 2px;"><?php echo $row->nomor_id; ?></td>
                            <input type="hidden" name="nomor<?php echo $row->nomor_id; ?>[]" value="<?php echo $row->nomor_id; ?>">
                            <td style="border: 1px solid black; padding: 2px;"><?php echo $row->pertanyaan; ?></td>
                            <td style="border: 1px solid black;text-align: center;">
                              <input type="radio" name="nomor<?php echo $row->nomor_id; ?>[]" id="nomor<?php echo $row->nomor_id; ?>[]" value="SS" required>
                            </td>
                            <td style="border: 1px solid black;text-align: center;">
                              <input type="radio" name="nomor<?php echo $row->nomor_id; ?>[]" id="nomor<?php echo $row->nomor_id; ?>[]" value="S">
                            </td>
                            <td style="border: 1px solid black;text-align: center;">
                              <input type="radio" name="nomor<?php echo $row->nomor_id; ?>[]" id="nomor<?php echo $row->nomor_id; ?>[]" value="TS">
                            </td>
                            <td style="border: 1px solid black;text-align: center;">
                              <input type="radio" name="nomor<?php echo $row->nomor_id; ?>[]" id="nomor<?php echo $row->nomor_id; ?>[]" value="STS">
                            </td>
                          </tr>
                      <?php }
                      ?>
                    </table>
                    <hr>
                    <button type="submit" class="btn btn-block btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>
<!-- End Modal Angket -->

<!-- Start Animate On Scroll -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>
<script>
    $('#inputGroupFile01').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
<!-- End Animate On Scroll -->
