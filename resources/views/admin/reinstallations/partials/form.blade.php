@livewire('admin.get-data-users')

<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('area_id', 'Área') !!}
            {!! Form::select('area_id', $areas, null, ['class' => 'form-control']) !!}
        
            @error('area_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('position_id', 'Cargo') !!}
            {!! Form::select('position_id', $positions, null, ['class' => 'form-control']) !!}
        
            @error('position_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('city_id', 'Ciudad') !!}
            {!! Form::select('city_id', $cities, null, ['class' => 'form-control']) !!}
        
            @error('city_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('site_id', 'Sede') !!}
            {!! Form::select('site_id', $sites, null, ['class' => 'form-control']) !!}
        
            @error('site_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('location_details', 'Detalles de ubicación') !!}
            {!! Form::text('location_details', null, ['class' => 'form-control', 'placeholder' => 'Piso, etapa, ala']) !!}
        
            @error('location_details')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('machines', 'Cantidad de máquinas') !!}
            {!! Form::number('machines', null, ['class' => 'form-control', 'placeholder' => 'Cantidad de máquinas a intervenir']) !!}
        
            @error('machines')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <p class="font-weight-bold">BackUps de Datos (Validaciones y observaciones antes del proceso) </p>

    @foreach ($backups as $backup)
        
        <label class="mr-2">
            {!! Form::checkbox('backups[]', $backup->id, null) !!}
            {{$backup->name}}
        </label>

    @endforeach

    @error('backups')
        <br>
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('backups_observations', 'Observaciones presentadas en el proceso de BackUp') !!}
    {!! Form::textarea('backups_observations', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}

    @error('backups_observations')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('validations_software', 'Software antes del proceso') !!}
            {!! Form::textarea('validations_software', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}
        
            @error('validations_software')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('validations_observations', 'Validaciones y observaciones después del proceso') !!}
            {!! Form::textarea('validations_observations', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}
        
            @error('validations_observations')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <p class="font-weight-bold">Activación de Licencias (Autorizadas)</p>

    Se imprime listado de licencias, donde se selecionará solo las aprobadas, instaladas y activadas.
    {{-- @foreach ($tags as $tag)
        
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{$tag->name}}
        </label>

    @endforeach --}}

    @error('tags')
        <br>
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Validaciones Generales</p>

    Se imprime listado de posibles validaciones, dondes se seleccionará solo las realizadas.
    {{-- @foreach ($tags as $tag)
        
        <label class="mr-2">
            {!! Form::checkbox('tags[]', $tag->id, null) !!}
            {{$tag->name}}
        </label>

    @endforeach --}}

    @error('tags')
        <br>
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('general_observation', 'Observaciones generales') !!}
    {!! Form::textarea('general_observation', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}

    @error('general_observation')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

