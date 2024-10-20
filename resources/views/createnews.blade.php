@include('header')

<h1>Добавить новость</h1>

<form method="POST" action="{{ route('createnews') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Заголовок</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Контент</label>
        <textarea name="content" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label>Изображение</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Добавить новость</button>
</form>

{{--
    <div class="container">
        <h1>Добавить новость</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('createnews') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="content">Содержание</label>
                <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" name="author" id="author" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Добавить новость</button>
        </form>
    </div>

--}}
@include('footer')
