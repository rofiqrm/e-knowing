<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;"><?= $angket->judul; ?></h2>
                    <hr>
                    <p class="card-text"> Jumlah Pernyataan yang terdata di Angket ini sekarang adalah 
                        <span class="font-weight-bold" style="color:black;">
                            <?php
                                    $key = array_search(0, array_column($isi, 'nomor_id'));
                                    if ($key === false) {
                                        $banyak = count($isi);
                                        echo $banyak;
                                    } else {
                                        $banyak = count($isi)-1;
                                        echo $banyak;
                                    }
                                ?>
                         Pernyataan.</span>
                     Pernyataan dapat diedit dan ditambah oleh admin.</p>
                    <a href="#" data-toggle="modal" data-target="#ModalTambah" class="btn btn-primary">Tambah Pernyataan</a>
                </div>
            </div>
        </div>
        <div class="row" style="overflow: scroll">
            <div class="col-md-12">
                <div class="container bg-white p-4"
                    style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                    <table id="example" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nomor</th>
                                <th scope="col" width="70%">Pernyataan</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            foreach ($isi as $u) {
                                if ($u->nomor_id == 0) {
                            continue;
                          }
                        ?>
                        <tr>

                            <td scope="row">
                                <?php echo $u->nomor_id ?>
                            </td>

                            <td>
                                <?= $u->pertanyaan; ?>
                            </td>

                            <td class="text-center">
                                <a href="#" data-toggle="modal" data-target="#ModalMateri<?php echo $u->id; ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href='<?php echo base_url('admin/delete_pernyataan/').$u->id ;?>' onClick='javascript:return confirm(\"Are you sure to Delete?\")' class="btn btn-danger remove btn-sm">Delete</a>

                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
<!-- End Main Content -->


<!-- Start Sweetalert -->

<?php if ($this->session->flashdata('success-edit')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Data Materi Telah Dirubah!',
    text: 'Selamat data berubah!',
    showConfirmButton: false,
    timer: 2500
})
</script>
<?php endif;?>

<?php if ($this->session->flashdata('user-delete')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Data Materi Telah Dihapus!',
    text: 'Selamat data telah Dihapus!',
    showConfirmButton: false,
    timer: 2500
})
</script>
<?php endif;?>

<?php if ($this->session->flashdata('success-reg')): ?>
<script>
Swal.fire({
    icon: 'success',
    title: 'Data Materi Telah Ditambah!',
    text: 'Selamat data telah Ditambah!',
    showConfirmButton: false,
    timer: 2500
})
</script>
<?php endif;?>

<!-- End Sweetalert -->

<?php foreach ($isi as $m) { ?>
<!-- Start Login Modal -->
<div class="modal fade" id="ModalMateri<?php $id=$m->id; echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-dark font-weight-bold" style="color:#212529 !important;"
                    id="exampleModalCenterTitle">
                      Ubah Pernyataan <?php echo $m->nomor_id; ?>
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?=base_url('admin/pernyataan_edit')?>">
                    <div class="form-group">
                        <label for="judul">Pernyataan:</label>
                        <input type="hidden" name="id" id="id" value="<?= $m->id ?>">
                        <input id="judul" type="text"
                            class="form-control" name="judul" value="<?= $m->pertanyaan ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">
                            Ubah!
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- End Login Modal -->

<!-- Start Login Modal -->
<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-dark font-weight-bold" style="color:#212529 !important;"
                    id="exampleModalCenterTitle">
                      Tambah Pernyataan
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?=base_url('admin/add_pernyataan')?>">
                    <div class="form-group">
                        <label for="judul">Pernyataan:</label>
                        <input type="hidden" name="id" id="id" value="<?= $angket->id ?>">
                        <input type="hidden" name="nomor" value="<?php
                                    $key = array_search(0, array_column($isi, 'nomor_id'));
                                    if ($key === false) {
                                        $banyak = count($isi)+1;
                                        echo $banyak;
                                    } else {
                                        $banyak = count($isi);
                                        echo $banyak;
                                    }
                                ?>">
                        <input id="judul" type="text"
                            class="form-control" name="judul">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">
                            Tambah!
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
