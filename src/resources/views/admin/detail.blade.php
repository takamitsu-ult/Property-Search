<!-- resources/views/property/deteil.blade.php -->

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $property->property_name }}の詳細</title>
</head>

<body>

    <h1>{{ $property->property_name }}の詳細</h1>

    <p>賃料: {{ number_format($property->rent) }}円</p>
    <p>管理費: {{ number_format($property->management_fee) }}円</p>
    <p>所在地:{{ $property->location }}</p>
    <p>間取り:{{ $property->layout }}</p>
    <p>専有面積:{{ $property->floor_area }}</p>
    <p>階数:{{ $property->floor_level }}</p>
    <p>建物種別:{{ $property->building_type }}</p>
    <p>築年数:{{ $property->built_year }}</p>
    <p>公開ステータス:{{ $property->status }}</p>

    @if ($property->thumbnail_photo)
        <img src="{{ asset('path/to/your/thumbnails/' . $property->thumbnail_photo) }}" alt="{{ $property->property_name }}のサムネイル">
    @else
        <p>画像なし</p>
    @endif

</body>

</html>
