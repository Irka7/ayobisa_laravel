<table class="table table-compact table-stripped" id="tabelUser">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nama Pengguna</th>
            <th>Hak Akses</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $u)
            <tr>
                <td>{{ $i = !isset($i)?$i=1:++$i }}</td>
                <td>{{ $u->name }}</td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->roles_id }}</td>
                <td>
                    <button class="btn btn-info" data-toggle="modal" data-target="#formUser" data-mode="edit" data-id="{{ $u->id }}" data-name="{{ $u->name }}" data-username="{{ $u->username }}" data-roles_id="{{ $u->roles_id }}" data-password="{{ $u->password }}"><i class="fas fa-edit"></i></button>
                    <form action="user/{{ $u->id }}" style="display: inline" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
