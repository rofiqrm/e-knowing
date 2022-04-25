    <!-- Start Greetings Card -->
    <div class="container">
        <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400"
            style="width: 100%; border-radius:10px;">
            <div class="row" style="color: black; font-family: 'poppins';">
                <div class="col-md-12 mt-1">
                    <h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down"
                        data-aos-duration="1400">E-Module Statistika</h1>
                    <p style="font-size: 18px">Hello, Selamat Datang 
<?php
$data['user'] = $this->db->get_where('el_siswa', ['email' =>
    $this->session->userdata('email')])->row_array();
echo $data['user']['nama'];
?>
                    ! Ini merupakan halaman menu utama E-Module Statistika. Silahkan pilih bagian yang akan kamu pelajari. Selamat Belajar!</p>
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

    <br>


    <!-- Start Class Card -->
    <div class="container">
        <div class="row mt-4 mb-5 justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-4 mb-2 d-flex justify-content-center " data-aos-duration="1900"
                        data-aos="fade-right">
                        <a href="<?=base_url('user/pendahuluan')?>">
                            <div class="card-kelas text-center">
                                <img src="<?=base_url('assets/')?>img/img4.jpg" style="object-fit: cover;"
                                    class="card-img-top img-fluid" alt="...">
                                <h4 style="text-align: center; color: green; margin: 10px 0px; padding-bottom: 10px;">Pendahuluan</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 mb-2 d-flex justify-content-center " data-aos-duration="1900"
                        data-aos="fade-down">
                        <a href="<?=base_url('user/penyajian')?>">
                            <div class="card-kelas">
                                <img src="<?=base_url('assets/')?>img/img5.jpg" class="card-img-top" alt="...">
                                <h4 style="text-align: center; color: blue; margin: 10px 0px; padding-bottom: 10px;">Penyajian</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 mb-2 d-flex justify-content-center" data-aos-duration="1900"
                        data-aos="fade-left">
                        <a href="<?=base_url('user/penutup')?>">
                            <div class="card-kelas">
                                <img src="<?=base_url('assets/')?>img/img3.jpg" class="card-img-top" alt="...">
                                <h4 style="text-align: center; color: green; margin: 10px 0px; padding-bottom: 10px;">Penutup</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Class Card -->


    <br>


    <!-- Start Animate On Scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <!-- End Animate On Scroll -->