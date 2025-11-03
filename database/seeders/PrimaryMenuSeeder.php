<?php

namespace Database\Seeders;

use App\Models\Domain\Menu;
use App\Models\Domain\MenuItem;
use Illuminate\Database\Seeder;

class PrimaryMenuSeeder extends Seeder
{
    public function run(): void
    {
        // Get or create the primary menu
        $menu = Menu::firstOrCreate(
            ['handle' => 'primary'],
            ['name' => 'Primary Navigation']
        );

        // Clear existing items
        $menu->allItems()->delete();

        // Create menu items
        $items = [
            [
                'label' => 'About ALG',
                'url' => '/about',
                'ordering' => 1,
            ],
            [
                'label' => '2025 ALG',
                'url' => '/alg-2025',
                'ordering' => 2,
            ],
            [
                'label' => 'Past Editions',
                'url' => '/past-editions',
                'ordering' => 3,
            ],
            [
                'label' => 'African Champions Breakfast',
                'url' => '/african-champions-breakfast',
                'ordering' => 4,
            ],
            [
                'label' => 'Reserve your seat',
                'url' => '/register',
                'ordering' => 5,
            ],
        ];

        foreach ($items as $itemData) {
            MenuItem::create([
                'menu_id' => $menu->id,
                'label' => $itemData['label'],
                'url' => $itemData['url'],
                'target' => '_self',
                'active' => true,
                'ordering' => $itemData['ordering'],
            ]);
        }

        $this->command->info('Primary menu seeded successfully!');
    }
}
