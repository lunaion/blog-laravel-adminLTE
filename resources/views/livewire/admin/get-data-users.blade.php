<div>
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
                {!! Form::label('document', 'Documento') !!}
                {!! Form::number('document', null, ['class' => 'form-control', 'placeholder' => 'Digite el número de documento del usuario', 'wire:model' => 'document']) !!}
            
                @error('document')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="form-group">
                {!! Form::label('document', 'Documento del usuario') !!}
                {!! Form::number('document', null, ['class' => 'form-control', 'placeholder' => 'Documento del usuario', 'wire:model' => 'document', 'readonly']) !!}
            
                @error('document')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('name', 'Nombre del usuario') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del usuario', 'wire:model' => 'name', 'readonly']) !!}
            
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email del usuario', 'wire:model' => 'email', 'readonly']) !!}
            
                @error('email')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>
</div>
