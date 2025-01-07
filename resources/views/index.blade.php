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
    <button class="btn-send openModalBtn">Оставить заявку<img src="{{ asset('img/btn-email.svg') }}"></button>
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
    <h4>Преимущества Аутстаффинга</h4>
    <div class="container-video">
        <ul>
            <li><img src="{{ asset('img/green-check.svg') }}">Разгрузка собственного штата, например, бухгалтеров и HR</li>
            <li><img src="{{ asset('img/green-check.svg') }}">Снижение расходов</li>
            <li><img src="{{ asset('img/green-check.svg') }}">Отсутствие миграционных рисков</li>
            <li><img src="{{ asset('img/green-check.svg') }}">Увеличение штата при соблюдении требований УСН</li>
            <li><img src="{{ asset('img/green-check.svg') }}">Упрощение процессов управления персоналом</li>
        </ul>
        <video muted loop autoplay>
            <source src="{{ asset('img/example-video.mp4') }}" type="video/mp4">
        </video>
    </div>
    <button class="btn-send openModalBtn">Оставить заявку<img src="{{ asset('img/btn-email.svg') }}"></button>
</section>

<section class="steps">
    <h4>Шаги наших клиентов</h4>
    <div class="step-1">
        <img src="{{ asset('img/step-1.svg') }}">
        <div class="step-text-1">
            <h5>Обращение в нашу организацию</h5>
            <p>Заполните форму или свяжитесь с нами напрямую 8 888 888-88-88</p>
        </div>
    </div>
    <div class="step-2">
        <img src="{{ asset('img/step-2.svg') }}">
        <div class="step-text-2">
            <h5>Консультация с нами</h5>
            <p>Выбирайте время и получайте ответы на интересующие вас вопросы  </p>
        </div>
    </div>
    <div class="step-3">
        <img src="{{ asset('img/step-3.svg') }}">
        <div class="step-text-3">
            <h5>Заключение договора</h5>
            <p>Подготовка всех необходимых документов</p>
        </div>
    </div>
    <div class="step-4">
        <img src="{{ asset('img/step-4.svg') }}">
        <div class="step-text-4">
            <h5>Уменьшение нагрузки Вашей компании  </h5>
            <p>Возьмем на себя кадровый вопрос </p>
        </div>
    </div>
    <div class="step-5">
        <img src="{{ asset('img/step-5.svg') }}">
        <div class="step-text-5">
            <h5>Сокращение затрат</h5>
            <p>Экономия более 80 тыс. руб. в год за одного человека</p>
        </div>
        <button class="btn-send openModalBtn">Оставить заявку<img src="{{ asset('img/btn-email.svg') }}"></button>
    </div>
</section>
<section class = "about">
    <h4>Аутстаффинг – это для вас, если Вы хотите</h4>
    <ul>
        <li><img src="{{ asset('img/checkbox.svg') }}"> <p>Сэкономить время и деньги</p></li>
        <li><img src="{{ asset('img/checkbox.svg') }}"> <p>Нанять сотрудников на временные должности</p></li>
        <li><img src="{{ asset('img/checkbox.svg') }}"> <p>Быстро найти специалиста с редкими навыками</p></li>
    </ul>
</section>
<section class = "why-we">
    <h4>Почему именно мы?</h4>
    <ul>
    <li><img src="{{ asset('img/why-we3.svg') }}"> <p>Более 1000 сотрудников выведено за штат</p></li>
    <li><img src="{{ asset('img/why-we2.svg') }}"> <p>Более 500 договоров аутстаффинга</p></li>
    <li><img src="{{ asset('img/why-we1.svg') }}"> <p>Работаем более 3 лет</p></li>
    </ul>
</section>
<section class="callback">
    <h4>Закажите обратный звонок для консультации</h4>
        <form id="callbackForm">
            <div class="form-input">
                <input type="text" name="name" placeholder="Имя" required>
                <input type="text" name="surname" placeholder="Фамилия" required>
                <input type="tel" name="phone" placeholder="Телефон" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
            </div>
            <div class="form-info">
                <p>Мы индивидуально рассчитаем для Вас оптимальный план по оптимизации рассходов на кадры</p>
                <button type="submit">
                    Заказать обратный звонок
                    <img src="{{ asset('img/btn-email.svg') }}" alt="Отправить">
                </button>
            </div>
        </form>
</section>

<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>