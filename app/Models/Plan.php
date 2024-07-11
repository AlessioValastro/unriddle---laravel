<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'plans';

    protected $fillable = [
        'name',
        'description',
        'sideprice_description',
        'monthly_price',
        'annual_price',
        'features',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'plan_type', 'name');
    }

    public function getFeaturesArrayAttribute()
    {
        return explode(',', $this->features);
    }
}