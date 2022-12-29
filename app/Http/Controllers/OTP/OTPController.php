<?php

namespace App\Http\Controllers\OTP;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ghasedak\Laravel\GhasedakFacade;

class OTPController extends Controller
{
    public function index()
    {
        return view('auth.otp.index');
    }

    public function generateCode(Request $request)
    {
       /*  $otpCode = random_int(10000, 99999);
        $token = random_int(100000,999999);
        $receptor = '09184224397';

        $response = GhasedakFacade::setVerifyType(GhasedakFacade::VERIFY_MESSAGE_TEXT)
        ->Verify(
            $receptor,
            "test",     // name of the template which you've created in you account
            "param1"
        ); */
    }

    public function process(Request $request, string $token)
    {

    }
}
