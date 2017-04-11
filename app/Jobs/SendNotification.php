<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\Users;
use Davibennun\LaravelPushNotification\Facades\PushNotification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNotification extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = Users::first();

        PushNotification::app('appNameAndroid')->to('CjAphpfIPpkf2ylmwYF8')->send('Hello world!');
    }
}
