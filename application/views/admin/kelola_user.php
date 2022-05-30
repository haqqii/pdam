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
                <a href="<?= base_url('admin/form_user') ?>" class="btn btn-primary mb-3 float-right">Tambah User Baru</a>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>No Hp</th>
                    <th>Alamat</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php 
                      $i = 1;
                        foreach($query as $row) :
                      ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['username'] ?></td>
                    <td><?= $this->db->get_where('user_role', array('id' => $row['role_id']))->row()->role; ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['nohp'] ?></td>
                    <td><?= $row['address'] ?></td>
                    <td>
                        <?php if (!$row['image']) { ?>
                            <img width="100" src="<?= base_url('img/user/')?>user.png" alt="" style="border-radius:10%;">
                            <?php } else { ?>
                                <img width="100" src="<?= base_url('img/user/'). $row['image'] ?>.jpg" alt="" style="border-radius:10%;">
                        <?php } ?>
                    </td>
                    <td><?= $row['is_active'] == 1 ? '<button class="badge badge-success">Aktif</button>':'<button class="badge badge-danger">Tidak Aktif</button>'; ?></td>
                    <td>
                        <button href="#" class="btn btn-success" data-toggle="modal" data-target="#modalEdit<?= $row['id'] ?>">Edit</button>
                        <a href="<?= base_url('admin/kelola_user/delete/').$row['id'].'/'.$row['role_id'] ?>" class="btn btn-danger">Delete</a>
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

<!-- modal ubah -->
<?php
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
                        <small>*jika password kosong, maka password default 'bismilllah'</small>
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
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <?php endforeach ?>