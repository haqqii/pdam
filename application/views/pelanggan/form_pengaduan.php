<!-- Horizontal Form -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pengaduan</h3>
        <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>
        <?= $this->session->flashdata('message'); ?>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="<?= base_url('pelanggan/pengaduan/create'); ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label for="kdoe" class="col-sm-2 col-form-label">Kode</label>
                <?php
                $kode = date('ymd-his');
                ?>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kode" placeholder="Masukan Kode Pengaduan" name='kode' value="PGDM-<?= $kode ?>" disabled style="background-color: white;">
                    <input type="hidden" class="form-control" id="kode" placeholder="Masukan Kode Pengaduan" name='kode' value="PGDM-<?= $kode ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis" class="col-sm-2 col-form-label">Jenis Pengaduan</label>
                <div class="col-sm-10">
                    <div class="select">
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="" disabled selected>Pilih Jenis Pengaduan</option>
                            <option value="Air Keruh">Air Keruh</option>
                            <option value="Kebocoran">Kebocoran</option>
                            <option value="Meter">Meter</option>
                            <option value="Pemakaian">Pemakaian</option>
                            <option value="Tidak Dapat Air">Tidak Dapat Air</option>
                            <option value="Lain-Lain">Lain-Lain</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="5" placeholder="Masukan Deskripsi" required></textarea>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right">Tambah</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
<!-- /.card -->