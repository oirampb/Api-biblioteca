<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libro;

class LibrosController extends Controller
{
    public function listarTodos(){
        $response = Libro::all(['id', 'titulo', 'sinopsis', 'genero', 'autor']);
        return response()-> json($response);
    }
    public function listarPorAutor($autor){
        $response = array('error_code' => 404, 'error_msg' => 'autor  not found');
        $response = Libro::where('autor',$autor)->get();
        return response()-> json($response); 
    }
    public function listarPorGenero($genero){
        $response = array('error_code' => 404, 'error_msg' => 'genero  not found');
        $response = Libro::where('genero',$genero)->get();
        return response()-> json($response);
    }
    public function crearLibro(Request $request){
        $response = array('error_code' => 404, 'error_msg' => 'not found');
        $libro = new Libro;
        $save=true;
        if(!empty($request->titulo))
            $libro->titulo=$request->titulo;
        else{
            $response = array('error_code' => 500, 'error_msg' => 'titulo vacio');
            $save=false;
        }
        if(!empty($request->genero))
            $libro->genero=$request->genero;
        else{
            $response = array('error_code' => 500, 'error_msg' => 'genero vacio');
            $save=false;
        }   
        if(!empty($request->sinopsis))
            $libro->sinopsis=$request->sinopsis;
        else{
            $response = array('error_code' => 500, 'error_msg' => 'sinopsis vacia');
            $save=false;
        }
        if(!empty($request->autor))
            $libro->autor=$request->autor;
        else{
            $response = array('error_code' => 500, 'error_msg' => 'autor vacio');
            $save=false;
        }
        if($save){
            $libro->save();
            $response = array('error_code' => 200, 'error_msg' => 'Libro creado');
        }
        return response()-> json($response);
    }
    public function editarLibro(Request $request, $id){
        $response = array('ok_code' => 404, 'error_msg' => 'not found');
        $libro = Libro::find($id);
        $save=true;
        if(!empty($libro)){
            if(!empty($request->titulo))
                $libro->titulo=$request->titulo;
            else{
                $response = array('error_code' => 500, 'error_msg' => 'titulo vacio');
                $save=false;
            }
            if(!empty($request->genero))
                $libro->genero=$request->genero;
            else{
                $response = array('error_code' => 500, 'error_msg' => 'genero vacio');
                $save=false;
            }   
            if(!empty($request->sinopsis))
                $libro->sinopsis=$request->sinopsis;
            else{
                $response = array('error_code' => 500, 'error_msg' => 'sinopsis vacia');
                $save=false;
            }
            if(!empty($request->autor))
                $libro->autor=$request->autor;
            else{
                $response = array('error_code' => 500, 'error_msg' => 'autor vacio');
                $save=false;
            }
            if($save){
                $libro->save();
                $response = array('error_code' => 200, 'error_msg' => 'Libro editado');
            }
            return response()-> json($response);
        }
    }
    public function borrarLibro(Request $request, $id){
        $response = array('ok_code' => 404, 'error_msg' => 'not found');
        $libro = Libro::find($id);
        if(!empty($libro)){
            $libro->delete();
            $response = array('ok_code' => 200, 'error_msg' => 'libro borrado');
        }
        return response()-> json($response);
    }
}
