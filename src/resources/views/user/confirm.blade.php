<!-- resources/views/auth/confirm.blade.php -->

<h2>ユーザー情報確認</h2>
<p>Name: {{ $userData['name'] }}</p>
<p>Email: {{ $userData['email'] }}</p>
<!-- 他のユーザー情報も同様に -->

<form method="POST" action="{{ route('user.process') }}">
    @csrf
    <input type="hidden" name="confirm" value="1"> <!-- 確認フラグを追加 -->

    <!-- フォームデータを再度送信 -->
    <input type="hidden" name="name" value="{{ $userData['name'] }}">
    <input type="hidden" name="email" value="{{ $userData['email'] }}">
    <!-- 他のユーザー情報も同様に -->

    <button type="submit">登録</button>
</form>
