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
                <h3 class="card-title">Table User</h3>
                

                <a href="<?= base_url('pengaduan/form_pengaduan') ?>" class="btn btn-primary mb-3 float-right">Tambah Pengaduan</a>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-stripe">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Pengaduan</th>
                    <th>Image</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $i = 1;
                        foreach($query as $data) :
                            $user = $this->db->get_where('user', array('id' => $data['id']))->result_array();
                            foreach($user as $row):
                      ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td><?= $data['jenis'] ?></td>
                    <td>
                        <?php if (!$data['foto']) { ?>
                            <img width="100" src="" alt="" style="border-radius:10%;">
                            <?php } else { ?>
                                <img width="100" src="<?= base_url('img/pengaduan/'). $data['foto'] ?>.jpg" alt="" style="border-radius:10%;">
                        <?php } ?>
                    </td>
                    <td>
                        <?php
                        if ($data['status'] == 'Pending') { ?>
                            <button class="badge badge-danger"><?= $data['status'] ?></button>
                        <?php }else if($data['status'] == 'On Proses') { ?>
                            <button class="badge badge-warning"><?= $data['status'] ?></button>
                        <?php } else { ?>
                            <button class="badge badge-success"><?= $data['status'] ?></button>
                        <?php } ?>
                    </td>
                  </tr>
                  <?php endforeach; endforeach; ?>
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

<!-- Modal tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuSubmodalLabel">Tambah Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pelanggan/pengaduan/create'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                    <?php
                    $kode = date('ymd-his');
                    ?>
                        <input type="text" class="form-control" id="kode" placeholder="Masukan Kode Pengaduan" name='kode' value="PGDM-<?= $kode ?>">
                    </div>


                    <div class="form-group">
                        <div class="select">
                            <select name="jenis" id="jenis" class="form-control">
                                <option value="0">Pilih Jenis Pengaduan</option> 
                                <option value="Air Tidak Keluar">Air Tidak Keluar</option>
                                <option value="Air Keruh">Air Keruh</option>
                                <option value="Air Kecil">Air Kecil</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="5" placeholder="Masukan Deskripsi"></textarea>
                    </div>


                    <div class="form-group">
                        <input type="file" name="foto" id="foto" class="">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal ubah -->
<!-- <?php
    foreach ($query as $row ) :
?>
<div class="modal fade" id="modalEdit<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="newSubmenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuSubmodalLabel">Add Submew Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/kelola_user/ubah/').$row['id'].'/'.$row['role_id']; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" placeholder="Masukan Nama Lengkap" name='nama' value="<?= $row['name'] ?>">
                    </div>
                    
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" placeholder="Masukan Alamat Email" name='email' value="<?= $row['email'] ?>">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="nohp" placeholder="Masukan No HP" name='nohp' value="<?= $row['nohp'] ?>">
                    </div>

                    <div class="form-group">
                        <div class="select">
                            <select name="role_id" id="role_id" class="form-control">
                            <option value="0">Pilih Role</option> 
                            <?php $role = $this->db->get('user_role')->result_array();
                                foreach($role as $ur ): ?>
                                <option value="<?= $ur['id'] ?>" <?= $ur['id'] == $row['role_id'] ? 'selected': ''; ?>><?= $ur['role'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" placeholder="Masukan Alamat" name='alamat' value="<?= $row['address'] ?>">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="username" placeholder="Masukan Username" name='username'' value="<?= $row['username'] ?>">
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Masukan Password Baru" name='password'">
                    </div>

                    <div class="form-group">
                        <input type="file" name="foto" id="foto" class="">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="id_active" name="is_active">
                            <label class="form-check-label" for="is_active">
                                Active ?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <?php endforeach ?> -->