<table class="table table-striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Ciudad</th>
            <th>Contacto</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($sites as $site)
            <tr>
                <td>{{$site->id}}</td>
                <td>{{$site->name}}</td>
                <td>{{$site->address}}</td>
                <td>{{$site->phone}}</td>
                <td>{{$site->email}}</td>
                <td>{{$site->city->name}}</td>
                <td>{{$site->user->name}}</td>
            </tr>
        @endforeach
    </tbody>
</table>