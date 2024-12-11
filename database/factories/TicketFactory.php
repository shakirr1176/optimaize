<?php

namespace Database\Factories;

use App\Enums\TicketStatusEnum;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->uuid,
            'user_id' => $this->faker->numberBetween(1, 2),
            'assigned_to' => $this->faker->randomElement([1, 2, null]),
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(TicketStatusEnum::getStatusKeys()),
        ];
    }
}
