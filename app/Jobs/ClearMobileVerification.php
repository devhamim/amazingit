<?php

namespace App\Jobs;

use App\Models\customer_registers;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClearMobileVerification implements ShouldQueue
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
        if (!Auth::guard('customerreg')->check()) {

            customer_registers::where('created_at', '<=', now()->subMinutes(5))->update(['mobile_verified' => null]);
            Session::forget('mobile_verify');
        }
    }
}
