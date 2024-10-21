@include('header')
<link rel="stylesheet" href="/public/css/authorize.css">
<div class="container">
    <!-- Кнопки переключения -->
    <div class="text-center mb-4">
        <button class="btn btn-primary" id="showLogin">Вход</button>
        <button class="btn btn-secondary" id="showRegister">Регистрация</button>
    </div>

    <!-- Форма входа -->
    <div id="loginForm" class="auth-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Войти</button>
        </form>
    </div>

    <!-- Форма регистрации -->
    <div id="registerForm" class="auth-form d-none">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label>Имя</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Подтвердите пароль</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </div>
</div>
<script src="/public/js/authorize.js"></script>
@include('footer')
