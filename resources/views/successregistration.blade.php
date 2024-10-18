@include('header')
<style>
    div{
        text-align: center;
        font-size: large;
    }
</style>
<div>
    <h2>Вы успешно зарегистрировались!</h2>
    <p>Теперь вы можете войти в свой личный кабинет.</p>
    <a href="{{ route('login') }}">Войти</a>
</div>
@include('footer')
