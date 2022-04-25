<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;">Management Data Angket E-Module Statistika</h2>
                    <hr>
                    <p class="card-text"> Jumlah Angket yang terdata di E-Module ini sekarang adalah 
                        <span class="font-weight-bold" style="color:black;">
                            <?php echo $this->db->count_all('el_angket'); ?>
                         Angket.</span>
                     Angket dapat ditambah oleh admin.</p>
                    <a href="<?=base_url('admin/tambah_angket')?>" class="btn btn-primary">Tambah Angket</a>
                </div>
            </div>
        </div>
        <div class="row" style="overflow: scroll">
            <div class="col-md-12">
                <div class="container bg-white p-4"
                    style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                    <table id="example" class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col">ID</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            foreach ($angket as $u) {
                        ?>
                        <tr class="text-center">

                            <td scope="row">
                                <?php echo $u->id ?>
                            </td>

                            <td>
                                <?= $u->judul; ?>
                            </td>

                            <td class="text-center">
                                <a href="<?=base_url('admin/tambah_desk/').$u->id;?>" class="btn btn-info btn-sm">Deskripsi Angket</a>
                                <a href="<?=base_url('admin/list_pernyataan/').$u->id;?>" class="btn btn-info btn-sm">List Pernyataan</a>
                                <a href="<?=base_url('admin/angket_jawab/').$u->id;?>" class="btn btn-warning btn-sm">Cek Jawaban Angket</a>

                                <a href="#" data-toggle="modal" data-target="#ModalMateri<?php echo $u->id; ?>" class="btn btn-success btn-sm">Ubah Judul</a>

                                <a href='<?php echo base_url('admin/delete_angket/').$u->id ;?>' onClick='javascript:return confirm(\"Are you sure to Delete?\")' class="btn btn-danger remove btn-sm">Delete</a>

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

<?php foreach ($angket as $m) { ?>
<!-- Start Login Modal -->
<div class="modal fade" id="ModalMateri<?php $id=$m->id; echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-dark font-weight-bold" style="color:#212529 !important;"
                    id="exampleModalCenterTitle">
                      Ubah Judul Angket: <?php echo $m->judul; ?>
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?=base_url('admin/angket_edit')?>">
                    <div class="form-group">
                        <label for="judul">Judul Angket:</label>
                        <input type="hidden" name="id" id="id" value="<?= $m->id ?>">
                        <input id="judul" type="text"
                            class="form-control" name="judul" value="<?= $m->judul ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">
                            Ubah Judul Angket
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- End Login Modal -->

<script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
