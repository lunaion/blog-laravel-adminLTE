<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Digite el nombre de la activación de licencia...']) !!}

    @error('name')
        <small class="text-danger">{{$message}}</small>        
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Digite el slug de la activación de licencia...', 'readonly']) !!}

    @error('slug')
        <small class="text-danger">{{$message}}</small>        
    @enderror
</div>