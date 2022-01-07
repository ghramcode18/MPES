<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use App\Models\product;

class Kernel extends ConsoleKernel
{

    protected $commands = [
         \App\Console\Commands\expiration::class,

    ];


    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

        protected function schedule(Schedule $schedule)
             {

              $schedule->call(function ()
               {
                $currentDate = \Carbon\Carbon::now();
                $products = product::all();
                foreach ($products as $product)
                {
                 $dateproduct = new \Carbon\Carbon($product->expiry_date);
                    if($dateproduct < $currentDate)
                    {
                        $product->delete();
                    }
                }
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
