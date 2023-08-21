<div style="z-index: 999999" class="modal fade" id="edit_data_profil" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title" id="staticBackdropLabel">Edit Profil {{ $user->name }}</h4>
            </div>
            <form action="/editprofil/{{ $user->id }}/edit" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row mb-2">
                        <label for="name" class="col-3 col-form-label">Nama</label>
                        <div class="col-9">
                        <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" type="text" name="name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="username" class="col-3 col-form-label">Username</label>
                        <div class="col-9">
                        <input class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}" type="text" name="username">
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-3 col-form-label">Email</label>
                        <div class="col-9">
                        <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" type="email" name="email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="password" class="col-3 col-form-label">Password</label>
                        <div class="col-9">
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password">
                        <p class="text-info" style="font-size: 11px">Kosongkan jika tidak ingin mengganti password</p>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="foto" class="col-3 col-form-label">Foto</label>
                        <div class="col-9">
                            <input class="form-control @error('foto') is-invalid @enderror" type="file" id="image" name="foto" onchange="previewImage()">
                            <p class="text-info" style="font-size: 11px">Kosongkan jika tidak ingin mengganti foto</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_user" value="{{ $user->id }}">
                    <input type="hidden" name="old_foto" value="{{ $user->foto }}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Update Profil</button>
                </div>
            </form>
        </div>
    </div>
</div>
