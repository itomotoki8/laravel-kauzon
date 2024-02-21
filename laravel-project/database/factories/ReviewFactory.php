<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;
use App\Models\User;
use App\Models\Item;

class ReviewFactory extends Factory
{

    protected $model = Review::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'item_id' => $this->faker->numberBetween(1,56),
            'star' => $this->faker->numberBetween(1,5),
            'title' => $this->faker->title,
            'review' => $this->faker->realText(30,2)
        ];
    }
}
