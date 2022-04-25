<!-- Start Greetings Card -->
<div class="container">
    <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400" style="width: 100%; border-radius:10px;">
        <div class="row" style="color: black; font-family: 'poppins';">
            <div class="col-md-12 mt-1">
                <h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down"
                    data-aos-duration="1400">Materi Pembelajaran.</h1>
                <p style="font-size: 18px">Hello, Selamat Datang 
                <?php
                $data['user'] = $this->db->get_where('el_siswa', ['email' =>
                $this->session->userdata('email')])->row_array();
                echo $data['user']['nama'];
                ?>!
                Ini merupakan halaman materi pembelajaran E-Module Statistika. Silahkan pilih materi yang akan kamu pelajari. Selamat Belajar!</p>
                <hr>
                <h4 style="line-height: 4px;" data-aos="fade-down" data-aos-duration="1700"><?php
                $data['user'] = $this->db->get_where('el_siswa', ['email' =>
                $this->session->userdata('email')])->row_array();
                echo $data['user']['nama'];
                ?> - Students</h4>
            </div>
        </div>
    </div>
</div>
<!-- End Greetings Card -->


    <!-- Start Lesson Card -->
    <div class="container">
        <div class="row mt-4 mb-5">
            <div class="col-md-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-right">
                <a href="<?=base_url('materi/pertemuan1')?>">
                    <div class="card-kelas">
                        <img src="<?=base_url('assets/')?>img/img1.jpg" class="card-img-top" alt="...">
                        <h4 style="text-align: center; color: green; margin: 10px 0px; padding-bottom: 10px;">Materi Prasyarat</h4>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-down">
                <?php if ($data['user']['progres'] >= 2): ?>
                    <a href="<?=base_url('materi/pertemuan2')?>">
                <?php else: ?>
                    <a href="#" class="dangers">
                <?php endif; ?>
                    <div class="card-kelas">
                        <img src="<?=base_url('assets/')?>img/img3.jpg" class="card-img-top" alt="...">
                        <h4 style="text-align: center; color: green; margin: 10px 0px; padding-bottom: 10px;">Pertemuan 2</h4>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-left">
                <?php if ($data['user']['progres'] >= 3): ?>
                    <a href="<?=base_url('materi/pertemuan3')?>">
                <?php else: ?>
                    <a href="#" class="dangers">
                <?php endif; ?>
                    <div class="card-kelas">
                        <img src="<?=base_url('assets/')?>img/img4.jpg" class="card-img-top" alt="...">
                        <h4 style="text-align: center; color: green; margin: 10px 0px; padding-bottom: 10px;">Pertemuan 3</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Lesson Card 2 -->
    <div class="container">
        <div class="row mt-4 mb-5 justify-content-center">
            <div class="col-md-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-right">
                <?php if ($data['user']['progres'] >= 4): ?>
                    <a href="<?=base_url('materi/pertemuan4')?>">
                <?php else: ?>
                    <a href="#" class="dangers">
                <?php endif; ?>
                    <div class="card-kelas">
                        <img src="<?=base_url('assets/')?>img/img6.jpg" class="card-img-top" alt="...">
                        <h4 style="text-align: center; color: red; margin: 10px 0px; padding-bottom: 10px;">Pertemuan 4</h4>
                    </div>
                </a>
            </div>
            <div class="col-md-4 mb-2 d-flex justify-content-center" data-aos-duration="1900" data-aos="fade-down">
                <?php if ($data['user']['progres'] >= 5): ?>
                    <a href="<?=base_url('materi/pertemuan5')?>">
                <?php else: ?>
                    <a href="#" class="dangers">
                <?php endif; ?>
                    <div class="card-kelas">
                        <img src="<?=base_url('assets/')?>img/img7.jpg" class="card-img-top" alt="...">
                        <h4 style="text-align: center; color: red; margin: 10px 0px; padding-bottom: 10px;">Tes Akhir</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- End Lesson Card -->


    <br>


    <!-- Start Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <script type="text/javascript">
        $(".dangers").click(function(){
            Swal.fire({
                type: 'error',
                title: 'Kamu belum mengerjakan tugas sebelumnya!',
                text: 'Kerjakan dulu tugas di pertemuan sebelumnya sebelum masuk ke pertemuan ini!',
            })
        });
    </script>

    <!-- End Animate On Scroll -->