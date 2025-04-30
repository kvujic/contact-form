<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&family=Gorditas&family=Inika&family=Noto+Serif+JP:wght@900&family=Yusei+Magic&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    @livewireStyles
</head>

<body>
    @if(!isset($no_header))
    <header class="header">
        <div class="header__inner">
            <div class="header__logo">
                <h1 class="header__logo-text">FashionablyLate</h1>
            </div>
            <nav class="header-nav">
                <ul class="header-nav__inner">
                    @if(Auth::check() && Request::path() === 'admin')
                    {{-- logged in --}}
                    <li class="header-nav__item">
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="header-nav__button">logout</button>
                        </form>
                    </li>
                    @elseif(Request::is('register'))
                    {{-- not logged in --}}
                    <li class="header-nav__item">
                        <a class="header-nav__link" href="/login">login</a>
                    </li>
                    @else
                    @if(Request::is('login'))
                    <li class="header-nav__item">
                        <a class="header-nav__link" href="/register">register</a>
                    </li>
                    @endif
                    @endif
                </ul>
            </nav>
        </div>
    </header>
    @endif

    <main>
        @yield('content')
        @livewireScripts
    </main>
</body>

</html>