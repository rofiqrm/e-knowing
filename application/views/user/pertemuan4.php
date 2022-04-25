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
                Materi yang akan kita pelajari pada pertemuan keempat ini yaitu :</p>
                <p><a style="color: blue;" href="#" data-toggle="modal" data-target="#ModalMateri18">UKURAN PENYEBARAN DATA</a></p>
                <ul>
                  <li><a style="color: blue;" href="#" data-toggle="modal" data-target="#ModalMateri19">Rentang</a></li>
                  <li><a style="color: blue;" href="#" data-toggle="modal" data-target="#ModalMateri20">Rentang antar Kuartil</a></li>
                  <li><a style="color: blue;" href="#" data-toggle="modal" data-target="#ModalMateri21">Simpangan Kuartil</a></li>
                  <li><a style="color: blue;" href="#" data-toggle="modal" data-target="#ModalMateri22">Simpangan Rata-Rata</a></li>
                  <li><a style="color: blue;" href="#" data-toggle="modal" data-target="#ModalMateri23">Varians dan Simpangan Baku</a></li>
                  <li><a style="color: blue;" href="#" data-toggle="modal" data-target="#ModalMateri24">Koefisien variasi</a></li>
                  <li><a style="color: blue;" href="#" data-toggle="modal" data-target="#ModalMateri25">Angka Baku</a></li>
                </ul>
                <p>Agar lebih memahaminya silahkan pelajari dengan cara menyimak video pembelajaran dibawah ini ya!</p>
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
                    <br>
                    <br>
                    <a href="#" data-toggle="modal" data-target="#ModalMateri26">Download Rangkuman 4</a></li>
                    <p style="color: black !important;">Setelah menyaksikan video pembelajaran apakah anda dapat memahaminya?</p>
                    <p style="color: black; font-size: 20px !important;">Kemukakan pendapat anda pada kolom komentar ya</p>
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
  $nilai = $jawaban['nilai'];

  if ($jawaban) { 
    $nama_file = $jawaban['jawaban'];
    ?>
    <div class="container">
      <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;"> 
        <h3>Anda telah mengerjakan tugas ini!</h3>
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
      <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;"> 
        <button class='btn btn-primary' data-toggle='modal' data-target='#show'>Latihan 3</button>
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
