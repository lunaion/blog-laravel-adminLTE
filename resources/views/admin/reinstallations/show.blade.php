@extends('adminlte::page')

@section('title', 'Soporte Local')

@section('content_header')
    <h1></h1>
@stop

@section('content')

    <h2>Detalles de la reinstalación con ticket #{{$reinstallation?->ticket}}</h2>
    <a class="btn btn-danger btn-sm float-right" href="#">Generar PDF</a>

    <p>Desde aquí podrás ver los detalles de una reinstalación en especifico.</p>

    <div class="card">
        <div class="card-body">

            <div class="form-group">
                {!! Form::label('tecnico_id', 'Técnico que realizó la actividad') !!}
                {!! Form::text('tecnico_id', $reinstallation?->tecnico->name, ['class' => 'form-control', 'readonly']) !!}
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('ticket', 'Ticket número') !!}
                        {!! Form::number('ticket', $reinstallation?->ticket, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('document', 'Documento del usuario') !!}
                        {!! Form::number('document', $reinstallation?->user->document, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('name', 'Nombre del usuario') !!}
                        {!! Form::text('name', $reinstallation?->user?->name, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::email('email', $reinstallation?->user->email, ['class' => 'form-control','readonly']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('area_id', 'Área') !!}
                        {!! Form::text('area_id', $reinstallation?->area?->name, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('position_id', 'Cargo') !!}
                        {!! Form::text('position_id', $reinstallation?->position?->name, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('city_id', 'Ciudad') !!}
                        {!! Form::text('city_id', $reinstallation?->city?->name, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('site_id', 'Sede') !!}
                        {!! Form::text('site_id', $reinstallation?->site?->name, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('location_details', 'Detalles de ubicación') !!}
                        {!! Form::text('location_details', $reinstallation?->location_details, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('machines', 'Cantidad de máquinas') !!}
                        {!! Form::number('machines', $reinstallation?->machines, ['class' => 'form-control', 'readonly']) !!}
                    </div>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <p class="font-weight-bold">BackUps de Datos (Validaciones y observaciones antes del proceso) </p>
                @foreach ($reinstallation?->backups as $backup)
                    <label class="mr-2">
                        {{ $backup->name . ',' }}
                    </label>
                @endforeach
            </div>

            <hr>

            <div class="form-group">
                {!! Form::label('backups_observations', 'Observaciones presentadas en el proceso de BackUp') !!}
                {!! Form::textarea('backups_observations', $reinstallation?->backups_observations, ['class' => 'form-control', 'rows' => 4, 'cols' => 40, 'readonly']) !!}
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('validations_software', 'Software antes del proceso') !!}
                        {!! Form::textarea('validations_software', $reinstallation?->validations_software, ['class' => 'form-control', 'rows' => 4, 'cols' => 40, 'readonly']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('validations_observations', 'Validaciones y observaciones después del proceso') !!}
                        {!! Form::textarea('validations_observations', $reinstallation?->validations_observations, ['class' => 'form-control', 'rows' => 4, 'cols' => 40, 'readonly']) !!}
                    </div>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <p class="font-weight-bold">Activación de Licencias (Autorizadas)</p>
                @foreach ($reinstallation?->licenseActivations as $licenseActivation)
                    <label class="mr-2">
                        {{ $licenseActivation->name . ',' }}
                    </label>
                @endforeach
            </div>

            <hr>

            <div class="form-group">
                <p class="font-weight-bold">Validaciones Generales</p>
                @foreach ($reinstallation?->generalValidations as $generalValidation)
                    <label class="mr-2">
                        {{ $generalValidation->name . ',' }}
                    </label>
                @endforeach
            </div>

            <hr>

            <div class="form-group">
                {!! Form::label('general_observation', 'Observaciones generales') !!}
                {!! Form::textarea('general_observation', $reinstallation?->general_observation, ['class' => 'form-control', 'rows' => 4, 'cols' => 40, 'readonly']) !!}
            </div>

            <a class="btn btn-primary btn-sm float-right" href="{{route('admin.reinstallations.index')}}">Volver</a>

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