<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('ticket', 'Ticket #') !!}
            {!! Form::number('ticket', null, ['class' => 'form-control', 'placeholder' => 'Digite el número de ticket vencido']) !!}
        
            @error('ticket')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('fecha_llegada', 'Fecha de llegada') !!}
            {!! Form::date('fecha_llegada', null, ['class' => 'form-control']) !!}
        
            @error('fecha_llegada')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('asignado_por', 'Asignado por') !!}
            {!! Form::select('asignado_por', $users, null, ['class' => 'form-control']) !!}
        
            @error('asignado_por')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('site_id', 'Asignado a la sede') !!}
            {!! Form::select('site_id', $sites, null, ['class' => 'form-control']) !!}
        
            @error('site_id')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('area_asignadora', 'Asignado por el área') !!}
            {!! Form::select('area_asignadora', $areas, null, ['class' => 'form-control']) !!}
        
            @error('area_asignadora')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('tiempo_vencimiento', 'Tiempo de vencido') !!}
            {!! Form::text('tiempo_vencimiento', null, ['class' => 'form-control', 'placeholder' => 'Digite los días o horas de vencido']) !!}
        
            @error('tiempo_vencimiento')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('detalles', 'Detalles o apuntes antes de intervenir el ticket') !!}
            {!! Form::textarea('detalles', null, ['class' => 'form-control', 'placeholder' => '¿Qué considera usted que le falto por realizar por parte del área que asigna el ticket?', 'rows' => 6, 'cols' => 40]) !!}
        
            @error('detalles')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {!! Form::label('solucion', 'Solución dada desde la sede') !!}
            {!! Form::textarea('solucion', null, ['class' => 'form-control','placeholder' => 'Por favor haga una breve descripción de la solución que dio desde la sede', 'rows' => 6, 'cols' => 40]) !!}
        
            @error('solucion')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            {!! Form::label('area_solucion', '¿Usted cree que esto era necesario escalarlo con soporte campo?') !!}
            {!! Form::select('area_solucion', $area_solucion, null, ['class' => 'form-control']) !!}
        
            @error('area_solucion')
                <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
