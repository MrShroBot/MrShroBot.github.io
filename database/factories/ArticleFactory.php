<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $created = fake()->dateTimeBetween('-5 years', 'now');
        $updated = fake()->dateTimeBetween($created, 'now');
        $deleted = null;
        if (rand(0,10) !== 0){
            $updated = $created;
        }
        if (rand(0,9) === 0){
            $deleted = fake()->dateTimeBetween($created);
        }

        return [
            'title' => fake()->word,
            'body' => fake()->paragraphs(3, true),
            'created_at' => $created,
            'updated_at' => $updated,
            'deleted_at' => $deleted,
            'user_id' => User::inRandomOrder()->first()->id,
            'glutF' => rand(true,false),
            'vegan' => rand(true,false),
            'vegetarian' => rand(true,false),
            'spice' => rand(0,5),
            'price' => rand(2,15),
        ];
    }
}
