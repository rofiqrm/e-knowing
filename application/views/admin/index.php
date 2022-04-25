<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1 style="font-size: 27px; letter-spacing:-0.5px; color:black;">Dashboard | Halaman Utama</h1>
        </div>
        
        <div class="">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;">Tambah Materi?</h2>
                    <hr>
                    <p class="card-text">Klik tombol dibawah untuk menambah materi . Materi yang
                        ditambahkan, akan langsung terupload di database. Dan para siswa bisa
                        segera belajar! </p>
                    <a href="<?=base_url('admin/tambah_materi')?>" class="btn btn-primary">Tambah Materi</a>
                </div>
            </div>
        </div>
        <div class="">
            <div class="hero text-white hero-bg-image"
                data-background="<?=base_url('assets/')?>stisla-assets/img/unsplash/eberhard-grossgasteiger-1207565-unsplash.jpg">
                <div class=" hero-inner">
                    <h1>Selamat Datang, 
<?php
$data['user'] = $this->db->get_where('admin', ['email' =>
            $this->session->userdata('email')])->row_array();
$pengajar = $data['user']['pengajar_id'];
$data['nama'] = $this->db->get_where(
'el_pengajar',
['id' => $pengajar]
)->row_array();
echo $data['nama']['nama'];
?>!</h1>
                    <p class="lead">Di halaman admin E-Module Statistika.<br></p>
                    <div class="mt-4">
                        <a href="<?=base_url('admin/data_siswa')?>"
                            class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i>
                            Data Siswa</a>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- End Main Content -->