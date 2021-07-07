<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(25),
            'description' => $this->faker->paragraph,
            'text' => $this->faker->text(100),
            'url_img' => $this->faker->imageUrl,
            'date' => $this->faker->date,
            'author' => $this->faker->name(),
            'cetegories_id' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement([
                "piblic",
                "private"
            ])
        ];
    }
}
