<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Etude;

class EchangeOrder extends Model
{
    use HasFactory;
    protected $table = 'echangeorder';
    protected $primarykey = 'id';
    protected $fillable = [
        'file', 'user_id', 'etude_id', 'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function etude(){
        return $this->belongsTo(Etude::class);
    }
}
