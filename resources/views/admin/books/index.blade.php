@extends('admin.admin')

@section('title', 'Книги')

@section('admin-content')

    <a href="{{ route('books.create') }}">Добавить книгу</a>

    <table class="table table-striped projects">

        <thead>
        <tr>

            <th style="width: 3%">
                ID
            </th>

            <th style="width: 10%">
                Название книги
            </th>

            <th style="width: 10%">
                Категория
            </th>

            <th style="width: 10%">
                Автор
            </th>

            <th style="width: 10%">
                Картинка
            </th>

            <th style="width: 10%">
                Слаг
            </th>

            <th style="width: 10%">
                Действия
            </th>

        </tr>
        </thead>

        <tbody>
        @foreach($books as $book)
            <tr>

                <td>
                    {{ $book->id }}
                </td>

                <td>
                    {{ $book->title }}
                </td>

                <td>
                    {{ $book->category->title }}
                </td>

                <td>
                    {{ $book->author }}
                </td>

                <td>
                    <img src="{{ asset('/storage/' . $book->cover) }}" alt="{{ $book->title }}" width="60px" height="60px">
                </td>

                <td>
                    {{ $book->slug }}
                </td>

                <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="{{ route('books.edit', $book->id) }}">Редактировать</a>

                    <form action="{{ route('books.destroy', $book->id) }}" method="post">
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
