<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro Copa Centenario 2019 </title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
	<link href="{{asset('favicon.ico')}}" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
</head>
<body style="background-image: url({{asset('img/bg-copa-centenario.jpg')}}); background-repeat: no-repeat, repeat; background-position: center; background-size: cover; height: 100vh;">
<div class="container-fluid"> <!--#9A2E46-->
    <div class="row justify-content-center" style="margin-bottom: 50px">
    </div>
    <div class="row justify-content-center">
        <div class="mx-auto col-sm-6">
            <p style="font-family: 'Pacifico', cursive; color: white; font-size: 70px">Copa Centenario</p>
        </div>

        <div class="mx-auto col-sm-5">
            <div class="card" style="border-radius: 30px; margin-top: 10%; box-shadow: 10px 10px black">
                <div class="card-body">
                    <form method="post" action="{{route('inscripcion')}}" accept-charset="UTF-8"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-lg-2 col-form-label form-control-label">Promoción:</div>
                            <div class="col-lg-4">
                                <select class="form-control" name="categorias">
                                    <option value="" actived>Selecciona su Promoción</option>
                                    <option value="Colegio Union">Colegio Unión</option>
                                    <option value="CESU">CESU</option>
									<option value="UPeU">UPeU</option>
                                </select>
                            </div>
							<div class="col-lg-3 col-form-label form-control-label">Año de Egreso:</div>
							<div class="col-lg-3">
                                <input type="text" id="egreso" name="egreso" class="form-control" placeholder="2013">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Disciplina</label>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Futsal Varones"
                                                   name="disciplina[]"
                                                   onchange="toggleCheckbox(this)">
                                            <label class="form-check-label">Futsal Varones</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Voley Damas"
                                                   name="disciplina[]"
                                                   onchange="toggleCheckbox(this)">
                                            <label class="form-check-label">Voley Damas</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Basquet Varones"
                                                   name="disciplina[]"
                                                   onchange="toggleCheckbox(this)">
                                            <label class="form-check-label">Básquet Varones</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Basquet Damas"
                                                   name="disciplina[]"
                                                   onchange="toggleCheckbox(this)">
                                            <label class="form-check-label">Básquet Damas</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Costo</label>
                            <div class="col-lg-9">
                                <input class="form-control" name="costo" value="S/. 0" id="costo" readonly=”readonly”>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label form-control-label">Adjunta lista de Jugadores</label>
                            <div class="col-lg-7">
                                <label for="file" class="custom-file-label" id="archivo">Subir Archivo</label>
                                <input class="custom-file-input" type="file" name="file" id="file" lang="en"
                                       onchange="nombreArchivo()">
                            </div>
                            <div class="col-lg-12" style="text-align: right; font-size: 15px">
                                <p>Descargue el formato. <a href="recursos/formato-inscrpciones.xlsx">Descagar Formato</a></p>  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">DNI Delegado</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" placeholder="Ingrese su DNI"
                                       name="delegado">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" onchange="reglamento(this)">
                                <label class="form-check-label">Acepto haber leido el reglamento de la Copa Centenario</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-sm disabled" id="btnsave" type="submit" disabled>
                            Registrarse
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reglamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe width="100%" height="500" src="{{asset('recursos/ECO-1927.pdf')}}" frameborder="0"></iframe>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleCheckbox(element) {
        var costoDOM = document.getElementById('costo').value;
        var x = costoDOM.split(" ");
        var costo = x[1];
        costo = parseInt(costo);

        if (element.checked == true) {
            document.getElementById('costo').value = "S/. " + String(costo + 150);
        } else {
            document.getElementById('costo').value = "S/. " + String(costo - 150);
        }
    }

    function reglamento(element) {
        if (element.checked == true) {
            document.getElementById('btnsave').classList.remove('disabled');
            document.getElementById('btnsave').classList.add('active');
            document.getElementById('btnsave').disabled = false;

            $('.modal').modal('show');
        } else {
            document.getElementById('btnsave').classList.remove('active');
            document.getElementById('btnsave').classList.add('disabled');
            document.getElementById('btnsave').disabled = true;
        }
    }

    function nombreArchivo() {
        document.getElementById("archivo").innerHTML = document.getElementById("file").files[0].name;
    }
</script>
<style type="text/css">
    #costo {
        border: 0px;
        color: red;
        text-decoration: none;
        background-color: white;
        text-align: center;
        padding: 0px;
        font-weight: bold;
        outline: none !important;
        box-shadow: none
    }
</style>
</body>
</html>