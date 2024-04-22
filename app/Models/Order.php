<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\OrderDetails;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $primarykey = 'id';
    protected $fillable = [
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function details(){
        return $this->hasMany(OrderDetails::class);
    }
}
