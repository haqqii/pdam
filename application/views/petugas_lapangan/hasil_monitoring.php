<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
            <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                      <table>
                        <?php foreach($query as $row): ?>
                        <tr>
                            <td width="200">Nama Lengkap</td>
                            <td>:&nbsp;&nbsp;</td>
                            <td><?=  $row['id_user'] ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:&nbsp;&nbsp;</td>
                            <td><?= $row['alamat']; ?></td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td>:&nbsp;&nbsp;</td>
                            <td><?= $row['id_user']; ?></td>
                        </tr>
                        <tr>
                            <td>Tgl Pengaduan</td>
                            <td>:&nbsp;&nbsp;</td>
                            <td><?= $row['tanggal'] ?></td>
                        </tr>
                        <tr>
                            <td>Tgl Tindak Lanjut</td>
                            <td>:&nbsp;&nbsp;</td>
                            <td><?= @$this->db->get_where('tindak_lanjut', array('id_pengaduan' => $row['id']))->row()->tgl_dikerjakan; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Pengaduan</td>
                            <td>:&nbsp;&nbsp;</td>
                            <td><?= $row['jenis'] ?></td>
                        </tr>
                        <tr>
                            <td>Pengaduan</td>
                            <td>:&nbsp;&nbsp;</td>
                            <td><?= $row['deskripsi'] ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:&nbsp;&nbsp;</td>
                            <td><?= $row['status'] ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:&nbsp;&nbsp;</td>
                            <td><?= @$this->db->get_where('tindak_lanjut', array('id_pengaduan' => $row['id']))->row()->keterangan; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Petugas</td>
                            <td>:&nbsp;&nbsp;</td>
                            <td><?= $row['petugas'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="<?= base_url('petugas_lapangan/monitoring_pengaduan') ?>" class="btn btn-sm btn-primary">
                       Selesai
                    </a>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </div>
    </div>
</section>