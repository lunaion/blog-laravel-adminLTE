@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <h2>Detalles del ticket vencido #{{$expiredTicket?->ticket}}</h2>

    <p>Desde aquí podrás ver en detalle la información de un ticket vencido en especifico.</p>

    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('tecnico_sede', 'Técnico que reporta la novedad') !!}
                        {!! Form::text('tecnico_sede', $expiredTicket?->tecnico->name, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('ticket', 'Ticket número') !!}
                        {!! Form::number('ticket', $expiredTicket?->ticket, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('fecha_llegada', 'Fecha de llegada') !!}
                        {!! Form::date('fecha_llegada', $expiredTicket?->fecha_llegada, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('asignado_por', 'Asignado por') !!}
                        {!! Form::text('asignado_por', $expiredTicket?->tecnico->name, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('site_id', 'Asignado a la sede') !!}
                        {!! Form::text('site_id', $expiredTicket?->site?->name, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('area_asignadora', 'Asignado por el área') !!}
                        {!! Form::text('area_asignadora', $expiredTicket?->area?->name, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('tiempo_vencimiento', 'Tiempo de vencido') !!}
                        {!! Form::text('tiempo_vencimiento', $expiredTicket?->tiempo_vencimiento, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('detalles', 'Detalles o apuntes antes de intervenir el ticket') !!}
                        {!! Form::textarea('detalles', $expiredTicket?->detalles, ['class' => 'form-control', 'rows' => 6, 'cols' => 40, 'readonly']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('solucion', 'Solución dada desde la sede') !!}
                        {!! Form::textarea('solucion', $expiredTicket?->solucion, ['class' => 'form-control', 'rows' => 6, 'cols' => 40, 'readonly']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('area_solucion', '¿Usted cree que esto era necesario escalarlo con soporte campo?') !!}
                        {!! Form::text('tiempo_vencimiento', $expiredTicket?->area_solucion, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
            </div>

            <a class="btn btn-primary btn-sm float-right" href="{{route('admin.expiredTickets.index')}}">Volver</a>

        </div>
        
    </div>
    
@stop

<section>
    <script>
        textarea{  
        overflow:hidden;
        display:block;
        height:auto;
        }
    </script>
</section>