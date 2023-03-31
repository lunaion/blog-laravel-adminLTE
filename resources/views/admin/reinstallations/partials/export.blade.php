
<h1>Registro de Reinstalaciones</h1>

<table class="table table-striped">

    <thead>
        <tr>
            <th>Ticket #</th>
            <{{-- th>Documento</th>
            <th>Usuario de red</th>
            <th>Ciudad</th>
            <th>Sede</th>
            <th>IP</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Fecha y hora del registro</th> --}}
        </tr>
    </thead>

    <tbody>
        @foreach ($reinstallations as $reinstallation)
            <tr>
                <td>{{$reinstallation?->ticket}}</td>
                {{-- <td>{{$turn->user->document}}</td>
                <td>{{$turn->user->username}}</td>
                <td>{{$turn?->city?->name }}</td>
                <td>{{$turn->local_ip}}</td>
                <td>{{$turn->status}}</td>
                <td>{{$turn->date}}</td>
                <td>{{$turn->time}}</td>
                <td>{{$turn->created_at}}</td> --}}
            </tr>                     
        @endforeach
    </tbody>

</table>