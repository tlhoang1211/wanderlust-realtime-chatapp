<?php

namespace App\Console;

use App\Chatroom;
use App\Events\BotNotification;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $quotes = [
                'Detect typing and Seen message are available in Private Chat. Select an user from The right Sidebar and start Private Chat',
                'You can react to other user\'s message (Love, Haha, Angry,...)',
                'Try type \'Chuc mung\', \'Congrats\' or \'Congratulations\' to see animation',
                'You can change your message color in Private chat'
            ];

            $chatrooms = Chatroom::all();

            foreach ($chatrooms as $cr) {
                $randIndex = array_rand($quotes);
                $message = $quotes[$randIndex];
                $room = strval($cr->id);
                broadcast(new BotNotification($message, $room));
            }

            Log::info('Bot notification sent');
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
