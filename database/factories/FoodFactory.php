<?php

namespace Database\Factories;


class FoodFactory extends PictureFactory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $this->setBasePath('product_pictures/');
        $this->setPath('food_seed');
        return [
            'title' => $this->faker->catchPhrase(),
            'pic' => $this->storeImage(),
            'price' => $this->faker->randomFloat(2, 15, 1700),
            'desc' => $this->faker->boolean() ? $this->faker->paragraph(5) : null,
        ];
    }
}
