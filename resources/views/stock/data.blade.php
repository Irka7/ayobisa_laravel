<table class="table table-compact table-stripped" id="tabelStok">
    <thead>
        <tr>
            <th>No</th>
            <th>Menu</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stocks as $s)
            <tr>
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{ $s->menu_name }}</td>
                <td>{{ $s->stock }}</td>
                <td>
                    <button class="btn btn-info" data-toggle="modal" data-target="#formMenu" data-mode="edit"
                    data-id="{{ $s->id }}"
                    data-menu_id="{{ $s->menu_name }}"
                    data-stock="{{ $s->stock }}">
                    <i class="fas fa-edit"></i></button>
                    <form action="stok/{{ $s->id }}" style="display: inline" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
