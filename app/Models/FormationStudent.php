<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Formation;
use App\Models\User;

class FormationStudent extends Model
{
    use HasFactory;
    protected $table = 'formationstudent';
    protected $primarykey = 'id';
    protected $fillable = [
        'formation_id', 'user_id', 'phone', 'cin'
    ];

    public function formation(){
        return $this->belongsTo(Formation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
