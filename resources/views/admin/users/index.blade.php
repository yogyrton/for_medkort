@extends('admin.admin')

@section('title', 'Сотрудники')

@section('admin-content')

    <a href="{{ route('users.create') }}">Добавить сотрудника</a>

    <table class="table table-striped projects">

        <thead>
        <tr>

            <th style="width: 3%">
                ID
            </th>

            <th style="width: 10%">
                Имя
            </th>

            <th style="width: 10%">
                Роль
            </th>

            <th style="width: 10%">
                Email
            </th>

            <th style="width: 10%">
                Действия
            </th>

        </tr>
        </thead>

        <tbody>
        @foreach($users as $user)
            <tr>

                <td>
                    {{ $user->id }}
                </td>

                <td>
                    {{ $user->name }}
                </td>

                <td>
                    {{ $user->is_admin ? 'Админ' : 'Пользователь' }}
                </td>

                <td>
                    {{ $user->email }}
                </td>

                <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="{{ route('users.edit', $user->id) }}">Редактировать</a>

                    <form action="{{ route('users.destroy', $user->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
