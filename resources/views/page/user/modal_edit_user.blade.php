<div style="z-index: 999999" class="modal fade" id="edit_data_user{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title" id="staticBackdropLabel">Edit Data User</h4>
            </div>
            <form action="/user/{{ $item->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row mb-2">
                        <label for="name" class="col-3 col-form-label">Nama</label>
                        <div class="col-9">
                        <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $item->name) }}" type="text" name="name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="username" class="col-3 col-form-label">Username</label>
                        <div class="col-9">
                        <input class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $item->username) }}" type="text" name="username">
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-3 col-form-label">Email</label>
                        <div class="col-9">
                        <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $item->email) }}" type="email" name="email">
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
                        <label for="level" class="col-3 col-form-label">Role</label>
                        <div class="col-9">
                        <select name="level" class="form-control @error('level') is-invalid @enderror">
                            <option disabled selected value>Pilih Role</option>
                            <option value="admin" {{ old('level', $item->level) == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ old('level', $item->level) == 'user' ? 'selected' : '' }}>User</option>
                            <option value="pimpinan" {{ old('level', $item->level) == 'pimpinan' ? 'selected' : '' }}>Pimpinan</option>
                        </select>
                        @error('level')
                        <p class="text-danger" style="font-size: 13px">{{ $message }}</p>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="foto" class="col-3 col-form-label">Foto</label>
                        <div class="col-9">
                        <input class="form-control @error('foto') is-invalid @enderror" type="file" name="foto">
                        <p class="text-info" style="font-size: 11px">Kosongkan jika tidak ingin mengganti foto</p>
                        </div>
                        @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id_user" value="{{ $item->id }}">
                    <input type="hidden" name="old_foto" value="{{ $item->foto }}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
