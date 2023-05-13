@extends('admin.admin')

@section('title', 'Редактировать сотрудника')

@section('admin-content')

    <form action="{{ route('users.update', $id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Имя</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"
                   aria-describedby="emailHelp" value="{{ old('name', $user->name) }}">
            <div id="emailHelp" class="form-text">Минимум 3 символа, максимум 100, обязательно</div>
        </div>

        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                   aria-describedby="emailHelp" value="{{ old('email', $user->email) }}">
            <div id="emailHelp" class="form-text">Минимум 3 символа, максимум 100, обязательно</div>
        </div>

        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror



        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Роль</label>
            <select class="form-select" aria-label="Пример выбора по умолчанию" name="is_admin">
                    <option value="{{ $user->is_admin }}">{{ $user->is_admin ? 'Админ' : 'Пользователь' }}</option>
                    <option value="0">Пользователь</option>
                    <option value="1">Админ</option>

            </select>
        </div>


        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
