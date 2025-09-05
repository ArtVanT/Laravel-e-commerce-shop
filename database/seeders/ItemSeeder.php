<?php

namespace Database\Seeders;

use App\Models\Item;
use Database\Factories\ItemFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $items = ItemFactory::new()->count(10)->create();
    }
}
