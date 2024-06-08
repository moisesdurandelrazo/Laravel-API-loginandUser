<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Estudiante::all();
    }

    /**
     * Store a newly created resource in storage
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $respuesta = Estudiante::create($inputs);
        return response()->json([
            'data'=>$respuesta,
            'mensaje'=> 'Estudiante actualizado',
        ]);
    }

    /**
     * Display the specified resource
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $e = Estudiante::find($id);
        if(isset($e)){
            return response()->json([
            'data'=>$e,
            'mensaje'=> 'Estudiante encontrado',
            ]);
        }else{
            return response()->json([
            'error'=>true,
            'mensaje'=> 'No existe',
            ]);
        }
    }

    /**
     * Update the specified resource in storage
     *
     * @param \Illuminate\Http\Resquest $request 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $e = Estudiante::find($id);
        if(isset($e)){
            $e->nombre = $request->nombre;
            $e->apellido = $request->apellido;
            $e->foto = $request->foto;
            if($e->save()){
                return response()->json([
                'data'=>$e,
                'mensaje'=> 'Estudiante actualizado',
                ]);
            }else{
                return response()->json([
                'error'=>true,
                'mensaje'=> 'No se actualizo',
                ]);
            }
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=> 'No existe el estudiante',
            ]);
        }
    }

    /**
     * Remove the specified resource in storage
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $e= Estudiante::find($id);
        if(isset($e)){
            $res=Estudiante::destroy($id);
            if($res){
                return response()->json([
                'data'=>$e,
                'mensaje'=>"Estudiante eliminado",
            ]);
            }
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>"No existe",
            ]);
        }
    }
}