<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理画面</title>

    <!-- 他の必要なメタタグやスタイル、スクリプトのリンクなどを追加 -->
</head>

<body>
    <header>
        <h1>Admin Page</h1>

    </header>

    <main>
        <nav>
            <ul>
                <li><a href=" {{ route('admin.create') }}">物件追加</a></li>
                <li><a href=" {{ route('admin.index') }}">物件一覧</a></li>
                <li><a href="{{ route('user.top') }}">ユーザーTOP</a></li>
        </nav>
    </main>

    <footer>
        <!-- フッターのコンテンツ -->
    </footer>

    <!-- 他の必要なスクリプトなど -->
    <!-- 他の必要なスクリプトなど -->

</body>

</html>
