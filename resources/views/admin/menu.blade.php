@if (session('error'))
    <div class="alert alert-danger">
        <li>{{ session('error') }}</li>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        <li>{{ session('success') }}</li>
    </div>
@endif


<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Админка</h1>
            <a href="{{ route('categories.index') }}" class="lead text-muted">Категории</a>
            <a href="{{ route('books.index') }}" class="lead text-muted">Книги</a>
            <a href="{{ route('users.index') }}" class="lead text-muted">Сотрудники</a>
        </div>
    </div>
</section>
