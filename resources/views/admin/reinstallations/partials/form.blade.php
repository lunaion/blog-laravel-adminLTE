<div class="row">
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
            Información .....
        
            @error('ticket')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

