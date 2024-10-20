@include('header')
<h1>Редактировать профиль</h1>

<form method="POST" action="{{ route('editprofile') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Имя</label>
        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
    </div>

    <div class="form-group">
        <label>Аватар</label>
        <input type="file" name="avatar" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Сохранить изменения</button>
    <a href="{{ route('lk') }}" class="btn btn-secondary">Отмена</a>
</form>
@include('footer')
