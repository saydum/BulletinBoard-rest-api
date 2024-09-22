<?php

namespace Database\Factories;

use App\Models\Bulletin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bulletin>
 */
class BulletinFactory extends Factory
{
    protected $model = Bulletin::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'price' => $this->faker->randomFloat(2, 10000, 200000),
            'description' => $this->faker->text(500),
            'images' => json_encode([
                $this->faker->imageUrl(640, 480, 'cars', true),
                $this->faker->imageUrl(640, 480, 'cars', true),
                $this->faker->imageUrl(640, 480, 'cars', true),
            ]),
        ];
    }
}
