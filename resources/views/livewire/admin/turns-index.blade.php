<div class="card">

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Digite el nombre del usuario">
    </div>

    @if ($turns->count())

        <div class="card-body">
            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Nombre de usuario</th>
                        <th>Documento</th>
                        <th>Usuario de red</th>
                        <th>Ciudad</th>
                        <th>Sede</th>
                        <th>IP</th>
                        <th>Fecha y hora de ingreso</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($turns as $turn)
                        <tr>
                            <td>{{$turn->user->name}}</td>
                            <td>{{$turn->user->document}}</td>
                            <td>{{$turn->user->username}}</td>
                            <td>{{$turn->city->name}}</td>
                            <td>{{$turn->site->name}}</td>
                            <td>{{$turn->local_ip}}</td>
                            <td>{{$turn->created_at}}</td>
                        </tr>                     
                    @endforeach
                </tbody>

            </table>
        </div>

        <div class="card-footer">
            {{$turns->links()}}
        </div>

    @else

        <div class="card-body">
            <strong>No se encontró ningún registro con ese nombre.</strong>
        </div>
        
    @endif

</div>
