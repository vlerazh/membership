<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Session;
use Illuminate\Http\Request;

class SendSMSController extends Controller
{
    public function index()
    {
        $members = Member::whereHas('courses', function($q) {
            $q->where('id', Session::get('course_id'));
        })->get();
        return view('sms.send')->with('members', $members);
    }

    public function sendSms(Request $request){
        $basic  = new \Vonage\Client\Credentials\Basic("2604382f", "q15Pzvuc2IMBcpUX");
        $client = new \Vonage\Client($basic);

        
        foreach($request->numbers as $number){
            $response = $client->sms()->send(
                new \Vonage\SMS\Message\SMS($number, (Auth::user()->company_name != null ? Auth::user()->company_name : 'Membership'), $request->sms_message)
            );
        };
        $message = $response->current();
        
        if ($message->getStatus() == 0) {
            return view('sms.send');
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
