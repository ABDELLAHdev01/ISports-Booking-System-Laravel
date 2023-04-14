<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'comment',
        'user_id',
        'course_id',
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
