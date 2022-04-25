<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;">Edit Data Materi</h2>
                    <hr>
                    <p class="card-text"> Edit data materi meliputi Nama Mapel dan Deskripsi Materi. Hanya deskripsi materi yang dapat diubah.
                    </p>
                    <a href="#detail" class="btn btn-primary">Saya paham dan ingin melanjutkan</a>
                </div>
            </div>
        </div>
        <div class="card card-success">
            <div class="col-md-12 text-center">
                <p class="registration-title font-weight-bold display-4 mt-4" style="color:black; font-size: 50px;">
                    Update Data Materi</p>
                <p style="line-height:-30px;margin-top:-20px;">Silahkan isi data data yang diperlukan dibawah </p>
                <hr>
            </div>
            <div class="card-body">
<?php foreach ($user as $u) { ?>
                <form method="POST" action="<?=base_url('admin/materi_edit')?>">
                    <input type="hidden" name="id" value="<?= $u->id ?>">
                    <div class="form-group">
                        <label for="judul">Judul :</label>
                        <input id="judul" type="text" value="<?= $u->judul ?>"
                            class="form-control" name="judul">
                        <?= form_error('email', '<small class="text-danger">', '</small>');?>
                        <div class="invalid-feedback"></div>

                        <label for="bagian">Nama Bagian: </label>
                        <select id="bagian" name="bagian" class="form-control">
                            <option value="<?= $u->mapel_id; ?>">
                                <?php
                                    $mapel = $u->mapel_id;
                                    $data['matkul'] = $this->db->get_where('el_mapel', ['id' => $mapel])->row_array();
                                    echo $data['matkul']['nama'];
                                ?>
                            </option>
<?php } ?>
                            
                            <?php foreach($mapel as $mk) { ?>
                            <option value="<?= $mk->id ?>">
                                <?= $mk->nama ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mytextarea">Konten</label>
                        <textarea class="form-control txtarea" name="konten"
                            id="mytextarea" rows="100">
                            <?=$u->konten?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block">
                            Update data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'mytextarea', {
        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML'
    } );

</script>