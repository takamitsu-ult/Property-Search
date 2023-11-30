<!-- resources/views/create.blade.php -->

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新しい物件追加</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>

<body>

    <h1>物件追加</h1>

    <p> <a href="{{ route('admin.top') }}">管理トップ</a></p>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="/properties" method="post">
        @csrf

        <label for="property_name">物件名:</label>
        <input type="text" name="property_name" required>
        <br>

        <label for="rent">賃料:</label>
        <input type="number" name="rent" step="0.01" required>
        <br>

        <label for="management_fee">管理費:</label>
        <input type="number" name="management_fee" step="0.01" required>
        <br>

        <label for="security_deposit">敷金:</label>
        <input type="number" name="security_deposit" step="0.01" required>
        <br>

        <label for="key_money">礼金:</label>
        <input type="number" name="key_money" step="0.01" required>
        <br>

        <label for="location">所在地:</label>
        <input type="text" name="location" required>
        <br>

        <label for="layout">間取り:</label>
        <select name="layout" required>
            <option value="1K">1K</option>
            <option value="1DK">1DK</option>
            <option value="1LDK">1LDK</option>
            <option value="2K">2K</option>
            <option value="2DK">2DK</option>
            <option value="2LDK">2LDK</option>
        </select>
        <br>

        <label for="floor_area">専有面積:</label>
        <select name="floor_area" required>
            <option value="">専有面積を選択</option>
            @for ($area = 30; $area <= 100; $area += 5)
                <option value="{{ $area }}">{{ $area }}㎡</option>
            @endfor
        </select>

        <label for="floor_level">所在階:</label>
        <input type="number" name="floor_level" required>
        <br>

        <label for="total_floors">階数:</label>
        <input type="number" name="total_floors" required>
        <br>

        <label for="building_type">建物種別:</label>
        <select name="building_type" required>
            <option value="">建物種別を選択</option>
            <option value="マンション">マンション</option>
            <option value="アパート">アパート</option>
            <option value="一戸建て">一戸建て</option>
            <option value="テラスハウス">テラスハウス</option>
            <option value="タウンハウス">タウンハウス</option>
            <option value="ビル">ビル</option>
            <option value="商業施設">商業施設</option>
            <option value="工場">工場</option>
        </select>
        <br>

        <label for="built_year">築年数:</label>
        <input type="number" name="built_year" required>
        <br>

        <label for="structure">構造:</label>
        <input type="text" name="structure" required>
        <br>

        <label for="facilities">設備（自由記述）:</label>
        <textarea name="facilities" rows="4" required></textarea>
        <br>

        <label for="thumbnail_photo">写真（サムネイル用の1枚のみ）:</label>
        <input type="file" name="thumbnail_photo">
        <br>

        <label for="status">公開ステータス:</label>
        <select name="status" required>
            <option value="unpublished">未公開</option>
            <option value="published">公開</option>
            <option value="contracted">成約済</option>
        </select>
        <br>

        <button type="submit">追加する</button>
    </form>

</body>

</html>
