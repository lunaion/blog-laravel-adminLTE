<h1>Registro de tickets vencidos</h1>

<table class="table table-striped">

    <thead>
        <tr>
            <th>Ticket #</th>
            <th>Fecha de llegada</th>
            <th>Asignado por</th>
            <th>Técnico en sede</th>
            <th>Asignado a la sede</th>
            <th>Asignado por el área</th>
            <th>Tiempo de vencido</th>
            <th>Detalles antes de la intervención del ticket</th>
            <th>Solución dada por el técnico en sede</th>
            <th>¿Se podía solucionar desde la sede que asigna?</th>
            <th>Fecha y hora del registro</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($expiredTickets as $expiredTicket)
            <tr>
                <td>{{$expiredTicket?->ticket}}</td>
                <td>{{$expiredTicket?->fecha_llegada}}</td>
                <td>{{$expiredTicket?->asignado?->name}}</td>
                <td>{{$expiredTicket?->tecnico?->name}}</td>
                <td>{{$expiredTicket?->site?->name}}</td>
                <td>{{$expiredTicket?->area?->name}}</td>
                <td>{{$expiredTicket?->tiempo_vencimiento}}</td>
                <td>{{$expiredTicket?->detalles}}</td>
                <td>{{$expiredTicket?->solucion}}</td>
                <td>{{$expiredTicket?->area_solucion}}</td>
                <td>{{$expiredTicket?->created_at}}</td>
            </tr>                     
        @endforeach
    </tbody>

</table>