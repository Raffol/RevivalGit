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

    <!-- Отображение аватарки пользователя -->
@if ($user->avatar)
    <img src="{{ Voyager::image($user->avatar) }}" alt="Ваш аватар" style="width: 150px; height: 150px; border-radius: 50%;">
@else
    <p>Аватарка не загружена</p>
@endif

    <p>Это ваш личный кабинет. Здесь вы можете управлять своим профилем и просматривать свою информацию.</p>


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="logoutt" type="submit">Logout</button>
</form>
<button class="editprofile" type="submit">Изменить профиль</button>

    @include('footer')

