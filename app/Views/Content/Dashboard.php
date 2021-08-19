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
                  Sistem Klasifikasi Potensi Pendonor
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="text-center">
                    <img src="/assets/dist/img/blood.jpg" width="25%">

                </div>
                <p class="text-center">sistem Ini dibuat untuk Mengklasifikasikan Pendonor Menjadi 2 Klasifikasi yaitu <b>Pendonor Tetap</b> dan <b>Tidak Pendonor tetap</b>. Dengan Menggunakan Metode C45 sebagai Penunjang Hasil Dari Rekomendasi yang di berikan.</p>
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