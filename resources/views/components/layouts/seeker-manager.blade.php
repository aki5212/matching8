<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $nickname }}</title>
</head>
<body>
    <header>
        求職管理システム
        <form action="{{ route('admin.destroy') }}" method="POST">
            @csrf
            <input type="submit" value="ログアウト">
        </form>
        <hr>
    </header>
    <main>
        {{ $slot }}
    </main>
    <footer>
        <hr>
        @Laravel
    </footer>
</body>
</html>