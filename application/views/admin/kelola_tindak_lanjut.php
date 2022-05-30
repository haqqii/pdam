<section class="content">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <!-- jQuery Knob -->
                <div class="card">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-header">
                        <h3 class="card-title">Tabel Pengaduan</h3>

                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kode</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Jenis Pengaduan</th>
                                    <th>Tanggal</th>
                                    <th>Petugas</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                foreach ($query as $row) :
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['kode'] ?></td>
                                        <td><?= $row['id_user'] ?></td>
                                        <td><?= $row['jenis'] ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td><?= $row['petugas'] ?></td>
                                        <td>
                                            <?php if ($row['status'] == 'Pending') { ?>
                                                <button class="badge badge-danger"><?= $row['status'] ?></button>
                                            <?php } else if ($row['status'] == 'Proses') { ?>
                                                <button class="badge badge-warning"><?= $row['status'] ?></button>
                                            <?php } else { ?>
                                                <button class="badge badge-success"><?= $row['status'] ?></button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>