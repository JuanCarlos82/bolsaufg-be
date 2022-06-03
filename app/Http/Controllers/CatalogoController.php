<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator, Input, Redirect;


use App\Models\Arte;

class CatalogoController extends Controller{

//Listando
    public function index(){
        $data = arte::all();
        return response($data);
    }

//Listando con ID
    public function show($id){
        $data = Arte::where('id', $id)->get();

        if(count($data) > 0){
            return response ($data);
        }else{
            return response('Empresa no encontrada');
        }
    }

//Insertando uno nuevo
    public function store(Request $request){

        $validated = Validator::make($request->all(),[            
            'empresa'           => 'required',
            'trabajo'           => 'required',
            'lugar'             => 'required',
            'contacto'          => 'required',
            'requisitos'        => 'required',
            'carrera'           => 'required',
            'cualidades'        => 'required',            
            'fecha_inicio'      => 'required',
            'tiempo_finaliza'   => 'required'
        ]);

        if($validated->fails()){
            return $validated->errors();
        }

        $new_arte = new Arte();
                
        $new_arte->empresa              = $request->empresa;
        $new_arte->trabajo              = $request->trabajo;
        $new_arte->lugar                = $request->lugar;
        $new_arte->contacto             = $request->contacto;
        $new_arte->requisitos           = $request->requisitos;
        $new_arte->carrera              = $request->carrera;
        $new_arte->cualidades           = $request->cualidades;
        $new_arte->fecha_inicio         = $request->fecha_inicio;
        $new_arte->tiempo_finaliza      = $request->tiempo_finaliza;
    
        $new_arte->save();

        return response('Agregado con exito');
    } 

//actualizar un registro por id
    public function update(Request $request, $id){
        
        $update_arte = Arte::find($id);
        
        if (!$update_arte) {
            return response('Esa empresa no existe');
        }

        $validated = Validator::make($request->all(), [
            'empresa'           => 'required',
            'trabajo'           => 'required',
            'lugar'             => 'required',
            'contacto'          => 'required',
            'requisitos'        => 'required',
            'carrera'           => 'required',
            'cualidades'        => 'required',            
            'fecha_inicio'      => 'required',
            'tiempo_finaliza'   => 'required'            
        ]);

        if ($validated->fails()) {
            return $validated->errors();
        }


        $update_arte->empresa           = $request->empresa         ? $request->empresa         : $update_arte->empresa;
        $update_arte->trabajo           = $request->trabajo         ? $request->trabajo         : $update_arte->trabajo;
        $update_arte->lugar             = $request->lugar           ? $request->lugar           : $update_arte->lugar;
        $update_arte->contacto          = $request->contacto        ? $request->contacto        : $update_arte->contacto;
        $update_arte->requisitos        = $request->requisitos      ? $request->requisitos      : $update_arte->requisitos;
        $update_arte->carrera           = $request->carrera         ? $request->carrera         : $update_arte->carrera;
        $update_arte->cualidades        = $request->cualidades      ? $request->cualidades      : $update_arte->cualidades;
        $update_arte->fecha_inicio      = $request->fecha_inicio    ? $request->fecha_inicio    : $update_arte->fecha_inicio;
        $update_arte->tiempo_finaliza   = $request->tiempo_finaliza ? $request->tiempo_finaliza : $update_arte->tiempo_finaliza;

    $update_arte->save();
    //dd($update_arte); exit();
    //if(!$update_arte->update()){
      //  return response('Hubo un error al actualizar la informacion');
        //}
    return response('Actualizado con exito');
    }

//Eliminando un registro
    public function delete($id){
        //$data = arte::where('id', $id)->first();
        $data = arte::where('id', $id);
        //dd($data); exit();
        if (!$data) {
            return response('Esa empresa no existe');
        }
            $data->delete();
            return response('Borrado con exito');
    }

}

