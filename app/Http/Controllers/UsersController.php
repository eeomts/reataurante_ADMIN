<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersCargosModel;
use App\Models\UsersStatusModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with(['cargo', 'status'])->paginate(15);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $cargos = UsersCargosModel::all();
        $statuses = UsersStatusModel::all();
        return view('auth.register', compact('cargos', 'statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'confirmed', Password::defaults()],
            'cargo_id'  => ['required', 'exists:cargos_users,id'],
            'status_id' => ['required', 'exists:status_users,id'],
        ]);

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'cargo_id'  => $request->cargo_id,
            'status_id' => $request->status_id,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso.');
    }

    public function show(string $id)
    {
        $user = User::with(['cargo', 'status'])->findOrFail($id);
        return view('users.index', compact('user'));
    }

    public function edit(string $id)
    {
        $user     = User::findOrFail($id);
        $cargos   = UsersCargosModel::all();
        $statuses = UsersStatusModel::all();
        return view('users.index', compact('user', 'cargos', 'statuses'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
            'cargo_id'  => ['required', 'exists:cargos_users,id'],
            'status_id' => ['required', 'exists:status_users,id'],
        ]);

        $data = $request->only(['name', 'email', 'cargo_id', 'status_id']);

        if ($request->filled('password')) {
            $request->validate([
                'password' => ['confirmed', Password::defaults()],
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso.');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso.');
    }
}
