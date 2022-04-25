<!-- Start Greeting Cards -->
<div class="container">
    <div class="bg-white mx-auto p-4 buat-text" data-aos="fade-down" data-aos-duration="1400"
        style="width: 100%; border-radius:10px;">
        <div class="row" style="color: black; font-family: 'poppins';">
            <div class="col-md-12 mt-1">
                <h1 class="display-4" style="color: black; font-family:'poppins';" data-aos="fade-down"
                    data-aos-duration="1400">Pendahuluan.
                </h1>
                <p>Hello 
                    <?php
                        $data['user'] = $this->db->get_where('el_siswa', ['email' =>
                            $this->session->userdata('email')])->row_array();
                        echo $data['user']['nama'];
                        ?>!
                Ini merupakan halaman Pendahuluan. Pada halaman ini terdapat beberapa bagian sebagai berikut:</p>
                <ol>
                    <li>Deskripsi Singkat</li>
                    <li>Manfaat</li>
                    <li>Urutan Bahasan Materi</li>
                    <li>Petunjuk Penggunaan</li>
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
            <a class="nav-link active" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1" aria-selected="true"><i class="fa fa-bar-chart"></i> Deskripsi Singkat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2" aria-selected="false"><i class="fa fa-certificate "></i> Manfaat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-3-tab" data-toggle="pill" href="#pills-3" role="tab" aria-controls="pills-3" aria-selected="false"><i class="fa fa-list-ol"></i> Urutan Bahasan Materi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-4-tab" data-toggle="pill" href="#pills-4" role="tab" aria-controls="pills-4" aria-selected="false"><i class="fa fa-list-alt"></i> Petunjuk Penggunaan</a>
          </li>
        </ul>
        <hr>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
            <?php $data['materi'] = $this->db->get_where('el_materi', ['id'=> '1'])->row_array();
            echo $data['materi']['konten']; ?>
          </div>
          <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
           <?php $data['materi'] = $this->db->get_where('el_materi', ['id'=> '2'])->row_array();
            echo $data['materi']['konten']; ?>
          </div>
          <div class="tab-pane fade" id="pills-3" role="tabpanel" aria-labelledby="pills-3-tab">
           <?php $data['materi'] = $this->db->get_where('el_materi', ['id'=> '4'])->row_array();
            echo $data['materi']['konten']; ?>
          </div>
          <div class="tab-pane fade" id="pills-4" role="tabpanel" aria-labelledby="pills-4-tab">
            <?php $data['materi'] = $this->db->get_where('el_materi', ['id'=> '5'])->row_array();
            echo $data['materi']['konten']; ?>
          </div>
        </div>
    </div>
</div>

<!-- Start Animate On Scroll -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>
<!-- End Animate On Scroll -->