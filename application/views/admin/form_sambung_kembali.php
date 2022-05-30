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
    <form class="form-horizontal" action="<?= base_url('admin/form_sambung_kembali/create'); ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                <div class="col-sm-10">
                    <input class="form-control" name="id_pelanggan" id="nama" placeholder="Nama Pelanggan">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Alamat Pelanggan</label>
                <div class="col-sm-10">
                    <input class="form-control" name="alamat" id="nama" placeholder="Alamat Pelanggan">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nomor Sambungan</label>
                <div class="col-sm-10">
                    <input class="form-control" name="no_sambungan" id="nama" placeholder="Nomor Sambungan">
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Rekening Air Bulanan</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="rek_bulanan" min="0" id="rek_bulanan" placeholder="Masukan Rekening">
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Angsuran Sambungan</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="angsuran" min="0" id="angsuran" placeholder="Masukan Angsuran Sambungan">
                </div>
            </div>
            <div class="form-group row">
                <label for="deskripsi" class="col-sm-2 col-form-label">Biaya Pembukaan</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="biaya_pembukaan" min="0" id="biaya_pembukaan" placeholder="Masukan Biaya Pembukaan">
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