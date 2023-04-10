<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'location',
        'price',
        'author',
        'link',
        'level',
        'user_id',
        'sport_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

   

  
}
