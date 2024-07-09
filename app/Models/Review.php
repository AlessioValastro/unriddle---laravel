<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'account_id', 'description', 'rating',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}

