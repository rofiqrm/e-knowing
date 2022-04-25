<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;">Management Jawaban Siswa E-Module Statistika</h2>
                    <hr>
                    <p class="card-text"> Jumlah Jawaban yang diupload di E-Module ini sekarang adalah 
                        <span class="font-weight-bold" style="color:black;">
                            <?php echo $this->db->count_all('el_nilai_tugas'); ?>
                         Tugas.</span>
                    </p>
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
                                <th scope="col">No.</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Jawaban</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">Option</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            $no = 1;
                            foreach ($jawaban as $u) {
                        ?>
                        <tr class="text-center">

                            <td scope="row">
                                <?php
                                    echo $no;
                                    $no++;
                                ?>
                            </td>
                            <td>
                                <?php
                                    $siswa_id = $u->siswa_id;
                                    $query1 = $this->db->get_where('el_siswa', array('id' => $siswa_id))->row();
                                    echo $query1->nama ;
                                ?>
                            </td>

                            <td>
                                <?php 
                                    $tugas_id = $u->tugas_id;
                                    $query2 = $this->db->get_where('el_tugas', array('id' => $tugas_id))->row();
                                    echo $query2->judul ;
                                ?>
                            </td>

                            <td>
                                <?= $u->jawaban; ?>
                            </td>

                            <td>
                                <?= $u->nilai; ?>
                            </td>

                            <td class="text-center">

                                <a target="blank" href="<?php echo site_url('assets/jawaban/' . $u->jawaban); ?>"
                                    class="btn btn-info">Lihat Jawaban</a>
                                
                                <a href="#" data-toggle="modal" data-target="#ModalMateri<?php echo $u->id; ?>" class="btn btn-success">Beri Nilai</a>

                                <!-- <a href="<?php echo site_url('admin/delete_materi/' . $u->id); ?>"
                                    class="btn btn-danger remove">Delete</a> -->
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

<?php foreach ($jawaban as $m) { ?>
<!-- Start Login Modal -->
<div class="modal fade" id="ModalMateri<?php $id=$m->id; echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title text-dark font-weight-bold" style="color:#212529 !important;"
                    id="exampleModalCenterTitle">
                    Berikan Nilai Untuk:
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid" style="font-size: 16px; color: black;">
                  <?php
                    $siswa_id = $m->siswa_id;
                    $query1 = $this->db->get_where('el_siswa', array('id' => $siswa_id))->row();
                    echo "Nama Siswa : ".$query1->nama ;
                    $tugas_id = $m->tugas_id;
                    $query2 = $this->db->get_where('el_tugas', array('id' => $tugas_id))->row();
                    echo "<br> Nama Tugas: ".$query2->judul ;
                  ?>
                  <br>
                </div>

                <form class="form-horizontal" action="<?php echo base_url()?>admin/nilai/ <?= $m->id; ?>" method="post">
                  <!-- <input type="hidden" name="id" value="<?php echo $m->id ?>"> -->
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Nilai: </span>
                      </div>
                      <input type="number" step="0.01" name="nilai" id="nilai" class="form-control" placeholder="Input Nilai Disini" aria-label="Input Nilai" aria-describedby="basic-addon2">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Catatan: </span>
                      </div>
                      <input type="text" name="catatan" id="catatan" class="form-control" placeholder="Beri Catatan Disini" aria-label="Catatan" aria-describedby="basic-addon2">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-block btn-success">Submit</button>
                      </div>
                    </div>
                  </form>

            </div>
        </div>
    </div>
</div>
<!-- End Login Modal -->
<?php } ?>
<script type="text/javascript" async
  src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML">
</script>