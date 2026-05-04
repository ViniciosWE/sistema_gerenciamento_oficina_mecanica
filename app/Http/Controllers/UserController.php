<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colaboradores = User::orderBy('name')->get();
        return view('adm.colaboradores.index', compact('colaboradores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adm.colaboradores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Sem permissão');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required'
        ], [
            'name.required' => 'O nome é obrigatório',
            'email.required' => 'O email é obrigatório',
            'email.email' => 'Email inválido',
            'email.unique' => 'Este email já está em uso',
            'password.required' => 'A senha é obrigatória',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres',
            'password.confirmed' => 'As senhas não coincidem',
            'role.required' => 'Selecione um cargo'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect()->route('colaboradores.index')->with('success', 'Usuário cadastrado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('adm.colaboradores.create', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Sem permissão');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,caixa,mecanico',
            'password' => 'nullable|min:6|confirmed'
        ], [
            'email.email' => 'Email inválido',
            'email.unique' => 'Este email já está em uso',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres',
            'password.confirmed' => 'As senhas não coincidem',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('colaboradores.index')
            ->with('success', 'Usuário atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (auth()->id() == $user->id) {
            return redirect()->route('colaboradores.index')->with('error', 'Você não pode excluir seu próprio usuário!');
        }

        if ($user->ordensServico()->exists()) {
            return redirect()->route('colaboradores.index')
                ->with('error', 'Não é possível excluir este usuário, pois ele possui ordens de serviço.');
        }

        $user->delete();

        return redirect()->route('colaboradores.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
