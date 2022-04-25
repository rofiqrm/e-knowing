<div class="container-fluid" style="font-size: 16px; color: black;">
    <h1 align="center">Form Profil Siswa</h1>
    <div class="row justify-content-center">
        <div class="col-6">
            <?php echo form_open('User/ubahProfil', array('id' => 'profileForm'))?>
                <div class="form-group">
                    <label>Nama Siswa:</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $detail->nama; ?>" />
                    <?php echo form_error('nama', '<div class="error">', '</div>')?>
                </div>
                <div class="form-group">
                    <label>NIM:</label>
                    <input type="number" name="nim" id="nim" class="form-control" placeholder="Nomor Induk" value="<?= $detail->nis; ?>"/>
                    <?php echo form_error('nim', '<div class="error">', '</div>')?>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Alamat Email" value="<?= $detail->email; ?>"/>
                    <?php echo form_error('email', '<div class="error">', '</div>')?>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin:</label>
                    <input type="text" name="jk" id="jk" class="form-control" placeholder="Jenis Kelamin" value="<?= $detail->jenis_kelamin; ?>" />
                    <?php echo form_error('jk', '<div class="error">', '</div>')?>
                </div>
                <div class="form-group">
                    <label>Tahun Masuk:</label>
                    <input type="number" name="tahun" id="tahun" class="form-control" placeholder="Tahun Masuk" value="<?= $detail->tahun_masuk; ?>" />
                    <?php echo form_error('tahun', '<div class="error">', '</div>')?>
                </div>
                <div class="form-group">
                    <label>Alamat:</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap" value="<?= $detail->alamat; ?>" />
                    <?php echo form_error('alamat', '<div class="error">', '</div>')?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Change Profile</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>

</div>