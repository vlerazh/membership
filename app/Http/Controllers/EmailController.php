<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $members = Member::whereHas('courses', function($q) {
            $q->where('id', Session::get('course_id'));
        })->get();
        return view('email.compose')->with('members', $members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $members = Member::whereHas('courses', function($q) {
            $q->where('id', Session::get('course_id'));
        })->get();
        return view('email.compose')->with('members', $members);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        \Artisan::call('email:send' , [
            'recipient' => $request->input('to'), 
            'cc'=>$request->input('cc'),
            'bcc' => $request->input('bcc'),
            'subject' => $request->input('subject'),
            'body' => $request->input('body')
            ]);
        dd('created');
    }

    public function sendEmail(Request $request){

        $mailData = [
            'subject' =>  $request->input('subject'),
            'body' => $request->input('body')
        ];
        $to =  $request->input('to');
        $cc =  $request->input('cc');
       // $bcc =  $request->input('bcc');
        Mail::to($to)
            ->cc($cc)
            //->bcc($bcc)
            ->send(new SendEmail($mailData));
        return redirect('/email')->with('success', 'Email sent');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
