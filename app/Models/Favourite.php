<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $table = 'favourites';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'file_id', 'account_id',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id');
    }
}

