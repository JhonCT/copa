<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reporte Copa Centenario 2019</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
	<link href="{{asset('favicon.ico')}}" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css') }}">
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <table class="table table-hover col-9">
            <thead>
            <tr>
                <th>Promoción</th>
				<th>Año de Egreso</th>
                <th>Disciplinas</th>
                <th>Lista de Jugadores</th>
                <th>Nombre del Delegado</th>
                <th>Costo</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($inscripciones as $inscripcion)
                <tr>
                    <td>{{$inscripcion->categorias}}</td>
					<td>{{$inscripcion->egreso}}</td>
                    <td>{{$inscripcion->disciplina}}</td>
                    <td><a href="../storage/app/{{$inscripcion->jugadores}}" >{{$inscripcion->jugadores}}</a></td>
                    <td>{{$inscripcion->delegado}}</td>
                    <td>S/. {{$inscripcion->costo}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>