<?php

namespace App\Jobs;

use App\Models\VaccineCenter;
use Illuminate\Bus\Queueable;
use App\Constants\VaccineStatus;
use Illuminate\Support\Facades\Mail;
use App\Mail\VaccinationScheduledMail;
use Illuminate\Queue\SerializesModels;
use App\Models\UserVaccineRegistration;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailNotifications implements ShouldQueue
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
        $allCenter = VaccineCenter::all();

        foreach ($allCenter as $center) {
            $dailyLimit = $center->daily_limit;

            $notVaccinatedUsers = UserVaccineRegistration::with('vaccineCenter')
                ->where('vaccine_center_id', '=', $center->id)
                ->where('status', VaccineStatus::NOT_VACCINATED)
                ->orderBy('id')
                ->limit($dailyLimit)
                ->get();

            foreach ($notVaccinatedUsers as $user) {
                $email = $user->email;
                $vaccineCenter = $user->vaccineCenter->name;

                UserVaccineRegistration::where('email', $email)->update([
                    'status' => VaccineStatus::SCHEDULED,
                    'notification_sent_at' => now()
                ]);

                $mail = new VaccinationScheduledMail($user->name, $vaccineCenter);

                Mail::to($email)->send($mail);
            }
        }

    }
}
