@extends('admin.admin')

@section('title', 'Редактировать книгу')

@section('admin-content')

    <form action="{{ route('books.update', $id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Название книги</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                   aria-describedby="emailHelp" value="{{ old('title', $book->title) }}">
            <div id="emailHelp" class="form-text">Минимум 3 символа, максимум 100, обязательно</div>
        </div>

        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Автор</label>
            <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" id="exampleInputEmail1"
                   aria-describedby="emailHelp" value="{{ old('author', $book->author) }}">
            <div id="emailHelp" class="form-text">Минимум 3 символа, максимум 100, обязательно</div>
        </div>

        @error('author')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Описание</label>
            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputEmail1"
                   aria-describedby="emailHelp" value="{{ old('description', $book->description) }}">
            <div id="emailHelp" class="form-text">Минимум 3 символа, максимум 100, обязательно</div>
        </div>

        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Картинка</label>
            <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror" id="exampleInputEmail1"
                   aria-describedby="emailHelp" value="{{ old('cover') }}">
            <div id="emailHelp" class="form-text">Не более 8 МБ, необязательно, останется старое фото</div>
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

        @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror


        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
