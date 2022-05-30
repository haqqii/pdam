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
                                    <th>Ketarangan</th>
                                    <th>Aksi</th>
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
                                        <form action="<?= base_url('petugas_lapangan/pengerjaan/selesaikan/'). $row['id'] ?>/<?= $row['id_user'] ?>/pengaduan" method="post">
                                        <td>
                                            <?php if ($row['status'] == 'Proses') { ?>
                                                <textarea name="keterangan" class="form-group form-control"> </textarea>
                                            <?php } elseif ($row['status'] == 'Selesai') { 
                                            echo $this->db->get_where('tindak_lanjut', array('id_pengaduan' => $row['id']))->row()->keterangan;
                                             } ?>
                                        </td>
                                        <td>
                                            <?php
                                             if ($row['status'] == 'Pending') { ?>
                                                <a onclick="alert('Kerjakan Pengduan ini ?')" href="<?= base_url('petugas_lapangan/pengerjaan/kerjakan/'). $row['id'] ?>/<?= $row['id_user'] ?>/pengaduan" class="btn btn-primary">Kerjakan</a>
                                            <?php } else if ($row['status'] == 'Proses') { ?>
                                                <button type="submit" onclick="alert('Pengaduan Selesai ?')" class="btn btn-warning">Selesai</button>
                                            <?php } else { ?>
                                                <button class="btn btn-success">Selesai</button>
                                            <?php } ?>
                                        </td>
                                        </form>
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