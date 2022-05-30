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
                        <h3 class="card-title">Laporan Pengaduan</h3>

                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-stripe">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pelanggan</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th>Tgl Dikerjakan</th>
                                    <th>Tgl Selesai</th>
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
                                        <td><?= $row['id_user'] ?></td>
                                        <td><?= $row['nohp']?></td>
                                        <td><?= $row['alamat']?></td>
                                        <td><?=$this->db->get_where('tindak_lanjut', array('id_pelanggan' => $row['id_user'], 'id_pengaduan' => $row['id']))->row()->tgl_dikerjakan; ?></td>
                                        <td><?=$this->db->get_where('tindak_lanjut', array('id_pelanggan' => $row['id_user'], 'id_pengaduan' => $row['id']))->row()->tgl_selesai; ?></td>
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