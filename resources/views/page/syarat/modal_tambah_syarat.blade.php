<div style="z-index: 999999" class="modal fade" id="modalcreatesyarat" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Syarat</h5>
            </div>
            <form action="/syarat" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <label for="keterangan">File Syarat</label>
                    <input class="form-control" type="file" name="file_syarat">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
