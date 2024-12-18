<?php

namespace Database\Factories;

use App\Models\TicketComment;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TicketComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement([1, 2]),
            'content' => $this->faker->sentence,
            'created_at' => $this->faker->dateTimeThisMonth
        ];
    }
}
