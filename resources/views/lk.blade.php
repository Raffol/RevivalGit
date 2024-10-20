{{--<style>
    img{
        height: 300px;

    }
    .welcome{
        display: flex;
        margin-left: 250px;
        margin-top: 150px;
        margin-bottom: 150px;

    }
    td{
        font-size: 30px;
    }
    tr{
        gap: 10px;
    }
    .logoutt{
        margin-top: -470px;
        margin-left: 1300px;
        background-color: #aba244;
        color: white;
        border-radius: 40px;
        font-size: medium;
        padding: 10px;
    }
    .logoutt:hover{
        color: red;
    }
    .editprofile{
        margin-top: -485px;
        margin-left: 1100px;
        background-color: #aba244;
        color: white;
        border-radius: 40px;
        font-size: medium;
        padding: 10px;
    }
    .editprofile:hover{
        color: orange;
    }

</style>--}}

    @include('header')

    <h1>Добро пожаловать, {{ $user->name }}!</h1>

<p><strong>Имя:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>

@if($user->avatar)
    <img src="{{ asset('img/' . $user->avatar) }}" alt="Аватар" width="100">
@else
    <p>Аватар не загружен</p>
@endif

<a href="{{ route('editprofile') }}" class="btn btn-primary">Редактировать профиль</a>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="logoutt" type="submit">Logout</button>
</form>
<button class="editprofile" type="submit">Изменить профиль</button>
<button class="createnews" type="submit">Добавить новость</button>


    @include('footer')

