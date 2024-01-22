<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Constants\VaccineStatus;
use Illuminate\Queue\SerializesModels;
use App\Models\UserVaccineRegistration;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class UpdateVaccinationStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $oneDayAgo = now()->subDay();

        UserVaccineRegistration::where('status', VaccineStatus::SCHEDULED)
            ->where('notification_sent_at', '<=', $oneDayAgo)
            ->update([
                'status' => VaccineStatus::VACCINATED,
            ]);
    }
}
