<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pagar - Copa Centenario UPeU</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{asset('favicon.ico')}}" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css') }}">
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <div class="row justify-content-center">
                <div class="card" style="width: 25rem;"> 
                    <div class="card-header">
                        <h4>Datos de la Inscripción</h4>
                        </div>
                        <div class="card-body">
                        <h4 class="col-sm-6 col-form-label col-form-label-md">DNI del Delegado</h4>
                        <input class="form-control form-control-sm" type="text" value="{{$pago->delegado}}" readonly="readonly">
                        <h4 class="col-sm-6 col-form-label col-form-label-md">Categoria</h4>
                        <input class="form-control form-control-sm" type="text" value="{{$pago->categorias}}" readonly="readonly">
                        <h4 class="col-sm-6 col-form-label col-form-label-md">Disciplinas</h4>
                        <input type="text" class="form-control form-control-sm" value="{{$pago->disciplina}}" readonly="readonly">
                        <h4 class="col-sm-6 col-form-label col-form-label-md">Costo Final</h4>
                        <input type="text" class="form-control form-control-sm" value="S/. {{$pago->costo}}" readonly="readonly">
                    </div>
                
        

        <!--div class="col-lg-6"-->
            <!--ul class="nav nav-tabs">
                <li class="nav-items">
                    <a href="#tab" data-toggle="tab" class="nav-link active">
                        <span class="d-sm-none">Pagar con VISA y Mastercard</span>
                        <span class="d-sm-block d-none">Pagar con VISA y Mastercard</span>
                    </a>
                </li>
            </ul-->
            <div class="tab-content">
                <div class="text-left tab-pane fade active show" id="tab">
                    <p style="text-align: center">Verifica que tus datos sean correctos, antes de efectuar el pago.</p>
                </div>
                <form id="formVisa" name ="formVisa" method="POST" action="https://api-lamb.upeu.edu.pe/visa/tokens" target="visaFrame">
                    <input type="hidden" name="tipodoc" value="1" autocomplete="off">
                    <input type="hidden" name="nombre" value="" autocomplete="off">
                    <input type="hidden" name="paterno" value="" autocomplete="off">
                    <input type="hidden" name="materno" value="" autocomplete="off">
                    <input type="hidden" name="sexo" value="" autocomplete="off">
                    <input type="hidden" name="correo" value="" autocomplete="off">
                    <input type="hidden" name="numdoc" value="{{$pago->delegado}}" autocomplete="off">
                    <input type="hidden" name="id_operacion" value="624"  autocomplete="off">
                    <input type="hidden" name="tokens" value="$2y$10$jfeV4ewDnkHjilscOvy5h.sAYBwEzfJgFbnl3Asd0FvUcTOs6EZxu" autocomplete="off">
                    <input type="hidden" name="id_negocio" value="1" autocomplete="off">
                    <input type="hidden" name="id_aplicacion" value="7" autocomplete="off">
                    <input type="hidden" name="moneda" value="0" autocomplete="off">
                    <input type="hidden" name="importe" id="importe" value="{{$pago->costo}}" autocomplete="off">               
                    <button type="button"  onclick="enviar()" class=" btn btn-primary btn-lg"  style="background-color: #731027; border-color: #731027; margin-left: 40%">Pagar</button>
                </form>
				</div>       
            </div>
                <div class="modal fade" tabindex="-1" id="modalvisa" role="dialog" aria-hidden="true" aria-labelledby="modalcontrollabel">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="modalcontrollabel">Pagos Visa </h5>
								 <button type="button" class="close" aria-hidden="true" onclick="fncerrarmodalvisa()">x</button>
							</div>

							<div class="modal-body">
								<iframe name="visaFrame"  width="100%" height="750"></iframe>
							</div>
						</div>
					</div>
				</div>
                <script type="text/javascript">
                    $( "#target" ).submit(function( event ) {            
                        event.preventDefault();
                    });
                        function enviar()
                        {
                            var importev=document.getElementById('importe').value;
                            if(importev.length==0)
                            {	alert("Ingrese un valor mayor a 0");
                                return true;
                            }else if(importev<=0){
                                alert("Ingrese un valor mayor a 0");
                                return true;
                            }else{
                                document.formVisa.submit();
                                fnabrirvisa();
                                }
                        }

                        function fnmodalvisa(){

                        $('#modalvisa').modal({ show: true,backdrop: "static",keyboard: false});
                        }
                        function fncerrarmodalvisa(){
                        $("#modalvisa").modal("hide");
                        //alert('ok');
                        //window.location.href = "reporte";
                        }
                        function fnabrirvisa() {
                        var frm =$("#frmpagosvisa");
                        //alert(frm);
                        if (frm) {
                            frm.submit();
                        }
                        fnmodalvisa();
                        }		
                </script>
            </div>
        <!--/div-->
		</div>
    </div>
</body>
</html>