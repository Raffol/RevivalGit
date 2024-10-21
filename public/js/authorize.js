// Показать форму входа
document.getElementById('showLogin').addEventListener('click', function() {
    document.getElementById('loginForm').classList.remove('d-none');
    document.getElementById('registerForm').classList.add('d-none');
});

// Показать форму регистрации
document.getElementById('showRegister').addEventListener('click', function() {
    document.getElementById('registerForm').classList.remove('d-none');
    document.getElementById('loginForm').classList.add('d-none');
});
