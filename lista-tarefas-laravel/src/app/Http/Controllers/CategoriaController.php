<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Valida se os dados vieram preenchidos corretamente
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'sla_horas' => 'required|integer|min:1',
        ]);

        // 2. Salva no banco de dados
        Categoria::create($dados);

        // 3. Redireciona de volta para a lista com uma mensagem de sucesso
        return redirect()->route('categorias.index')->with('success', 'Categoria cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'sla_horas' => 'required|integer|min:1',
        ]);

        $categoria->update($dados);

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
