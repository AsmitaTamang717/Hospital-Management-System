<?php

namespace App\Console\Commands;

use App\Models\Schedule;
use Illuminate\Console\Command;

class ResetDoctorStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:reset-doctor-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resetting doctor status ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Schedule::query()->update(['status'=> '1']);
        $this->info('Doctor status has been reset.');
    }
}
