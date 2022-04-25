Main Content -->
<div class="main-content">
    <section class="section">
        <div class="">
            <div class="card" style="width:100%;">
                <div class="card-body">
                    <h2 class="card-title" style="color: black;">Management Data Siswa E-Learning</h2>
                    
                    <?php echo form_open_multipart('PhpspreadsheetController/import_siswa',array('name' => 'spreadsheet')); ?>
                        <table align="center" cellpadding = "5">
                        <tr>
                        <td>File :</td>
                        <td><input type="file" size="40px" name="upload_file" /></td>
                        <td class="error"><?php echo form_error('name'); ?></td>
                        <td colspan="5" align="center">
                        <input type="submit" value="Import Users"/></td>
                        </tr>
                        </table>
                    <?php echo form_close();?>

                    <hr>
                    <p class="card-text"> Jumlah Siswa yang terdaftar di E-Learning sekarang adalah <span
                            class="font-weight-bold" style="color:black;">
                            <?php echo $this->db->count_all('el_siswa'); ?> siswa.</span>
                    </p>
                    <a href="<?php echo site_url('admin/add_siswa/'); ?>" class="btn btn-primary">Tambah Data Siswa</a>


                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="container bg-white p-4"
                    style="border-radius:3px;box-shadow:rgba(0, 0, 0, 0.03) 0px 4px 8px 0px">
                    <div class="table-responsive">
                        <table id="example" class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr class="text-center">
                                    <th scope="col">NIM</th>
                                    <th scope="col">Nama Mahasiswa</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Detail</th>
                                    <th scope="col">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user as $u) { ?>
                                <tr class="text-center">
                                    <th scope="row">
                                        <?php echo $u->nis ?>
                                    </th>

                                    <td>
                                        <?php echo $u->nama ?>
                                    </td>

                                    <td>
                                        <?php echo $u->email ?>
                                    </td>

                                    <td class="text-center">
                                        <a href="<?php echo site_url('admin/detail_siswa/' . $u->id); ?>"
                                            class="btn btn-success">Detail</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo site_url('admin/update_siswa/' . $u->id); ?>"
                                            class="btn btn-info">Update</a>

                                        <a href="<?php echo site_url('admin/delete_siswa/' . $u->id); ?>"
                                            class="btn btn-danger remove">Delete</a>
                                    </td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
    <!-- End Main Content -->


    <!-- Start Sweetalert -->

    <?php if ($this->session->flashdata('success-edit')): ?>
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Data Siswa Telah Dirubah!',
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
        title: 'Data Siswa Telah Dihapus!',
        text: 'Selamat data telah Dihapus!',
        showConfirmButton: false,
        timer: 2500
    })
    </script>
    <?php endif;?>

    <!-- End Sweetalert