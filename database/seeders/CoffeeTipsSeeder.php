<?php

namespace Database\Seeders;

use App\Models\CoffeeTip;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoffeeTipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tips = [
            [
                'title' => 'Best Season for Harvesting Arabica',
                'content' => 'The best time to harvest Arabica coffee is during the dry season when the cherries are ripe and red. Avoid picking green or overripe cherries.',
                'season' => 'Dry Season',
                'category' => 'Harvesting',
                'user_id' => 1,
            ],
            [
                'title' => 'Proper Storage of Coffee Beans',
                'content' => 'Store your coffee beans in a cool, dry place away from direct sunlight. Use airtight containers to preserve freshness and aroma.',
                'season' => null,
                'category' => 'Storage',
                'user_id' => 1,
            ],
            [
                'title' => 'Preparing for the Rainy Season',
                'content' => 'Ensure all drying beds are covered before the rainy season begins. Proper planning helps reduce mold and spoilage during drying.',
                'season' => 'Rainy Season',
                'category' => 'Preparation',
                'user_id' => 1,
            ],
        ];

        foreach ($tips as $tip) {
            CoffeeTip::create($tip);
        }
    }
}
