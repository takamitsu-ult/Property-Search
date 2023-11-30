<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            width: 50%;
            margin: auto;
        }

        label {
            font-size: 20px;
            display: block;
            margin-top: 10px;
        }

        input {
            font-size: 16px;
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        button {
            font-size: 18px;
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <h1>ユーザー登録</h1>

    <form action="{{ route('user.confirmation') }}" method="post">
        @csrf

        <label for="name">名前:</label>
        <input type="text" name="name" required>

        <label for="email">メールアドレス:</label>
        <input type="email" name="email" required>

        <label for="password">パスワード:</label>
        <input type="password" name="password" required>

        <button type="submit">登録</button>
    </form>

</body>

</html>
