<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class RestaurantFactory extends PictureFactory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $this->setBasePath('restaurants/');
        $this->setPath('res_seed');
        return [
            'title' => $this->faker->catchPhrase(),
            'image' => $this->storeImage(),
            'desc' => $this->faker->boolean() ? $this->faker->paragraph(5) : null,
        ];
    }
}
