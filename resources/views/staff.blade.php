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
    </style>
</head>
<body>
<div class="container">
    <h3>Наш персонал</h3>
    <div class="row">
        @foreach($specializations as $specialization)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $specialization->photo_url }}" class="card-img-top" alt="{{ $specialization->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $specialization->name }}</h5>
                        <form action="{{ route('cart.add') }}" method="POST" onsubmit="return showOrderNotification(event)">
                            @csrf
                            <input type="hidden" name="specialization_id" value="{{ $specialization->id }}">
                            <button type="submit" class="btn btn-primary">Заказать</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Уведомление -->
<div id="orderNotification" style="display: none; position: fixed; bottom: 20px; left: 20px; padding: 10px 20px; background-color: #28a745; color: white; border-radius: 5px;">
    Специальность добавлена в заказ!
</div>

<!-- Фиксированная кнопка для возврата наверх -->
<button class="fixed-button" onclick="window.scrollTo(0, 0)">Вверх</button>

<!-- Фиксированная кнопка для корзины -->
<button class="fixed-cart-button" onclick="window.location.href='/cart'">Корзина</button>

<script>
    // Функция для отображения уведомления
    function showOrderNotification(event) {
        event.preventDefault();  // Останавливаем отправку формы для предотвращения перезагрузки страницы
        
        // Показываем уведомление
        var notification = document.getElementById("orderNotification");
        notification.style.display = "block";

        // Прячем уведомление через 3 секунды
        setTimeout(function() {
            notification.style.display = "none";
            // После того, как уведомление исчезло, отправляем форму
            event.target.submit();
        }, 3000);
    }
</script>
</body>
</html>
