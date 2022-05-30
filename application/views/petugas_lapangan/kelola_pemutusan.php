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
                                    <th>Sambung/Pemutusan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>No Sambungan</th>
                                    <th>Rek Bulanan</th>
                                    <th>Angsuran</th>
                                    <th>Keterangan/Biaya Pembukaan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                foreach ($query_sambung as $row) :
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>Sambung Kembali</td>
                                        <td><?= $row['id_pelanggan'] ?></td>
                                        <td><?= $row['alamat'] ?></td>
                                        <td><?= $row['no_sambungan'] ?></td>
                                        <td><?= $row['rek_bulanan'] ?></td>
                                        <td><?= $row['angsuran'] ?></td>
                                        <td><?= $row['biaya_pembukaan'] ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td>
                                            <?php if ($row['status'] == 'Pending') { ?>
                                                <button class="badge badge-danger"><?= $row['status'] ?></button>
                                            <?php } else if ($row['status'] == 'Proses') { ?>
                                                <button class="badge badge-warning"><?= $row['status'] ?></button>
                                            <?php } else { ?>
                                                <button class="badge badge-success"><?= $row['status'] ?></button>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($row['status'] == 'Pending') { ?>
                                                <a onclick="alert('Kerjakan Pengduan ini ?')" href="<?= base_url('petugas_lapangan/pengerjaan/kerjakan/'). $row['id'] ?>/<?= $row['id_pelanggan'] ?>/pemutusan" class="btn btn-primary">Kerjakan</a>
                                            <?php } else if ($row['status'] == 'Proses') { ?>
                                                <a onclick="alert('Pengaduan Selesai ?')" href="<?= base_url('petugas_lapangan/pengerjaan/selesaikan/'). $row['id'] ?>/<?= $row['id_pelanggan'] ?>/pemutusan" class="btn btn-warning">Selesai</a>
                                            <?php } else { ?>
                                                <button class="btn btn-success">Selesai</button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <?php
                                foreach ($query_pemutusan as $row) :
                                    // if ($i%2 == 0) {
                                    //     continue;
                                    // }
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>Pemutusan</td>
                                        <td><?= $row['id_pelanggan'] ?></td>
                                        <td><?= $row['alamat'] ?></td>
                                        <td><?= $row['no_sambungan'] ?></td>
                                        <td><?= $row['rek_bulanan'] ?></td>
                                        <td><?= $row['angsuran'] ?></td>
                                        <td><?= $row['keterangan'] ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td>
                                            <?php if ($row['status'] == 'Pending') { ?>
                                                <button class="badge badge-danger"><?= $row['status'] ?></button>
                                            <?php } else if ($row['status'] == 'Proses') { ?>
                                                <button class="badge badge-warning"><?= $row['status'] ?></button>
                                            <?php } else { ?>
                                                <button class="badge badge-success"><?= $row['status'] ?></button>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php if ($row['status'] == 'Pending') { ?>
                                                <a onclick="alert('Kerjakan Pengduan ini ?')" href="<?= base_url('petugas_lapangan/pengerjaan/kerjakan/'). $row['id'] ?>/<?= $row['id_pelanggan'] ?>/pemutusan" class="btn btn-primary">Kerjakan</a>
                                            <?php } else if ($row['status'] == 'Proses') { ?>
                                                <a onclick="alert('Pengaduan Selesai ?')" href="<?= base_url('petugas_lapangan/pengerjaan/selesaikan/'). $row['id'] ?>/<?= $row['id_pelanggan'] ?>/pemutusan" class="btn btn-warning">Selesai</a>
                                            <?php } else { ?>
                                                <button class="btn btn-success">Selesai</button>
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