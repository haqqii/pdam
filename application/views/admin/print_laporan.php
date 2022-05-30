<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>surat</title>
    <style>
        body {
            background-color: white;
            /* border: 1px solid black; */
            max-width: 50em;
            max-height: 70em;

        }

        .container {
            text-align: center;
            border-bottom: 1px solid;
            margin-bottom: 10px;
        }

        .ttn {
                margin-left: 6%;
                margin-top: 55px;
                text-align: center;
                width: 120px;
        }

        .ttn p {
            width: 100px
            text-align:center;
        }

        .direktur {
            margin-left: 55%;
            margin-top: -18%;

        }

        .mengetahui{
                float: right;
                margin-top: -139px;
                margin-right: 6%;
                text-align: center;
        }

        .direktur h5 {
            text-align: center;
            margin-top: 75px;
        }

        .direktur h5 p {
            text-align: center;
        }

        .nama {
            margin-left: 55%;
            margin-top: 13%;
        }

        .nama h5 {
            text-align: center;
        }

        .nama p {
            text-align: center;
            margin-top: -7%;
        }

        .mengetahui h5 {
            text-align: center;
            margin-top: 17%;
            margin-right: 10%;
        }
        h1{
  font-family: sans-serif;
}

table {
  font-family: Arial, Helvetica, sans-serif;
  color: #666;
  text-shadow: 1px 1px 0px #fff;
  background: #eaebec;
  border: #ccc 1px solid;
}

table th {
  padding: 9px 0;
  margin-left:0px;
  border-left:1px solid #e0e0e0;
  border-bottom: 1px solid #e0e0e0;
  background: #ededed;
}

table th:first-child{  
  border-left:none;  
}

table tr {
  text-align: center;
  padding-left: 10px;
}

table td:first-child {
  text-align: left;
  padding-left: 20px;
  border-left: 0;
}

table td {
  padding: 6px;
  border-top: 1px solid #ffffff;
  border-bottom: 1px solid #e0e0e0;
  border-left: 1px solid #e0e0e0;
  background: #fafafa;
  background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
  background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
}

table tr:last-child td {
  border-bottom: 0;
}

table tr:last-child td:first-child {
  -moz-border-radius-bottomleft: 3px;
  -webkit-border-bottom-left-radius: 3px;
  border-bottom-left-radius: 3px;
}

table tr:last-child td:last-child {
  -moz-border-radius-bottomright: 3px;
  -webkit-border-bottom-right-radius: 3px;
  border-bottom-right-radius: 3px;
}

table tr:hover td {
  background: #f2f2f2;
  background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
  background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
}
    </style>
</head>

<body>
    <div class="kotak">
        <div class="container">
            <img style="width: 120px; float:left; margin-right:-100px" src="<?= base_url('img/logo.png') ?>" alt="">
            <h3 style="margin-bottom: -12px;">PEMERINTAH KABUPATEN LAMONGAN</h3>
            <h2 style="margin-bottom: -12px;">PERUSAHAAN UMUM DAERAH AIR MINUM</h2>
            <h4 style="margin-bottom: -12px;">Jalan Lamongrejo No.96 Telp. (0322)321571-324015. Fax. (0322) 324015</h4>
            <h3>L A M O N G A N</h3>
        </div>
        <?php
        if ($type == 'pengaduan') { ?>
            <table cellspacing='0'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pelanggan</th>
                        <th>No Telp</th>
                        <th>Alamat</th>
                        <th>Tgl Dikerjakan</th>
                        <th>Tgl Selesai</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($query as $row) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['id_user'] ?></td>
                            <td><?= $row['nohp'] ?> </td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $this->db->get_where('tindak_lanjut', array('id_pelanggan' => $row['id_user'], 'id_pengaduan' => $row['id']))->row()->tgl_dikerjakan; ?></td>
                            <td><?= $this->db->get_where('tindak_lanjut', array('id_pelanggan' => $row['id_user'], 'id_pengaduan' => $row['id']))->row()->tgl_selesai; ?></td>
                            <td>
                                <?php if ($row['status'] == 'Pending') { ?>
                                    <p class="badge badge-danger"><?= $row['status'] ?></p>
                                <?php } else if ($row['status'] == 'Proses') { ?>
                                    <p class="badge badge-warning"><?= $row['status'] ?></p>
                                <?php } else { ?>
                                    <p class="badge badge-success"><?= $row['status'] ?></p>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php } elseif ($type == 'pemutusan') { ?>
            <table cellspacing='0'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Alamat</th>
                        <th>No Pelanggan</th>
                        <th>Rekening Air Bulanan</th>
                        <th>Angsuran Sambungan</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($query as $row) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['id_pelanggan'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $row['no_sambungan'] ?></td>
                            <td><?= $row['rek_bulanan'] ?></td>
                            <td><?= $row['angsuran'] ?></td>
                            <td><?= $row['keterangan'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php } elseif ($type == 'sambung') { ?>
            <table cellspacing='0'>
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
                    $no = 1;
                    foreach ($query as $row) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['id_pelanggan'] ?></td>
                            <td><?= date($row['tanggal']) ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $row['no_sambungan'] ?></td>
                            <td><?= $row['rek_bulanan'] ?></td>
                            <td><?= $row['biaya_pembukaan'] ?></td>
                            <td><?= $row['angsuran'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php } ?>

        <div class="ttn">
            <h4>PETUGAS LANGGANAN</h4>
            <p style="margin-top: 32px">..................................</p>
        </div>

        <div class="mengetahui">
            <?= date('d F Y') ?><br>
            <h5>MENGETAHUI
                <p style="margin-top: -2px;">KABAG LANGGANAN</p>
                <br>
                <p>.....................................</p>
            </h5>
        </div>
    </div>
    <script>window.print()</script>
</body>

</html>