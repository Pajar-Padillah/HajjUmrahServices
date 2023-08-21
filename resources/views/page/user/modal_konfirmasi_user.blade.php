<div class="modal fade" id="konfirmasi_data_user{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi User</h5>
            </div>
            <form action="/user/konfirmasi" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id_user" value="{{ $item->id }}">
                    <label for="keterangan">Status Konfirmasi</label>
                    <select name="status_konfirmasi" class="form-control mb-2">
                        <option disabled selected value>Pilih Status</option>
                        <option value="1">Proses</option>
                        <option value="2">Terima</option>
                        <option value="3">Tolak</option>
                    </select>
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="2"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>