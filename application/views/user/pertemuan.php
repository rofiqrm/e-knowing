<!-- Start Greeting Cards -->
<div class="container">
    <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400"
        style="width: 100%; border-radius:10px;">
        <div class="row" style="color: black; font-family: 'poppins';">
            <div class="col-md-12 mt-1">
              <p><a href="<?=base_url('user/penyajian')?>">Kembali Ke Halaman Sebelumnya.</a></p>
                <h2 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down"
                    data-aos-duration="1400">Pertemuan <?= $pertemuan; ?>.
                </h2>
                <p>Hello 
                    <?php
                        $data['user'] = $this->db->get_where('el_siswa', ['email' =>
                            $this->session->userdata('email')])->row_array();
                        echo $data['user']['nama'];
                        ?>!
                Materi yang akan kita pelajari pada pertemuan kali ini adalah sebagai berikut.</p>
                <ol>
                  <?php foreach ($materi as $m) { ?>
                  <li><a href="#" data-toggle="modal" data-target="#ModalMateri<?php $id=$m->id; echo $id ?>"><?= $m->judul; ?></a></li>
                <?php } ?>
                </ol>
                <p>Silakan kalian pelajari materi tersebut secara berurutan dengan cara klik di judul materi yang ingin kalian pelajari.
                </p>
                <p>Jika terdapat materi yang masih belum dipahami atau ada pertanyaan lainnya silakan menggunakan fasilitas chat yang ada di bawah.</p>
                <p>Setelah mempelajari materi pada pertemuan ini, sebagai bahan evaluasi silakan klik tombol di bawah dan kerjakan soal yang ada kemudian upload jawaban kalian melalui fasilitas upload yang tersedia.</p>
                <hr>
            </div>
        </div>
    </div>
</div>
<!-- End Greeting Cards -->
<!-- Start Disqus Comment -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card komen w-150 border-0">
                <div class="card-body p-5" style="font-family: 'Poppins', sans-serif !important;">
                    <?php echo $video ?>
                    <h1 style="color: black; font-size:44px !important;">Apa komentarmu ?</h1>
                    <br>
                    <?php echo $disqus ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Disqus Comment -->

<?php
  $tugas_id = $tugas->id;
  $user_id = $data['user']['id'];
  $jawaban = $this->db->get_where('el_nilai_tugas', ['tugas_id' => $tugas_id, 'siswa_id' => $user_id])->row_array();

  if ($jawaban) { 
    $nama_file = $jawaban['jawaban'];
    ?>
    <div class="container">
      <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;"> 
        <h3>Anda telah mengerjakan tugas ini!</h3>
        <?php if ($tugas_id == 3) { ?>
          <a type="button" class='btn btn-primary' href="<?= base_url('user/penutup') ?>">Lihat Nilai</a>
        <?php } else { ?>
        <a type="button" class='btn btn-primary' href="<?= base_url('assets/jawaban/').$nama_file; ?>" target="blank">Lihat File Jawaban</a>
        <?php } ?>
      </div>
    </div>
<?php 
  } else { ?>
    <div class="container">
      <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;"> 
        <button class='btn btn-primary' data-toggle='modal' data-target='
          <?php
            if($pertemuan == 1){
              echo '#show1';
            } else {
              echo '#show';
            }
          ?>
        '>Evaluasi Pertemuan <?php echo $pertemuan; ?></button>
      </div>
    </div>
<?php     
  }
?>


<?php foreach ($materi as $m) { ?>
<!-- Start Login Modal -->
<div class="modal fade" id="ModalMateri<?php $id=$m->id; echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-dark font-weight-bold" style="color:#212529 !important;"
                    id="exampleModalCenterTitle">
                      <?php echo $m->judul; ?>
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" style="font-size: 16px; color: black;">
                  <br>
                  <?php echo $m->konten; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Login Modal -->
<?php } ?>

<!-- Start Modal Evaluasi -->
<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-dark font-weight-bold" style="color:#212529 !important;"
                    id="exampleModalCenterTitle">
                      Evaluasi Pertemuan Ke-<?php echo $pertemuan; ?>
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" style="font-size: 16px; color: black;">
                  <br>
                  <?php
                    $user_id = $data['user']['id'];
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
                              <label class="custom-file-label" for="inputGroupFile01">Upload
                                  Jawaban Disini</label>
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

