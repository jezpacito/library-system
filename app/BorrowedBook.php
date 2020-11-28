<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BorrowedBook extends Model
{
    use SoftDeletes;
    public  $table='borrowed_book';
    protected $fillable =['member_id','book_id','status','date_return','deleted_at','due_date','transaction_no'];

    public function member(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }

    //fees if overdue
    public function fees(){
        return $this->hasMany(Fee::class);
    }
}
