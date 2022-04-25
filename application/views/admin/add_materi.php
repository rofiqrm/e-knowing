<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="">
            <div class="card card-success">
                <div class="col-md-12 text-center">
                    <p class="registration-title font-weight-bold display-4 mt-4"
                        style="color:black; font-size: 50px;">
                        Tambah Materi</p>
                    <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data-data yang diperlukan
                        dibawah </p>
                    <hr>
                </div>
                <div id="detail" class="card-body">
                    <form method="POST" action="<?=base_url('admin/input_materi')?>">
                        <div class="form-group">
                            <label for="judul">Judul Materi:</label>
                            <input id="judul" type="text"
                                class="form-control" name="judul">
                            <?= form_error('email', '<small class="text-danger">', '</small>');?>
                            <div class="invalid-feedback"></div>

                            <label for="bagian">Nama Bagian: </label>
                            <select id="bagian" name="bagian" class="form-control">
                                <?php foreach ($mapel as $u) { ?>
                                <option value="<?= $u->id; ?>">
                                    <?php
                                        echo $u->nama;
                                    ?>
                                </option>
                                <?php } ?>      
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mytextarea">Konten</label>
                            <textarea class="form-control txtarea" name="konten" id="mytextarea" rows="100">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg btn-block">
                                Tambah Data Materi
                            </button>
                        </div>
                    </form>
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