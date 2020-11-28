<?php

namespace App\Http\Controllers;

use App\Fee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // daily collection report for overdue fee

    public function select_date(Request $request){
        return view('reports.select-date');
    }

    public function daily(Request $request){
       $overdues= Fee::whereDate('created_at',$request->date)->latest()->paginate();

        $total_unpaid= Fee::whereDate('created_at',$request->date)
            ->where('status','unpaid')
            ->get();

//        dd();




        return view('reports.overdue-list',compact('overdues','total_unpaid'));
    }
}
