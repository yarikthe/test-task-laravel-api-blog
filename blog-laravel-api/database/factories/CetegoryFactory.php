<?php

namespace Database\Factories;

use App\Models\Cetegory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CetegoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cetegory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(10),
            'description' => $this->faker->paragraph,
            'url_img' => $this->faker->imageUrl,
        ];
    }
}
