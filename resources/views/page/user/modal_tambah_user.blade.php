<div style="z-index: 999999" class="modal fade" id="modalcreateuser" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title" id="staticBackdropLabel">Tambah Data User</h4>
            </div>
            <form action="/user" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row mb-2">
                        <label for="name" class="col-3 col-form-label">Nama</label>
                        <div class="col-9">
                        <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="username" class="col-3 col-form-label">Username</label>
                        <div class="col-9">
                        <input class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" type="text" name="username">
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="email" class="col-3 col-form-label">Email</label>
                        <div class="col-9">
                        <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" name="email">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="password" class="col-3 col-form-label">Password</label>
                        <div class="col-9">
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="level" class="col-3 col-form-label">Role</label>
                        <div class="col-9">
                        <select name="level" class="form-control @error('level') is-invalid @enderror">
                            <option disabled selected value>Pilih Role</option>
                            <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ old('level') == 'user' ? 'selected' : '' }}>User</option>
                            <option value="pimpinan" {{ old('level') == 'pimpinan' ? 'selected' : '' }}>Pimpinan</option>
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
                        @error('foto')
                        <p class="text-danger" style="font-size: 13px">{{ $message }}</p>
                        @enderror
                        </div>   
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
