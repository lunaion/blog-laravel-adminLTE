<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Digite el nombre de la ciudad">
    </div>

    @if ($cities->count())

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>País</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cities as $city)
                        <tr>
                            <td>{{$city->id}}</td>
                            <td>{{$city->name}}</td>
                            <td>
                                @foreach ($city->countries as $country)
                                    {{$country->name}}
                                @endforeach
                            </td>
                            <td width="10px">
                                @can('admin.cities.edit')
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.cities.edit', $city)}}">Editar</a>
                                @endcan
                            </td>
                            <td width="10px">
                                @can('admin.cities.destroy')
                                    <form action="{{route('admin.cities.destroy', $city)}}" method="POST">
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
        
    @else

        <div class="card-body">
            <strong>No se encontró ningún registro con ese nombre.</strong>
        </div>
        
    @endif

</div>
