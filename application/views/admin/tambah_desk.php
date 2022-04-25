<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="">
            <div class="card card-success">
                <div class="col-md-12 text-center">
                    <p class="registration-title font-weight-bold display-4 mt-4"
                        style="color:black; font-size: 50px;">
                        Tambah Deskripsi Angket</p>
                    <p style="line-height:-30px;margin-top:-20px;">Silahkan isi deskripsi angket dibawah ini!</p>
                    <hr>
                </div>
                <div id="detail" class="card-body">
                    <form method="POST" action="<?=base_url('admin/input_desk')?>">
                            <h3>Judul:
                                <br>
                                <?php
                                    echo $angket->judul;
                                ?>
                            </h3>
                        <input type="hidden" name="id" id="id" value="<?= $angket->id; ?>">
                        <div class="form-group">
                            <label for="mytextarea">Deskripsi:</label>
                            <textarea class="form-control txtarea" name="konten" id="mytextarea" rows="100">
                                <?php
                                    $key = array_search(0, array_column($isi, 'nomor_id'));
                                    if ($key === false) {
                                        echo "";
                                    } else {
                                        $desk = $isi[$key]->pertanyaan;
                                        echo $desk;
                                    } 
                                ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg btn-block">
                                Ubah Data Deskripsi
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