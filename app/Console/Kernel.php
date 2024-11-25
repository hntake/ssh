<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
            $users = \App\Models\Stock::whereDate('reminder_email_date', now()->toDateString())->get();
    
            foreach ($users as $user) {
                Mail::to($user->email)->send(new \App\Mail\ReminderMail($user));
            }
        })->daily();    
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
