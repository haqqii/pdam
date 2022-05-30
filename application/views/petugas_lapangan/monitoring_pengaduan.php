<section class="content">
    <div class="container-fluid">
        <h2 class="text-center display-4">Search</h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="<?= base_url('petugas_lapangan/hasil_monitoring') ?>" method="POST">
                    <div class="input-group">
                        <input type="search" name="cari" id="cari" class="form-control form-control-lg" placeholder="Masukan kode pengaduan Anda">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>