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
                
                <a href="<?= base_url('admin/form_pengaduan') ?>" class="btn btn-primary mb-3 float-right">Tambah Pengaduan</a>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-stripe">
                  <thead>
                  <tr>
                    <th rowspan="2">#</th>
                    <th rowspan="2">Jenis Pengaduan</th>
                    <th rowspan="2">Jumlah</th>
                    <th colspan="2">Relasi Perbaikan</th>
                    <th rowspan="2">Keterangan</th>
                    <th rowspan="2">Aksi</th>
                  </tr>
                  <tr>
                      <th>Sudah</th>
                      <th>Belum</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td>1</td>
                      <td>Air Keruh</td>
                      <td><?=$this->db->query("SELECT COUNT('jenis') as jenis FROM pengaduan WHERE jenis = 'Air Keruh'")->row()->jenis;?></td>
                      <td><?=$this->db->query("SELECT COUNT('*') as status FROM `pengaduan` WHERE status ='Selesai' AND jenis ='Air Keruh'")->row()->status;?></td>
                      <td><?=$this->db->query("SELECT COUNT('*') as status FROM `pengaduan` WHERE status ='pending' AND jenis ='Air Keruh'")->row()->status;?></td>
                      <td></td>
                      <td>
                        <button href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalEdit">Edit</button>
                          <button class="btn btn-danger">Hapus</button>
                      </td>
                  </tr>
                  <tr>
                      <td>2</td>
                      <td>Kebocoran</td>
                      <td><?=$this->db->query("SELECT COUNT('jenis') as jenis FROM pengaduan WHERE jenis = 'Kebocoran'")->row()->jenis;?></td>
                      <td><?=$this->db->query("SELECT COUNT('*') as status FROM `pengaduan` WHERE status ='Selesai' AND jenis ='Kebocoran'")->row()->status;?></td>
                      <td><?=$this->db->query("SELECT COUNT('*') as status FROM `pengaduan` WHERE status ='pending' AND jenis ='Kebocoran'")->row()->status;?></td>
                      <td></td>
                      <td>
                        <button href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalEdit">Edit</button>
                          <button class="btn btn-danger">Hapus</button>
                      </td>
                  </tr>
                  <tr>
                      <td>3</td>
                      <td>Meter</td>
                      <td><?=$this->db->query("SELECT COUNT('jenis') as jenis FROM pengaduan WHERE jenis = 'Meter'")->row()->jenis;?></td>
                      <td><?=$this->db->query("SELECT COUNT('*') as status FROM `pengaduan` WHERE status ='Selesai' AND jenis ='Meter'")->row()->status;?></td>
                      <td><?=$this->db->query("SELECT COUNT('*') as status FROM `pengaduan` WHERE status ='pending' AND jenis ='Meter'")->row()->status;?></td>
                      <td></td>
                      <td>
                        <button href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalEdit">Edit</button>
                          <button class="btn btn-danger">Hapus</button>
                      </td>
                  </tr>
                  <tr>
                      <td>4</td>
                      <td>Pemakaian</td>
                      <td><?=$this->db->query("SELECT COUNT('jenis') as jenis FROM pengaduan WHERE jenis = 'Pemakaian'")->row()->jenis;?></td>
                      <td><?=$this->db->query("SELECT COUNT('*') as status FROM `pengaduan` WHERE status ='Selesai' AND jenis ='Pemakaian'")->row()->status;?></td>
                      <td><?=$this->db->query("SELECT COUNT('*') as status FROM `pengaduan` WHERE status ='pending' AND jenis ='Pemakaian'")->row()->status;?></td>
                      <td></td>
                      <td>
                        <button href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalEdit">Edit</button>
                          <button class="btn btn-danger">Hapus</button>
                      </td>
                  </tr>
                  <tr>
                      <td>5</td>
                      <td>Tidak Dapat Air</td>
                      <td><?=$this->db->query("SELECT COUNT('jenis') as jenis FROM pengaduan WHERE jenis = 'Tidak Dapat Air'")->row()->jenis;?></td>
                      <td><?=$this->db->query("SELECT COUNT('*') as status FROM `pengaduan` WHERE status ='Selesai' AND jenis ='Tidak Dapat Air'")->row()->status;?></td>
                      <td><?=$this->db->query("SELECT COUNT('*') as status FROM `pengaduan` WHERE status ='pending' AND jenis ='Tidak Dapat Air'")->row()->status;?></td>
                      <td></td>
                      <td>
                        <button href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalEdit">Edit</button>
                          <button class="btn btn-danger">Hapus</button>
                      </td>
                  </tr>
                  <tr>
                      <td>6</td>
                      <td>Lain - Lain</td>
                      <td><?=$this->db->query("SELECT COUNT('jenis') as jenis FROM pengaduan WHERE jenis = 'Lain-Lain'")->row()->jenis;?></td>
                      <td><?=$this->db->query("SELECT COUNT('*') as status FROM `pengaduan` WHERE status ='Selesai' AND jenis ='Lain-Lain'")->row()->status;?></td>
                      <td><?=$this->db->query("SELECT COUNT('*') as status FROM `pengaduan` WHERE status ='pending' AND jenis ='Lain-Lain'")->row()->status;?></td>
                      <td></td>
                      <td>
                        <button href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalEdit">Edit</button>
                        <button class="btn btn-danger">Hapus</button>
                      </td>
                  </tr>
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
<!-- <?php
    foreach ($query as $row ) :
?>
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="newSubmenuModalLabel" aria-hidden="true">
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