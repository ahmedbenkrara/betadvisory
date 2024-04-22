<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order;
use App\Models\Etude;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'orderdetails';
    protected $primarykey = 'id';
    protected $fillable = [
        'order_id', 'etude_id'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function etude(){
        return $this->belongsTo(Etude::class);
    }
}
