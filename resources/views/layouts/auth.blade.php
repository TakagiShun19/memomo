<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>memomo</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container-scroller">
            <div class="container-fluid auth d-flex align-items-center justify-content-center">
                <p class="auth-app-name">memomo</p>
                <div class="d-flex auth-footer align-items-center">
                    <a href="#">新規登録</a>
                    <a class="footer-link-separater">|</a>
                    <a href="#">プライバシーポリシー</a>
                    <a class="footer-link-separater">|</a>
                    <a href="#">利用規約</a>
                    <a class="footer-link-separater">|</a>
                    <a href="#">memomo</a>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
