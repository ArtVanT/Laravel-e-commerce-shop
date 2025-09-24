<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


       $itemsPath = public_path('storage/items');
        
        if (file_exists($itemsPath)) {
            $files = scandir($itemsPath);
            $imageFiles = array_filter($files, function($file) {
                return preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $file);
            });
            
            // Remove . and .. from the array
            $imageFiles = array_diff($imageFiles, ['.', '..']);
            
            if (!empty($imageFiles)) {
                $randomImage = 'items/' . $this->faker->randomElement($imageFiles);
            } else {
                // If no images found, use numbered approach
                $randomImage = 'items/item_' . $this->faker->numberBetween(1, 10) . '.jpg';
            }
        } else {
            // If directory doesn't exist, use numbered approach
            $randomImage = 'items/item_' . $this->faker->numberBetween(1, 10) . '.jpg';
        }

        return [
            //
            'item_name' => $this->faker->word(),
    'slug' => function(array $attributes) {
        return Str::slug($attributes['item_name']);
    },
            'item_description' => $this->faker->sentence(),
            'item_num'=> $this->faker->randomNumber(),
            'item_price' => $this->faker->randomFloat(2, 1, 100),
            // In your ItemFactory.php
             'item_pic' => $randomImage,
        ];
    }
}
    