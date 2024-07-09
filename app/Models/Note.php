<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'account_id',
        'titolo',
        'contenuto',
    ];
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }
}
