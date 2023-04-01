
<h1>Registro de Reinstalaciones</h1>

<table class="table table-striped">

    <thead>
        <tr>
            <th>Ticket #</th>
            <th>Actividad realizada por</th>
            <th>Usuario</th>
            <th>Documento</th>
            <th>Correo</th>
            <th>Área</th>
            <th>Cargo</th>
            <th>Ciudad</th>
            <th>Sede</th>
            <th>Ubicación en sede</th>
            <th>Cantidad de máquinas</th>
            <th>Fecha y hora del registro</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($reinstallations as $reinstallation)
            <tr>
                <td>{{$reinstallation?->ticket}}</td>
                <td>{{$reinstallation?->tecnico?->name}}</td>
                <td>{{$reinstallation?->user?->name}}</td>
                <td>{{$reinstallation?->user?->document}}</td>
                <td>{{$reinstallation?->user?->email}}</td>
                <td>{{$reinstallation?->area?->name}}</td>
                <td>{{$reinstallation?->position?->name}}</td>
                <td>{{$reinstallation?->city?->name}}</td>
                <td>{{$reinstallation?->site?->name}}</td>
                <td>{{$reinstallation?->location_details}}</td>
                <td>{{$reinstallation?->machines}}</td>
                <td>{{$reinstallation?->created_at}}</td>
            </tr>                     
        @endforeach
    </tbody>

</table>