<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Puedes buscar por nombre de usuario o documento">
    </div>

    @if ($reinstallations->count() > 0)

        <div class="card-body">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Ticket</th>
                        <th>Nombre de usuario</th>
                        <th>Documento</th>
                        <th>Usuario de red</th>
                        <th>Ciudad</th>
                        {{-- <th>Sede</th> --}}
                        {{-- <th>IP</th> --}}
                        {{-- <th>Estado</th> --}}
                        {{-- <th>Fecha</th> --}}
                        {{-- <th>Hora</th> --}}
                        <th>Fecha de creación</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($reinstallations as $reinstallation)
                        <tr>
                            <td>{{ $reinstallation->ticket }}</td>
                            <td>{{ $reinstallation->user->name }}</td>
                            <td>{{ $reinstallation->user->document }}</td>
                            <td>{{ $reinstallation->user->username }}</td>
                            <td>{{ $reinstallation->city->name }}</td>
                            {{-- <td>{{$reinstallation->site->name}}</td> --}}
                            {{-- <td>{{ optional($turn->city)->name }}</td> --}}
                            {{-- <td>{{ optional($turn->site)->name }}</td> --}}
                            {{-- <td>{{$turn->local_ip}}</td> --}}
                            {{-- <td>{{$turn->status}}</td> --}}
                            {{-- <td>{{$turn->date}}</td> --}}
                            {{-- <td>{{$turn->time}}</td> --}}
                            <td>{{ $reinstallation->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="card-footer">
            {{ $reinstallations->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No se encontró ningún registro con ese nombre.</strong>
        </div>

    @endif

</div>
