<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soporte Local</title>
</head>

<body>

    <h1 class="titulos text-center">Detalles de la reintalación</h1>

    <!--HEADER-->
        <table class="div-1Header">
            <tr>
                <td class="logotd">
                    <img id="" src="{{base_path('public/vendor/adminlte/dist/img/logo-admin.png')}}" alt="logo" width="200" height="200">
                </td>
                
                <td class="datos-grales-td">
                    <table class="table_h_factura">
                        <thead>
                            <th class="headerDatosh titulos">Ticket # <span class="titulos">{{$reinstallation?->ticket}}</span></th>
                        </thead>
                        <tr>
                            <td class="titulos">
                                <p class="titulos">Información del usuario</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Nombre: <span>{{$reinstallation?->user?->name}}</span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Documento: <span>{{$reinstallation?->user?->document}}</span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Correo: <span>{{$reinstallation?->user?->email}}</span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Operación: <span>{{$reinstallation?->area?->name}}</span> </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Cargo: <span>{{$reinstallation?->position?->name}}</span> </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    
    <!--DATOS-->
    <table class="div-1Datos">
        <tr>
            <td class="receptor">
                <table class="table_receptor">
                    <tr>
                        <td class="titulos">
                            <p class="titulos">BackUps de Datos (Validaciones y observaciones antes del proceso)</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            @foreach ($reinstallation?->backups as $backup)
                                <p>
                                    <span>{{ $backup->name . ',' }}</span>
                                </p>
                            @endforeach
                        </td>
                    </tr>
                </table>
            </td>
            <td class="datosGral">
                    <table class="table_datos">
                        <tr>
                            <td>
                                <p>
                                    Fecha actual:
                                </p>
                            </td>
                            <td>
                                <p>
                                <span>{{ date("Y-m-d h:i:s")}}</span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Fecha de la reinstalación:
                                </p>
                            </td>
                            <td>
                                <p>
                                <span>{{$reinstallation?->created_at}}</span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Técnico:
                                </p>
                            </td>
                            <td>
                                <p>
                                    <span>{{$reinstallation?->tecnico->name}}</span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Ciudad:
                                </p>
                            </td>
                            <td>
                                <p>
                                    <span>{{$reinstallation?->city?->name}}</span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Sede:
                                </p>
                            </td>
                            <td>
                                <p>
                                    <span>{{$reinstallation?->site?->name}}</span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>
                                    Destalles de ubicación:
                                </p>
                            </td>
                            <td>
                                <p>
                                    <span>{{$reinstallation?->location_details}}</span>
                                </p>
                            </td>
                        </tr>
                    </table>
            </td>
        </tr>
    </table>
    <!--MATERIAL/PRODUCTO-->
        <table class="table_materiales">
            <thead>
                <tr>
                    <td>Cantidad de Máquinas</td>
                    <td>Observaciones presentadas en el proceso de BackUp</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$reinstallation?->machines}}</td>
                    <td>{{$reinstallation?->backups_observations}}</td>
                </tr>
            </tbody>
        </table>

        <table class="table_materiales">
            <thead>
                <tr>
                    <td>Software antes del proceso</td>
                    <td>Validaciones y observaciones después del proceso</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$reinstallation?->validations_software}}</td>
                    <td>{{$reinstallation?->validations_observations}}</td>
                </tr>
            </tbody>
        </table>


     <!--DATOS FINALES-->
     <table class="div-1Datos">
        
        <td class="receptor">
            <table class="table_receptor">
                <tr>
                    <td class="titulos">
                        <p class="titulos">Activación de Licencias (Autorizadas)</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        @foreach ($reinstallation?->licenseActivations as $licenseActivation)
                            <p>
                                <span>{{ $licenseActivation->name . ',' }}</span>
                            </p>
                        @endforeach
                    </td>
                </tr>
            </table>
        </td>
        <td class="receptor">
            <table class="table_receptor">
                <tr>
                    <td class="titulos">
                        <p class="titulos">Validaciones Generales</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        @foreach ($reinstallation?->generalValidations as $generalValidation)
                            <p>
                                <span>{{ $generalValidation->name . ',' }}</span>
                            </p>
                        @endforeach
                    </td>
                </tr>
            </table>
        </td>

    </table>

    <table class="table_materiales">
        <thead>
            <tr>
                <td>Observaciones generales</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$reinstallation?->general_observation}}</td>
            </tr>
        </tbody>
    </table>

    <!--FIRMA-->
    <div class="firma">
        Firma del usuario
    </div>
    <!--FOOTER-->
    <footer>
        <p>La información contenida en este documento es solo de carácter informativo. - Soporte Local</p>
    </footer>
</body>

</html>
<style>
    /*ESTILOS GRALES*/
    * {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 12px;
    }

    .titulos {
        font-size: 15px;
        text-transform: uppercase;
    }

    /*HEADER*/
    .div-1Header, .div-1Datos {
        width: 100%;
    }

    .logotd {
        width: 50%;
        height: auto;
    }

    .datos-grales-td, .receptor{
        width: 50%;
    }

    .table_h_factura{
        width: 50%;
        height: 150px;
        background-color: #FFF;
        width: 100%;
        margin: 0px;
        padding: 0px;
    }
    .headerDatosh {
        text-align: right;
        color: #FFF;
        padding: 5px;
        background-color: #002855;
    }

    .table_h_factura tr td p {
        margin: 0px;
        padding: 2px;
        text-align: right;
        padding-right: 5px;
    }
    /*DATOS*/
    .table_receptor, .table_datos {
        width: 42%;
        height: 100px;
        background-color: rgba(243, 243, 243, 0.521);
        width: 100%;
        margin: 0px;
        padding: 10px;
        border-radius: 5px;
    }
    .table_receptor tr td p{
        margin: 0px;
        padding: 2px;
        text-align: left;
    }
    .tituloRec{
        color: rgb(14, 51, 73);
    }
    .table_datos tr td p{
        margin: 0px;
        padding: 2px;
        text-align: left;
    }
    /*MATERIALES*/
    .table_materiales{
        width: 100%;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .table_materiales thead tr{
        background-color:#002855;
        color: #FFF;
    }
    .table_materiales thead tr td{
        padding: 5px;
        text-align: center;
        font-size: 14px;
    }
    .table_materiales tr td{
        text-align: center;
        padding: 5px;
        border-bottom: 1px solid rgba(20, 20, 20, 0.096);
    }
    /*DATOS FINALES*/
    .table_datosFtxt{
        width: 70%;
        height: 100px;
        width: 100%;
        margin: 0px;
    }
    .datosFinales{
        width: 30%;
    }
    .datosFinales .table_datosfinales{
        width: 42%;
        height: 100px;
        width: 100%;
        margin: 0px;
        padding: 10px;
        border: 1px solid rgba(20, 20, 20, 0.096);
    }
    .datosFinales .table_datosfinales tr td p{
        margin: 0px;
        padding: 2px;
        text-align: left;
    }
    /*FIRMA*/
    .firma{
        border-top: 1px solid rgba(20, 20, 20, 0.5);
        text-align: center;
        width: 30%;
        margin-left: 70%;
        margin-top: 80px;
        padding-top:5px;
    }
    /*FOOTER*/
    footer{
        width: 100%;
        text-align: center;
        position: absolute;
        bottom: 0px;
    }
</style>
