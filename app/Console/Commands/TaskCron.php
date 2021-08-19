<?php

namespace App\Console\Commands;

use App\Mail\SendEmail;
use App\Models\User;
use Illuminate\Console\Command;
use Stackkit\LaravelDatabaseEmails\Email;
use Illuminate\Http\Request;

class TaskCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send {recipient} {cc} {bcc?}  {subject?} {body?} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $users = User::all();
        
        // if (count($users) > 0) {
        //     foreach($users as $user) {
                
        //         $five_days_before =  date('Y-m-d', strtotime('-5 days', strtotime($user)));
        //         if($user->trial)
        //         Mail::to($user->email)->send(new SendEmail);
        //     }
        // // }
        Email::compose()
            ->label('welcome')
            ->cc($this->argument('cc'))
            ->bcc($this->argument('bcc'))
            ->recipient($this->argument('recipient'))
            ->subject($this->argument('subject'))
            ->view($this->argument('body'))
            ->send();
            return 'Email send';


    }
}
