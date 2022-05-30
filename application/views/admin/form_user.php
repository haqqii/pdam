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
    <form action="<?= base_url('admin/kelola_user/create'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Lengkap" name='nama'>
            </div>

            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Masukan Alamat Email" name='email'>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="nohp" placeholder="Masukan No HP" name='nohp'>
            </div>

            <div class="form-group">
                <div class="select">
                    <select name="role_id" id="role_id" class="form-control">
                        <option value="0">Pilih Role</option>
                        <?php $role = $this->db->get('user_role')->result_array();
                        foreach ($role as $r) : ?>
                            <option value="<?= $r['id'] ?>"><?= $r['role'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="alamat" placeholder="Masukan Alamat" name='alamat'>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" id="username" placeholder="Masukan Username" name='username'>
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Masukan Password" name='password'>
            </div>

            <div class="form-group">
                <input type="file" name="foto" id="foto" class="">
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="id_active" name="is_active" checked>
                    <label class="form-check-label" for="is_active">
                        Active ?
                    </label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
</div>