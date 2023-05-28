<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Http\Controllers\GuzzleController;
use Illuminate\Support\Stringable;

use GuzzleHttp\Client;
use \GuzzleHttp\Psr7\Utils;

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
        $schedule->call( function()
        {
            $client = new Client([
                "base_uri" => "https://prod.bdroppy.com"
                ]
            );
    
            date_default_timezone_set('Europe/Riga');
            $server_timestamp = $_SERVER['REQUEST_TIME'];
            
            $filepath = "C://laragon/www/taxfreemarket/public/download/";
            $filename = "products_" .  $server_timestamp . ".xml";
    
            $resource = Utils::tryFopen($filepath . $filename , 'w');
    
            // $stream = Utils::streamFor($resource);
    
            $response = $client->request('GET', '/api/export/api/products.xml?acceptedlocales=en_US,ru_RU&user_catalog=606584fda56e8c678393f1b7&token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOiI1ZmMwMDllOTlmYmFhZTg1NDYzNDZhNTAiLCJpYXQiOjE2NTI4NzQ3MjMsImV4cCI6MTY1NTU1MzEyMywiaXNzIjoiUmVQcm94eSJ9.PSe0xDKMBB9tqNz_3rjDFl2gAC7m2NeTaivPgcof40A', [
                'sink' => $filepath . $filename
            ]);
            
            echo "Connection attempt at " . date('m/d/Y H:i:s', $server_timestamp) . " : ";

            if ($response->getStatusCode() == 200) {
                echo "Success!";
            } else {
                echo "Fail!";
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
