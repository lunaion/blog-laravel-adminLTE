
<h1>Lista de usuarios y su rol</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @foreach ($user->roles as $role )
                        <span class="badge badge-primary">{{ $role->name }}</span>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>