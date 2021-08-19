<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $this->include('Layout/Header'); ?>
    <?php echo $this->include('Layout/Css'); ?>
</head>

<style>
    div.scrollmenu {
    background-color: #fff;
    overflow: auto;
    white-space: nowrap;
  }

  div.scrollmenu a {
    margin-top: 10px;
    border-right: 1px solid #6c757d;
    display: inline-block;
    color: #000;
    pointer-events: none;
    text-align: center;
    padding: 4px;
    text-decoration: none;
  }

  div.scrollmenu a:hover {
    background-color: #777;
  }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <?php echo $this->include('Layout/Navbar'); ?>
        <?php echo $this->include('Layout/Sidebar'); ?>

        <div class="content-wrapper">
            <?= $this->renderSection('content') ?>
        </div>
        <?php echo $this->include('Layout/Footer'); ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>

    <?php echo $this->include('Layout/Modal'); ?>
    <?php echo $this->include('Layout/Js'); ?>
    <script>
        $(document).ready( function () {
            $('#data').DataTable();

            $("#cek").click(function() {
                $('#cek').attr('disabled', true);
                $('#load_btn_gif').show();
                $('#load_btn_text').show();
                $('#load_body_text2').show();
                $('#load_body_gif').show();
                $('#load_body_text1').hide();
                $('#rekom').hide();
                var jk = document.getElementById('jk').value
                var umur = document.getElementById('umur').value
                var job = document.getElementById('job').value
                var stats = document.getElementById('stats').value
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash

                // console.log(jk +'-'+umur+'-'+job+'-'+stats);
                cek(jk, umur, job, stats, csrfName, csrfHash);
                
            });
        } );

        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            <?php
            if (isset($_SESSION['flash'])) {?>
                Toast.fire({
                    icon: '<?php echo $_SESSION['sign'] ?>',
                    title: '<?php echo $_SESSION['msg'] ?>'
                })
            <?php
                unset($_SESSION['flash']);
                unset($_SESSION['sign']);
                unset($_SESSION['msg']);
            }
            ?>

            
        })

        function coba(id){
            var nomor_trx = id;
            $.ajax({
                url: "/edit",
                method: "POST",
                data: {
                    id: id
                    // [csrfName]: csrfHash
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data[0]['nomor_trx']);

                    var tes = $('<table class="table">'+
                    '<tr>'+
                        '<td>Nomor Transaksi</td>'+
                        '<td><input type="text" class="form-control" name="nomor_trx" value="'+ data[0]['nomor_trx'] +'" /></td><input class="form-control" type="hidden" name="id" value="'+ data[0]['id'] +'" />'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Tanggal / Jam</td>'+
                        '<td><input type="text" class="form-control" name="tanggal" value="'+ data[0]['tanggal_jam'] +'" /></td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Instansi</td>'+
                        '<td><input type="text" class="form-control" name="instansi" value="'+ data[0]['instansi'] +'" /></td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Nama Pendonor</td>'+
                        '<td><input type="text" class="form-control" name="nama" value="'+ data[0]['nama'] +'" /></td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Jenis Kelamin</td>'+
                        '<td><input type="text" class="form-control" name="jk" value="'+ data[0]['jk'] +'" /></td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Umur</td>'+
                        '<td><input type="text" class="form-control" name="umur" value="'+ data[0]['umur'] +'" /></td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Golongan Darah</td>'+
                        '<td><input type="text" class="form-control" name="gol" value="'+ data[0]['golongan'] +'" /></td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Pekerjaan</td>'+
                        '<td><input type="text" class="form-control" name="job" value="'+ data[0]['job'] +'" /></td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Status Pendonor</td>'+
                        '<td><input type="text" class="form-control" name="status" value="'+ data[0]['status'] +'" /></td>'+
                    '</tr>'+
                    '<tr>'+
                        '<td>Jumlah Donor</td>'+
                        '<td><input type="text" class="form-control" name="jml" value="'+ data[0]['jumlah'] +'" /></td>'+
                    '</tr>'+
                    '</table>');

                    $(".modal-body").html(tes);
                    $("#edit").modal("show");
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Silahkan Refresh Halaman Ini'
                    });
                }
            });
        }

        function get_data(id, csrfName, csrfHash) {
            $.ajax({
                url: "/search",
                method: "POST",
                data: {
                    id: id,
                    [csrfName]: csrfHash
                },
                dataType: 'json',
                success: function(data) {
                    var len = data[0]['data'].length;
                    var no = 1;
                    var hasil = [];
                    $('.txt_csrfname').val(data[0]['token']);
                    if (len > 0) {
                        for (var i = 0; i < len; i++) {

                            var row = $('<tr>' +
                                '<td>' + no + '</td>' +
                                '<td>' + data[0]['data'][i].nama_kriteria + '</td>' +
                                '<td>' + data[0]['data'][i].nama_sub_kriteria + '</td>' +
                                '<td>' + data[0]['data'][i].bobot + '</td>');

                            hasil.push(row);
                            no = no + 1;
                            // console.log(data)
                        }
                        $('#tableSub tbody').html(hasil);

                        var id_krit = data[0].id_kriteria;
                        var a = '<a class="btn btn-sm btn-danger float-right" href="/sub/' + id + '"><i class="mdi mdi-delete"></i> Hapus</a>';
                        $('#btn').html(a);
                    } else {
                        var b = '<a href="/sub/add/' + id + '" class="btn btn-success btn-sm float-right text-white"><i class="mdi mdi-plus"></i> Tambah Data</a>';
                        $('#tableSub tbody').html('<td colspan="4" align="center"><b>Data Tidak Ada !!</b></td>');
                        $('#btn').html(b);
                    }
                },
                error: function() {
                    $('#tableSub tbody').html('<td colspan="4" align="center">Error</td>');
                }
            });
        }
        
        function cek(jk, umur, job, stats, csrfName, csrfHash) {
            console.log(jk+"-"+umur+"-"+job+"-"+stats+"-"+csrfName+"-"+csrfHash);
            $.ajax({
                url: "/tes",
                method: "POST",
                data: {
                    "jk": jk,
                    [csrfName]: csrfHash,
                    "umur": umur,
                    "job": job,
                    "status": stats
                },
                dataType: 'json',
                success: function(data) {
                    $('#cek').attr('disabled', false);
                    $('#load_btn_gif').hide();
                    $('#load_btn_text').hide();
                    $('#load_body_gif').hide();
                    $('#load_body_text2').hide();
                    $('#rekom').show();
                    console.log(data);

                    if (job == "peg_swasta") {
                        job = "PEG. SWASTA";
                    }else if (job == "peg_negri"){
                        job = "PEG. NEGERI";
                    }else if (job == "lain"){
                        job = "LAIN-LAINNYA";
                    }else{
                        job.toUpperCase();
                    }

                    jk = jk.toUpperCase();

                    if (data.hasil_rekom == "<b>Tidak Menjadi Rekomendasi Pendonor Tetap</b>") {
                        src = "/assets/dist/img/cancel.png";
                    }else{
                        src = "/assets/dist/img/accept.png";
                    }

                    $("#rekom").html('Data dengan: '+
                    '<div class="row">'+
                        '<div class="col-6">'+
                            '<ul>'+
                                '<li>Jenis Kelamin : <b>'+jk+'</b></li>'+
                                '<li>Umur : <b>'+umur+'</b></li>'+
                                '<li>Pekerjaan : <b>'+job+'</b></li>'+
                                '<li>Status Donor : <b>'+stats+'</b></li>'+
                            '</ul>'+
                        '</div>'+
                        '<div class="col-6">'+
                            '<img src="'+src+'" style="margin-top:-10px;" width="100px"/>'+
                        '</div>'+
                    '</div>'+
                    '<br/> <p>Didapat Hasil yaitu : '+ data.hasil_rekom+ '</p>');
                    // var tree = $('');
                    // $("#rule").html();
                },
                error: function() {
                    $('#load_body_text1').html("Silahkan Refresh Dan Ulangi Kembali Proses Pencarian");
                    $('#cek').attr('disabled', false);
                    $('#load_btn_gif').hide();
                    $('#load_btn_text').hide();
                }
            });
        }


    </script>
</body>
</html>