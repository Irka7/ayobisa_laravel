<div class="modal fade" id="formUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="user" method="POST">
                    @csrf
                    <div id="method" class="method"></div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" value="" name="name" placeholder="Nama">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-sm-4 col-form-label">Nama Pengguna</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="username" value="" name="username" placeholder="Nama Pengguna">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">Kata Sandi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="password" value="" name="password" placeholder="Kata Sandi">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="roles_id" class="col-sm-4 col-form-label">Hak Akses</label>
                        <div class="col-sm-8">
                            <select name="roles_id" id="roles_id" class="form-control" required>
                                <option value="">Pilih Hak Akses</option>
                                @foreach ($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
