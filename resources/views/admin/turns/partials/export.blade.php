
<h1>Registro de ingreso a turnos</h1>

<table class="table table-striped">

    <thead>
        <tr>
            <th>Nombre de usuario</th>
            <th>Documento</th>
            <th>Usuario de red</th>
            <th>Ciudad</th>
            <th>Sede</th>
            <th>IP</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Fecha y hora del registro</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($turns as $turn)
            <tr>
                <td>{{$turn->user->name}}</td>
                <td>{{$turn->user->document}}</td>
                <td>{{$turn->user->username}}</td>
                <td>{{ optional($turn->city)->name }}</td>
                <td>{{ optional($turn->site)->name }}</td>
                <td>{{$turn->local_ip}}</td>
                <td>{{$turn->status}}</td>
                <td>{{$turn->date}}</td>
                <td>{{$turn->time}}</td>
                <td>{{$turn->created_at}}</td>
            </tr>                     
        @endforeach
    </tbody>

</table>