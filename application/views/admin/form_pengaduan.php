<!-- Horizontal Form -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Pengaduan</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="<?= base_url('admin/kelola_pengaduan/create'); ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                <div class="col-sm-10">
                    <input class="form-control" name="user" id="nama" placeholder="Nama Pelanggan">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Alamat Pelanggan</label>
                <div class="col-sm-10">
                    <input class="form-control" name="alamat" id="nama" placeholder="Alamat Pelanggan">
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nomor Handphone</label>
                <div class="col-sm-10">
                    <input class="form-control" name="nohp" id="nama" placeholder="Nomor Handphone">
                </div>
            </div>
            <div class="form-group row">
                <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                <?php
                $kode = date('ymd-his');
                ?>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kode" placeholder="Masukan Kode Pengaduan" name='kode' value="PGDM-<?= $kode ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="jenis" class="col-sm-2 col-form-label">Jenis Pengaduan</label>
                <div class="col-sm-10">
                    <div class="select">
                        <select name="jenis" id="jenis" class="form-control">
                            <option value="0">Pilih Jenis Pengaduan</option>
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
                <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="5" placeholder="Masukan Deskripsi"></textarea>
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