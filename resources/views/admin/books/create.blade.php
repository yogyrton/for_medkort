@extends('admin.admin')

@section('title', 'Добавить книгу')

@section('admin-content')

    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Название книги</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                   aria-describedby="emailHelp" value="{{ old('title') }}">
            <div id="emailHelp" class="form-text">Минимум 3 символа, максимум 100, обязательно</div>
        </div>

        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Автор</label>
            <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" id="exampleInputEmail1"
                   aria-describedby="emailHelp" value="{{ old('author') }}">
            <div id="emailHelp" class="form-text">Минимум 3 символа, максимум 100, обязательно</div>
        </div>

        @error('author')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Описание</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputEmail1"
                   aria-describedby="emailHelp" value="{{ old('description') }}">
            <div id="emailHelp" class="form-text">Минимум 3 символа, максимум 100, обязательно</div>
        </div>

        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Картинка</label>
            <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror" id="exampleInputEmail1"
                   aria-describedby="emailHelp" value="{{ old('cover') }}">
            <div id="emailHelp" class="form-text">Не более 8 МБ, обязательно</div>
        </div>

        @error('cover')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Категория</label>
            <select class="form-select" aria-label="Пример выбора по умолчанию" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach

            </select>
        </div>




        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
