<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title") </title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @stack('styles')
</head>
<body>
    <header>
        <h1 class="logo">mogitate</h1>
    </header>
    <main>
        @yield("content")
    </main>
</body>
</html>
