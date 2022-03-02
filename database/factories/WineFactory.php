<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wine>
 */
class WineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' =>  $this->faker->company,
            'description'=>  $this->faker->paragraph,
            'date_elaboration' =>  $this->faker->date(),
            'alcohol_content' =>  $this->faker->numberBetween(0,20),
            'price' =>  $this->faker->randomDigit,
            'stock'=>  $this->faker->randomElement([1,0]),
            'type' =>  $this->faker->randomElement(['red', 'pink', 'white']),
            'category_id' => rand(1,10),
            'denomination_id' => rand(1,10),
            'country_id' => rand(1,3)
        ];
    }
}
