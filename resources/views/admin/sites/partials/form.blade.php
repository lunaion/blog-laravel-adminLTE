<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Digite el nombre de la sede...']) !!}
        
            @error('name')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('slug', 'Slug') !!}
            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Digite el slug de la sede...', 'readonly']) !!}
        
            @error('slug')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

<div class="col">
    <div class="form-group">
        {!! Form::label('address', 'Dirección') !!}
        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Digite la dirección de la sede...']) !!}
    
        @error('address')
            <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
</div>


<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('phone', 'Teléfono') !!}
            {!! Form::number('phone', null, ['class' => 'form-control', 'placeholder' => 'Digite el teléfono de la sede...']) !!}
        
            @error('phone')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Digite el email de la sede...']) !!}
        
            @error('email')
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
            {!! Form::label('user_id', 'Contacto') !!}
            {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
        
            @error('user_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>


