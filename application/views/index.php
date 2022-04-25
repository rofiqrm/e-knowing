<!--================Home Banner Area =================-->
<section class="home_banner_area" style="margin-top: 71px">
    <div class="banner_inner d-flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="banner_content text-center" style="color: black;">
                <h3>Selamat datang di E-Module Statistika</h3>
                <p>Dengan E-Module ini kemudahan kegiatan belajar mengajar dapat terpenuhi. Para mahasiswa dapat
                    belajar meski banyak halangan atau rintangan. Pembelajaran Terstruktur dan Efektif! Nikmati kemudahan belajar dan materi terlengkap!</p>
                <a class="main_btn" href="#" data-toggle="modal" data-target="#exampleModalCenter">Masuk</a>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!-- Start Login Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-dark font-weight-bold" style="color:#212529 !important;"
                    id="exampleModalCenterTitle">
                    E-Module Statistika - Masuk Sekarang</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <br>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img src="<?=base_url('assets/');?>img/modal-login-2.png"
                                class="img-fluid img-responsive mx-auto " style="height: 350px;">
                        </div>
                        <div class=" col-md-6">
                            <form action="<?=base_url('welcome/validateLogin')?>" method="post">
                                <div class="form-group">
                                    <label class="label-font" for="
                                        exampleFormControlInput1">
                                        Email</label>
                                    <input type="text" value="<?=set_value('email');?>" class="form-control"
                                        name="email" autocomplete="off" id="email"
                                        placeholder="Masukan email mu disini ..">
                                        <small class="text-danger"><?=$this->session->flashdata('validateLoginFalse')["email"];?></small>
                                </div>
                                <div class="form-group">
                                    <label class="label-font" for="
                                        exampleFormControlInput1">
                                        Password</label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        placeholder="Masukan password mu disini ..">
                                    <small class="text-danger"><?=$this->session->flashdata('validateLoginFalse')["password"];?></small>
                                </div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Ingat saya.
                                    </label>
                                </div>
                                <p class="terms">Dengan login anda
                                    menyetujui
                                    <i>privasi dan persyaratan ketentuan
                                        hukum kami </i> .
                                    Belum punya akun? Silakan menghubungi dosen statistika kalian.</a>
                                </p>
                                <button class="btn btn-block font-weight-bold"
                                    style="background-color: #4dbf1c;color:white;font-size:18px;">Login
                                    Sekarang!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Login Modal -->