@extends('admin.admin')

@section('title', $book->title)

@section('content')

    <div class="card" style="width: 100%;">

        <img src="{{ asset('/storage/' . $book->cover) }}" class="card-img-top" alt="{{ $book->title }}" style="width: 500px; height:
        500px;">

        <div class="card-body">
            <h5 class="card-title"><b>Название</b>: {{ $book->title }}</h5>
            <p class="card-text"><b>Описание</b>: {{ $book->description }}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Автор</b>: {{ $book->author }}</li>
            <li class="list-group-item"><b>Категория</b>: {{ $book->category->title }}</li>
            <li class="list-group-item"><b>Рейтинг</b>: {{ $book->rating }}</li>
        </ul>

    </div>

    <h3 style="margin-top: 20px;">Комментарии</h3>

    <ul class="list-group list-group-flush">

        @foreach($comments as $comment)
            <li class="list-group-item">
                <b>Автор</b>: {{ $comment->user->name }}<br>
                <b>Текст комментария</b>: {{ $comment->text }}<br>
                <b>Дата</b>: {{ \Carbon\Carbon::create($comment->created_at)->diffForHumans() }}
            </li>
        @endforeach
    </ul>



    @auth()
        <form action="{{ route('comments.store', $book) }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Добавить комментарий</label>
                <input type="text" name="text" class="form-control @error('text') is-invalid @enderror" id="exampleInputEmail1"
                       aria-describedby="emailHelp" value="{{ old('text') }}">
                <div id="emailHelp" class="form-text">Минимум 3 символа, максимум 100, обязательно</div>
            </div>

            @error('text')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    @endauth
    @guest()
        <b>Комментарии могут оставлять только зарегистрированные пользователи</b>
        <a href="{{ route('register') }}">Зарегистрироваться</a>
        <a href="{{ route('login') }}">Войти</a>
    @endguest

@endsection
