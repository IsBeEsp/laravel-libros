<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\User;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::with('user')->paginate(10);
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autores = User::orderBy('name')->pluck('name', 'id');
        return view('libros.create', compact('autores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validaciones
        $request->validate([
            'titulo'=>['required', 'string', 'unique:libros,titulo'],
            'resumen'=>['required','string'],
            'pvp'=>['required', 'numeric', 'min:0', 'max:100'],
            'stock'=>['required', 'numeric', 'min:0', 'max:999'],
            'user_id'=>['required','exists:users,id']
        ]);

        // Guardar registro y redirigir a índice.
        Libro::create($request->all());
        return redirect()->route('libro.index')->with('mensaje', "Libro guardado");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        $autores = User::orderBy('name')->pluck('name', 'id');
        return view('libros.edit', compact('libro', 'autores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        // Validaciones
        $request->validate([
            'titulo'=>['required', 'string', 'unique:libros,titulo,'.$libro->titulo.',titulo'],
            'resumen'=>['required','string'],
            'pvp'=>['required', 'numeric', 'min:0', 'max:100'],
            'stock'=>['required', 'numeric', 'min:0', 'max:999'],
            'user_id'=>['required','exists:users,id']
        ]);

        // Guardar registro y redirigir a índice.
        $libro->update($request->all());
        return redirect()->route('libro.index')->with('mensaje', "Libro guardado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libro.index')->with('mensaje', "Libro borrado.");
    }
}
