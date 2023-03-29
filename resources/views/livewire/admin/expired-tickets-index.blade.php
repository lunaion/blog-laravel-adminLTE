<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Puedes buscar por ticket, nombre de usuario que asigna, técnico en sede, área o sede ">
    </div>

    @if ($expiredTickets->count() > 0)

        <div class="card-body">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Ticket #</th>
                        <th>Asignado por</th>
                        <th>Técnico en sede</th>
                        <th>Sede</th>
                        <th>Área asigndora</th>
                        <th>Tiempo de vencido</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($expiredTickets as $expiredTicket)
                        <tr>
                            <td>{{ $expiredTicket->ticket }}</td>
                            <td>{{ $expiredTicket->asignado?->name }}</td>
                            <td>{{ $expiredTicket->tecnico?->name }}</td>
                            <td>{{ $expiredTicket->site?->name }}</td>
                            <td>{{ $expiredTicket->area?->name }}</td>
                            <td>{{ $expiredTicket->tiempo_vencimiento }}</td>
                            <td width="10px">
                                    <a class="btn btn-success btn-sm" href="{{route('admin.expiredTickets.show', $expiredTicket)}}">Ver</a>
                            </td>
                            <td width="10px">
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.expiredTickets.edit', $expiredTicket)}}">Editar</a>
                            </td>
                            <td width="10px">
                                    <form action="{{route('admin.expiredTickets.destroy', $expiredTicket)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="card-footer">
            {{ $expiredTickets->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No se encontró ningún registro con ese nombre.</strong>
        </div>

    @endif

</div>
