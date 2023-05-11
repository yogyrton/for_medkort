@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Библиотека</h1>
                <p class="lead text-muted">С дизайном и версткой как Вы и говорили особо не заморачивался)</p>

            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @forelse($books as $book)

                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{ asset('/storage/' . $book->cover) }}"><title>
                                    {{ $book->title }}</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em"></text>
                            </img>

                            <div class="card-body">
                                <p class="card-text"><b>Название: </b>{{ $book->title }}</p>
                                <p class="card-text"><b>Категория: </b>{{ $book->category->title }}</p>
                                <p class="card-text"><b>Описание: </b>{{ $book->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Смотреть комментарии</button>
                                    </div>
                                    <small class="text-muted">{{ \Carbon\Carbon::create($book->updated_at)->diffForHumans() }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h3>На данный момент книг нету</h3>
                @endforelse

                    {{ $books->links() }}

            </div>
        </div>
    </div>

@endsection
