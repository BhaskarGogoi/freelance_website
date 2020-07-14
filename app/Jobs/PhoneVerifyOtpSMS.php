<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PhoneVerifyOtpSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $phone;
    protected $otp;
   

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($phone, $otp)
    {
        $this->phone = $phone;
        $this->otp = $otp;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
  
        //SMS
        $field = array(
            "sender_id" => "FSTSMS",
            "language" => "english",
            "route" => "qt",
            "numbers" => $this->phone,
            "message" => "28875",
            "variables" => "{#BB#}",
            "variables_values" => "$this->otp"
        );
        
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => json_encode($field),
          CURLOPT_HTTPHEADER => array(
            "authorization: 6iLnlZXAQreUYkRwq5FxcGV8WjoOIa1vMu34Pf70H29JbdhyTN6VTCgxaKtj5Li9dScQWuABzGRfmovI",
            "cache-control: no-cache",
            "accept: */*",
            "content-type: application/json"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
    }
}
