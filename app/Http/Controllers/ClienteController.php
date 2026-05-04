<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::orderBy('nome')->get();
        return view('adm.clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adm.clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:11|min:9|unique:clientes,telefone',
            'email' => 'email|max:255|unique:clientes,email',
            'endereco' => 'nullable|string|max:1000',
        ], [
            'email.email' => 'Email inválido',
            'email.unique' => 'Este email já está em uso',
            'telefone.unique' => 'Este telefone já está em uso',
            'telefone.min' => 'O telefone deve ter no mínimo 9 caracteres',
            'telefone.max' => 'O telefone deve ter no máximo 11 caracteres',
        ]);

        Cliente::create($validated);

        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('adm.clientes.create', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:11|min:9|unique:clientes,telefone,' . $cliente->id,
            'email' => 'nullable|email|max:255|unique:clientes,email,' . $cliente->id,
            'endereco' => 'nullable|string|max:1000',
        ], [
            'email.email' => 'Email inválido',
            'email.unique' => 'Este email já está em uso',
            'telefone.unique' => 'Este telefone já está em uso',
            'telefone.min' => 'O telefone deve ter no mínimo 9 caracteres',
            'telefone.max' => 'O telefone deve ter no máximo 11 caracteres',
        ]);

        $cliente->update($request->only([
            'nome',
            'telefone',
            'email',
            'endereco'
        ]));

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        if ($cliente->ordensServico()->exists()) {
            return redirect()->route('clientes.index')
                ->with('error', 'Não é possível excluir este cliente, pois ele possui ordens de serviço.');
        }

        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente excluído com sucesso!');
    }
}
