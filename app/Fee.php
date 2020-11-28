<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable=['borrowed_book_id', 'overdue_fee','status'];

    public function borrowed_book(){
        return $this->belongsTo(BorrowedBook::class);
    }
}
