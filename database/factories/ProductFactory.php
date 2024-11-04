<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(4),
            'price' => $this->faker->randomFloat(0, 0, 9999999999.),
            'category' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'description' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'image_url' => $this->faker->regexify('[A-Za-z0-9]{50}'),
        ];
    }
}