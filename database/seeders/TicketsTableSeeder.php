<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\TicketComment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::factory()->count(10)->create()->each(function ($ticket) {
            $ticket->comments()->saveMany(
                TicketComment::factory()->count(random_int(1, 4))->make(['ticket_id' => $ticket->id])
            );
        });
    }
}
