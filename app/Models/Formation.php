<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\FormationStudent;

class Formation extends Model
{
    use HasFactory;
    protected $table = 'formation';
    protected $primarykey = 'id';
    protected $fillable = [
        'cover', 'title', 'description', 'prix', 'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function students(){
        return $this->hasMany(FormationStudent::class);
    }
}
