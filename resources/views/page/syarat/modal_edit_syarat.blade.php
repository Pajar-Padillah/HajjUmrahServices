<div class="modal fade" id="edit_data_syarat{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Syarat</h5>
            </div>
            <form action="/syarat/{{ $item->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <label for="keterangan">File Syarat</label>
                    <input type="hidden" name="id_syarat" value="{{ $item->id }}">
                    <input type="hidden" name="old_file_syarat" value="{{ $item->file_syarat }}">
                    <input onchange="previewImage()" class="form-control mb-3" id="image" type="file" name="file_syarat">
                    @if ($item->file_syarat)
                    <iframe src="{{ url('storage').'/'.$item->file_syarat }}" class="img-preview" height="200"  width="100%"></iframe>
                    @else
                    <iframe class="img-preview" height="200"  width="100%"></iframe>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function previewImage(){
   const img = document.querySelector('#image');
   const imgPreview = document.querySelector('.img-preview');
   imgPreview.style.display = 'block';

   const blob = URL.createObjectURL(img.files[0]);
   imgPreview.src = blob;
   }
</script>