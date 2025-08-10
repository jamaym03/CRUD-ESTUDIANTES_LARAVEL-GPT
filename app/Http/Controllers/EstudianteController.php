<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Muestra todos los estudiantes
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index',compact('estudiantes'));
    }

    /**
     * Muestra el formulario para crear el nuevo estudiante
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Guarda el nuevo estudiante en la base de datos
     */
    public function store(Request $request)
    {
        // validar los datos
        $request->validate([
           'nombre'=>'required',
            'email'=>'required|email|unique:estudiantes',
            'edad' =>'required|integer|min:1|max:120',
        ]);

        //guarda el estudiante
        Estudiante::create($request->all());

        //redirige con mensaje
        return redirect()->route('estudiantes.index')->with('success','Estudiante creado correctamente');

    }

    /**
     * muestra un estudiante en especifico
     */
    public function show(string $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit',compact('estudiante'));
    }

    /**
     * muestra el formulario para editar
     */
    public function edit(string $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit',compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // validar los datos
        $request->validate([
            'nombre'=>'required',
         //   'email'=>'required|email|unique:estudiantes,email'.$id,
            'email'=>'required|email|unique:estudiantes,email,'.$id,

            'edad' => 'required|integer|min:1|max:120',

        ]);

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')->with('success','Estudiante actualizado correctamente');


    }

    /**
     * eliminar el estudiante
     */
    public function destroy(string $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('success','Estudiante eliminado exitosamente');
    }
}
