<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="col-md-12 bg-white p-3" id="detail"
            style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px;">
            <h1 class="font-weight-bold card-title text-center" style="color: black;">Profil Siswa</h1>
            <p class="text-center" style="line-height: 5px;">Berikut data detail yang terdapat di
                database. Silakan klik tombol edit untuk merubah data diri anda.</p>
            <hr>
            <table style="width: 100%" class="container text-center">
                <tbody>
                    <tr style="border-bottom: 0.5px solid #6c757d;">
                        <td rowspan="7">
                            <img src="<?=base_url() . 'assets/profile_picture/default.jpg'?>"
                            class="card-img-top  rounded-circle img-responsive" alt="...">
                        </td>
                        <td><span class="font-weight-bold">Nama Siswa :</span></td>
                        <td> <?=$detail->nama?></td>
                    </tr>
                    <tr style="border-bottom: 0.5px solid #6c757d;">
                        <td><span class="font-weight-bold">Nomor Induk : </span></td>
                        <td><?php echo $detail->nis; ?></td>
                    </tr>
                    <tr style="border-bottom: 0.5px solid #6c757d;">
                        <td><span class="font-weight-bold">Alamat Email :</span></td>
                        <td> <?=$detail->email?></td>
                    </tr>
                    <tr style="border-bottom: 0.5px solid #6c757d;">
                        <td><span class="font-weight-bold">Jenis Kelamin : </span></td>
                        <td><?php echo $detail->jenis_kelamin; ?></td>
                    </tr>
                    <tr style="border-bottom: 0.5px solid #6c757d;">
                        <td><span class="font-weight-bold">Tahun Masuk : </span></td>
                        <td><?php echo $detail->tahun_masuk; ?></td>
                    </tr>
                    <tr style="border-bottom: 0.5px solid #6c757d;">
                        <td><span class="font-weight-bold">Alamat : </span></td>
                        <td><?php echo $detail->alamat; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class=" container d-flex mt-5 justify-content-end">
                <a href="<?php echo base_url('user/ubahProfil'); ?>" class="btn btn-info ml-2">Edit Data Profil</a>
                <a class="btn btn-warning ml-2" href="<?php echo base_url('user/ubahPass'); ?>">Edit Password</a>   
                <a href="<?php echo base_url('user'); ?>" class="btn btn-danger ml-2">Kembali</a>
            </div>
        </div>
    </section>
</div>
<!-- End Main Content -->