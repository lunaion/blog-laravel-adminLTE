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
                            <td>{{ $reinstallation->created_at }}</td>
                            <td width="10px">
                                @can('admin.reinstallations.show')
                                    <a class="btn btn-success btn-sm" href="{{route('admin.reinstallations.show', $reinstallation)}}">Ver</a> 
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.reinstallations.edit')
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.reinstallations.edit', $reinstallation)}}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.reinstallations.destroy')
                                    <form action="{{route('admin.reinstallations.destroy', $reinstallation)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                @endcan
                            </td>
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
