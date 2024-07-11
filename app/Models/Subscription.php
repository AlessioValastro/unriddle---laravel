<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'account_id',
        'sub_name',
        'plan_type'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_type', 'name');
    }
}
