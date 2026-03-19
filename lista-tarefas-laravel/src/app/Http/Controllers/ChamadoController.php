<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Models\Categoria;
use App\Models\Tecnico;
use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    public function index(Request $request)
    {
        $query = Chamado::with(['tecnico', 'categoria']);

        // Regra: Filtro por prioridade e status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('prioridade')) {
            $query->where('prioridade', $request->prioridade);
        }

        // Regra: Ordenação automática (Alta > Média > Baixa) e data
        $query->orderByRaw("FIELD(prioridade, 'alta', 'média', 'baixa')")
              ->orderBy('data_abertura', 'asc');

        $chamados = $query->get();

        return view('chamados.index', compact('chamados'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $tecnicos = Tecnico::all();
        return view('chamados.create', compact('categorias', 'tecnicos'));
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'prioridade' => 'required|in:baixa,média,alta',
            'status' => 'required|in:aberto,em_atendimento,resolvido,fechado',
            'data_abertura' => 'required|date',
            'tecnico_id' => 'required|exists:tecnicos,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Chamado::create($dados);

        return redirect()->route('chamados.index')->with('success', 'Chamado aberto com sucesso!');
    }

    public function show(Chamado $chamado)
    {
        return view('chamados.show', compact('chamado'));
    }

    public function edit(Chamado $chamado)
    {
        $categorias = Categoria::all();
        $tecnicos = Tecnico::all();
        return view('chamados.edit', compact('chamado', 'categorias', 'tecnicos'));
    }

    public function update(Request $request, Chamado $chamado)
    {
        $dados = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'prioridade' => 'required|in:baixa,média,alta',
            'status' => 'required|in:aberto,em_atendimento,resolvido,fechado',
            'data_abertura' => 'required|date',
            'tecnico_id' => 'required|exists:tecnicos,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        // Regra de Negócio 1: Chamado só pode ser fechado se estiver resolvido
        if ($dados['status'] === 'fechado' && $chamado->status !== 'resolvido') {
            return back()->withErrors(['status' => 'Um chamado só pode ser fechado se já estiver com o status "resolvido".'])->withInput();
        }

        $chamado->update($dados);

        return redirect()->route('chamados.index')->with('success', 'Chamado atualizado com sucesso!');
    }

    public function destroy(Chamado $chamado)
    {
        $chamado->delete();
        return redirect()->route('chamados.index')->with('success', 'Chamado excluído!');
    }
}