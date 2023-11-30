<!-- resources/views/property/index.blade.php -->

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>物件一覧</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        label {
            font-size: 20px
        }

        #search {
            display: flex
        }
    </style>
</head>

<body>

    <h1>物件一覧</h1>

    <a href="{{ route('admin.top') }}">管理トップ</a>
    <br>
    <div id="search">
        <form action="{{ route('admin.index') }}" method="GET">
            {{--  --}}
            <label for="status">公開ステータス:</label>
            <select name="status" id="status">
                <option value="">すべて</option>
                <option value="unpublished" @if (request('status') == 'unpublished') selected @endif>未公開</option>
                <option value="published" @if (request('status') == 'published') selected @endif>公開</option>
                <option value="contracted" @if (request('status') == 'contracted') selected @endif>成約済</option>
            </select>

            <label for="location">所在地:</label>
            <input type="text" name="location" value="{{ request('location') }}">


            <label for="layout">間取り:</label>
            <input type="checkbox" name="layouts[]" value="1R" @if (in_array('1R', request('layouts', []))) checked @endif>1R
            <input type="checkbox" name="layouts[]" value="1K" @if (in_array('1K', request('layouts', []))) checked @endif>1K
            <input type="checkbox" name="layouts[]" value="1DK" @if (in_array('1DK', request('layouts', []))) checked @endif>1DK
            <input type="checkbox" name="layouts[]" value="1LDK" @if (in_array('1LDK', request('layouts', []))) checked @endif>1LDK
            <input type="checkbox" name="layouts[]" value="2K" @if (in_array('2K', request('layouts', []))) checked @endif>2K
            <input type="checkbox" name="layouts[]" value="2DK" @if (in_array('2DK', request('layouts', []))) checked @endif>2DK
            <input type="checkbox" name="layouts[]" value="2LDK" @if (in_array('2LDK', request('layouts', []))) checked @endif>2LDK
            <input type="checkbox" name="layouts[]" value="3DK"
                @if (in_array('3DK', request('layouts', []))) checked @endif>3DK
            <input type="checkbox" name="layouts[]" value="3LDK"
                @if (in_array('3LDK', request('layouts', []))) checked @endif>3LDK
            <input type="checkbox" name="layouts[]" value="4LDK"
                @if (in_array('4LDK', request('layouts', []))) checked @endif>4LDK
            <!-- 新しい間取りが追加されたらここに追加 -->
            <br>

            <label for="rent_min">賃料:</label>
            <select name="rent_min">
                <option value="" @if (request('rent_min') == '') selected @endif>すべて</option>
                @for ($minRent = 0; $minRent <= 500000; $minRent += 5000)
                    <option value="{{ $minRent }}" @if (request('rent_min') == $minRent) selected @endif>
                        {{ number_format($minRent) }}円
                    </option>
                @endfor
            </select>

            <label for="rent_max">～</label>
            <select name="rent_max">
                <option value="" @if (request('rent_max') == '') selected @endif>すべて</option>
                @for ($maxRent = 5000; $maxRent <= 500000; $maxRent += 5000)
                    <option value="{{ $maxRent }}" @if (request('rent_max') == $maxRent) selected @endif>
                        {{ number_format($maxRent) }}円
                    </option>
                @endfor
            </select>


            <label for="floor_area_min">専有面積:</label>
            <select name="floor_area_min">
                <option value="" @if (request('floor_area_min') == '') selected @endif>すべて</option>
                @for ($minArea = 20; $minArea <= 100; $minArea += 5)
                    <option value="{{ $minArea }}" @if (request('floor_area_min') == $minArea) selected @endif>
                        {{ $minArea }}㎡
                    </option>
                @endfor
            </select>

            <label for="floor_area_max">～</label>
            <select name="floor_area_max">
                <option value="" @if (request('floor_area_max') == '') selected @endif>すべて</option>
                @for ($maxArea = 25; $maxArea <= 100; $maxArea += 5)
                    <option value="{{ $maxArea }}" @if (request('floor_area_max') == $maxArea) selected @endif>
                        {{ $maxArea }}㎡
                    </option>
                @endfor
            </select>

            <label for="built_year_min">築年数:</label>
            <select name="built_year_min">
                <option value="" @if (request('built_year_min') == '') selected @endif>すべて</option>
                @for ($minYear = 0; $minYear <= 50; $minYear += 5)
                    <option value="{{ $minYear }}" @if (request('built_year_min') == $minYear) selected @endif>
                        {{ $minYear }}年
                    </option>
                @endfor
            </select>

            <label for="built_year_max">～</label>
            <select name="built_year_max">
                <option value="" @if (request('built_year_max') == '') selected @endif>すべて</option>
                @for ($maxYear = 5; $maxYear <= 50; $maxYear += 5)
                    <option value="{{ $maxYear }}" @if (request('built_year_max') == $maxYear) selected @endif>
                        {{ $maxYear }}年
                    </option>
                @endfor
            </select>

            <button type="submit">絞り込む</button>
        </form>
    </div>
    <table>
        <thead>
            <tr>
                <th>物件名</th>
                <th>賃料</th>
                <th>管理費</th>
                <th>所在地</th>
                <th>間取り</th>
                <th>専有面積</th>
                <th>階数</th>
                <th>建物種別</th>
                <th>築年数</th>
                <th>公開ステータス</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($properties as $property)
                <tr>
                    <td>{{ $property->property_name }}</td>
                    <td>{{ number_format($property->rent) }}円</td>
                    <td>{{ number_format($property->management_fee) }}円</td>
                    <td>{{ $property->location }}</td>
                    <td>{{ $property->layout }}</td>
                    <td>{{ $property->floor_area }}㎡</td>
                    <td>{{ $property->floor_level }}階</td>
                    <td>{{ $property->building_type }}</td>
                    <td>{{ $property->built_year }}年</td>
                    <td>{{ $property->status }}</td>
                    <td><a href="{{ route('admin.detail', ['id' => $property->id]) }}">物件詳細</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>


</body>

</html>
