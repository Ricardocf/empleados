<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Empleado;
use App\Skill;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleados = Empleado::orderBy('nombre', 'ASC')->paginate(2);
        return view('index')->with('empleados',$empleados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empleado = new Empleado($request->all());
        $empleado->save();
        //dd($request->skills);
        for($i=0; $i<count($request->skills);$i++){
            $nombre = $request->skills[$i];
            $calificacion = $request->skills_exp[$i];
            $skill = new Skill();
            $skill->empleado()->associate($empleado);
            $skill->nombre = $nombre;
            $skill->experiencia = $calificacion;
            $skill->save();
        }
        //Flash::success('Se ha creado el artículo '.$article->title.' de forma satisfactoria.');

        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);//->with('skills')->get();
        //dd($empleado->all());
        $skills = Empleado::find($id)->skills;
        return view('empleados.show')->with('empleado',$empleado)->with('skills',$skills);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
