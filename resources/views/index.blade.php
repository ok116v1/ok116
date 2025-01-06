<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Ваш Отдел Кадров</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><img src="{{ asset('img/logo.svg') }}" width="400"></li>
                <li><a href="#">Аутстаффинг</a></li>
                <li><a href="#">Работа с иностранными специалистами</a></li>
                <li><a href="#">О нас</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </nav>
    </header>

<section class="main">
    <h1>Оформление сотрудников вне штата</h1>
    <h2>Работаем по всему Татарстану</h2>
    <h3>Сокращение расходов предприятия до 1 млн. в год!</h3>
    <button class="btn-send" id="openModalBtn">Оставить заявку<img src="{{ asset('img/btn-email.svg') }}"></button>
</section>

<div class="modal" id="modalForm">
    <div class="modal-content">
        <span class="close-btn" id="closeModalBtn">&times;</span>
        <h2>Оставить заявку</h2>
        <form action="/" method="POST" id="applicationForm">
            @csrf
            @if(auth()->check())
                <input type='text' name='name' value='{{ auth()->user()->name }}'>
            @else
                <input type='text' name='name' placeholder='Имя' required>
            @endif
            <input type='text' name='surname' placeholder='Фамилия' required>
            <input type='text' name='patronymic' placeholder='Отчество' required>
            <input type='tel' name='phone' placeholder='Телефон' required>
            <input type='email' name='email' placeholder='Почта' required>
            
            <h3>Выбор сотрудников</h3>

            <div id="specializationsContainer">
                <div class="specialty-group">
                    <select name="specialization" required>
                        <option value="Специальность 1">Специальность 1</option>
                        <option value="Специальность 2">Специальность 2</option>
                        <option value="Специальность 3">Специальность 3</option>
                    </select>
                    <input type="number" name="quantity" placeholder="Количество" required min="1">
                    <button type="button" class="add-specialty-btn">+</button>
                </div>
            </div>

            <button class="btn-send" type="submit">
                Отправить заявку
                <img src="{{ asset('img/btn-email.svg') }}" alt="Отправить">
            </button>
        </form>
    </div>
</div>

@if(session('success'))
<div class='alert'>
    {{ session('success') }}
</div>
@endif

<section class='what-is'>
    <h4>Что такое Аутстаффинг работников?</h4>
    <p>Аутстаффинг работников — это аренда персонала, при которой 
организация-аутстаффер предоставляет компании-заказчику нужных 
специалистов и берёт на себя их юридическое сопровождение: выплачивает 
зарплаты, отчисляет налоги, взаимодействует с госорганами.
Сотрудники работают у заказчика, но числятся в штате агентства-
аутстаффера. Если сотрудник не подходит по каким-либо причинам, 
арендатор просит заменить работника.</p>
</section>

<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>