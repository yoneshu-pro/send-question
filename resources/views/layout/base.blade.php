<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body id="app">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <a class="navbar-brand" href="{{ route('top') }}">Send Question</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
@if(\App\Services\Auth::checkLogin() === true)
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('presents.create') }}">プレゼン登録</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('presents.index') }}">プレゼン一覧</a>
            </li>
        </ul>
    </div>
@endif
</nav>
@yield('body')
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