<!-- Start Modal Evaluasi -->
<div class="modal fade" id="show1" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-dark font-weight-bold" style="color:#212529 !important;"
                    id="exampleModalCenterTitle">
                      Evaluasi Materi Prasyarat
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" style="font-size: 16px; color: black;">
                  <br>
                  <?php
                    $user_id = $data['user']['id'];
                  ?>
                </div>
                <div class="container-fluid">
                  <form method="post" enctype="multipart/form-data" action="<?=base_url('tugas/input_jawaban')?>">
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <input type="hidden" name="tugas_id" value="<?php echo $tugas_id; ?>">
                    <div class="form-group">
                      <p><strong>Soal 1:</strong></p>
                      <p>Semenjak awal tahun 2020, Indonesia di hadapi dengan musibah Covid19 yang mengakibatkan semua aspek kehidupan terhambat, salah satunya aspek transportasi kereta api. Pada awal tahun penumpang kelas eksekutif (1), bisnis (2) maupun ekonomi (3) turun hampir 89%.</p>
                      <p>Dari deskripsi diatas manakah yang paling tepat :</p>
                        <div>
                          <input name="soal1" required="required" type="radio" value="A" />&nbsp;89% termasuk skala nominal<br>
                          <input name="soal1" type="radio" value="B" />&nbsp;Tahun 2020 termasuk skala ordinal<br>
                          <input name="soal1" type="radio" value="C" />&nbsp;89% adalah skala rasio<br>
                          <input name="soal1" type="radio" value="D" />&nbsp;Kelas 1,2 dan 3 merupakan skala pengukuran ordinal<br>
                        </div>
                    </div>

                    <div class="form-group">
                      <p><strong>Soal 2</strong></p>
                      <p>Skala pengukuran yang hanya berupa simbol saja tidak menunjukkan bahwa yang satu lebih baik dari pada yang lainnya atau dengan kata lain tidak ada tingkatan merupakan definisi dari skala pengukuran &hellip;</p>
                      <div>
                        <p><input name="soal2" required="required" type="radio" value="A" />&nbsp;Rasio</p>
                        <p><input name="soal2" type="radio" value="B" />&nbsp;Ordinal</p>
                        <p><input name="soal2" type="radio" value="C" />&nbsp;Interval</p>
                        <p><input name="soal2" type="radio" value="D" />&nbsp;Nominal</p>
                      </div>
                    </div>

                      <p><strong>Perhatikan data berikut untuk menjawab soal 3,4,dan 5:</strong></p>
                        <table border="1" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td style="width:103px">
                              <p style="text-align:center"><strong>Data</strong></p>
                              </td>
                              <td style="width:142px">
                              <p style="text-align:center"><strong>Frekuensi</strong></p>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:103px">
                              <p style="text-align:center">10 &ndash; 14</p>
                              </td>
                              <td style="width:142px">
                              <p style="text-align:center">11</p>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:103px">
                              <p style="text-align:center">15 &ndash; 19</p>
                              </td>
                              <td style="width:142px">
                              <p style="text-align:center">12</p>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:103px">
                              <p style="text-align:center">20 &ndash; 24</p>
                              </td>
                              <td style="width:142px">
                              <p style="text-align:center">15</p>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:103px">
                              <p style="text-align:center">25 &ndash; 29</p>
                              </td>
                              <td style="width:142px">
                              <p style="text-align:center">13</p>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:103px">
                              <p style="text-align:center">30 - 34</p>
                              </td>
                              <td style="width:142px">
                              <p style="text-align:center">15</p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      <div class="form-group">
                        <p><strong>Soal 3</strong></p>
                        <p>Panjang kelas pada data diatas adalah &hellip;</p>
                        <div>
                          <p><input name="soal3" required="required" type="radio" value="A" />&nbsp;2</p>
                          <p><input name="soal3" type="radio" value="B" />&nbsp;3</p>
                          <p><input name="soal3" type="radio" value="C" />&nbsp;4</p>
                          <p><input name="soal3" type="radio" value="D" />&nbsp;5</p>
                        </div>
                    </div>

                    <div class="form-group">
                      <p><strong>Soal 4</strong></p>
                      <p>Banyak kelas pada data tersebut adalah &hellip;</p>
                      <div>
                        <p><input name="soal4" required="required" type="radio" value="A" />&nbsp;2</p>
                        <p><input name="soal4" type="radio" value="B" />&nbsp;3</p>
                        <p><input name="soal4" type="radio" value="C" />&nbsp;4</p>
                        <p><input name="soal4" type="radio" value="D" />&nbsp;5</p>
                      </div>
                    </div>

                    <div class="form-group">
                      <p><strong>Soal 5</strong></p>
                      <p>Tepi kelas atas dan bawah pada kelas ketiga berturut-turut adalah &hellip;</p>
                      <div>
                        <p><input name="soal5" required="required" type="radio" value="A" />&nbsp;15,5 dan 20,5</p>
                        <p><input name="soal5" type="radio" value="B" />&nbsp;35,5 dan 40,5</p>
                        <p><input name="soal5" type="radio" value="C" />&nbsp;19,5 dan 24,5</p>
                        <p><input name="soal5" type="radio" value="D" />&nbsp;19,5 dan 23,5</p>    
                      </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Evaluasi -->

<!-- Start Animate On Scroll -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>
<!-- End Animate On Scroll -->
<script>
    $('#inputGroupFile01').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
