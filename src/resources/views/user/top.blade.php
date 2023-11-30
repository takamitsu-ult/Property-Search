<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザーのトップページ</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
</head>

<body>

    <header>
        <h1>ユーザーのトップページ</h1>

        <!-- 他のヘッダーの内容 -->

        <nav>
            <ul>
                <!-- 他のメニュー項目 -->

                @guest
                    <!-- ログインしていない場合のメニュー -->
                    <button id="openLoginModal">ログイン</button>
                    {{-- {{ route('login') }} --}}
                    <li><a href="{{ route('user.register') }}">新規登録</a></li>
                    {{--  --}}
                @endguest

                <div id="loginModal" style="display: none;">
                    <form action="{{ route('user.login') }}" method="POST">
                        @csrf

                        <label for="email">メールアドレス:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="password">パスワード:</label>
                        <input type="password" id="password" name="password" required>

                        <button type="submit">ログイン</button>
                    </form>

                    <!-- 閉じるボタン -->
                    <button id="closeLoginModal">閉じる</button>
                </div>

                @auth
                    <!-- ログインしている場合のメニュー -->
                    <li><a href="">マイページ</a></li>
                    {{-- {{ route('user.mypage') }} --}}
                    <li>
                        <form action="{{ route('user.logout') }}" method="post">
                            @csrf
                            <button type="submit">ログアウト</button>
                        </form>
                    </li>
                    {{--  --}}
                @endauth
            </ul>
        </nav>
    </header>

    <!-- 物件一覧セクション -->
    <h2>物件一覧</h2>
    <div>
        <!-- 物件一覧を表示するコードをここに追加 -->
        <!-- 例: -->
        <table>
            <!-- 表のヘッダー -->
            <thead>
                <tr>
                    <th>物件名</th>
                    <th>賃料</th>
                    <!-- 他の項目も同様に -->
                </tr>
            </thead>
            <!-- 表のボディ -->
            <tbody>
                <!-- 物件データを表示するコードをここに追加 -->
            </tbody>
        </table>
    </div>

    <!-- お気に入り物件セクション -->
    <h2>お気に入り物件</h2>
    <div>
        <!-- お気に入り物件を表示するコードをここに追加 -->
        <!-- 例: -->
        <ul>
            <li>物件名1</li>
            <li>物件名2</li>
            <!-- 他のお気に入り物件も同様に -->
        </ul>
    </div>

    <!-- お知らせやキャンペーンセクション -->
    <h2>お知らせやキャンペーン</h2>
    <div>
        <!-- お知らせやキャンペーン情報を表示するコードをここに追加 -->
        <!-- 例: -->
        <p>新着情報: 〇〇キャンペーン開催中！</p>
    </div>

    <!-- 検索フォーム -->

    <a href="{{ route('user.search') }}">物件検索</a>

    <script>
        // ログインモーダルを開く
        document.getElementById('openLoginModal').addEventListener('click', function () {
            document.getElementById('loginModal').style.display = 'block';
        });

        // ログインモーダルを閉じる
        document.getElementById('closeLoginModal').addEventListener('click', function () {
            document.getElementById('loginModal').style.display = 'none';
        });
    </script>

</body>

</html>
