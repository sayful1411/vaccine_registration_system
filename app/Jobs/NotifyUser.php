<?php

namespace App\Jobs;

use App\Models\User;
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
use Illuminate\Contracts\Queue\ShouldBeUnique;

class NotifyUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user, public VaccineCenter $vaccineCenter)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        UserVaccineRegistration::where('email', $this->user->email)->update([
            'status' => VaccineStatus::SCHEDULED,
            'notification_sent_at' => now()
        ]);

        $mail = new VaccinationScheduledMail($this->user->name, $this->vaccineCenter);

        Mail::to($this->user->email)->send($mail);
    }
}
