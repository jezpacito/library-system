<?php

namespace App\Console\Commands;

use App\BorrowedBook;
use Carbon\Carbon;
use Illuminate\Console\Command;

class reservationValidity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservation:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this will delete the reservation after 24 hours';

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
     $reservations=   BorrowedBook::whereDate('created_at','=',Carbon::yesterday())
         -> where('status','approved')
         ->orWhere('status','pending')
         ->forceDelete();




    }
}
