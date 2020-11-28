<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=[
        'title','author',
        'publisher','copyright_year',
        'unit_price','description',
        'user_id', 'category_id',
        'status',
        'quantity'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function borrows(){
        return $this->hasMany(BorrowedBook::class);
    }
}
