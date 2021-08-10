<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Session;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
class ChangePaidStatusMonthly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:change_paid_status';

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
        $start = Carbon::now()->startOfMonth();
        if(Carbon::now() == $start){
             DB::table('courses_members')->update([
                'paid' => 0
            ]);
        }
       dd($start);
        // return 'Students have to pay';
    }
}
