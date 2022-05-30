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
                        <h3 class="card-title">Laporan Sambung Kembali</h3>
                    </div>
                     <form action="<?= base_url('admin/laporan_sambung_kembali') ?>" method="post">
                        <div class="col-4">
                            <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" autocomplete="off">
                            <button type="submit" class="btn btn-success">Cari</button>
                        </div>
                    </form>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-stripe">
                            <a href="<?= base_url('admin/print_laporan/sambung') ?>" target="_blank" class="btn btn-secondary float-left ">Print</a>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal</th>
                                    <th>Alamat</th>
                                    <th>No Sambungan</th>
                                    <th>Rekening Air Bulanan</th>
                                    <th>Biaya Pembukaan</th>
                                    <th>Angsuran Sambungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=1;
                                foreach ($query as $row) :
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?=$row['id_pelanggan'] ?></td>
                                        <td><?=date($row['tanggal']) ?></td>
                                        <td><?=$row['alamat'] ?></td>
                                        <td><?=$row['no_sambungan'] ?></td>
                                        <td><?=$row['rek_bulanan'] ?></td>
                                        <td><?=$row['biaya_pembukaan'] ?></td>
                                        <td><?=$row['angsuran'] ?></td>
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