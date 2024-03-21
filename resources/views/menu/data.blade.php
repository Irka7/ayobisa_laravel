<table class="table table-compact table-stripped" id="tabelMenu">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menus as $m)
            <tr>
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{ $m->menu_name }}</td>
                <td>{{ $m->name }}</td>
                <td>{{ $m->price }}</td>
                <td><img src="{{ asset('storage/images/.$m->image') }}" alt=""></td>
                <td>{{ $m->description }}</td>

                <td>
                    <button class="btn btn-info" data-toggle="modal" data-target="#formMenu" data-mode="edit"
                    data-id="{{ $m->id }}"
                    data-menu_name="{{ $m->menu_name }}"
                    data-kategori_id="{{ $m->name }}"
                    data-price="{{ $m->price }}"
                    data-image="{{ $m->image }}"
                    data-description="{{ $m->description }}">
                    <i class="fas fa-edit"></i></button>
                    <form action="Menu/{{ $m->id }}" style="display: inline" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
