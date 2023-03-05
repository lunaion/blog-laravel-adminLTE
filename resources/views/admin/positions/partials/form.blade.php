<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Digite el nombre del cargo...']) !!}

    @error('name')
        <small class="text-danger">{{$message}}</small>        
    @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Digite el slug del cargo...', 'readonly']) !!}

    @error('slug')
        <small class="text-danger">{{$message}}</small>        
    @enderror
</div>