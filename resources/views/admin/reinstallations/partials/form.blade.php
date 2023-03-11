@livewire('admin.get-data-users')
{{-- <div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('ticket', 'Ticket número') !!}
            {!! Form::number('ticket', null, ['class' => 'form-control', 'placeholder' => 'Digite el número del ticket']) !!}
        
            @error('ticket')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('documentSearch', 'Documento') !!}
            {!! Form::number('documentSearch', null, ['class' => 'form-control', 'placeholder' => 'Digite el número de documento del usuario']) !!}
        
            @error('documentSearch')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('document', 'Documento del usuario') !!}
            {!! Form::number('document', null, ['class' => 'form-control', 'placeholder' => 'Documento del usuario', 'readonly']) !!}
        
            @error('document')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('name', 'Nombre del usuario') !!}
            {!! Form::number('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del usuario', 'readonly']) !!}
        
            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email del usuario', 'readonly']) !!}
        
            @error('email')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div> --}}

<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('area_id', 'Área') !!}
            {!! Form::select('area_id', ['Bancolombia SAC','Bancolombia CBZ', 'Bancolombia Virtuales'], null, ['class' => 'form-control']) !!}
        
            @error('area_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('position_id', 'Cargo') !!}
            {!! Form::select('position_id', ['Líder Bacolombia SAC','Líder Bancolombia CBZ', 'Líder Bancolombia Virtuales'], null, ['class' => 'form-control']) !!}
        
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
            {!! Form::select('city_id', ['Medellín','Montería'], null, ['class' => 'form-control']) !!}
        
            @error('city_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('site_id', 'Sede') !!}
            {!! Form::select('site_id', ['CEOH','Puerto Seco'], null, ['class' => 'form-control']) !!}
        
            @error('site_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('detalles', 'Detalles de ubicación') !!}
            {!! Form::text('document', null, ['class' => 'form-control', 'placeholder' => 'Piso, etapa, ala']) !!}
        
            @error('document')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('maquinas', 'Cantidad de máquinas') !!}
            {!! Form::number('document', null, ['class' => 'form-control', 'placeholder' => 'Cantidad de máquinas a intervenir']) !!}
        
            @error('document')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <p class="font-weight-bold">BackUps de Datos (Validaciones y observaciones antes del proceso) </p>

    Se imprime listado donde se selecionará solo las opciones de realización de backups.
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
    {!! Form::label('obser_backups', 'Observaciones presentadas en el proceso de BackUp') !!}
    {!! Form::textarea('obser_backups', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}

    @error('obser_backups')
        <small class="text-danger">{{$message}}</small>
    @enderror
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('before_software', 'Software antes del proceso') !!}
            {!! Form::textarea('before_software', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}
        
            @error('before_software')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('validation_observation', 'Validaciones y observaciones después del proceso') !!}
            {!! Form::textarea('validation_observation', null, ['class' => 'form-control', 'rows' => 2, 'cols' => 40]) !!}
        
            @error('validation_observation')
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

