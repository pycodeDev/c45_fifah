<!-- Modal Session -->
<div class="modal fade upload-train-data" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload Excel Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo "/data/upload" ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                <div class="input-group">
                    <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label text-left" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
                <div class="mt-2">
                    <span class="text-danger">Silahkan Ikuti File Yang di upload Seperti Dibawah Ini.</span>
                </div>
                <div class="scrollmenu">
                    <img src="/assets/dist/img/contoh.png">
                </div>

                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="submit">Upload</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Session -->
<div class="modal fade upload-train-data" tabindex="-1" role="dialog" id="edit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo "/data/edit" ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body body-conten">
               
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>