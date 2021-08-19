<?= $this->extend('Index') ?>
<?= $this->section('content') ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0"><?php echo $title ?></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
        <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Data Pendonor
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target=".upload-train-data">Import Excel</button>
                    </li>
                    <?php
                    if (count($data) > 0) {?>
                    <li class="nav-item">
                        <a class="btn btn-sm btn-danger" href="/data/del">Hapus</a>
                    </li>
                    <?php
                    }
                    ?>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                    <table id="data" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Transaksi</th>
                                <th>Tanggal Jam</th>
                                <th>Instansi</th>
                                <th>Nama Pendonor</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur</th>
                                <th>Golongan Darah</th>
                                <th>Pekerjaan</th>
                                <th>Status Pendonor</th>
                                <th>Jumlah Donor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                            if (count($data) > 0) {
                              $no = 1;
                              foreach ($data as $value):
                              ?>
                              <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $value['nomor_trx']; ?></td>
                                <td><?php echo $value['tanggal_jam']; ?></td>
                                <td><?php echo $value['instansi']; ?></td>
                                <td><?php echo $value['nama']; ?></td>
                                <td><?php echo $value['jk']; ?></td>
                                <td><?php echo $value['umur']; ?></td>
                                <td><?php echo $value['golongan']; ?></td>
                                <td><?php echo $value['job']; ?></td>
                                <td><?php echo $value['status']; ?></td>
                                <td><?php echo $value['jumlah']; ?></td>
                                <td>
                                  <button class="btn btn-sm btn-warning" data-id="<?php echo $value['nomor_trx']; ?>" onclick="coba(this.getAttribute('data-id'))"><i class="fa fa-pencil-alt text-white"></i></button>
                                </td>
                              </tr>
                            <?php
                              endforeach;
                            }else {
                          ?>
                            <tr>
                                <td colspan="12"><b>Tidak ada Data</b></td>
                            </tr>
                          <?php
                            }
                          ?>
                        </tbody>
                    </table>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?= $this->endSection() ?>