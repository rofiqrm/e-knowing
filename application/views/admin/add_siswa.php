<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="">
            <div class="card card-success">
                <div class="col-md-12 text-center">
                    <p class="registration-title font-weight-bold display-4 mt-4"
                        style="color:black; font-size: 50px;">
                        Tambah Siswa </p>
                    <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data-data yang diperlukan
                        dibawah </p>
                    <hr>
                </div>
                <div class="container-fluid" style="font-size: 16px; color: black;">
            <h1 align="center">Form Profil Siswa</h1>
            <div class="row justify-content-center">
                <div class="col-6">
                    <?php echo form_open('admin/add_siswa', array('id' => 'profileForm'))?>
                        
                        <div class="form-group">
                            <label>Nama Siswa:</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" />
                            <?php echo form_error('nama', '<div class="error"  style="font-color: red;">', '</div>')?>
                        </div>
                        <div class="form-group">
                            <label>NIM:</label>
                            <input type="number" name="nim" id="nim" class="form-control" placeholder="Nomor Induk" />
                            <?php echo form_error('nim', '<div class="error" style="font-color: red;">', '</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Alamat Email" />
                            <?php echo form_error('email', '<div class="error" style="font-color: red;">', '</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Input Password" />
                            <?php echo form_error('password', '<div class="error" style="font-color: red;">', '</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Ulangi Password:</label>
                            <input type="password" name="conf_pass" id="conf_pass" class="form-control" placeholder="Input Ulang Password" />
                            <?php echo form_error('conf_pass', '<div class="error" style="font-color: red;">', '</div>')?>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin:</label>
                            <input type="text" name="jk" id="jk" class="form-control" placeholder="Jenis Kelamin" />
                            <?php echo form_error('jk', '<div class="error">', '</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Tahun Masuk:</label>
                            <input type="number" name="tahun" id="tahun" class="form-control" placeholder="Tahun Masuk" />
                            <?php echo form_error('tahun', '<div class="error">', '</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Alamat:</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap" />
                            <?php echo form_error('alamat', '<div class="error">', '</div>')?>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
                
            </div>
            <br>
        </div>
    </section>
</div>
<!-- End Main Content -->

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'mytextarea', {
        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML'
    } );

</script>