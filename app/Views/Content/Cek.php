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
                  Input Data
                </h3>
                <!-- <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target=".upload-train-data">Import Excel</button>
                    </li>
                  </ul>
                </div> -->
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="row">
                        <div class="col-6">
                        <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" id="jk" style="width: 100%;" name="jk">
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Umur</label>
                                <input type="number" name="umur" id="umur" maxlength="3" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Pekerjaan</label>
                                <select class="form-control" id="job" style="width: 100%;" name="job">
                                    <option value="pelajar">Pelajar</option>
                                    <option value="mahasiswa">Mahasiswa</option>
                                    <option value="peg_swasta">Peg. Swasta</option>
                                    <option value="peg_negri">Peg. Negri</option>
                                    <option value="wiraswasta">Wiraswasta</option>
                                    <option value="buruh">Buruh</option>
                                    <option value="petani">Petani</option>
                                    <option value="tni">TNI</option>
                                    <option value="polri">Polri</option>
                                    <option value="lain">Lain-Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Status Pendonor</label>
                                <select class="form-control" id="stats" style="width: 100%;" name="status">
                                    <option value="ulang">Ulang</option>
                                    <option value="baru">Baru</option>
                                </select>
                            </div>
                        </div>
                  </div>
              </div><!-- /.card-body -->
              <div class="card-footer">
                  <button id="cek" class="btn btn-md btn-success"><i class="fa fa-search"></i> Cari</button> 
                  <img style="display:none" id="load_btn_gif" src="/assets/dist/img/load.gif" width="15px"></img><span style="display:none" id="load_btn_text"> Please Wait... Sedang Proses Klasifikasi</span> 
              </div>
            </div>
            <!-- /.card -->
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Hasil Klasifikasi
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <span class="text-danger" id="load_body_text1" style="font-weight:bold">Silahkan Masukkan Data dan Tekan Tombol cari</span>

                <img style="display:none" id="load_body_gif" src="/assets/dist/img/load.gif" width="20px"></img><span style="display:none" id="load_body_text2"> Mohon Tunggu sebentar :D</span>

                <div>
                    <span id="rekom"></span>
                </div>
                <div id="rule">
                    
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