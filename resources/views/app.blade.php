<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <meta name="Author" content="Webfolio Team">
    <meta name="Copyright" content="Webfolio Team">
    <meta name="description"
        content="Платформа для создаиня портфолио веб-разработчика за 5 минут. Попробуйте бесплатно прямо сейчас.">
    <meta name="keywords"
        content="Платформа создание портфолио веб-разработчик 5 минут бесплатный пробовать сейчас онлайн услуги проектирование шаблоны дизайн сайт навыки работа примеры проекты быстро легко интерактивно отзывы возможности адаптивный интерфейс интеграция создание сайта хостинг домен портфолио студия инновации технологии креативный подход">
    <title>Webfolio</title>
    <link rel="shortcut icon" href="{{ asset('icons/favicon.ico') }}" type="image/x-icon">


    <!-- Content Security Policy -->
    <meta http-equiv="Content-Security-Policy"
        content="default-src 'self' http://127.0.0.1:8000 https://cdn.jsdelivr.net 'unsafe-inline'; img-src * data:;">

    <!-- css links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adaptive.css') }}">

</head>

<body>
    @if (!isset($hideHeaderFooter) || !$hideHeaderFooter)
        @include('includes.header')
    @endif

    @yield('content')

    @if (!isset($hideHeaderFooter) || !$hideHeaderFooter)
        @include('includes.footer')
    @endif
</body>

</html>
