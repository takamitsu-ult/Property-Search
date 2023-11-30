<?php

namespace Database\Factories;
// database/factories/PropertyFactory.php
// database/factories/PropertyFactory.php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition()
    {
        $prefectures = ['北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県',
                        '埼玉県', '千葉県', '東京都', '神奈川県', '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県',
                        '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県',
                        '鳥取県', '島根県',  '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県',
                        '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'];
        return [
            'property_name' => $this->faker->word,
            'rent' => $this->faker->randomElement(range(50000, 500000, 5000)),
            'management_fee' => $this->faker->randomElement(range(5000, 50000, 5000)),
            'security_deposit' => $this->faker->randomFloat(2, 1000, 10000),
            'key_money' => $this->faker->randomFloat(2, 1000, 10000),
            'location' => $this->faker->randomElement($prefectures),
            'layout' => $this->faker->randomElement(['1R', '1K', '2LDK', '3LDK']),
            'floor_area' => $this->faker->randomFloat(2, 30, 100),
            'floor_level' => $this->faker->numberBetween(1, 20),
            'total_floors' => $this->faker->numberBetween(1, 30),
            'building_type' => $this->faker->randomElement(['アパート', 'マンション', '一戸建て']),
            'built_year' => $this->faker->numberBetween(1, 10) * 5,
            'structure' => $this->faker->randomElement(['木造', '鉄筋コンクリート', '鉄骨']),
            'facilities' => $this->faker->paragraph,
            'thumbnail_photo' => null, // ここで適切な処理を追加するか、null のままで良いです。
            'status' => $this->faker->randomElement(['unpublished', 'published', 'contracted']),
        ];
    }
}

