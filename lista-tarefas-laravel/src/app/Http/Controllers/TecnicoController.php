<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tecnicos = Tecnico::all();
        return view('tecnicos.index', compact('tecnicos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tecnicos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:tecnicos,email',
            'especialidade' => 'required|string|max:255',
        ]);

        Tecnico::create($dados);

        return redirect()->route('tecnicos.index')->with('success', 'Técnico cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tecnico $tecnico)
    {
        return view('tecnicos.show', compact('tecnico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tecnico $tecnico)
    {
        return view('tecnicos.edit', compact('tecnico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tecnico $tecnico)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            // Essa linha a baixo impede que seja causado um erro de "email já existente" ou algo semelhante
            'email' => 'required|email|unique:tecnicos,email,' . $tecnico->id,
            'especialidade' => 'required|string|max:255',
        ]);

        $tecnico->update($dados);

        return redirect()->route('tecnicos.index')->with('success', 'Técnico atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tecnico $tecnico)
    {
        $tecnico->delete();
        return redirect()->route('tecnicos.index')->with('success', 'Técnico excluído com sucesso!');
    }
}
