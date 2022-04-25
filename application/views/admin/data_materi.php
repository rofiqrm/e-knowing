<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;">Management Data Materi E-Module Statistika</h2>
                    <hr>
                    <p class="card-text"> Jumlah Materi yang terdata di E-Module ini sekarang adalah 
                        <span class="font-weight-bold" style="color:black;">
                            <?php echo $this->db->count_all('el_materi'); ?>
                         Materi.</span>
                     Materi dapat ditambah oleh admin.</p>
                    <a href="<?=base_url('admin/tambah_materi')?>" class="btn btn-primary">Tambah Data Materi</a>
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
                                <th scope="col">Nama Bagian</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

foreach ($user as $u) {
?>
                            <tr class="text-center">

                                <th scope="row">
                                    <?php echo $u->id ?>
                                </th>

                                <td>
                                    <?php
                                        $mapel = $u->mapel_id;
                                        $data['matkul'] = $this->db->get_where('el_mapel', ['id' => $mapel])->row_array();
                                        echo $data['matkul']['nama'];
                                    ?>
                                </td>

                                <td>
                                    <?= $u->judul; ?>
                                </td>

                                <td class="text-center">
                                    <a href="#" data-toggle="modal" data-target="#ModalMateri<?php echo $u->id; ?>" class="btn btn-success">Lihat Materi</a>

                                    <a href="<?php echo site_url('admin/update_materi/' . $u->id); ?>"
                                        class="btn btn-info">Edit</a>

                                    <a href="<?php echo site_url('admin/delete_materi/' . $u->id); ?>"
                                        class="btn btn-danger remove">Delete</a>
                                </td>

                            </tr>
                            <?php
}
?>
                        </tbody>
                    </table>
                    <p class="small font-weight-bold">Sebelum mengupload file, harus terlebih dahulu
                        melakukan config max_upload di php.ini</p>
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

<?php foreach ($user as $m) { ?>
<!-- Start Login Modal -->
<div class="modal fade" id="ModalMateri<?php $id=$m->id; echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-dark font-weight-bold" style="color:#212529 !important;"
                    id="exampleModalCenterTitle">
                      <?php echo $m->judul; ?>
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" style="font-size: 16px; color: black;">
                  <br>
                  <?php echo $m->konten; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Login Modal -->
<?php } ?>
<script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>