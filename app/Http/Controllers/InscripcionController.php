<?php

namespace App\Http\Controllers;

use App\Inscripcion;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Http\Request;


class InscripcionController extends Controller
{

    public function registrarse(Request $request)
    {
        $disciplinas = $request['disciplina'];

        //Obteniendo el archivo
        $file = $request->file('file');
        $nombre = $file->getClientOriginalName();  
        $prefijoArchivo = explode(".", $nombre, 2)[0];        
        $extensionArchivo = explode(".", $nombre, 2)[1];
        $nombreArchivo = $prefijoArchivo.$request['delegado'].".".$extensionArchivo;
                
        //Guardar Archivo
        //Ver config/filesystems.php para configuración
        //de la dirección donde se guarda el documento
        \Storage::disk('local')->put($nombreArchivo, \File::get($file));

        $inscripcion = new Inscripcion($request->all());

        $inscripcion->jugadores = $nombreArchivo;

        //Conviertiendo el array de disciplinas a a string
        $inscripcion->disciplina = implode(", ", $disciplinas);

        //Conviertiendo costo

        $costo = explode(" ", $request['costo'], 2)[1];

        $inscripcion->costo = $costo;

        $inscripcion->save();

        $lastInscripcion = Inscripcion::all()->last();

        return view('pago')->with('pago', $lastInscripcion);
    }

    public function inscripciones(){
        $inscripciones = Inscripcion::all();
        return view('reporte')->with('inscripciones', $inscripciones);
    }

    public function downloadFile($file){
        $pathtoFile = 'https://juntos.upeu.edu.pe/copa/storage/app/'.$file; 
        return response()->download($pathtoFile);
    }
    //Subir el archivo excel de formato de jugadores a copa/public/recursos/
    //Cambiar el archivo ECO-1927.pdf por el archivo excel del formato de jugadores
    public function descargarFormato(){
        $pathtoFile = 'https://juntos.upeu.edu.pe/copa/public/recursos/formato-inscrpciones.xlsx';
        return response()->download($pathtoFile);
    }

    //Subir el archivo pdf de reglamento a copa/public/recursos/
    //Cambiar el archivo ECO-1927.pdf por el archivo pdf del reglamento
    public function descargarReglamento(){
        $pathtoFile = 'https://juntos.upeu.edu.pe/copa/public/recursos/ECO-1927.pdf';
        return response()->download($pathtoFile);
    }
}