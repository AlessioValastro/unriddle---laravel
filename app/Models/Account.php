<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Prompts\Note;

class Account extends Model
{
    protected $table = 'accounts';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'username', 'email', 'password', 'avatar',
    ];

    public function files()
    {
        return $this->hasMany(File::class, 'account_id');
    }

    public function reviews()
    {
        return $this->hasOne(Review::class, 'account_id');
    }

    public function subscriptions(){
        return $this->hasOne(Subscription::class, 'account_id');
    }

    public function notes(){
        return $this->hasMany(Note::class, 'account_id');
    }
}
