@extends('admin.layouts.dashboard.index')

@section('title', 'Usuários')
@section('page-title', 'Usuários')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-center table-hover mb-0 datatable">
                            <thead>
                                <tr>
                                    <th>Cargo</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>

                                    <th class="text-end">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->cargo->name ?? '—' }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>

                                        <td class="text-end">
                                            <div class="wrapper">
                                                <div class="icon edit-icon">
                                                    <a href="{{ route('users.edit', $user->id) }}" title="Editar">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <div class="tooltip">Editar</div>
                                                </div>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="icon delete-icon">
                                                        <button type="submit" title="Excluir" style="border: none; background: none; cursor: pointer;">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                        <div class="tooltip">Excluir</div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
