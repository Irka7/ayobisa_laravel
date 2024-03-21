<div class="modal fade" id="formMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Jenis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="menu" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div id="method" class="method"></div>

                    <div class="form-group row">
                        <label for="menu_name" class="col-sm-4 col-form-label">Nama Menu</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="menu_name" value="" name="menu_name" placeholder="Nama Menu">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kategori_id" class="col-sm-4 col-form-label">Kategori</label>
                        <div class="col-sm-8">
                            <select name="kategori_id" id="kategori_id" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($kategoris as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="price" class="col-sm-4 col-form-label">Harga</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="price" value="" name="price" placeholder="Harga">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="image" class="col-sm-4 col-form-label">Gambar</label>
                        <img class="img-preview img-fluid" style="max-height: 200px">
                        <div class="col-sm-8">
                            <input type="file" class="form-control" name="image" id="image" onchange="previewImage()">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="description" value="" name="description" placeholder="Keterangan">
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
