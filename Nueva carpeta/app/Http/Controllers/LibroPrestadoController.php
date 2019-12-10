<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LibroPrestado;
class LibroPrestadoController extends Controller
{
    public function listarPrestados(){
        $response= LibroPrestado::all(['fecha_prestamo', 'fecha_devolucion', 'user_id', 'libro_id']);
        return response()-> json($response);
    }
    public function crearPrestamo(Request $request){
        $prestado = new LibroPrestado;
        $save=true;
        if(!empty($request->libro_id))
            $prestado->libro_id=$request->libro_id;
        else{
            $save=false;
            $response = array('error_code' => 500, 'error_msg' => 'libro_id vacio');
        }
        if(!empty($request->fecha_prestamo))
            $prestado->fecha_prestamo=$request->fecha_prestamo;
        else{
            $save=false;
            $response = array('error_code' => 500, 'error_msg' => 'fecha_prestamo vacio');
        }
        $prestado->fecha_devolucion=$request->fecha_devolucion;
        if(!empty($request->user_id))
            $prestado->user_id=$request->user_id;
        else{
            $save=false;
            $response = array('error_code' => 500, 'error_msg' => 'user_id vacio');
        }
        if($save){
            $prestado->save();
            $response = array('error_code' => 200, 'error_msg' => 'prestamo realizado');
        }
        return response()-> json($response);
    }
    public function editarPrestamo(Request $request, $id){
        $response = array('ok_codeerror_code' => 404, 'ok_merror_msgsg' => 'not found');
        $libro = LibroPrestado::where('id', $id);
        if(!empty($libro)){
            $libro->update(['fecha_devolucion' => $request->fecha_devolucion]);
            $response = array('ok_codeerror_code' => 200, 'ok_merror_msgsg' => 'libro devuelto');
        }
        return response()-> json($response);
    }
}
