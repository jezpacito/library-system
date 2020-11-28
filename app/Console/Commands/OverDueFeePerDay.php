<?php

namespace App\Console\Commands;

use App\BorrowedBook;
use App\Fee;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class OverDueFeePerDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fee:overdue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this will add over due per day';

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
     * @return mixed
     */
    public function handle()
    {

        //if borrowed book was not return before due date charge 3 pesos per day
       $overdues= BorrowedBook::whereDate('due_date','=', Carbon::now())
           ->where('date_return', '=',null)
           ->get();

       foreach ($overdues as $overdue){
           $fee = new Fee();
           $fee->overdue_fee = 3;
           $fee->borrowed_book_id = $overdue->id;
           $fee->save();
       }
         echo 'charge done';
    }
}
