<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Ваш Отдел Кадров</title>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
       (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
       m[i].l=1*new Date();
       for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
       k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
       (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

       ym(99665810, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
       });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/99665810" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <style>
        /* Стили для фиксированной кнопки */
        .fixed-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 15px 30px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            z-index: 1000; /* Убедитесь, что кнопка будет поверх других элементов */
        }

        /* Стили для кнопки корзины */
        .fixed-cart-button {
            position: fixed;
            bottom: 80px;
            right: 20px;
            padding: 15px 30px;
            background-color: #ff9900;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            z-index: 1000; /* Убедитесь, что кнопка будет поверх других элементов */
        }

        .not-found h3 {
            max-width: 90%; /* Ограничиваем максимальную ширину */
            margin: 35px auto; /* Центрируем контейнер */
        }

        .not-found form {
        display: flex;
        flex-direction: column;
        max-width: 400px;
        margin: 20px auto;
    }

    .not-found form input,
    .not-found form button {
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 16px;
        box-sizing: border-box;
    }

    .not-found form input {
        width: 100%;
    }

    .not-found form button {
        background-color: #FAE013;
        color: black;
        cursor: pointer;
    }
    .quantity-selector {
    display: flex;
    align-items: center; /* Центрируем кнопки и ввод по вертикали */
}

.quantity-selector button {
    background-color: #FAE013; /* Цвет фона кнопок */
    color: white; /* Цвет текста кнопок */
    border: none; /* Убираем обводку */
    border-radius: 5px; /* Скругление углов */
    padding: 10px; /* Отступы внутри кнопок */
    font-size: 18px; /* Размер шрифта */
    cursor: pointer; /* Указатель при наведении */
    width: 40px; /* Фиксированная ширина кнопок */
    transition: background-color 0.3s; /* Плавный переход для цвета фона */
}

.quantity-selector button:hover {
    background-color:rgb(245, 226, 85); /* Цвет при наведении */
}

.quantity-input {
    text-align: center; /* Центрируем текст в поле ввода */
    width: 60px; /* Фиксированная ширина поля ввода */
    margin: 0 10px; /* Отступы между кнопками и полем ввода */
    padding: 10px; /* Отступы внутри поля ввода */
    font-size: 18px; /* Размер шрифта */
    border: 1px solid #ccc; /* Обводка поля ввода */
    border-radius: 5px; /* Скругление углов поля ввода */
}
    </style>
</head>
<body>

<header>
        <nav>
            <ul>
                <li><a href="/"><img src="{{ asset('img/logo.svg') }}" width="400"></a></li> 
                <li><a href="#">Работа с иностранными специалистами</a></li>
                <li><a href="#">О нас</a></li>
                <li><a href="#">Контакты</a></li>
                <li><button class="fixed-cart-button" onclick="window.location.href='/cart'">Мой заказ</button></li>
            </ul>
        </nav>
    </header>

    <div class="container">
    <h3>Наш персонал</h3>
    <div class="row">
        @foreach($specializations as $specialization)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $specialization->photo_url }}" class="card-img-top" alt="{{ $specialization->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $specialization->name }}</h5>
                        <form action="{{ route('cart.add') }}" method="POST" onsubmit="return showOrderNotification(event, this)">
                        @csrf
                        <input type="hidden" name="specialization_id" value="{{ $specialization->id }}">
                        <div class="quantity-selector">
                            <button type="button" class="decrement">-</button>
                            <input type="number" name="quantity" class="quantity-input" value="1" min="1">
                            <button type="button" class="increment">+</button>
                        </div>
                        <button type="submit" class="btn btn-primary">Заказать</button>
                    </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<section class="not-found">
        <h3>Не нашли нужную специальность? Свяжитесь с нами и подберем специалиста под любые ваши задачи!</h3>
        <form action="{{ route('request') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Эл. почта" required>
            <input type="text" name="text" placeholder="Специальности" required>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
        @if(session('success'))
    <div>{{ session('success') }}</div>
@endif

</section>

<!-- Уведомление -->
<div id="orderNotification" style="display: none; position: fixed; bottom: 20px; left: 20px; padding: 10px 20px; background-color: #28a745; color: white; border-radius: 5px;">
    Специальность добавлена в заказ!
</div>

<!-- Фиксированная кнопка для возврата наверх -->
<button class="fixed-button" onclick="window.scrollTo(0, 0)">Вверх</button>

<!-- Фиксированная кнопка для корзины -->
<button class="fixed-cart-button" onclick="window.location.href='/cart'">Мой заказ</button>

<script>
     document.addEventListener('DOMContentLoaded', function() {
        const incrementButtons = document.querySelectorAll('.increment');
        const decrementButtons = document.querySelectorAll('.decrement');
        const quantityInputs = document.querySelectorAll('.quantity-input');

        incrementButtons.forEach(button => {
            button.addEventListener('click', function() {
                const input = this.previousElementSibling;
                input.value = parseInt(input.value) + 1;
            });
        });

        decrementButtons.forEach(button => {
            button.addEventListener('click', function() {
                const input = this.nextElementSibling;
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            });
        });

        quantityInputs.forEach(input => {
            input.addEventListener('input', function() {
                if (parseInt(this.value) < 1) {
                    this.value = 1;
                }
            });
        });
    });

    // Функция для отображения уведомления
    function showOrderNotification(event, form) {
    event.preventDefault();  // Останавливаем отправку формы для предотвращения перезагрузки страницы

    // Показываем уведомление
    var notification = document.getElementById("orderNotification");
    notification.style.display = "block";

    // Прячем уведомление через 3 секунды
    setTimeout(function() {
        notification.style.display = "none";
        // После того, как уведомление исчезло, отправляем форму
        form.submit();
    }, 30);
}
</script>
</body>
</html>
