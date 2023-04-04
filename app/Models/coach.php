<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coach extends Model
{
    use HasFactory;


    protected $fillable = [
        "sport",
        "description",
        "image",
        "location",
        "price",
        "rating"
                                        	

    ];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

 
}
