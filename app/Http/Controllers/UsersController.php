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
    // Lista todos os usuários — renderiza a view com dados para montar os modais
    public function index(Request $request)
    {
        $users      = User::with(['cargo', 'status'])->paginate(15);
        $cargos     = UsersCargosModel::all();
        $statuses   = UsersStatusModel::all();
        $activeMenu = $request->segment(1) ?? 'users';

        return view('users.index', compact('users', 'cargos', 'statuses', 'activeMenu'));
    }

    // Retorna os dados necessários para popular o modal de criação via AJAX
    public function create()
    {
        $cargos   = UsersCargosModel::all();
        $statuses = UsersStatusModel::all();

        return response()->json([
            'cargos'   => $cargos,
            'statuses' => $statuses,
        ]);
    }

    // Rota: POST /register — cria um novo usuário (usada pelo modal de criação/dashboard)
    public function register(Request $request)
    {
        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'  => ['required', 'confirmed', Password::min(8)],
            'cargo_id'  => ['required', 'exists:cargos_users,id'],
            'status_id' => ['required', 'exists:status_users,id'],
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'cargo_id'  => $request->cargo_id,
            'status_id' => $request->status_id,
        ]);

        return response()->json([
            'message' => 'Usuário criado com sucesso.',
            'user'    => $user->load(['cargo', 'status']),
        ], 201);
    }

    // Retorna os dados de um usuário para popular o modal de edição via AJAX
    public function edit(string $id)
    {
        $user     = User::with(['cargo', 'status'])->findOrFail($id);
        $cargos   = UsersCargosModel::all();
        $statuses = UsersStatusModel::all();

        return response()->json([
            'user'     => $user,
            'cargos'   => $cargos,
            'statuses' => $statuses,
        ]);
    }

    // Atualiza os dados do usuário — chamado pelo modal de edição via AJAX
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
                'password' => ['confirmed', Password::min(8)],
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return response()->json([
            'message' => 'Usuário atualizado com sucesso.',
            'user'    => $user->fresh(['cargo', 'status']),
        ]);
    }

    // Remove o usuário — chamado pelo modal de confirmação de remoção via AJAX
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'Usuário removido com sucesso.',
        ]);
    }
}
