@extends('admin.admin')

@section('title', 'Категории')

@section('admin-content')

    <a href="{{ route('categories.create') }}">Добавить категорию</a>

    <table class="table table-striped projects">

        <thead>
        <tr>

            <th style="width: 3%">
                ID
            </th>

            <th style="width: 10%">
                Название категории
            </th>

            <th style="width: 10%">
                Количество книг в категории
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
        @foreach($categories as $category)
            <tr>

                <td>
                    {{ $category->id }}
                </td>

                <td>
                    {{ $category->title }}
                </td>

                <td>
                    {{ $category->books->count() }}
                </td>

                <td>
                    {{ $category->slug }}
                </td>

                <td class="project-actions text-right">
                    <a class="btn btn-info btn-sm" href="{{ route('categories.edit', $category->id) }}">Редактировать</a>

                    <form action="{{ route('categories.destroy', $category->id) }}" method="post">
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
